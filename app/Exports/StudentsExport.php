<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
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
        // ✅ ใช้ ROW_NUMBER() เพื่อเลือกเฉพาะ term ล่าสุดของแต่ละ id_no
        $sql = "
            SELECT *
            FROM (
                SELECT 
                    id_no, term, pname, name, lname, email, tel, idcard, detail, 
                    namelevel_full, status_name,
                    ROW_NUMBER() OVER (PARTITION BY id_no ORDER BY term DESC) AS rn
                FROM Ve_studentbunditfinan
                WHERE status_name = 'เรียนยังไม่ครบหลักสูตร'
            ) AS t
            WHERE rn = 1
        ";

        $bindings = [];

        if ($this->namelevel_full) {
            $sql .= " AND namelevel_full = ? ";
            $bindings[] = $this->namelevel_full;
        }

        if ($this->detail) {
            $sql .= " AND detail = ? ";
            $bindings[] = $this->detail;
        }

        if ($this->id_no) {
            $sql .= " AND id_no = ? ";
            $bindings[] = $this->id_no;
        }

        $sql .= " ORDER BY id_no DESC";

        $students = DB::connection('sqlsrv_register')->select($sql, $bindings);

        return collect($students)->map(function ($s) {
            return [
                'รหัสนักศึกษา' => $s->id_no,
                'ปี' => $s->term,
                'คำนำหน้า' => $s->pname,
                'ชื่อ' => $s->name,
                'นามสกุล' => $s->lname,
                'Email' => $s->email,
                'เบอร์โทร' => $s->tel,
                'เลขบัตรประชาชน' => $s->idcard,
                'หลักสูตร' => $s->detail,
                'ระดับ' => $s->namelevel_full,
                'สถานะ' => $s->status_name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'รหัสนักศึกษา', 'ปี', 'คำนำหน้า', 'ชื่อ', 'นามสกุล',
            'Email', 'เบอร์โทร', 'เลขบัตรประชาชน', 'หลักสูตร', 'ระดับ', 'สถานะ',
        ];
    }
}
