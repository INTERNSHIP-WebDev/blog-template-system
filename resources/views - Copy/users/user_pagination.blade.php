<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">User Image</th>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Roles</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td style="width: 100px; /* Adjust the width as needed */">
                    <div class="user-photo-container" style="margin: 0 auto; text-align: center;">
                        @if ($user->photo)
                        <img src="{{ asset('images/photos/' . $user->photo) }}" alt="Profile Photo" class="rounded-circle user-photo" width="50" height="50">
                        @else
                        <div class="no-photo">No Photo</div>
                        @endif
                    </div>
                </td>
                <td class="text-center" scope="col">{{ $user->name }}</td>
                <td class="text-center" scope="col">{{ $user->email }}</td>
                <td class="text-center" scope="col">
                    @forelse ($user->getRoleNames() as $role)
                    <span class="badge bg-primary">{{ $role }}</span>
                    @empty
                    @endforelse
                </td>
                <td class="text-center">
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>

                        @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                        @if (Auth::user()->hasRole('Super Admin'))
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        @endif
                        @else
                        @can('edit-user')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        @endcan

                        @can('delete-user')
                        @if (Auth::user()->id!=$user->id)
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i></button>
                        @endif
                        @endcan
                        @endif

                    </form>
                </td>
            </tr>
            @empty
            <td colspan="5">
                <span class="text-danger">
                    <strong>No User Found!</strong>
                </span>
            </td>
            @endforelse
        </tbody>
    </table>

    <div style="width: 100%; display: flex; justify-content: center;">{{ $users->links() }}</div>

</div>