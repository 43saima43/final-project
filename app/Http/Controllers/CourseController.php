<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Course Dependency Injection
    protected $courseModel;


    public function __construct(Course $courseModel)
    {
        $this->courseModel = $courseModel;
    }


    // Course Listing Page Method
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }


    // Course Create Page Method
    public function create()
    {
        $teachers = Teacher::select(['id', 'name'])->get();
        return view('admin.course.create', compact('teachers'));
    }


    // Course Store Method
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|string',
            "price" => 'required|string',
            "thumbnail" => 'required|mimes:png,jpg,jpeg',
            "teacher_id" => 'required|exists:teachers,id',
        ]);
        if ($request->hasFile('thumbnail')) {
            $thumbnail = str()->random(5) . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->storeAs('courses', $thumbnail, 'public');
        }
        $course = new Course();
        $course->title = $request->title;
        $course->price = $request->price;
        $course->thumbnail = $thumbnail;
        $course->teacher_id = $request->teacher_id;
        $course->save();
        return back();
    }


    // Course Show Page Method
    public function show($id)
    {
    }


    // Course Edit Page Method
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = Teacher::select(['id','name'])->get();
        return view('admin.course.edit', compact('course', 'teachers'));
    }


    // Course Update Method
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => 'required|string',
            "price" => 'required|string',
            "thumbnail" => 'nullable|mimes:png,jpg,jpeg',
            "teacher_id" => 'required|exists:teachers,id',
        ]);
        if ($request->hasFile('thumbnail')) {
            $thumbnail = str()->random(5) . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->storeAs('courses', $thumbnail, 'public');
        } else {
            $thumbnail = $request->previous_thumbnail;
        }
        $course = Course::findOrFail($id);
        $course->title = $request->title;
        $course->price = $request->price;
        $course->thumbnail = $thumbnail;
        $course->teacher_id = $request->teacher_id;
        $course->save();
        return back();
    }


    // Course Destroy Method
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id)->delete();
        return back();
    }


    // Course Status Change Method
    public function changeStatus(Request $request)
    {
    }


    //Course Store & Update Method
    protected function storeOrUpdate(Request $request, $id = null)
    {
        if ($id) {
            //Update Course
        } else {
            //Create Course
        }
    }
}
