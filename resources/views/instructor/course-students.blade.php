<x-template>
    <div class="min-vh-100 container">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb  my-2">
                <li class="breadcrumb-item"><a href="/instructor/course">{{$course->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students</li>
            </ol>
        </nav>
        <h1 class="col">Course Students</h1>
        <div class="table-responsive">
            @if (count($studentCourses) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Age</th>
                            <th scope="col">Country</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentCourses as $studentCourse)
                            <tr>
                                <td scope="row">{{ $studentCourse->user->name }}</td>
                                <td scope="row">{{ $studentCourse->user->dob }}</td>
                                <td scope="row">{{ $studentCourse->user->age }}</td>
                                <td scope="row">{{ $studentCourse->user->country }}</td>
                                <td scope="row"><a href="mailto:{{ $studentCourse->user->email }}">{{ $studentCourse->user->email }}</a></td>
                                <td scope="row"><a href="tel:{{ $studentCourse->user->phone }}">{{ $studentCourse->user->phone }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No students registered yet</p>
            @endif
        </div>
    </div>
</x-template>
