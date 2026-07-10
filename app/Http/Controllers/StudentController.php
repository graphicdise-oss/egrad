<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{



public function indexCourse()
{
    // ดึงข้อมูลหลักสูตรแบบไม่ซ้ำ
    $courses = DB::connection('sqlsrv_register')
        ->table('Ve_studentbunditfinan')
        ->select('namelevel_full', 'detail')
        ->whereNotNull('namelevel_full')
        ->whereNotNull('detail')
        ->distinct()
        ->orderBy('namelevel_full')
        ->orderBy('detail')
        ->get();

    // ส่งตัวแปร $courses ไปยัง view
    return view('students.indexcourse', compact('courses'));
}


}
