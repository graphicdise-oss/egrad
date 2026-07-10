<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginqandaController extends Controller
{
    public function showLogin()
    {
        return view('qanda.qandalogin');
    }

    public function login(Request $request)
    {
        $user = DB::connection('pgsql_qanda')->table('qanda_login')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            Session::put('user_id', $user->id);
            return redirect('/qanda/edit');
        } else {
            return redirect()->back()->with('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        }
    }

    public function logout()
    {
        Session::forget('user_id');
        return redirect('/qanda/login');
    }
}

