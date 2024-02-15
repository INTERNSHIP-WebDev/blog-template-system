<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">File Type</th>
                <th class="text-center" scope="col">File Name</th>
                <th class="text-center" scope="col">Date Created</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = ($ads->currentPage() - 1) * $ads->perPage() + 1;
            @endphp
            @forelse ($ads ?? [] as $ad)
            <tr>
                <th class="text-center" scope="col">{{ $counter++ }}</th>
                <td class="text-center" scope="col">{{ $ad->file_type }}</td>
                <td class="text-center" scope="col">{{ $ad->name }}</td>
                <td class="text-center" scope="col">{{ $ad->created_at->format('M d, Y \a\t h:i A') }}</td>
                <td class="text-center" scope="col">
                    <button class="btn btn-warning btn-sm btn-view-ad" data-file-type="{{ $ad->file_type }}" data-file-name="{{ $ad->name }}">
                        <i class="bi bi-eye"></i>
                    </button>
                    <form action="{{ route('advertisements.destroy', $ad->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn"><i class="bi bi-trash"></i></button>
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
    <div style="width: 100%; display: flex; justify-content: center;">{!! $ads->links() !!}</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    // Add event listener to delete buttons
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        
        // Iterate through each delete button and attach event listener
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                // Display Sweet Alert confirmation dialog
                Swal.fire({
                    title: 'Warning!',
                    text: 'Are you sure you want to delete this ad?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it'
                }).then((result) => {
                    // If user confirms the deletion
                    if (result.isConfirmed) {
                        // Trigger the form submission
                        event.target.closest('form').submit();
                    }
                });
            });
        });
    });
</script>


