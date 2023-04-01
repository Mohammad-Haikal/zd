<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function store(Course $course)
    {
        Record::create([
            'course_id' => $course->id,
            'link' => request('link')
        ]);

        return back()->with('message', 'Record added successfully');
    }


    public function update(Record $record)
    {
        $record->update([
            'link' => request('link')
        ]);
        return redirect('/instructor/course/recs/' . $record->course->id)->with('message', 'Record updated successfully');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return back()->with('message', 'Record deleted successfully');
    }
}
