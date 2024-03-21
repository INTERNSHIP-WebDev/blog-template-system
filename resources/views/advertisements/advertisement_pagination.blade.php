<div class="table-responsive">
    <table class="table table-bordered align-middle nowrap">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Prioritize</th>
                <th class="text-center" scope="col">File Type</th>
                <th class="text-center" scope="col">File Name</th>
                <th class="text-center" scope="col">Date Created</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $counter = ($advertisements->currentPage() - 1) * $advertisements->perPage() + 1;
            @endphp
            @forelse ($advertisements ?? [] as $ad)
            <tr>
                <th class="text-center" scope="col">{{ $counter++ }}</th>
                <td class="text-center align-middle" scope="col">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input priority-toggle" id="priority-switch-{{ $ad->id }}" data-advertisement-id="{{ $ad->id }}" {{ $ad->priority ? 'checked' : '' }} />
                                <label class="form-check-label" for="priority-switch-{{ $ad->id }}"></label>
                            </div>
                        </div>
                    </div>
                </td>


                <script>
                    $(document).ready(function () {
                        $('.priority-toggle').change(function () {
                            var advertisementId = $(this).data('advertisement-id');
                            var newPriority = $(this).prop('checked') ? 1 : 0;

                            $.ajax({
                                url: '/update-priority/' + advertisementId,
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    priority: newPriority
                                },
                                success: function (response) {
                                    // Handle success response if needed
                                },
                                error: function (xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        });
                    });
                </script>

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
            <td colspan="3">
                <span class="text-danger">
                    <strong>No advertisement found!</strong>
                </span>
            </td>
            @endforelse
        </tbody>
    </table>
    {!! $advertisements->links() !!}
</div>