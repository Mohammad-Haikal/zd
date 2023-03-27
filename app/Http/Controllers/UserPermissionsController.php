<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPermissionsController extends Controller
{
    public function index(User $user)
    {
        if (Auth::user()->edit_ad == 0) {
            abort(401);
        }

        return view('user.permissions', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        if (Auth::user()->edit_ad == 0) {
            abort(401);
        }
        $user->update([
            'view_st' => request('view_st') ?? 0,
            'view_in' => request('view_in') ?? 0,
            'view_ad' => request('view_ad') ?? 0,
            'view_ta' => request('view_ta') ?? 0,
            'add_st' => request('add_st') ?? 0,
            'add_in' => request('add_in') ?? 0,
            'add_ad' => request('add_ad') ?? 0,
            'add_co' => request('add_co') ?? 0,
            'add_ta' => request('add_ta') ?? 0,
            'edit_st' => request('edit_st') ?? 0,
            'edit_in' => request('edit_in') ?? 0,
            'edit_ad' => request('edit_ad') ?? 0,
            'edit_co' => request('edit_co') ?? 0,
            'edit_ta' => request('edit_ta') ?? 0,
            'delete_st' => request('delete_st') ?? 0,
            'delete_in' => request('delete_in') ?? 0,
            'delete_ad' => request('delete_ad') ?? 0,
            'delete_co' => request('delete_co') ?? 0,
            'delete_ta' => request('delete_ta') ?? 0
        ]);

        return redirect('/user/admins')->with('message', 'Admin Access Levels modified successfully');
    }
}
