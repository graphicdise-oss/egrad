<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StdvruController extends Controller
{
    public function index()
    {
        $majors = DB::connection('sqlsrv_remote')
            ->table('tbMajorApply_03_test')
            ->select('major_id', 'MajorCode', 'MajorName', 'level_name', 'level_name_en')
            ->orderBy('major_id', 'ASC')
            ->get();

        return view('test', compact('majors'));
    }
 

    public function store(Request $request)
    {
        $request->validate([
            'prefix' => 'required|string|max:20',
            'name_na' => 'required|string|max:100',
            'surname_su' => 'required|string|max:100',
            'branch_one' => 'required|string|max:50',
            'year_register' => 'required|string|max:50',
            'chart' => 'required|integer',
            'cardid2' => 'nullable|string|max:255',
            'sex_status' => 'required|integer',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'postcard' => 'nullable|string|max:10',
            'telephone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'passport_start_date' => 'nullable|date',
            'passport_end_date' => 'nullable|date',
            'visa_no' => 'nullable|string|max:15',
            'visa_type' => 'nullable|string|max:15',
            'visa_issue_date' => 'nullable|date',
            'visa_expire_date' => 'nullable|date',
            'place_sch' => 'nullable|string|max:255',
            'educationan_sch' => 'nullable|string|max:100',
            'branch_sch' => 'nullable|string|max:100',
            'grade_sch' => 'nullable|string|max:5',
            'file_uplond' => 'nullable|mimes:pdf|max:2048',
            // ❌ ไม่ต้อง validate degree_num, news
        ]);


        // ✅ จัดการไฟล์
        if ($request->hasFile('file_uplond')) {
            $fileName = time() . '_' . $request->file('file_uplond')->getClientOriginalName();
            $request->file('file_uplond')->move(public_path('uploads'), $fileName);
        } else {
            $fileName = null;
        }

        $status = DB::connection('sqlsrv_remote')
            ->table('tbl_std_master_register_test')
            ->insert([
                'prefix' => $request->prefix,
                'name_na' => $request->name_na,
                'surname_su' => $request->surname_su,
                'cardid1' => $request->cardid2,
                'cardid2' => $request->cardid2,
                'sex_status' => $request->sex_status,
                'chart' => $request->chart,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'postcard' => $request->postcard,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'branch_one' => $request->branch_one,
                'year_register' => $request->year_register,
                'place_sch' => $request->place_sch,
                'educationan_sch' => $request->educationan_sch,
                'branch_sch' => $request->branch_sch,
                'grade_sch' => $request->grade_sch,
                'file_uplond' => $fileName, // ✅ เก็บชื่อไฟล์ที่ move แล้ว
                'passport_start_date' => $request->passport_start_date,
                'passport_end_date' => $request->passport_end_date,
                'visa_no' => $request->visa_no,
                'visa_type' => $request->visa_type,
                'visa_issue_date' => $request->visa_issue_date,
                'visa_expire_date' => $request->visa_expire_date,
                'insert_datetime' => now()->format('Y-m-d H:i:s'),
                'insert_data' => 'web_form',
            ]);

        return back()->with('success', $status ? '✅ บันทึกสำเร็จ' : '❌ บันทึกไม่สำเร็จ');

    }


}

