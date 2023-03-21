<x-template>
    <div class="container col-md-9">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Edit Account</h1>
            <form method="POST" action="/user/update/{{$user->id}}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" value="{{$user->name}}" type="text" required placeholder="User Name">
                            <label for="name">User Name</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" value="{{$user->email}}" type="email" required placeholder="User Email">
                            <label for="email">User Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="phone" name="phone" value="{{$user->phone}}" type="tel" required placeholder="phone">
                            <label for="phone">Phone Number</label>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="dob" name="dob" value="{{$user->dob}}" type="date" required placeholder="dob">
                            <label for="dob">Date Of Birth</label>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="age" name="age" value="{{$user->age}}" type="number" required placeholder="age">
                            <label for="age">Age</label>
                            @error('age')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="country" name="country" value="{{$user->country}}" type="text" required placeholder="country">
                            <label for="country">Country</label>
                            @error('country')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="password" name="password" type="password" placeholder="password">
                            <label for="password">New Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="password_confirmation">
                            <label for="password_confirmation">Confirm Password</label>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Update Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-template>
