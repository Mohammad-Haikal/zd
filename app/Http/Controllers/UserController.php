<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function tasks()
    {
        return view('user.tasks', [
            'userTasks' => Auth::user()->userTasks()->where('status', '=', 0)->orderByDesc('created_at')->get(),
        ]);
    }

    public function students()
    {
        if (Auth::user()->view_st == 0) {
            abort(401);
        }

        return view('user.students', [
            'users' => User::all()->where('role', '=', '0')
        ]);
    }

    public function instructors()
    {
        if (Auth::user()->view_in == 0) {
            abort(401);
        }

        return view('user.instructors', [
            'users' => User::all()->where('role', '=', '1')
        ]);
    }

    public function admins()
    {
        if (Auth::user()->view_ad == 0) {
            abort(401);
        }

        return view('user.admins', [
            'users' => User::all()->where('role', '=', '2')
        ]);
    }

    public function authanticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields, true)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have successfully logged in');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            'phone' => ['required'],
            'dob' => ['required'],
            'age' => ['required'],
            'country' => ['required'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);

        return redirect('/login')->with('message', 'Account created successfully, please login to your account');
    }

    public function edit(User $user)
    {
        $role = $user->role;


        if ($role == 0) {
            if (Auth::user()->edit_st == 0) {
                abort(401);
            }
        } elseif ($role == 1) {
            if (Auth::user()->edit_in == 0) {
                abort(401);
            }
        } elseif ($role == 2) {
            if (Auth::user()->edit_ad == 0) {
                abort(401);
            }
        }

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        if (request('password') != NULL) {
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', Rule::unique('users', 'email')->ignore($user->email, 'email')],
                'phone' => ['required'],
                'dob' => ['required'],
                'age' => ['required'],
                'country' => ['required'],
                'password' => ['required', 'confirmed', 'min:6']
            ]);

            $formFields['password'] = bcrypt(request('password'));
        } else {
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', Rule::unique('users', 'email')->ignore($user->email, 'email')],
                'phone' => ['required'],
                'dob' => ['required'],
                'age' => ['required'],
                'country' => ['required'],
            ]);
        }

        $user->update($formFields);

        return back()->with('message', 'User updated successfully');
    }


    public function add(Request $request)
    {
        return view('user.add');
    }

    public function storeAdded(Request $request)
    {
        $role = request('role');

        if ($role == 0) {
            if (Auth::user()->add_st == 0) {
                abort(401);
            }
        } elseif ($role == 1) {
            if (Auth::user()->add_in == 0) {
                abort(401);
            }
        } elseif ($role == 2) {
            if (Auth::user()->add_ad == 0) {
                abort(401);
            }
        }

        $formFields = $request->validate([
            'role' => ['required'],
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            'phone' => ['required'],
            'dob' => ['required'],
            'age' => ['required'],
            'country' => ['required'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        User::create($formFields);

        return back()->with('message', 'Account created successfully');
    }

    public function course()
    {
        return view('user.course', [
            'studentCourses' => Auth::user()->studentCourses()->orderByDesc('created_at')->get(),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have logged out');;
    }

    public function destroy(User $user)
    {
        $role = $user->role;


        if ($role == 0) {
            if (Auth::user()->delete_st == 0) {
                abort(401);
            }
        } elseif ($role == 1) {
            if (Auth::user()->delete_in == 0) {
                abort(401);
            }
        } elseif ($role == 2) {
            if (Auth::user()->delete_ad == 0) {
                abort(401);
            }
        }

        $user->delete();
        return back()->with('message', 'User deleted successfully');
    }
}
