<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Message</th>
                <th scope="col" style="width: 250px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allNotif as $notification)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $notification->message }}</td>
                <td>
                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
                No Notifications Found!
            @endforelse
        </tbody>
    </table>
    <div style="width: 100%; display: flex; justify-content: center;"></div>
</div>