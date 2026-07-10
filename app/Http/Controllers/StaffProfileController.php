<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport; // ดึงทั้งหมด
use App\Exports\StudentsPageExport; // ดึงเฉพาะหน้า

class StaffProfileController extends Controller
{
    public function index(Request $request)
    {
        $staff = DB::connection('vrumain')
            ->table('t_staff_profile')
            ->paginate(10);

        return view('students.index_teacher', compact('staff'));


    }

    public function edit($id)
    {
        $staff = DB::connection('vrumain')->table('t_staff_profile')->where('STAFF_ID', $id)->first();
        return view('students.edit_teacher', compact('staff'));

    }

    public function update(Request $request, $id)
    {
        DB::connection('vrumain')->table('t_staff_profile')
            ->where('STAFF_ID', $id)
            ->update([
                'FIRST_NAME_TH' => $request->first_name,
                'LAST_NAME_TH' => $request->last_name,
                'EMAIL' => $request->email,
                'POSITION' => $request->position,
                // เพิ่ม field อื่น ๆ ตามที่ต้องการ
            ]);

        return redirect()->route('staff.index')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::connection('vrumain')->table('t_staff_profile')->where('STAFF_ID', $id)->delete();

        return redirect()->route('staff.index')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}


