<x-template>
    <div class="col-md-9 container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1>Assign New Task</h1>
            <form method="POST" action="/task/update/{{ $task->id }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="title" name="title" type="text" value="{{ $task->title }}" required placeholder="title">
                            {{-- <textarea class="form-control" id="title" name="title" style="height: 150px" placeholder="Title" required>{{$task->title}}</textarea> --}}
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="note" name="note" type="text" value="{{ $task->note }}" required placeholder="note">
                            {{-- <textarea class="form-control" id="note" name="note" style="height: 150px" placeholder="Note" required>{{$task->note}}</textarea> --}}
                            <label for="note">Note</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="sub_date" name="sub_date" type="date" value="{{ $task->sub_date }}" required placeholder="sub_date">
                            <label for="sub_date">Submission Date</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input class="form-control" id="sub_time" name="sub_time" type="time" value="{{ $task->sub_time }}" required placeholder="sub_time">
                            <label for="sub_time">Submission Time</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary rounded py-2 px-4" type="submit">Update Task</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-template>
