<x-template>
    <div class="min-vh-100 container">
        <div class="d-flex align-items-center">
            <h1 class="col">Manage My Tasks</h1>
            <a class="btn btn-primary d-flex align-items-center shadow-sm" href="/task/add"><i class="bi bi-plus me-1"></i>Assign New Task</a>
        </div>
        <div class="table-responsive">
            @if (count($tasks) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Note</th>
                            <th scope="col">Submission Date</th>
                            <th scope="col">Submission Time</th>
                            <th scope="col" colspan="2">For</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td scope="row">{{ $task->title }}</td>
                                <td scope="row">{{ $task->note }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($task->sub_date)) }}</td>
                                <td scope="row">{{ date('g:i a', strtotime($task->sub_time)) }}</td>

                                <td scope="row">
                                    <table class="table table-borderless nested-table ">
                                        <thead class="border-bottom">
                                            <tr>
                                                <th class="py-0" scope="col">User</th>
                                                <th class="py-0" scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($task->userTasks as $userTask)
                                                <tr>
                                                    <td class="py-0" scope="row">{{ $userTask->user->name }}</td>
                                                    <td class="py-0" scope="row">{{ ($userTask->status == 0) ? 'Active' : 'Done' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td scope="row">
                                    <a class="link-secondary" href="/task/edit/{{ $task->id }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <form action="/task/delete/{{ $task->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm link-danger border-0 p-0" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No tasks found</p>
            @endif
        </div>
    </div>
</x-template>
