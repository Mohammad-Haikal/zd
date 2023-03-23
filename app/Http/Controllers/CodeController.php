<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
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
            'codes' => $course->codes()->orderBy('status')->paginate(8)
        ]);
    }

    public function generate(Request $request,  Course $course)
    {
        $request->validate([
            'numberOfCodes' => 'required|integer|between:1,100'
        ]);

        $numberOfCodes = request('numberOfCodes');

        $filePath = "codes/codes"  . "_" . $course->name . "_" . date("d-m-Y") . ".txt";
        $codesFile = fopen($filePath, "w") or die("Unable to open file!");

        for ($i = 1; $i <= $numberOfCodes; $i++) {
            $code = $this->generateRandomString(10) . time() . $i;

            fwrite($codesFile, $code . "\n");
            Code::create([
                'course_id' => $course->id,
                'code' => $code,
            ]);
        }
        fclose($codesFile);

        return Response::download($filePath);
        // return back()->with('message', 'Codes generated successfully');
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

    public function destroy(Code $code)
    {
        $code->delete();
        return back()->with('message', 'Code deleted successfully');
    }

    public function destroyAll(Course $course)
    {
        $course->codes()->delete();
        return back()->with('message', 'All codes deleted successfully');
    }
}
