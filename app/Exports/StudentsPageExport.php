<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsPageExport implements FromCollection, WithHeadings
{
    protected $page, $namelevel_full, $detail, $id_no;

    public function __construct($page = 1, $namelevel_full = null, $detail = null, $id_no = null)
    {
        $this->page = $page;
        $this->namelevel_full = $namelevel_full;
        $this->detail = $detail;
        $this->id_no = $id_no;
    }

    public function collection()
    {
        $offset = ($this->page - 1) * 20;

        $sql = "
            SELECT *
            FROM (
                SELECT *,
                    ROW_NUMBER() OVER(
                        PARTITION BY id_no
                        ORDER BY term DESC
                    ) AS rn
                FROM Ve_studentbunditfinan
                WHERE status_name = N'เรียนครบหลักสูตร'
            ) AS t
            WHERE rn = 1
            ORDER BY id_no DESC
            OFFSET ? ROWS FETCH NEXT 20 ROWS ONLY
        ";

        $students = DB::connection('sqlsrv_register')->select($sql, [$offset]);

        return collect($students)->map(function ($s) {
            return [
                'รหัสนักศึกษา' => $s->id_no,
                'ปี/เทอม' => $s->term,
                'ชื่อ' => "{$s->pname}{$s->name} {$s->lname}",
                'ระดับ' => $s->namelevel_full,
                'หลักสูตร' => $s->detail,
                'สถานะ' => $s->status_name,
            ];
        });
    }

    public function headings(): array
    {
        return ['รหัสนักศึกษา', 'ปี/เทอม', 'ชื่อ', 'ระดับ', 'หลักสูตร', 'สถานะ'];
    }
}
