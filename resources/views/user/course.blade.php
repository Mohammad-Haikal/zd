<x-template>
    <div class="min-vh-100 container">
        <h1 class="col">My Courses</h1>
        <div class="mt-3 row g-4">
            @if (count($studentCourses) != 0)
                @foreach ($studentCourses as $studentCourse)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item position-relative h-100">
                            <div class="service-text rounded p-5">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-' . mt_rand(1, 10) . '.png') }}" alt="Icon">
                                </div>
                                <h5 class="mb-3">{{ $studentCourse->course->name }}</h5>
                                <p class="mb-0">Provided by {{ $studentCourse->course->provider }}</p>
                            </div>
                            <div class="service-btn rounded-0 rounded-bottom">
                                <a class="text-primary fw-medium" href="/studentCourse/{{ $studentCourse->id }}">Go to Course<i class="bi bi-chevron-double-right ms-2"></i></a>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted">No courses found</p>
            @endif
        </div>

        {{-- <div class="table-responsive">
            @if (count($studentCourses) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Session Dates</th>
                            <th scope="col">Session Time</th>
                            <th scope="col">Enrolled on Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentCourses as $studentCourse)
                            <tr>
                                <td scope="row"><a href="/course/show/{{ $studentCourse->course->id }}">{{ $studentCourse->course->name }}</a></td>
                                <td scope="row">{{ $studentCourse->course->user->name }}</td>

                                <td scope="row">
                                    <textarea class="form-control bg-transparent" disabled rows="5">{{ $studentCourse->course->session_date }}</textarea>
                                </td>
                                <td scope="row">{{ date('g:i a', strtotime($studentCourse->course->session_time)) }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($studentCourse->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No courses found, visit <a class="link-primary" href="/catalogue">Course Catalogue</a></p>
            @endif
        </div> --}}
    </div>
</x-template>
