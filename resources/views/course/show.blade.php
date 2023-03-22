<x-template>
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn mb-5 py-5" data-wow-delay="0.1s">
        <div class="container py-5 text-center">
            <h1 class="display-2 animated slideInDown mb-4 text-white">{{ $course->name }}</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
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
                    <a class="btn btn-primary rounded py-2 px-4" href="#">Enroll in Course</a>
                </div>
            </div>
        </div>
    </div>

</x-template>
