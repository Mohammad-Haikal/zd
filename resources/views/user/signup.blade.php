<x-template>
    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn mb-5 py-5" data-wow-delay="0.1s">
        <div class="container py-5 text-center">
            <h1 class="display-2 animated slideInDown mb-4 text-white">Sign Up</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Sign Start -->
    <div class="container col-md-9">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Create a New Account</h1>
            <form method="POST" action="/user/store">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" value="{{old('name')}}" type="text" required placeholder="Your Name">
                            <label for="name">Your Name</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" value="{{old('email')}}" type="email" required placeholder="Your Email">
                            <label for="email">Your Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="phone" name="phone" value="{{old('phone')}}" type="tel" required placeholder="phone">
                            <label for="phone">Phone Number</label>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="dob" name="dob" value="{{old('dob')}}" type="date" required placeholder="dob">
                            <label for="dob">Date Of Birth</label>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="age" name="age" value="{{old('age')}}" type="number" required placeholder="age">
                            <label for="age">Age</label>
                            @error('age')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="country" name="country" value="{{old('country')}}" type="text" required placeholder="country">
                            <label for="country">Country</label>
                            @error('country')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="password" name="password" type="password" required placeholder="password">
                            <label for="password">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required placeholder="password_confirmation">
                            <label for="password_confirmation">Confirm Password</label>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Create Account</button>
                    </div>
                </div>
            </form>
            <p class="pt-3">Already have an account? <a href="/login">Login</a></p>
        </div>
    </div>
    <!-- Sign End -->

</x-template>
