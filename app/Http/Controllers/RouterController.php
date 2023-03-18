<?php

namespace App\Http\Controllers;

use App\Models\SeaRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('user.login');
    }

    public function signup()
    {
        return view('user.signup');
    }
}
