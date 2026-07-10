<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentvruController extends Controller
{
    // ฟอร์มแก้ไข
    public function edit($id)
    {
        $student = DB::connection('sqlsrv_remote')
            ->table('dbo.tbl_std_master_register')
            ->where('name_id', $id)
            ->first();

        if (!$student) {
            abort(404, 'ไม่พบนักศึกษา');
        }

        return view('students.edit', compact('student'));
    }

    // บันทึกการแก้ไข
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_na' => 'required|string|max:100',
            'surname_su' => 'required|string|max:100',
            'id_no' => 'required|string|max:20',
        ]);

        DB::connection('sqlsrv_remote')
            ->table('dbo.tbl_std_master_register')
            ->where('name_id', $id)
            ->update([
                'name_na'   => $request->name_na,
                'surname_su'=> $request->surname_su,
                'id_no'     => $request->id_no,
            ]);

        return redirect()->route('students.edit', $id)
            ->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }
}
