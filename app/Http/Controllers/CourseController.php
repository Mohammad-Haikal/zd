<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        return view('course.index', [
            'courses' => Course::all()->sortByDesc('created_at')
        ]);
    }

    public function add()
    {
        return view('course.add', [
            'instructors' => User::all()->where('role', '=', '1'),
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'user_id' => ['required'],
            'name' => ['required'],
            'price' => ['required'],
            'outcomes' => ['required'],
            'prerequisites' => ['required'],
            'provider' => ['required'],
            'session_date' => ['required'],
            'session_time' => ['required']
        ]);

        Course::create($formFields);

        return redirect('/course')->with('message', 'Course created successfully');
    }

    public function show(Course $course)
    {
        return view('course.show', [
            'course' => $course,
        ]);
    }

    public function enroll(Course $course)
    {
        $code = Code::where('code', '=', request('code'))->where('status', '=', '0')->where('course_id', '=', $course->id)->first();

        if ($code === null) {
            return back()->withErrors(['code' => 'Invalid code, please try another one']);
        }

        StudentCourse::create([
            'course_id' => $course->id,
            'user_id' => Auth::id()
        ]);

        $code->update([
            'status' => 1
        ]);

        return redirect('/user/course')->with('message', 'Course enrolled in successfully');

    }

    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
            'instructors' => User::all()->where('role', '=', '1'),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $formFields = $request->validate([
            'user_id' => ['required'],
            'name' => ['required'],
            'price' => ['required'],
            'outcomes' => ['required'],
            'prerequisites' => ['required'],
            'provider' => ['required'],
            'session_date' => ['required'],
            'session_time' => ['required']
        ]);

        $course->update($formFields);

        return redirect('/course')->with('message', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('message', 'Course deleted successfully');
    }
}
