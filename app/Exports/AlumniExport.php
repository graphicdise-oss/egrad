<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumniExport implements FromCollection, WithHeadings
{
    protected $namelevel_full;
    protected $detail;
    protected $id_no;

    // ✅ รับค่าจาก controller
    public function __construct($namelevel_full = null, $detail = null, $id_no = null)
    {
        $this->namelevel_full = $namelevel_full;
        $this->detail = $detail;
        $this->id_no = $id_no;
    }

    // ✅ ดึงข้อมูลจากฐานข้อมูล SQL Server
    public function collection()
    {
        $sql = "
            SELECT *
            FROM (
                SELECT 
                    id_no, term, pname, name, lname, email, tel, idcard, detail, 
                    namelevel_full, status_name,
                    ROW_NUMBER() OVER (
                        PARTITION BY id_no 
                        ORDER BY 
                            CAST(SUBSTRING(term, CHARINDEX('/', term) + 1, LEN(term)) AS INT) DESC,
                            term DESC
                    ) AS rn
                FROM Ve_studentbunditfinan
                WHERE status_name = N'เรียนครบหลักสูตร'
            ) AS t
            WHERE rn = 1
        ";

        $bindings = [];

        // ✅ เงื่อนไขกรองข้อมูล
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

        // ✅ ดึงข้อมูลจาก SQL Server
        $students = DB::connection('sqlsrv_register')->select($sql, $bindings);

        // ✅ แปลงข้อมูลให้พร้อมสำหรับ export
        return collect($students)->map(function ($s) {
            return [
                'รหัสนักศึกษา' => $s->id_no,
                'ปี/เทอม' => $s->term,
                'คำนำหน้า' => $s->pname,
                'ชื่อ' => $s->name,
                'นามสกุล' => $s->lname,
                'อีเมล' => $s->email,
                'เบอร์โทร' => $s->tel,
                'เลขบัตรประชาชน' => $s->idcard,
                'หลักสูตร' => $s->detail,
                'ระดับปริญญา' => $s->namelevel_full,
                'สถานะ' => $s->status_name,
            ];
        });
    }

    // ✅ หัวตารางของ Excel
    public function headings(): array
    {
        return [
            'รหัสนักศึกษา',
            'ปี/เทอม',
            'คำนำหน้า',
            'ชื่อ',
            'นามสกุล',
            'อีเมล',
            'เบอร์โทร',
            'เลขบัตรประชาชน',
            'หลักสูตร',
            'ระดับปริญญา',
            'สถานะ'
        ];
    }
}
