<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Course;
use Illuminate\Http\Request;

class CodeController extends Controller
{

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+{}[]|';
        $charLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charLength - 1)];
        }
        return $randomString;
    }


    public function index(Course $course)
    {
        return view('code.index', [
            'course' => $course,
            'codes' => $course->codes()->orderBy('status')->get()
        ]);
    }

    public function generate(Course $course)
    {
        $numberOfCodes = request('numberOfCodes');
        for ($i = 1; $i <= $numberOfCodes; $i++) {
            Code::create([
                'course_id' => $course->id,
                'code' => $this->generateRandomString(10) . time() . $i,
            ]);
        }
        return back()->with('message', 'Codes generated successfully');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
