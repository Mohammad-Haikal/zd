<x-template>
    <div class="min-vh-100 container">
        <div class="d-flex align-items-center">
            <h1 class="col">Manage Courses</h1>
            <a class="btn btn-primary d-flex align-items-center shadow-sm" href="/course/add"><i class="bi bi-plus me-1"></i>Add Course</a>
        </div>
        <div class="table-responsive">
            @if (count($courses) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Price</th>
                            <th scope="col">Outcomes</th>
                            <th scope="col">Prerequisites</th>
                            <th scope="col">Provider</th>
                            <th scope="col">Session Date</th>
                            <th scope="col">Session Time</th>
                            <th scope="col" colspan="3">Added on Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td scope="row">{{ $course->name }}</td>
                                <td scope="row">{{ $course->user->name }}</td>
                                <td scope="row">{{ $course->price }}</td>
                                <td scope="row">{{ $course->outcomes }}</td>
                                <td scope="row">{{ $course->prerequisites }}</td>
                                <td scope="row">{{ $course->provider }}</td>
                                <td scope="row">{{ $course->session_date }}</td>
                                <td scope="row">{{ date('g:i a', strtotime($course->session_time)) }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($course->created_at)) }}</td>

                                <td scope="row">
                                    <a class="link-secondary m-0" href="/course/edit/{{ $course->id }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <form action="/course/delete/{{ $course->id }}" method="post">
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
                <p class="text-muted">No courses found</p>
            @endif
        </div>
    </div>
</x-template>
