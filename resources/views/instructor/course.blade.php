<x-template>
    <div class="min-vh-100 container">
        <h1 class="col">My Courses</h1>
        <div class="table-responsive">
            @if (count($courses) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Course Name</th>
                            <th scope="col">Students</th>
                            <th scope="col">Lectures</th>
                            <th scope="col">Records</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td scope="row"><a href="/course/show/{{ $course->id }}">{{ $course->name }}</a></td>
                                <td scope="row"><a href="/instructor/course/students/{{ $course->id }}">View</a></td>
                                <td scope="row"><a href="/instructor/course/lecs/{{ $course->id }}">Manage</a></td>
                                <td scope="row"><a href="/instructor/course/recs/{{ $course->id }}">Manage</a></td>
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
