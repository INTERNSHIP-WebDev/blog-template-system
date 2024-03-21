<div id="pagination-container">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Category</th>
                <th class="text-center" scope="col">Date Created</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories ?? [] as $category)
            <tr>
                <th class="text-center" scope="col">{{ ($categories->currentPage()-1)*$categories->perPage() + $loop->iteration }}</th>
                <td class="text-center" scope="col">{{ $category->text }}</td>
                <td class="text-center" scope="col">{{ $category->created_at->format('M d, Y \a\t h:i A') }}</td>
                <td class="text-center" scope="col">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <td colspan="3">
                <span class="text-danger">
                    <strong>No Category found!</strong>
                </span>
            </td>
            @endforelse
        </tbody>
    </table>
    {!! $categories->links() !!}
</div>

<script>
    // Add event listener to delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        // Iterate through each delete button and attach event listener
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                // Display Sweet Alert confirmation dialog
                Swal.fire({
                    title: 'Warning!',
                    text: 'Are you sure you want to delete this permission?',
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