<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">File Type</th>
                <th class="text-center">File Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ads ?? [] as $ad)
            <tr>
                <td>{{ ($ads->currentPage() - 1) * $ads->perPage() + $loop->iteration }}</td>
                <td>{{ $ad->text }}</td>
                <td class="text-center">{{ $ad->created_at->format('M d, Y') }}</td>
                <td class="text-center">
                    <form action="{{ route('advertisements.destroy', $ad->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No advertisement found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="width: 100%; display: flex; justify-content: center;">{!! $advertisements->links() !!}</div>
</div>