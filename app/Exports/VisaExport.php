<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VisaExport implements FromCollection, WithHeadings
{
    protected $namelevel_full, $detail, $id_no;

    public function __construct($namelevel_full = null, $detail = null, $id_no = null)
    {
        $this->namelevel_full = $namelevel_full;
        $this->detail = $detail;
        $this->id_no = $id_no;
    }

    public function collection()
    {
        // ✅ ดึงปีล่าสุด 5 ปีหลังสุด
        $latestYearsQuery = DB::connection('sqlsrv_register')->select("
            SELECT DISTINCT TOP 5 RIGHT(term, 2) AS year_part
            FROM Ve_studentbunditfinan
            WHERE term IS NOT NULL
            ORDER BY year_part DESC
        ");

        $latestYears = array_map(fn($row) => $row->year_part, $latestYearsQuery);
        $yearList = "'" . implode("','", $latestYears) . "'";

        // ✅ Query หลัก (ใช้ ROW_NUMBER เพื่อเลือกเทอมล่าสุดของแต่ละ id_no)
        $sql = "
            SELECT * FROM (
                SELECT 
                    id_no, term, pname, name, lname, email, tel, idcard, detail,
                    namelevel_full, status_name, dateidcard_end,
                    ROW_NUMBER() OVER (PARTITION BY id_no ORDER BY term DESC) AS rn
                FROM Ve_studentbunditfinan
                WHERE dateidcard_end IS NOT NULL
                  AND status_name = N'เรียนยังไม่ครบหลักสูตร'
                  AND RIGHT(term, 2) IN ($yearList)
            ) AS t
            WHERE rn = 1
        ";

        $bindings = [];

        if ($this->namelevel_full) {
            $sql .= " AND t.namelevel_full = ? ";
            $bindings[] = $this->namelevel_full;
        }

        if ($this->detail) {
            $sql .= " AND t.detail = ? ";
            $bindings[] = $this->detail;
        }

        if ($this->id_no) {
            $sql .= " AND t.id_no = ? ";
            $bindings[] = $this->id_no;
        }

        $sql .= " ORDER BY t.id_no DESC";

        $students = DB::connection('sqlsrv_register')->select($sql, $bindings);

        // ✅ แปลงผลลัพธ์ก่อนส่งออก
        return collect($students)->map(function ($s) {
            // แยกเทอม เช่น "1/68" → เทอม = 1, ปี = 2568
            $termPart = explode('/', $s->term);
            $semester = $termPart[0] ?? '';
            $year = isset($termPart[1]) ? (2500 + (int)$termPart[1]) : '';

            return [
                'รหัสนักศึกษา' => $s->id_no,
                'เทอม' => $semester,
                'ปีการศึกษา' => $year,
                'ชื่อ' => "{$s->pname}{$s->name} {$s->lname}",
                'หลักสูตร' => $s->detail,
                'ระดับ' => $s->namelevel_full,
                'วันหมดอายุบัตร' => $s->dateidcard_end,
                'อีเมล' => $s->email,
                'เบอร์โทร' => $s->tel,
                'สถานะ' => $s->status_name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'รหัสนักศึกษา', 'เทอม', 'ปีการศึกษา', 'ชื่อ', 'หลักสูตร', 'ระดับ',
            'วันหมดอายุบัตร', 'อีเมล', 'เบอร์โทร', 'สถานะ'
        ];
    }
}
