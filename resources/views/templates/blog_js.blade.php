<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF=TOKEN': $('meta[name="csrf-token"').attr('content')
        }
    });
</script>
<!-- Primary Function -->
<script>
    $(document).ready(function() {
        // Function to handle filtering by date range and selected authors
        function filterData(start_date, end_date, selectedAuthors, selectedCategories) {
            // Perform AJAX request to filter data
            $.ajax({
                url: "{{ route('filter.blog') }}",
                method: "GET",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    selectedAuthors: selectedAuthors,
                    selectedCategories: selectedCategories // Pass selected category IDs to the controller
                },
                success: function(res) {
                    $('.table-data').html(res);
                }
            });
        }


        // Function to handle AJAX request for pagination, search, and filtering
        function blog(page, search_string, start_date, end_date, selectedUsers, selectedCategories) {
            $.ajax({
                url: "/pagination/paginate-data-blog?page=" + page,
                data: {
                    search_string: search_string,
                    start_date: start_date,
                    end_date: end_date,
                    selectedAuthors: selectedUsers, // Pass selected author IDs to the controller
                    selectedCategories: selectedCategories // Pass selected category IDs to the controller
                },
                success: function(res) {
                    $('.table-data').html(res);
                }
            });
        }

        // Filter form submission event handler
        $('form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission behavior
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            let selectedAuthors = $('.js-author-select-multiple').val(); // Get selected author IDs
            let selectedCategories = $('.js-category-select-multiple').val(); // Get selected category IDs
            filterData(start_date, end_date, selectedAuthors, selectedCategories);
        });

        // Pagination and search
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search_string = $('#searchInput').val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            let selectedUsers = $('.js-author-select-multiple').val(); // Get selected author IDs
            let selectedCategories = $('.js-category-select-multiple').val(); // Get selected category IDs
            // Call the blog function to fetch paginated data
            blog(page, search_string, start_date, end_date, selectedUsers, selectedCategories);
        });

        // Live Search
        $(document).on('keyup', '#searchInput', function(e) {
            e.preventDefault();
            let search_string = $(this).val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            let selectedUsers = $('.js-author-select-multiple').val(); // Get selected author IDs
            let selectedCategories = $('.js-category-select-multiple').val(); // Get selected category IDs
            blog(1, search_string, start_date, end_date, selectedUsers, selectedCategories);
        });
    });
</script>
<!-- Today Button -->
<script>
    $(document).ready(function() {
        // Function to set today's date in the start date input field
        $('#set_today_start').on('click', function() {
            let today = new Date().toISOString().split('T')[0];
            $('#start_date').val(today);
        });

        // Function to set today's date in the end date input field
        $('#set_today_end').on('click', function() {
            let today = new Date().toISOString().split('T')[0];
            $('#end_date').val(today);
        });
    });
</script>
<!-- Clear Filter -->
<script>
    $(document).ready(function() {
        // Function to clear the filter inputs and refresh the table
        $('#clear_filter').on('click', function() {
            $('#searchInput').val('');
            $('#start_date').val('');
            $('#end_date').val('');

            // Clear the selected options in Select2 dropdown
            $('.js-author-select-multiple').val(null).trigger('change');
            // Clear the selected options in Select2 dropdown
            $('.js-category-select-multiple').val(null).trigger('change');

            refreshTable();
        });

        // Function to refresh the table content
        function refreshTable() {
            $.ajax({
                url: "{{ route('paginate.blog') }}",
                method: "GET",
                success: function(res) {
                    $('.table-data').html(res);
                }
            });
        }
    });
</script>
<!-- Refresh Button -->
<script>
    $(document).ready(function() {
        // Function to refresh the table
        $('#refresh_table').on('click', function() {
            refreshTable();
        });

        // Function to refresh the table content
        function refreshTable() {
            $.ajax({
                url: "{{ route('paginate.blog') }}", // Replaced with the actual route for retrieving the table content
                method: "GET",
                success: function(res) {
                    $('.table-data').html(res);
                }
            });
        }
    });
</script>