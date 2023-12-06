<?php

namespace App\Http\Controllers\Backend\Marketing\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Marketing Register Page Method
    public function register()
    {
        return view('marketing.auth.marketing_register');
    }
    //Marketing Store Method
    public function store(Request $request)
    {
    }
    //Marketing Login Page Method
    public function login()
    {
        return view('marketing.auth.marketing_login');
    }
    //Marketing Authentication Method
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users,email",
            'password' => "required|min:8",
            'remember' => 'nullable|string'
        ]);
        $remember = $request->remember == "on" ? true : false;

        if (Auth::guard('marketing')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $remember
        )) {
            if (Auth::guard('marketing')->user()->marketer->status) {
                $request->session()->regenerate();
                return redirect()->route('marketing.dashboard');
            } else {
                Auth::guard("marketing")->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('marketing.login')->with('error', 'Your marketing account is deative.');
            }
        }
        return redirect()->route('marketing.login')->with('error', 'Invalid credentials');
    }

    //Marketing Logout Method
    public function logout(Request $request)
    {
        Auth::guard("marketing")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('marketing.login');
    }
    //Marketing Forgot Password Page
    public function forgot_password()
    {
        return view('marketing.auth.marketing_forgot_password');
    }
}
