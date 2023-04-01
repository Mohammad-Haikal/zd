<x-template>
    <div class="min-vh-100 container">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb  my-2">
                <li class="breadcrumb-item"><a href="/instructor/course">{{$course->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lectures</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center">
            <h1 class="col">Course Lectures</h1>
            <a class="btn btn-primary d-flex align-items-center shadow-sm" data-bs-toggle="modal" data-bs-target="#add" type="button"><i class="bi bi-plus me-1"></i>New Lecture</a>
        </div>
        <div class="table-responsive">
            @php
                $lectureCount = count($lectures);
            @endphp
            @if ($lectureCount != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Lecture</th>
                            <th scope="col" colspan="3">Link</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($lectures as $lecture)
                            <tr>
                                <td scope="row">{{ $lectureCount-- }}</td>
                                <td scope="row"><a href="{{ $lecture->link }}" target="_blank">{{ $lecture->link }}</a></td>

                                <td scope="row">
                                    <a class="link-primary" href="/instructor/course/lecs/{{ $course->id }}/{{ $lecture->id }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <form action="/lecture/delete/{{ $lecture->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm link-danger border-0 p-0" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No lectures yet</p>
            @endif
        </div>
        <!-- Modal -->
        <div class="modal fade" id="add" aria-labelledby="addLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form method="post" action="/lecture/store/{{ $course->id }}">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addLabel">Add Lecture</h1>
                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row g-3">
                                <div class="form-floating">
                                    <input class="form-control" id="link" name="link" type="text" required placeholder="link">
                                    <label for="link">Lecture Link</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Add Lecture</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->

        {{-- Edit Modal --}}
        @isset($editLecture)
            <!-- Modal -->
            <div class="modal fade" id="edit" aria-labelledby="editLabel" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <form method="post" action="/lecture/update/{{ $editLecture->id }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editLabel">Edit Lecture</h1>
                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="row g-3">
                                    <div class="form-floating">
                                        <input class="form-control" id="link" name="link" type="text" value="{{ $editLecture->link }}" required placeholder="link">
                                        <label for="link">Lecture Link</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <script type="text/javascript">
                window.onload = () => {
                    $('#edit').modal('show');
                }
            </script>
        @endisset

    </div>

</x-template>
