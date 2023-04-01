<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SeaRequest;
use App\Models\Shipment;
use App\Models\User;
use App\Models\UserLoginHistory;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouterController extends Controller
{
    public function index()
    {
        // $startTime = '00:00:00';
        // $start = Carbon::createFromFormat('H:i:s', $startTime);

        // $userLogin = UserLoginHistory::where('user_id', '=', 1)->orderBy('updated_at', 'desc')->first()->updated_at;

        // dump($start);
        // dump($userLogin);
        // dump('Logged In '. $userLogin->diffForHumans($start));

        return view('index', [
            // 'loggedin' => 'Last logged in after ' . $userLogin->diffInMinutes($start) . ' minutes from ' . date("g:ia", strtotime($startTime)),
        ]);
    }

    public function login()
    {
        return view('user.login');
    }

    public function signup()
    {
        return view('user.signup');
    }
    public function catalogue()
    {
        return view('catalogue', [
            'courses' => Course::all()->sortByDesc('created_at')
        ]);
    }
}
