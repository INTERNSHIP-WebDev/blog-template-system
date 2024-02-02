<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails | Inbox</title>
</head>
<body>

@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Read Email</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                            <li class="breadcrumb-item active">Read Email</li>
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
                                        <span class="ms-1 float-end">(50)</span>
                                    </a>
                                    <a href="{{ route('emails.trash') }}" class="mailbox-link">
                                        <i class="mdi mdi-trash-can-outline me-2"></i>Trash 
                                        <span class="ms-1 float-end">(14)</span>
                                    </a> -->
                                </div>

                                    
                                </div>
                                <!-- End Left sidebar -->

                                <!-- Right Sidebar -->
                                <div class="email-rightbar mb-3">

                                    <div class="card">
                                        <div class="btn-toolbar p-3" role="toolbar">

                                        <div class="card-body" style="max-height: 700px; overflow-y: auto;">

                                        <div class="d-flex align-items-center mb-4">
                                            <!-- Back button -->
                                            <a href="#" onclick="goBackAndRefresh()" class="btn btn-secondary btn-sm me-3">
                                                <i class="fa fa-arrow-left"></i>
                                            </a>



                                            <!-- Email subject -->
                                            <h2 class="mb-0">{{ $email->subject }}</h2>
                                        </div>
                                        <hr>

                                            <div class="d-flex mb-4">
                                                <div class="flex-shrink-0 me-3">
                                                    
                                                    <!-- Assuming you have a default avatar image -->
                                                    <img class="rounded-circle avatar-sm" src="<?php echo url('theme')?>/dist/assets/images/users/avatar-9.png" alt="Avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <!-- Replace hardcoded name with actual send_name -->
                                                    <h5 class="font-size-14 mt-1">{{ $email->send_name }}</h5>
                                                    <!-- Replace hardcoded email with actual send_email -->
                                                    <small class="text-muted">{{ $email->send_email }}</small>
                                                </div>
                                            </div>
                                            <div style="max-width: 100%; overflow-x: hidden;">
                                                <p>{!! $email->message !!}</p>
                                            </div>
                                            
                                            <hr/>

                                            <a href="javascript: void(0);" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
                                        </div>



                                    </div>
                                </div>
                                <!-- card -->

                            </div>
                            <!-- end Col-9 -->

                        </div>

                    </div>
                    <!-- End row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end layout-wrapper-->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

<script>
    function goBackAndRefresh() {
        window.history.back(); // Go back to the previous page
        setTimeout(function() {
            location.reload(); // Reload the previous page after a short delay
        }, 10); // Set a very short delay, such as 100 milliseconds
    }
</script>


        <!--tinymce js-->
        <script src="<?php echo url('theme')?>/dist/assets/libs/tinymce/tinymce.min.js"></script>

        <!-- email editor init -->
        <script src="<?php echo url('theme')?>/dist/assets/js/pages/email-editor.init.js"></script>

        <!-- App js -->
        <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>

    @endsection
    </body>
</html>