<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StdLoginController extends Controller
{
    // ✅ แสดงหน้า Login
    public function showLoginForm()
    {
        return view('loginegradstd'); // ← ใช้ชื่อไฟล์ที่คุณบอกไว้
    }

    // ✅ ตรวจสอบ Login
public function login(Request $request)
{
    $request->validate([
        'id_no' => 'required',
        'idcard' => 'required',
    ]);

    $student = DB::connection('sqlsrv_register')
        ->table('Ve_studentbunditfinan')
        ->where('id_no', $request->id_no)
        ->where('idcard', $request->idcard)
        ->first();

    if ($student) {
        session([
            'gradstd_logged_in' => true,
            'gradstd_id_no' => $student->id_no,
        ]);

        // ✅ ไปหน้าแก้ไขข้อมูล
        return redirect()->route('studentsstd.edit', ['id_no' => $student->id_no]);
    } else {
        // ❌ ถ้าไม่พบข้อมูลให้เด้งกลับพร้อมข้อความ
        return redirect()->back()->with('error', 'รหัสนักศึกษาหรือเลขผ่านไม่ถูกต้อง');
    }
}

    // ✅ หน้าโปรไฟล์นักศึกษา
    public function profile()
    {
        if (!session('gradstd_logged_in')) {
            return redirect()->route('gradstd.login');
        }

        $id_no = session('gradstd_id_no');

        $student = DB::connection('sqlsrv_register')
            ->table('Ve_studentbunditfinan')
            ->where('id_no', $id_no)
            ->first();

        return view('students.profile', compact('student'));
    }

    // ✅ ออกจากระบบ
    public function logout()
    {
        session()->forget(['gradstd_logged_in', 'gradstd_id_no']);
        return redirect()->route('gradstd.login');
    }
}
