<x-template>
    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Add Account</h1>
            <form method="POST" action="/user/storeadded">
                @csrf
                <div class="row g-3">
                    <div class="mb-3 col-12">
                        <label class="form-label">User Role</label><br>
                        <div class="btn-group" role="group">
                            <input class="btn-check" id="st" name="role" type="radio" value="0" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="st">Student</label>
                            <input class="btn-check" id="in" name="role" type="radio" value="1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="in">Instructor</label>
                            <input class="btn-check" id="ad" name="role" type="radio" value="2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="ad">Admin</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="User Name">
                            <label for="name">User Name</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="User Email">
                            <label for="email">User Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="phone" name="phone" type="tel" value="{{ old('phone') }}" required placeholder="phone">
                            <label for="phone">Phone Number</label>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="dob" name="dob" type="date" value="{{ old('dob') }}" required placeholder="dob">
                            <label for="dob">Date Of Birth</label>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="age" name="age" type="number" value="{{ old('age') }}" required placeholder="age">
                            <label for="age">Age</label>
                            @error('age')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="country" name="country" type="text" value="{{ old('country') }}" required placeholder="country">
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
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Add Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-template>
