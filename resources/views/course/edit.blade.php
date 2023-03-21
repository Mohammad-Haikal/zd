<x-template>
    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Edit Course</h1>
            <form method="POST" action="/course/update/{{$course->id}}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="form-floating">
                        <select class="form-select mb-2" name="user_id" required>
                            @forelse ($instructors as $instructor)
                                <option value="{{ $instructor->id }}" {{ $course->user_id == $instructor->id  ? "selected": "" }}>{{ $instructor->name }}</option>
                            @empty
                                <option selected>No instructor</option>
                            @endforelse
                        </select>
                        <label class="form-label required">Instructor</label>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" value="{{ $course->name }}" required placeholder="Course Name">
                            <label for="name">Course Name</label>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="price" name="price" type="number" value="{{ $course->price }}" step="0.01" required placeholder="Price">
                            <label for="price">Price</label>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" id="outcomes" name="outcomes" style="height: 150px" placeholder="Outcomes">{{ $course->outcomes }}</textarea>
                            <label for="outcomes">Outcomes</label>
                            @error('outcomes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" id="prerequisites" name="prerequisites" style="height: 150px" placeholder="Prerequisites">{{ $course->prerequisites }}</textarea>
                            <label for="prerequisites">Prerequisites</label>
                            @error('prerequisites')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating">
                        <select class="form-select mb-2" name="provider" required>
                            <option value="ZD Courses" {{ $course->provider == 'ZD Courses' ? "selected": "" }}>ZD Courses</option>
                            <option value="ZD Talent" {{ $course->provider == 'ZD Talent' ? "selected": "" }}>ZD Talent</option>
                        </select>
                        <label class="form-label">Provider</label>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" id="session_date" name="session_date" style="height: 150px" placeholder="Session Dates">{{$course->session_date}}</textarea>
                            <label for="session_date">Session Dates</label>
                            @error('session_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="session_time" name="session_time" type="time" value="{{$course->session_time }}" required placeholder="Session Time">
                            <label for="session_time">Session Time</label>
                            @error('session_time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Update Course</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-template>
