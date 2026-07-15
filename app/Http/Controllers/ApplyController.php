<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplyController extends Controller
{
    /**
     * ฟังก์ชันนี้ทำหน้าที่ตรวจสอบการ login
     * รับค่า username และ password จากฟอร์ม
     * ถ้าถูกต้องจะเก็บ user_id ลง session แล้วพาไปหน้ารายชื่อผู้สมัคร
     */


    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = DB::table('users')
            ->where('username', $credentials['username'])
            ->where('password', $credentials['password']) // ❗ควรใช้ bcrypt ภายหลังเพื่อความปลอดภัย
            ->first();

        if ($user) {
            session(['user_id' => $user->id]); // ✅ บันทึก session เพื่อใช้งานในหน้าอื่น
            return redirect()->route('apply.index');
        } else {
            return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านผิด');
        }
    }

    /**
     * ฟังก์ชัน logout ทำหน้าที่ลบ session ที่ใช้ระบุว่า user login อยู่
     * แล้ว redirect กลับไปหน้า login
     */
    public function logout()
    {
        session()->forget('user_id');
        return redirect()->route('login.show');
    }

    /**
     * แสดงฟอร์มสมัครเรียน
     * ตั้งค่าภาษาใน session ด้วย (รองรับ multi-language)
     */
    public function create()
    {
        \App::setLocale(\Session::get('locale', config('app.locale')));

        return view('apply.form', ['formType' => 'grad']);
    }

    /**
     * แสดงฟอร์มสมัครเรียนสำหรับสาขาวิชาชีพครูโดยเฉพาะ
     * หน้าตาเหมือนฟอร์มสมัคร โท-เอก แต่จำกัดตัวเลือกระดับปริญญาให้เหลือแค่วิชาชีพครู
     */
    public function createTeacher()
    {
        \App::setLocale(\Session::get('locale', config('app.locale')));

        return view('apply.form', ['formType' => 'teacher']);
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
        'sex_status' => 'required|integer',
        'degree' => 'nullable|string',
        
        // ✅ เพิ่มตรงนี้
        'file_uplond' => 'nullable|file|mimes:pdf|max:20480',
    ], [
        'file_uplond.max'   => 'ไฟล์ PDF ต้องมีขนาดไม่เกิน 20 MB',
        'file_uplond.mimes' => 'อัปโหลดได้เฉพาะไฟล์ PDF เท่านั้น',
    ]);
        $exists = DB::connection('sqlsrv_remote')
            ->table('tbl_std_master_register')
            ->where('cardid1', $request->cardid2)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->with('error', '❌ หมายเลขบัตรประชาชน/พาสปอร์ต "' . $request->cardid . '" นี้มีในระบบแล้ว กรุณาตรวจสอบอีกครั้ง');
        }

        if ($request->hasFile('file_uplond')) {
            $fileName = time() . '.' . $request->file('file_uplond')->getClientOriginalExtension();
            $request->file('file_uplond')->storeAs('documents', $fileName, 'public');
            $fileUrl = asset('storage/documents/' . $fileName);
        } else {
            $fileName = null;
            $fileUrl = null;
        }

        // 🔹 Logic คำนวณค่า master_status_id และ year_nameid
        $masterStatusId = null;
        if (Str::contains($request->degree, 'ปริญญาโท') || Str::contains($request->degree, "Master’s Degree")) {
            $masterStatusId = 2;
        } elseif (Str::contains($request->degree, 'ปริญญาเอก') || Str::contains($request->degree, "Doctor’s Degree")) {
            $masterStatusId = 3;
        }

        // 🔹 year_nameid ถ้าข้อมูลเป็น "2|2568" หรือ "2569" ให้เป็น 2
        $yearNameId = null;
        if ($request->year_register === '2|2568' || $request->year_register === '2569') {
            $yearNameId = 2;
        }

        try {
            $status = DB::connection('sqlsrv_remote')
                ->table('tbl_std_master_register')
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
                    'facedbook' => $request->facedbook,
                    'branch_one' => $request->branch_one,
                    'year_register' => $request->year_register,
                    'place_sch' => $request->place_sch,
                    'educationan_sch' => $request->educationan_sch,
                    'branch_sch' => $request->branch_sch,
                    'grade_sch' => $request->grade_sch,
                    'file_uplond' => $fileName,
                    'passport_start_date' => $request->passport_start_date,
                    'passport_end_date' => $request->passport_end_date,
                    'visa_no' => $request->visa_no,
                    'visa_type' => $request->visa_type,
                    'visa_issue_date' => $request->visa_issue_date,
                    'visa_expire_date' => $request->visa_expire_date,
                    'year_nameid' => $request->year_nameid,
                    'master_status_id' => $request->master_status_id,
                    'insert_datetime' => now()->format('Y-m-d'),
                    'std_new' => $request->std_new,
                    'province' => '0',
                    'province_sch' => '0',
                    'district' => '0',
                    'districts' => '0',
                    'insert_data' => 'web_form',
                    'cardid_status' => '1',
                    'mt_cancel' => '0',
                    'mt_status_id' => '0',
                    'mt_confirm_register' => '0',
                    'mt_confirmregister' => '0',
                    'mt_confirm1500' => '0',
                    'mt_1500_confirmregister' => '0'
                ]);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return back()->with('success', $status ? '✅ บันทึกสำเร็จ' : '❌ บันทึกไม่สำเร็จ');
    }




    /**
     * แสดงรายการผู้สมัครทั้งหมด
     * มีระบบค้นหาจากชื่อและคณะ
     * เฉพาะผู้ที่ login แล้วเท่านั้นถึงดูได้
     */
    public function index(Request $request)
    {

        if (!Session::has('user_id')) {
            return redirect('/loginapply')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        $query = DB::connection('pgsql')->table('t_std_profile');

        if ($request->filled('fac_code')) {
            $query->where('fac_code', $request->fac_code);
        }

        if ($request->filled('nation_code')) {
            $query->where('nation_code', $request->nation_code);
        }

        $applylist = $query->orderByRaw('created_at DESC NULLS LAST')->paginate(10);


        // ❗ตรงนี้ถ้าใช้ view ที่อยู่ใน apply.table.list ต้องแก้เป็น:
        return view('apply.table.list', compact('applylist'));

    }



    /**
     * แสดงฟอร์มแก้ไขข้อมูลของผู้สมัครแต่ละคน
     * รับ ID ของผู้สมัคร แล้วดึงข้อมูลจากฐานข้อมูลมาแสดง
     */
    public function edit($id)
    {
        if (!Session::has('user_id')) {
            return redirect('/login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }

        $record = DB::table('t_std_profile')->find($id);
        return view('apply.table.edit', compact('record'));
    }

    /**
     * บันทึกข้อมูลที่ถูกแก้ไขจากฟอร์ม edit
     * ใช้ ID ในการระบุตัวผู้สมัครที่จะแก้ไข
     */
    public function update(Request $request, $id)
    {
        if (!Session::has('user_id')) {
            return redirect('/loginapply')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
        }


        DB::table('t_std_profile')->where('id', $id)->update($request->except(['_token', '_method']));
        return redirect()->route('apply.index')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    public function bulkUpdate(Request $request)
    {
        $statuses = $request->input('apply_status'); // [id => 1/0]
        $codes = $request->input('std_code'); // [id => std_code]

        foreach ($statuses as $id => $status) {
            DB::table('t_std_profile')
                ->where('id', $id)
                ->update([
                    'apply_status' => $status,
                    'std_code' => $codes[$id] ?? null,
                ]);
        }

        return back()->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }




    /**
     * ลบข้อมูลผู้สมัครออกจากระบบตาม ID
     * ใช้สำหรับผู้ดูแลระบบเท่านั้น
     */
    public function destroy($id)
    {
        DB::table('t_std_profile')->where('id', $id)->delete();
        return back()->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}
