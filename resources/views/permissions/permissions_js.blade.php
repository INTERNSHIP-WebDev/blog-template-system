<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF=TOKEN': $('meta[name="csrf-token"').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search_string = $('#search').val(); // Get the search string
            permission(page, search_string);
        })

        function permission(page, search_string) {
            $.ajax({
                url: "/pagination/paginate-data?page=" + page,
                data: {
                    search_string: search_string
                }, // Pass the search string
                success: function(res) {
                    $('.table-data').html(res);
                }
            })
        }

        // Search permission
        $(document).on('keyup', '#search', function(e) {
            e.preventDefault();
            let search_string = $(this).val();
            $.ajax({
                url: "{{ route('search.permission') }}",
                method: "GET",
                data: {
                    search_string: search_string
                },
                success: function(res) {
                    $('.table-data').html(res);
                    if (res.status == 'nothing_found') {
                        $('.table-data').html('<span class="text-danger">' + 'Nothing Found' + '</span>');
                    }
                }
            });
        })
    });
</script>