<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Role Name</th>
                <th class="text-center" scope="col">Date Created</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = ($roles->currentPage() - 1) * $roles->perPage() + 1;
            @endphp
            @forelse ($roles as $role)
                <tr>
                    <th class="text-center" scope="col">{{ $counter++ }}</th>
                    <td class="text-center" scope="col">{{ $role->name }}</td>
                    <td class="text-center" scope="col">{{ $role->created_at->format('M d, Y \a\t h:i A') }}</td>
                    <td class="text-center" scope="col">
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>

                            @if ($role->name != 'Super Admin')
                                @can('edit-role')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                @endcan

                                @can('delete-role')
                                    @if ($role->name != Auth::user()->hasRole($role->name))
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="3">
                    <span class="text-danger">
                        <strong>No Role Found!</strong>
                    </span>
                </td>
            @endforelse
        </tbody>
    </table>
    <div style="width: 100%; display: flex; justify-content: center;"> {!! $roles->links() !!} </div>
</div>
