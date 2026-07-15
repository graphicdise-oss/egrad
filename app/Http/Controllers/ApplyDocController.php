<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyDocController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Query หลัก
        |--------------------------------------------------------------------------
        */
        $query = DB::connection('sqlsrv_remote')
            ->table('tbl_std_master_register as s')
            ->select(
                's.name_id',
                's.name_na',
                's.surname_su',
                's.prefix',
                's.cardid2',
                's.branch_one',
                's.email',
                's.telephone',
                's.educationan_sch',
                's.branch_sch',
                's.place_sch',
                's.grade_sch',
                's.mt_status_id',
                's.mt_confirmregister',
                's.file_uplond',
                's.year_register',
                's.year_nameid',
                's.insert_datetime',
                's.std_submit1'

            );

        /*
        |--------------------------------------------------------------------------
        | ไม่แสดงรายการที่ยกเลิก
        |--------------------------------------------------------------------------
        */
        $query->where(function ($q) {
            $q->whereNull('s.cardid1')
                ->orWhereRaw("LTRIM(RTRIM(s.cardid1)) <> ?", ['ยกเลิก']);
        });

        /*
        |--------------------------------------------------------------------------
        | Filter หลักสูตร
        |--------------------------------------------------------------------------
        */
        if ($request->filled('degree') && $request->degree !== 'teacher') {
            $query->where('s.branch_one', $request->degree);
        }

        /*
        |--------------------------------------------------------------------------
        | Filter ปี / เทอม
        |--------------------------------------------------------------------------
        | รูปแบบ:
        |  - 2568
        |  - 1/2568
        */
        if ($request->filled('term_year') && $request->term_year !== 'teacher') {

            if (str_contains($request->term_year, '/')) {
                [$term, $year] = explode('/', $request->term_year);

                $query->where('s.year_nameid', trim($term))
                    ->where('s.year_register', trim($year));
            } else {
                $query->where('s.year_register', trim($request->term_year));
            }


        } else {
            // ค่าเริ่มต้น = ปีปัจจุบัน (พ.ศ.)
            $currentYear = date('Y') + 543;
            $query->where('s.year_register', $currentYear);
        }

        /*
        |--------------------------------------------------------------------------
        | Sort
        |--------------------------------------------------------------------------
        */
        $students = $query
            ->orderBy('s.year_register', 'desc')
            ->orderBy('s.year_nameid', 'asc')
            ->orderBy('s.insert_datetime', 'desc')
            ->get();

        return view('viewtdl', compact('students'));
    }
}


