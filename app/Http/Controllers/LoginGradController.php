<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginGradController extends Controller
{
    public function showForm()
    {
        return view('loginegrad'); // หน้า login.blade.php
    }

    public function login(Request $request)
    {
        $user = DB::connection('pgsql_local')
            ->table('loginegrad')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();


        if ($user) {
            // บันทึก session
            session(['grad_logged_in' => true, 'grad_user' => $user->username]);
            return redirect('/home'); // หลังล็อกอินไปหน้า egard
        } else {
            return back()->withErrors(['login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
        }
    }

    public function logout()
    {
        session()->forget(['grad_logged_in', 'grad_user']);
        return redirect()->route('grad.login');
    }
}
