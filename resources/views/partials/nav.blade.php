@php
    $user = Auth::user();
@endphp

<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-lg-0 bg-white">
            <a class="navbar-brand d-lg-none" href="index.html">
                <h1 class="fw-bold m-0">ZD Suite</h1>
            </a>
            <button class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="/">Home</a>
                    <a class="nav-item nav-link" href="/catalogue">Course Catalogue</a>
                    <a class="nav-item nav-link" href="/about">About</a>
                    <a class="nav-item nav-link" href="/service">Services</a>
                    <a class="nav-item nav-link" href="/project">Projects</a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Pages</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a class="dropdown-item" href="/feature">Features</a>
                            <a class="dropdown-item" href="/team">Our Team</a>
                            <a class="dropdown-item" href="/testimonial">Testimonial</a>
                            <a class="dropdown-item" href="/quote">Quotation</a>
                            <a class="dropdown-item" href="/404">404 Page</a>
                        </div>
                    </div>
                    <a class="nav-item nav-link" href="/contact">Contact</a>
                </div>
                <div class="ms-auto navbar-nav">
                    @auth
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle m-0" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                {{ $user->name }}
                                @if ($user->role == 0)
                                    <span>(Student)</span>
                                @elseif($user->role == 1)
                                    <span>(Instructor)</span>
                                @elseif($user->role == 2)
                                    <span>(Admin)</span>
                                @endif
                            </a>

                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                @if ($user->role == 0)
                                    <a class="dropdown-item" href="/user/course">My Courses</a>
                                    <a class="dropdown-item" href="/user/course/done">Done Courses</a>
                                @elseif($user->role == 1)
                                    <a class="dropdown-item" href="/instructor/course">My Courses</a>
                                @elseif($user->role == 2)
                                    <a class="dropdown-item" href="/user/tasks">Assinged Tasks</a>
                                    <a class="dropdown-item" href="/task">Manage Tasks</a>
                                    <a class="dropdown-item" href="/course">Manage Courses</a>
                                    <a class="dropdown-item" href="/user/students">Manage Students</a>
                                    <a class="dropdown-item" href="/user/instructors">Manage Instructors</a>
                                    <a class="dropdown-item" href="/user/admins">Manage Admins</a>
                                    <a class="dropdown-item" href="/user/add">Add New User</a>
                                @endif
                                <form action="/user/logout" method="post">
                                    @csrf
                                    <input class="dropdown-item link-danger" type="submit" value="Logout">
                                </form>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="ms-auto">
                            <a class="btn btn-primary rounded-3 me-1 py-2 px-4" href="/signup">Sign Up</a>
                            <a class="btn btn-outline-primary rounded-3 py-2 px-4" href="/login">Login</a>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
