<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function store(Course $course)
    {
        Lecture::create([
            'course_id' => $course->id,
            'link' => request('link')
        ]);

        return back()->with('message', 'Lecture added successfully');
    }


    public function update(Lecture $lecture)
    {
        $lecture->update([
            'link' => request('link')
        ]);
        return redirect('/instructor/course/lecs/' . $lecture->course->id)->with('message', 'Lecture updated successfully');
    }

    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return back()->with('message', 'Lecture deleted successfully');
    }
}
