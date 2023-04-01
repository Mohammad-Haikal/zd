<x-template>
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn mb-5 py-5" data-wow-delay="0.1s">
        <div class="container py-5 text-center">
            <h1 class="display-2 animated slideInDown mb-4 text-white">Course Catalogue</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="wow fadeInUp mx-auto text-center" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Our Courses</p>
                <h1 class="display-5 mb-5">Courses that We Offer</h1>
            </div>
            <div class="row g-4">
                @if (count($courses) != 0)
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item position-relative h-100">
                                <div class="service-text rounded p-5">
                                    <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 64px; height: 64px;">
                                        <img class="img-fluid" src="img/icon/icon-{{ mt_rand(1, 10) }}.png" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">{{ $course->name }}</h5>
                                    <p class="mb-0">Provided by {{ $course->provider }}</p>
                                </div>
                                <div class="service-btn rounded-0 rounded-bottom">
                                    <a class="text-primary fw-medium" href="/course/show/{{ $course->id }}">Show Details<i class="bi bi-chevron-double-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">No courses found</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Service End -->
</x-template>
