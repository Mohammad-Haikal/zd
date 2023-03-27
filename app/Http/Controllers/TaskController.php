<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        if (Auth::user()->view_ta == 0) {
            abort(401);
        }

        return view('task.index', [
            'tasks' => Auth::user()->tasks()->orderByDesc('created_at')->get(),
        ]);
    }

    public function add()
    {
        if (Auth::user()->add_ta == 0) {
            abort(401);
        }
        return view('task.add', [
            'admins' => User::all()->where('role', '=', '2'),
        ]);
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'note' => request('note'),
            'sub_date' => request('sub_date'),
            'sub_time' => request('sub_time'),
        ]);

        $admins = array_unique(request('admins'));
        foreach ($admins as $admin) {
            // $admin = User::findOrFail($admin);
            UserTask::create([
                'user_id' => $admin,
                'task_id' => $task->id,
            ]);
        }

        return redirect('/task')->with('message', 'Task assigned successfully');
    }

    public function done(UserTask $userTask)
    {
        $userTask->update([
            'status' => 1
        ]);

        return redirect('/user/tasks')->with('message', 'Task Done');
    }

    public function edit(Task $task)
    {

        if (Auth::user()->edit_ta == 0) {
            abort(401);
        }

        return view('task.edit', [
            'task' => $task,
        ]);
    }

    public function update(Task $task)
    {
        $task->update([
            'title' => request('title'),
            'note' => request('note'),
            'sub_date' => request('sub_date'),
            'sub_time' => request('sub_time'),
        ]);

        return redirect('/task')->with('message', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        if (Auth::user()->delete_ta == 0) {
            abort(401);
        }

        $task->delete();
        return back()->with('message', 'Task deleted successfully');
    }
}
