<x-template>
    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Assign New Task</h1>
            <form method="POST" action="/task/store">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="title" name="title" type="text" required placeholder="title">
                            {{-- <textarea class="form-control" id="title" name="title" style="height: 150px" placeholder="Title" required></textarea> --}}
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="note" name="note" type="text" required placeholder="note">
                            {{-- <textarea class="form-control" id="note" name="note" style="height: 150px" placeholder="Note" required></textarea> --}}
                            <label for="note">Note</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="sub_date" name="sub_date" type="date" required placeholder="sub_date">
                            <label for="sub_date">Submission Date</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="sub_time" name="sub_time" type="time" required placeholder="sub_time">
                            <label for="sub_time">Submission Time</label>
                        </div>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label required">Number of Admins</label>
                        <input class="form-control" type="number" value="1" role="button" min="1" max="20" onchange="generateAdmins(value)" required>
                    </div>

                    <div id="admins">
                        {{-- jQuery --}}
                        <div class="col mb-3">
                            <div class="form-floating">
                                <select class="form-select mb-2" name="admins[]" required>
                                    <option value="" selected>Select Admin</option>
                                    @forelse ($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                    @empty
                                        <option selected>No Admins</option>
                                    @endforelse
                                </select>
                                <label class="form-label required">Admin 1</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Assign Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function generateAdmins(admins) {
            $("#admins").html("");
            for (let i = 1; i <= admins; i++) {
                $("#admins").append(
                    `
                <div class="col mb-3">
                    <div class="form-floating">
                        <select class="form-select mb-2" name="admins[]" required>
                            <option value="" selected>Select Admin</option>
                            @forelse ($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @empty
                                <option selected>No Admins</option>
                            @endforelse
                        </select>
                        <label class="form-label required">Admin ${i}</label>
                    </div>
                </div>
                `);
            }
        }
    </script>

</x-template>
