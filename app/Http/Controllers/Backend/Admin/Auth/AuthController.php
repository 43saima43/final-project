<?php

namespace App\Http\Controllers\Backend\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Admin Register Page Method
    public function register()
    {
        return view('admin.auth.admin_register');
    }
    //Admin Store Method
    public function store(Request $request)
    {
    }
    //Admin Login Page Method
    public function login()
    {
        return view('admin.auth.admin_login');
    }
    //Admin Authentication Method
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users,email",
            'password' => "required|min:8",
            'remember' => 'nullable|string'
        ]);
        $remember = $request->remember == "on" ? true : false;

        if (Auth::guard('admin')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $remember
        )) {
            if (Auth::guard('admin')->user()->admin->status) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard("admin")->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->with('error', 'Your admin account is deative.');
            }
        }
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }

    //Admin Logout Method
    public function logout(Request $request)
    {
        Auth::guard("admin")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    //Admin Forgot Password Page
    public function forgot_password()
    {
        return view('admin.auth.admin_forgot_password');
    }
}
