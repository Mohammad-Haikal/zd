<x-template>
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn mb-5 py-5" data-wow-delay="0.1s">
        <div class="container py-5 text-center">
            <h1 class="display-2 animated slideInDown mb-4 text-white">Login</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Sign Start -->
    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Login to Your Account</h1>
            <form method="POST" action="/user/auth">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="Your Email">
                            <label for="email">Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="password" name="password" type="password" required placeholder="password">
                            <label for="password">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Login</button>
                    </div>
                </div>
            </form>
            <p class="pt-3">Don't have an account? <a href="/signup">Sign Up</a></p>
        </div>
    </div>
    <!-- Sign End -->

</x-template>
