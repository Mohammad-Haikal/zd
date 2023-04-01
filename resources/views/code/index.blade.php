<x-template>
    <div class="min-vh-100 container">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb my-2">
                <li class="breadcrumb-item"><a href="/course">{{ $course->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Codes</li>
            </ol>
        </nav>
        @error('numberOfCodes')
            <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                {{ $message }}
                <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
            </div>
        @enderror
        <div class="d-flex align-items-center">
            <h1 class="col">Course Codes</h1>
            <a class="btn btn-primary d-flex align-items-center shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"><i class="bi bi-plus me-1"></i>Generate Codes</a>
            <form action="/code/deleteAll/{{ $course->id }}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-outline-danger ms-2 shadow-sm" type="submit" value="Delete All" onclick="return confirm('Are you sure?')">
            </form>
        </div>

        <div class="table-responsive">
            @if (count($codes) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2">Added on Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($codes as $code)
                            <tr>
                                <td scope="row">{{ $code->code }}</a></td>
                                <td scope="row">{{ $code->status == 0 ? 'Active' : 'Used' }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($code->created_at)) }}</td>

                                <td scope="row">
                                    <form action="/code/delete/{{ $code->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm link-danger border-0 p-0" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $codes->links() }}
            @else
                <p class="text-muted">No codes found</p>
            @endif
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form method="post" action="/code/generate/{{ $course->id }}">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Generate Codes</h1>
                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row g-3">
                                <div class="form-floating">
                                    <input class="form-control" id="numberOfCodes" name="numberOfCodes" type="number" required placeholder="Number of Codes" min="1" max="100">
                                    <label for="numberOfCodes">Number of Codes</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
</x-template>
