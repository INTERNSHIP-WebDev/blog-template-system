<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Message</th>
                <th class="text-center" scope="col">Date Created</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anotifications ?? [] as $notification)
            <tr>
                <td class="text-center" scope="col">{{ ($anotifications->currentPage() - 1) * $anotifications->perPage() + $loop->iteration }}</td>
                <td class="text-center" scope="col">{{ $notification->message }}</td>
                <td class="text-center" scope="col">{{ $notification->created_at->format('M d, Y \a\t h:i A') }}</td>
                <td class="text-center" scope="col">
                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
               No Notifications Found.
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="width: 100%; display: flex; justify-content: center;"> {!! $anotifications->links() !!} </div>
</div>
