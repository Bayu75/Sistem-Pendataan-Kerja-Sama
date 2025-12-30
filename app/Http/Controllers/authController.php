<?php

namespace App\Http\Controllers;

use App\Models\LoginAdmin;
use Illuminate\Http\Request;
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
            'pass' => 'required'
        ]);

        $admin = LoginAdmin::where('uname', $request->uname)->first();

        if($admin && $admin->pass === $request->pass) {
            Session::put('admin', $admin->uname);
            return view('Admin.DashboardAdmin');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Session::forget('admin');
        return redirect('/loginAdmin');
    }
}
