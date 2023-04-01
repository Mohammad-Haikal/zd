<x-template>
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn mb-5 py-5" data-wow-delay="0.1s">
        <div class="container py-5 text-center">
            <h1 class="display-2 animated slideInDown mb-4 text-white">{{ $course->name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/user/course">My Courses</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">{{ $course->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">

            <div class="row g-2 justify-content-center">
                <div class="col-12 col-sm-12 col-md mx-1 rounded border p-2 text-center shadow-sm">
                    <h5>Name</h5>
                    <p class="mb-0">{{ $studentCourse->course->name }}</p>
                </div>
                <div class="col-12 col-sm-12 col-md mx-1 rounded border p-2 text-center shadow-sm">
                    <h5>Instructor</h5>
                    <p class="mb-0">{{ $studentCourse->course->user->name }}</p>
                </div>
                <div class="col-12 col-sm-12 col-md mx-1 rounded border p-2 text-center shadow-sm">
                    <h5>Session Dates</h5>
                    <p class="mb-0">{{ $studentCourse->course->session_date }}</p>
                </div>
                <div class="col-12 col-sm-12 col-md mx-1 rounded border p-2 text-center shadow-sm">
                    <h5>Session Time</h5>
                    <p class="mb-0">{{ date('g:i a', strtotime($studentCourse->course->session_time)) }}</p>
                </div>
                <div class="col-12 col-sm-12 col-md mx-1 rounded border p-2 text-center shadow-sm">
                    <h5>Enrolled on Date</h5>
                    <p class="mb-0">{{ date('M d, Y', strtotime($studentCourse->created_at)) }}</p>
                </div>
            </div>
        </div>

        <div class="accordion my-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" type="button" aria-expanded="true" aria-controls="collapseOne">
                        Lectures
                    </button>
                </h2>
                <div class="accordion-collapse show collapse" id="collapseOne" data-bs-parent="#accordionExample" aria-labelledby="headingOne">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            @if (count($lectures) != 0)
                                <table class="table-striped table-hover table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Lecture</th>
                                            <th scope="col">Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $lectureCount = count($lectures);
                                        @endphp
                                        @foreach ($lectures as $lecture)
                                            <tr>
                                                <td class="align-middle" scope="row">{{ $lectureCount-- }}</td>
                                                <td scope="row"><a class="btn btn-sm btn-primary" href="{{ $lecture->link }}" target="_blank">Join Now</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">No lectures found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" type="button" aria-expanded="false" aria-controls="collapseTwo">
                        Records
                    </button>
                </h2>
                <div class="accordion-collapse collapse" id="collapseTwo" data-bs-parent="#accordionExample" aria-labelledby="headingTwo">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            @php
                                $recordCount = count($records);
                            @endphp
                            @if ($recordCount != 0)
                                <table class="table-striped table-hover table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Record</th>
                                            <th scope="col">Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $recordCount = count($records);
                                        @endphp
                                        @foreach ($records as $record)
                                            <tr>
                                                <td class="align-middle" scope="row">{{ $recordCount-- }}</td>
                                                <td scope="row"><a class="btn btn-sm btn-primary" href="{{ $record->link }}" target="_blank">Watch Record</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">No records yet</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-template>
