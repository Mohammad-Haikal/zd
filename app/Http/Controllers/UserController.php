<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function authanticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields, true)) {
            $request->session()->regenerate();

            // if (Auth::user()->role == 1) {
            //     return redirect('/dashboard/requests/sea')->with('message', 'You have successfully logged in as Administrator');
            // }

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

    // public function edit(User $user)
    // {
    //     return view('User.edit', [
    //         'user' => $user,
    //     ]);
    // }

    // public function update(Request $request, User $user)
    // {


    //     if (request('password') != NULL) {
    //         $formFields = $request->validate([
    //             'role' => ['required'],
    //             'name' => ['required', 'min:3'],
    //             'username' => ['required', Rule::unique('instructor', 'username')->ignore($user->username, 'username')],
    //             'password' => ['nullable', 'confirmed']
    //         ]);

    //         $formFields['password'] = bcrypt(request('password'));
    //     } else {
    //         $formFields = $request->validate([
    //             'role' => ['required'],
    //             'name' => ['required', 'min:3'],
    //             'username' => ['required', Rule::unique('instructor', 'username')->ignore($user->username, 'username')],
    //         ]);
    //     }

    //     if ($request->hasFile('signature')) {
    //         $formFields['signature'] = $request->file('signature')->store('imgs/signatures', 'public');
    //         Storage::disk('public')->delete($user->signature);
    //     }

    //     $user->update($formFields);

    //     return redirect('/user')->with('message', 'Instructor updated successfully');
    // }


    // public function show(Request $request)
    // {
    //     return view('User.settings', [
    //         'user' => Auth::user(),
    //     ]);
    // }


    // public function updateInfo(Request $request, User $user)
    // {
    //     if ($user->id != Auth::id()) {
    //         return abort(401);
    //     }

    //     $formFields = $request->validate([
    //         'name' => ['required', 'min:3'],
    //         'username' => ['required', Rule::unique('instructor', 'username')->ignore($user->username, 'username')],
    //     ]);

    //     if ($request->hasFile('signature')) {
    //         $formFields['signature'] = $request->file('signature')->store('imgs/signatures', 'public');
    //         Storage::disk('public')->delete($user->signature);
    //     }

    //     $user->update($formFields);

    //     return redirect('user/settings')->with('message', 'Information updated successfully');
    // }

    // public function updatePass(Request $request, User $user)
    // {
    //     if ($user->id != Auth::id()) {
    //         return abort(401);
    //     }

    //     $formFields = $request->validate([
    //         'current_password' => ['required'],
    //         'password' => ['required', 'confirmed', 'min:6']
    //     ]);


    //     if (!password_verify($request['current_password'], $user->password)) {
    //         return back()->withErrors([
    //             'current_password' => 'current password is wrong'
    //         ]);
    //     }


    //     $formFields['password'] = bcrypt($formFields['password']);

    //     $user->update($formFields);

    //     return redirect('user/settings')->with('message', 'Password updated successfully');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have logged out');;
    }

    // public function destroy(User $user)
    // {
    //     if ($user->signature != null) {
    //         Storage::disk('public')->delete($user->signature);
    //     };

    //     $user->delete();

    //     return back()->with('message', 'Instructor deleted successfully');
    // }
}
