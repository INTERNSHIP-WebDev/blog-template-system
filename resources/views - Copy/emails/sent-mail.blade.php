<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails | Inbox</title>

    <style>
        .unread-email {
            font-weight: bold; /* Make unread emails bold */
        }

        .mailbox-link:hover {
            background-color: #f0f0f0; /* Change the background color on hover */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    
</head>
<body>

@extends('layouts.app')

@section('content')

    <!-- Start right Content here -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Inbox</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                    <li class="breadcrumb-item active">Inbox</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <!-- Left sidebar -->
                        <div class="email-leftbar card">
                            <a href="{{ route('emails.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
                                Compose
                            </a>
                            <div class="mail-list mt-4">
                                <a href="{{ route('emails.inbox') }}" class="mailbox-link">
                                    <i class="mdi mdi-email-outline me-2"></i> Inbox 
                                    <span class="ms-1 float-end">({{ $InboxCount }})</span>
                                </a>
                                <a href="{{ route('emails.sent-mail') }}" class="mailbox-link">
                                    <i class="mdi mdi-email-check-outline me-2"></i>Sent Mail 
                                    <span class="ms-1 float-end">({{ $SentMailCount }})</span>
                                </a>
                                <!-- <a href="{{ route('emails.draft') }}" class="mailbox-link">
                                    <i class="mdi mdi-file-outline me-2"></i>Draft 
                                    <span class="ms-1 float-end">({{ $DraftCount }})</span>
                                </a>
                                <a href="{{ route('emails.trash') }}" class="mailbox-link">
                                    <i class="mdi mdi-trash-can-outline me-2"></i>Trash 
                                    <span class="ms-1 float-end">({{ $TrashCount }})</span>
                                </a> -->
                            </div>

                            
                        </div>
                        <!-- End Left sidebar -->

                        <!-- Right Sidebar -->
                        <div class="email-rightbar mb-3">
                            <div class="card">
                                <div class="btn-toolbar p-3" role="toolbar">
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <input type="checkbox" id="select-all" class="checkbox-select-all" title="Select All" />
                                        <label for="select-all" class="toggle"></label>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect refresh" title="Refresh"><i class="fas fa-sync-alt"></i></button>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect delete-selected" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete Selected"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect mark-as-read" title="Mark as Read"><i class="fas fa-envelope-open-text"></i></button>
                                    </div>
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-primary waves-light waves-effect mark-as-unread" title="Mark as Unread"><i class="fa fa-envelope"></i></button>
                                    </div>
                                </div>

    
                                <div id="sent">
                                    @include('emails.pagination_sent_mail')
                                </div>

                            </div>
                            <!-- card -->

                        </div> <!-- end email-rightbar -->

                    </div><!-- End Col-9 -->

                </div><!-- End row -->

            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->

    </div><!-- end main content-->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Bulk Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Bulk Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected emails?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger confirm-bulk-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bulk Delete Modal -->



<script>
    // Function to handle select all checkbox
    $('#select-all').on('change', function () {
        // Check/uncheck all checkboxes based on the select all checkbox state
        $('.checkbox-bulk').prop('checked', $(this).prop('checked'));
    });
</script>


<script>
    $('.confirm-bulk-delete').on('click', function () {
    var selectedIds = [];
    $('.checkbox-bulk:checked').each(function () {
        selectedIds.push($(this).data('id'));
    });
    if (selectedIds.length > 0) {
        // Send an AJAX request to the server to delete the selected emails
        $.ajax({
            url: '{{ route('emails.destroyInbox', ':id') }}', // Updated route
            type: 'DELETE',
            data: {ids: selectedIds},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function (response) {
                // Handle success response
                console.log(response.message);
                // Reload the page after successful deletion
                window.location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                // Optionally, display an error message to the user
            }
        });
    } else {
        alert('Please select emails to delete.');
    }
});
</script>


<script>
    $(document).ready(function () {
        // Function to handle marking emails as read
        $('.mark-as-read').on('click', function () {
            var selectedIds = getSelectedEmailIds();
            markEmails(selectedIds, '{{ route("emails.markAsRead") }}');
        });

        // Function to handle marking emails as unread
        $('.mark-as-unread').on('click', function () {
            var selectedIds = getSelectedEmailIds();
            markEmails(selectedIds, '{{ route("emails.markAsUnread") }}');
        });

        // Helper function to get selected email IDs
        function getSelectedEmailIds() {
            var selectedIds = [];
            $('.checkbox-bulk:checked').each(function () {
                selectedIds.push($(this).data('id'));
            });
            return selectedIds;
        }

        // Helper function to mark emails
        function markEmails(selectedIds, url) {
            if (selectedIds.length > 0) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {ids: selectedIds, _token: '{{ csrf_token() }}'},
                    success: function (response) {
                        console.log(response.message);
                        window.location.reload(); // Reload the page after successful operation
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error response
                    }
                });
            } else {
                alert('Please select emails to mark.');
            }
        }
    });
</script>

<script>
    // Function to handle refresh button click
    $('.refresh').on('click', function () {
        // Reload the current page
        window.location.reload();
    });
</script>

@endsection
<script>
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(event)
        {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_sent_data(page);
        });

        function fetch_sent_data(page)
        {
            $.ajax({
                url:"/pagination/fetch_sent_data?page="+page,
                success:function(data)
                {
                    $('#sent').html(data);
                }
            });
        }    
    });
</script>

    </body>
</html>
