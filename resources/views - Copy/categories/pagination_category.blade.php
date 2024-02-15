
<div class="table-responsive">
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
            @php
                $counter = ($categories->currentPage() - 1) * $categories->perPage() + 1;
            @endphp
            @forelse ($categories ?? [] as $category)
            <tr>
                <td class="text-center" scope="col">{{ $counter++ }}</td>
                <td class="text-center" scope="col">{{ $category->text }}</td>
                <td class="text-center" scope="col">{{ $category->created_at->format('M d, Y \a\t h:i A') }}</td>
                <td class="text-center" scope="col">
                @include('sweetalert::alert')
                    <!-- <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a> -->
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                       <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No category found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
<div style="width: 100%; display: flex; justify-content: center;">{!! $categories->links() !!}</div>
</div>