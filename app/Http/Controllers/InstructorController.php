<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function courses()
    {
        return view('instructor.course', [
            'courses' => Auth::user()->courses()->orderByDesc('created_at')->get(),
        ]);
    }

    public function courseStudents(Course $course)
    {
        return view('instructor.course-students', [
            'course' => $course,
            'studentCourses' => $course->studentCourses
        ]);
    }

    public function courseLecs(Course $course, Lecture $lecture = null)
    {
        return view('instructor.course-lecs', [
            'course' => $course,
            'lectures' => $course->lectures()->orderByDesc('created_at')->get(),
            'editLecture' => $lecture
        ]);
    }

    public function courseRecs(Course $course, Record $record = null)
    {
        return view('instructor.course-recs', [
            'course' => $course,
            'records' => $course->records()->orderByDesc('created_at')->get(),
            'editRecord' => $record
        ]);
    }
}
