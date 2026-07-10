<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginApplyController extends Controller
{
    public function showForm()
    {
        return view('loginviewtdl');
    }


    public function login(Request $request)
    {
        $user = DB::connection('pgsql_local')
            ->table('loginegrad')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            session([
                'apply_logged_in' => true,
                'apply_user' => $user->username,
            ]);

            return redirect('/apply-docs');
        }

        return back()->withErrors([
            'login' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
        ]);
    }

    public function logout()
    {
        session()->forget(['apply_logged_in', 'apply_user']);
        return redirect('/loginapply');
    }
}
