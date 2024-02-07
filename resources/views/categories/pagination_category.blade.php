<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th class="text-center">Date Created</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories ?? [] as $category)
            <tr>
                <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                <td>{{ $category->text }}</td>
                <td class="text-center">{{ $category->created_at->format('M d, Y') }}</td>
                <td class="text-center">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No category found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="width: 100%; display: flex; justify-content: center;">{!! $categories->links() !!}</div>
</div>