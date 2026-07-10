<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // แสดงฟอร์ม login (resources/views/apply/login.blade.php)
    public function showLogin()
    {
        return view('apply.loginapply');
    }

    // ประมวลผลการ login
    public function login(Request $request)
    {
        // ดึงเฉพาะ username และ password ที่ส่งมา
        $credentials = $request->only('username', 'password');

        // ตรวจสอบว่ามีผู้ใช้งานในฐานข้อมูลหรือไม่
        $user = DB::table('loginapply')
            ->where('username', $credentials['username'])
            ->where('password', $credentials['password']) // ❗ควรใช้ bcrypt ในอนาคต
            ->first();

        if ($user) {
            session(['user_id' => $user->id]);
            return redirect()->route('apply.index'); // ✅ เปลี่ยนตรงนี้
        } else {
            return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านผิด');
        }


    }

    // ออกจากระบบ
    public function logout()
    {
        // ลบ session ที่ใช้สำหรับตรวจสอบ login
        session()->forget('user_id');

        // กลับไปหน้า login
        return redirect()->route('login.show');
    }
}
