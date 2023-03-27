<x-template>
    <div class="min-vh-100 container">
        <h1 class="col">Assigned Tasks</h1>
        <div class="table-responsive">
            @if (count($userTasks) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Note</th>
                            <th scope="col">Submission Date</th>
                            <th scope="col">Submission Time</th>
                            <th scope="col">Assigned By</th>
                            <th scope="col" colspan="2">On Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userTasks as $userTask)
                            <tr>
                                <td scope="row">{{ $userTask->task->title }}</td>
                                <td scope="row">{{ $userTask->task->note }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($userTask->sub_date)) }}</td>
                                <td scope="row">{{ date('g:i a', strtotime($userTask->sub_time)) }}</td>
                                <td scope="row">{{ $userTask->task->user->name }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($userTask->created_at)) }}</td>

                                <td scope="row">
                                    <form action="/task/done/{{ $userTask->id }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm('Are you sure?')">Done</button>
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
