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
        // Function to handle filtering by date range
        function filterByDateRange(start_date, end_date) {
            // Validate start date and end date
            if (!start_date || !end_date) {
                alert("Please enter both start date and end date");
                return;
            }
            if (start_date > end_date) {
                alert("Start date cannot be later than end date");
                return;
            }

            $.ajax({
                url: "{{ route('filter.role') }}",
                method: "GET",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(res) {
                    $('.table-data').html(res);
                }
            });
        }

        // Function to handle AJAX request for pagination, search, and filtering
        function role(page, search_string, start_date, end_date) {
            $.ajax({
                url: "/pagination/paginate-data-role?page=" + page,
                data: {
                    search_string: search_string,
                    start_date: start_date,
                    end_date: end_date
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
            filterByDateRange(start_date, end_date);
        });

        // Pagination and search
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search_string = $('#searchInput').val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            // Modify the pagination link to include filter parameters
            let url = $(this).attr('href') + '&start_date=' + start_date + '&end_date=' + end_date;
            role(page, search_string, start_date, end_date);
        });

        $(document).on('keyup', '#searchInput', function(e) {
            e.preventDefault();
            let search_string = $(this).val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            role(1, search_string, start_date, end_date);
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
        refreshTable();
    });

    // Function to refresh the table content
    function refreshTable() {
        $.ajax({
            url: "{{ route('paginate.role') }}", // Replaced with the actual route for retrieving the table content
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
            url: "{{ route('paginate.role') }}", // Replaced with the actual route for retrieving the table content
            method: "GET",
            success: function(res) {
                $('.table-data').html(res);
            }
        });
    }
});
</script>
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
