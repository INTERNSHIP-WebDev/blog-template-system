<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Author</th>
                <th class="text-center" scope="col">Category</th>
                <th class="text-center" scope="col">Header</th>
                <th class="text-center" scope="col">Banner</th>
                <th class="text-center" scope="col">Logo</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($templates ?? [] as $template)
            <tr>
                <td>{{ ($templates->currentPage() - 1) * $templates->perPage() + $loop->iteration }}</td>
                <td>{{ $template->user->name }}</td>
                <td>
                    @php
                    $categoryWords = str_word_count($template->category->text, 1);
                    $limitedCategory = implode(' ', array_slice($categoryWords, 0, 2));
                    @endphp

                    {{ count($categoryWords) > 2 ? $limitedCategory . '...' : $limitedCategory }}
                </td>
                <td>
                    @php
                    $headerWords = str_word_count($template->header, 1);
                    $limitedHeader = implode(' ', array_slice($headerWords, 0, 5));
                    @endphp

                    {{ count($headerWords) > 5 ? $limitedHeader . '...' : $limitedHeader }}
                </td>
                <td class="text-center">
                    @if ($template->banner)
                    <div class="image-container">
                        <img src="{{ asset('images/banners/' . $template->banner) }}" alt="Banner Image" class="img-thumbnail">
                    </div>
                    @else
                    No photo
                    @endif
                </td>
                <td class="text-center">
                    @if ($template->logo)
                    <div class="image-container">
                        <img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="img-thumbnail">
                    </div>
                    @else
                    No photo
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('templates.show', $template->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No blog posts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {!! $templates->links() !!}
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
                    text: 'Are you sure you want to delete this template?',
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
