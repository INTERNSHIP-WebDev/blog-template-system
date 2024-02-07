<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Permission</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($permissions ?? [] as $permission)
            <tr>
                <td>{{ ($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->created_at}}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="#" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No Permissions Found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {!! $permissions->links() !!}
</div>