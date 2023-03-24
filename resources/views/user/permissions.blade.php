<x-template>
    <div class="min-vh-100 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Edit Access Levels</h1>
            <form method="POST" action="/user/permissions/update/{{ $user->id }}">
                @csrf
                @method('PUT')
                <h4 class="mb-2">Students</h4>
                <div class="row g-2">
                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch1" name="view_st" type="checkbox" value="1" {{ $user->view_st == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch1">
                                View Students
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch2" name="add_st" type="checkbox" value="1" {{ $user->add_st == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch2">
                                Add Student
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch3" name="edit_st" type="checkbox" value="1" {{ $user->edit_st == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch3">
                                Edit Student
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch4" name="delete_st" type="checkbox" value="1" {{ $user->delete_st == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch4">
                                Delete Student
                            </label>
                        </div>
                    </div>

                    <hr class="my-1">
                    <h4 class="mb-2">Instructors</h4>
                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch5" name="view_in" type="checkbox" value="1" {{ $user->view_in == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch5">
                                View Instructors
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch6" name="add_in" type="checkbox" value="1" {{ $user->add_in == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch6">
                                Add Instructor
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch7" name="edit_in" type="checkbox" value="1" {{ $user->edit_in == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch7">
                                Edit Instructor
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch8" name="delete_in" type="checkbox" value="1" {{ $user->delete_in == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch8">
                                Delete Instructor
                            </label>
                        </div>
                    </div>

                    <hr class="my-1">
                    <h4 class="mb-2">Admins</h4>
                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch9" name="view_ad" type="checkbox" value="1" {{ $user->view_ad == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch9">
                                View Admins
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch10" name="add_ad" type="checkbox" value="1" {{ $user->add_ad == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch10">
                                Add Admin
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch11" name="edit_ad" type="checkbox" value="1" {{ $user->edit_ad == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch11">
                                Edit Admin
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch12" name="delete_ad" type="checkbox" value="1" {{ $user->delete_ad == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch12">
                                Delete Admin
                            </label>
                        </div>
                    </div>

                    <hr class="my-1">
                    <h4 class="mb-2">Courses</h4>
                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch13" name="add_co" type="checkbox" value="1" {{ $user->add_co == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch13">
                                Add Course
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch14" name="edit_co" type="checkbox" value="1" {{ $user->edit_co == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch14">
                                Edit Courses
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-check">
                            <input class="form-check-input" id="ch15" name="delete_co" type="checkbox" value="1" {{ $user->delete_co == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch15">
                                Delete Course
                            </label>
                        </div>
                    </div>

                    <hr class="my-1">
                    <h4 class="mb-2">Tasks</h4>
                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch16" name="view_ta" type="checkbox" value="1" {{ $user->view_ta == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch16">
                                View Tasks
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch17" name="add_ta" type="checkbox" value="1" {{ $user->add_ta == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch17">
                                Add task
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch18" name="edit_ta" type="checkbox" value="1" {{ $user->edit_ta == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch18">
                                Edit task
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ch19" name="delete_ta" type="checkbox" value="1" {{ $user->delete_ta == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="ch19">
                                Delete task
                            </label>
                        </div>
                    </div>
                    <hr class="my-1">

                    <div class="col-12 mt-3">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-template>
