<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $courses = Course::latest()->take(3)->get();
        $teachers = Teacher::latest()->take(4)->get();
        return view('frontend.index', compact('courses','teachers'));
    }

    public function courses(){
        $courses = Course::all();
        return view('frontend.courses',compact('courses'));
    }

    public function teachers(){
        $teachers = Teacher::all();
        return view('frontend.teachers',compact('teachers'));
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function about(){
        return view('frontend.about');
    }
}
