<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Header</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activityTemplate ?? [] as $template)
            @if ($template->user_id === auth()->id())
            <tr>
                <td>{{ $template->created_at->format('M d, Y \a\t h:i A') }}</td>
                <td>
                    @php
                    $words = str_word_count($template->header, 1);
                    $limitedWords = implode(' ', array_slice($words, 0, 10));
                    @endphp

                    {{ count($words) > 10 ? $limitedWords . '...' : $limitedWords }}
                </td>
                <td>
                    @php
                    $categoryWords = str_word_count($template->category->text, 1);
                    $limitedCategory = implode(' ', array_slice($categoryWords, 0, 3));
                    @endphp

                    {{ count($categoryWords) > 3 ? $limitedCategory . '...' : $limitedCategory }}
                </td>
                <td>
                    @if ($template->created_at == $template->updated_at)
                    Created
                    @else
                    Updated
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('templates.show', $template->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
            @endif
            @empty
            <tr>
                <td colspan="6">No blog posts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="width: 100%; display: flex; justify-content: center;">{!! $activityTemplate->links() !!}</div>
</div>