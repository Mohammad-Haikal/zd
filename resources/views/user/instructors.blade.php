<x-template>
    <div class="min-vh-100 container">
        {{-- <div class="d-flex align-items-center">
            <h1 class="col">Manage Instructors</h1>
            <a class="btn btn-primary d-flex align-items-center shadow-sm" href="/user/add"><i class="bi bi-plus me-1"></i>Add Instructor</a>
        </div> --}}
        <h1>Manage Instructors</h1>
        <div class="table-responsive">
            @if (count($users) != 0)
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            {{-- <th scope="col">Date of Birth</th>
                            <th scope="col">Age</th> --}}
                            <th scope="col">Country</th>
                            <th scope="col" colspan="3">Joined on Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $user->name }}</td>
                                <td scope="row">{{ $user->email }}</td>
                                <td scope="row">{{ $user->phone }}</td>
                                {{-- <td scope="row">{{ $user->dob }}</td>
                                <td scope="row">{{ $user->age }}</td> --}}
                                <td scope="row">{{ $user->country }}</td>
                                <td scope="row">{{ date('M d, Y', strtotime($user->created_at)) }}</td>
                                <td scope="row">
                                    <a class="link-secondary" href="/user/edit/{{ $user->id }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <form action="/user/delete/{{ $user->id }}" method="post">
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
                <p class="text-muted">No Instructors found</p>
            @endif
        </div>
    </div>
</x-template>
