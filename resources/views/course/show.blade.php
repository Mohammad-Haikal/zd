<x-template>
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn mb-5 py-5" data-wow-delay="0.1s">
        <div class="container py-5 text-center">
            <h1 class="display-2 animated slideInDown mb-4 text-white">{{ $course->name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/catalogue">Course Catalogue</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">{{ $course->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            @error('code')
                <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                    {{ $message }}
                    <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                </div>
            @enderror
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-floating">
                        <input class="form-control bg-transparent" id="name" name="name" type="text" value="{{ $course->name }}" disabled placeholder="Course Name">
                        <label for="name">Course Name</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input class="form-control bg-transparent" id="instructor" name="instructor" type="text" value="{{ $course->user->name }}" disabled placeholder="Instructor">
                        <label for="instructor">Instructor</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input class="form-control bg-transparent" id="price" name="price" type="text" value="{{ $course->price }} JD" disabled placeholder="Price">
                        <label for="price">Price</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control bg-transparent" id="outcomes" name="outcomes" style="height: 150px" disabled placeholder="Outcomes">{{ $course->outcomes }}</textarea>
                        <label for="outcomes">Outcomes</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control bg-transparent" id="prerequisites" name="prerequisites" style="height: 150px" disabled placeholder="Prerequisites">{{ $course->prerequisites }}</textarea>
                        <label for="prerequisites">Prerequisites</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input class="form-control bg-transparent" id="provider" name="provider" type="text" value="{{ $course->provider }}" disabled placeholder="Provider">
                        <label for="provider">Provider</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control bg-transparent" id="session_date" name="session_date" style="height: 150px" disabled placeholder="Session Dates">{{ $course->session_date }}</textarea>
                        <label for="session_date">Session Dates</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input class="form-control bg-transparent" id="session_time" name="session_time" type="time" value="{{ $course->session_time }}" disabled placeholder="Session Time">
                        <label for="session_time">Session Time</label>
                    </div>
                </div>

                <div class="col-12">
                    <a class="btn btn-primary rounded py-2 px-4" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Enroll in Course</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form method="post" action="/course/enroll/{{ $course->id }}">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Enroll in Course</h1>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="form-floating">
                                <input class="form-control" id="code" name="code" type="text" required placeholder="Enter Course Code">
                                <label for="code">Enter Course Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <small class="me-auto">Don't have a code? <a href="/contact">Contact Us!</a></small>
                        <button class="btn btn-outline-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit">Enroll Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

</x-template>
