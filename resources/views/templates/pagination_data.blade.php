<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Header</th>
                <th scope="col">Banner</th>
                <th scope="col">Logo</th>
                <th scope="col">Action</th>
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
                <td>
                    @if ($template->banner)
                    <img src="{{ asset('images/banners/' . $template->banner) }}" alt="Banner Image" class="img-thumbnail" width="50" height="50">
                    @else
                    No photo
                    @endif
                </td>
                <td>
                    @if ($template->logo)
                    <img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="img-thumbnail" width="50" height="50">
                    @else
                    No photo
                    @endif
                </td>
                <td>
                    <a href="{{ route('templates.show', $template->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this template?');"><i class="bi bi-trash"></i></button>
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