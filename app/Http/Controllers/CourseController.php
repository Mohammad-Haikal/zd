<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

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
        //
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
