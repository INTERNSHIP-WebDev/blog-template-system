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
                                            <div class="btn-toolbar p-3" role="toolbar">
                                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                                    <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                                </div>
                                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                                    <button type="button" class="btn btn-primary waves-light waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Updates</a>
                                                        <a class="dropdown-item" href="#">Social</a>
                                                        <a class="dropdown-item" href="#">Team Manage</a>
                                                    </div>
                                                </div>
                                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                                    <button type="button" class="btn btn-primary waves-light waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Updates</a>
                                                        <a class="dropdown-item" href="#">Social</a>
                                                        <a class="dropdown-item" href="#">Team Manage</a>
                                                    </div>
                                                </div>

                                                <div class="btn-group me-2 mb-2 mb-sm-0">
                                                    <button type="button" class="btn btn-primary waves-light waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                                        More <i class="mdi mdi-dots-vertical ms-2"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Mark as Unread</a>
                                                        <a class="dropdown-item" href="#">Mark as Important</a>
                                                        <a class="dropdown-item" href="#">Add to Tasks</a>
                                                        <a class="dropdown-item" href="#">Add Star</a>
                                                        <a class="dropdown-item" href="#">Mute</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="message-list">
                                                @foreach($concerns as $concern)
                                                <li>
                                                    <!-- Email details -->
                                                    <div class="col-mail col-mail-1">
                                                        <!-- Checkbox -->
                                                        <div class="checkbox-wrapper-mail">
                                                            <input type="checkbox" id="chk19">
                                                            <label for="chk19" class="toggle"></label>
                                                        </div>
                                                        <!-- Sender and subject -->
                                                        <a href="javascript: void(0);" class="title">{{ $concern->send_name }}</a><span class="star-toggle far fa-star"></span>
                                                    </div>
                                                    <div class="col-mail col-mail-2">
                                                        <!-- Subject and teaser -->
                                                        <a href="{{ route('emails.show', $concern->id) }}" class="subject">{{ $concern->subject }} - <span class="teaser">{{ $concern->message }}</span></a>
                                                        <!-- Date -->
                                                        <div class="date">{{ $concern->created_at->format('M d') }}</div>
                                                    </div>
                                                    <!-- End Email details -->
                                                </li>
                                                @endforeach
                                            </ul>

            
                                        </div><!-- card -->

                                        <div class="row">   
                                            <div class="col-7">
                                                Showing 1 - 20 of 1,524
                                            </div>
                                            <div class="col-5">
                                                <div class="btn-group float-end">
                                                    <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                    <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
            
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
