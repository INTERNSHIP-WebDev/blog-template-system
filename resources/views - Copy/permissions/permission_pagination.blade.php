<div class="col-12">
    <h2>Search Customer Total Data : <span id="total_records"></span></h2>
    <div class="col-md-2">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle nowrap">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Permission</th>
                    <th class="text-center" scope="col">Date Created</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td class="text-center">{{ $permission->id }}</td>
                    <td class="text-center">{{ $permission->name }}</td>
                    <td class="text-center">{{ $permission->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="width: 100%; display: flex; justify-content: center;"> {!! $permissions->links() !!} </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_permission_data(query);
        });

        function fetch_permission_data(query = '') {
            $.ajax({
                url: "{{ route('action') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('#permission_data tbody').html(data.table_data); // Update table body content
                    $('#total_records').text(data.total_data);
                    $('#pagination_links').html(data.pagination_links); // Update pagination links
                }
            })
        }
    });
</script>
