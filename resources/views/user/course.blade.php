<x-template>
    <div class="min-vh-100 container">
        <h1 class="col">My Courses</h1>
        <div class="table-responsive">
            @if (count($studentCourses) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Instructor</th>
                            {{-- <th scope="col">Price</th> --}}
                            {{-- <th scope="col">Outcomes</th>
                            <th scope="col">Prerequisites</th>
                            <th scope="col">Provider</th>
                            <th scope="col">Session Date</th>
                            <th scope="col">Session Time</th> --}}
                            {{-- <th scope="col" colspan="3">Added on Date</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentCourses as $studentCourse)
                            <tr>
                                <td scope="row"><a href="/course/show/{{ $studentCourse->course->id }}">{{ $studentCourse->course->name }}</a></td>
                                <td scope="row">{{ $studentCourse->course->user->name }}</td>
                                {{-- <td scope="row">{{ $studentCourse->course->price }} JD</td> --}}
                                {{-- <td scope="row">{{ $course->outcomes }}</td>
                                <td scope="row">{{ $course->prerequisites }}</td>
                                <td scope="row">{{ $course->provider }}</td>
                                <td scope="row">{{ $course->session_date }}</td>
                                <td scope="row">{{ date('g:i a', strtotime($course->session_time)) }}</td> --}}

                                {{-- <td scope="row">
                                    <a class="link-secondary m-0" href="/studentCourse/edit/{{ $studentCourse->course->id }}">Edit</a>
                                </td> --}}
                                {{-- <td scope="row">
                                    <form action="/studentCourse/delete/{{ $studentCourse->course->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm link-danger border-0 p-0" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
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
