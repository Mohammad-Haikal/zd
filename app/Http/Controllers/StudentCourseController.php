<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function index(StudentCourse $studentCourse)
    {
        return view('studentCourse.index', [
            'studentCourse' => $studentCourse,
            'course' => $studentCourse->course,
            'lectures' => $studentCourse->course->lectures()->orderByDesc('created_at')->get(),
            'records' => $studentCourse->course->records()->orderByDesc('created_at')->get()
        ]);
    }
}
