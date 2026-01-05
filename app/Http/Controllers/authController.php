<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('loginAdmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'uname' => 'required',
            'pass'  => 'required'
        ]);

        $admin = DB::table('login')
            ->where('uname', $request->uname)
            ->where('pass', $request->pass)
            ->first();

        if ($admin) {
            Session::put('admin', $admin->uname);
            return redirect()->route('dashboardAdmin');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout(Request $request)
    {
        Session::forget('admin');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginAdmin');
    }
}
