<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails | Compose Message</title>
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
                                        <h4 class="mb-sm-0 font-size-18">New Message</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                                <li class="breadcrumb-item active">New Message</li>
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
                                            <a href="javascript: void(0);" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
                                            <a href="javascript: void(0);"><i class="mdi mdi-star-outline me-2"></i>Starred</a>
                                            <a href="javascript: void(0);"><i class="mdi mdi-diamond-stone me-2"></i>Important</a>
                                            <a href="javascript: void(0);"><i class="mdi mdi-file-outline me-2"></i>Draft</a>
                                            <a href="javascript: void(0);"><i class="mdi mdi-email-check-outline me-2"></i>Sent Mail</a>
                                            <a href="javascript: void(0);"><i class="mdi mdi-trash-can-outline me-2"></i>Trash</a>
                                        </div>
            
            
                                        <h6 class="mt-4">Labels</h6>
            
                                        <div class="mail-list mt-1">
                                            <a href="javascript: void(0);"><span class="mdi mdi-arrow-right-drop-circle text-info float-end"></span>Theme Support</a>
                                            <a href="javascript: void(0);"><span class="mdi mdi-arrow-right-drop-circle text-warning float-end"></span>Freelance</a>
                                            <a href="javascript: void(0);"><span class="mdi mdi-arrow-right-drop-circle text-primary float-end"></span>Social</a>
                                            <a href="javascript: void(0);"><span class="mdi mdi-arrow-right-drop-circle text-danger float-end"></span>Friends</a>
                                            <a href="javascript: void(0);"><span class="mdi mdi-arrow-right-drop-circle text-success float-end"></span>Family</a>
                                        </div>
                                    </div>
                                    <!-- End Left sidebar -->
            
            
                                    <!-- Right Sidebar -->
                                    <div class="email-rightbar mb-3">
                                        
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('emails.store') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">To</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter recipient email" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="subject" class="form-label">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter email subject" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message" class="form-label">Message</label>
                                                    <textarea class="form-control" id="message" name="message" rows="6" placeholder="Enter your message" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- card -->
                                    </div><!-- card -->
            
                                    </div> <!-- end Col-9 -->
            
                                </div>
            
                            </div><!-- End row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                
                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            @endsection
        </body>
    </html>
