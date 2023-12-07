<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function login()
    {
        return view('student.auth.student_login');
    }

    public function register()
    {
        return view('student.auth.student_register');
    }
    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required",
            "email" => "required",
            "password" => "required",
            "profile" => "required",
        ]);

        if ($request->hasFile('profile')) {
            $profile = str()->random(5) . time() . '.' . $request->profile->extension();
            $request->profile->storeAs('teachers', $profile, 'public');
        }

        $student = new User();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->profile_picture = $profile;
        $student->save();

        Student::create([
            'user_id' => $student->id
        ]);
        return redirect()->route('student.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users,email",
            'password' => "required|min:8",
            'remember' => 'nullable|string'
        ]);
        $remember = $request->remember == "on" ? true : false;

        if (Auth::guard('student')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $remember
        )) {
            if (Auth::guard('student')->user()->student->status) {
                $request->session()->regenerate();
                return redirect()->route('student.dashboard');
            } else {
                Auth::guard("student")->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('student.login')->with('error', 'Your student account is deative.');
            }
        }
        return redirect()->route('student.login')->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        Auth::guard("student")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('student.login');
    }
    public function dashboard()
    {
        return view('student.student_dashboard');
    }
    public function profile()
    {
        return view('student.profile.student_profile');
    }
}
