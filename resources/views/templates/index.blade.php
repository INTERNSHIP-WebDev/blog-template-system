<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | List</title>

     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="<?php echo url('theme')?>/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo url('theme')?>/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo url('theme')?>/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo url('theme')?>/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo url('theme')?>/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- App js -->
    <script src="<?php echo url('theme')?>/dist/assets/js/plugin.js"></script>
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
                                    <h4 class="mb-sm-0 font-size-18">Blogs List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blogs</a></li>
                                            <li class="breadcrumb-item active">Blogs List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body border-bottom">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 card-title flex-grow-1">Blogs Lists</h5>
                                            <div class="flex-shrink-0">
                                                <a href="{{ route('templates.create') }}" class="btn btn-primary">Add New Blog</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered align-middle nowrap">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Header</th>
                                                        <th scope="col">Banner</th>
                                                        <th scope="col">Logo</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($templates as $template)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $template->header }}</td>
                                                            <td>
                                                                @if ($template->banner)
                                                                <img src="{{ asset('images/banners/' . $template->banner) }}" alt="Banner Image" class="img-thumbnail" width="50" height="50">
                                                                @else
                                                                    No photo
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($template->logo)
                                                                <img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="img-thumbnail" width="50" height="50">
                                                                @else
                                                                    No photo
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('templates.show', $template->id) }}" class="btn btn-info">Show</a>
                                                                <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-warning">Edit</a>
                                                                <form action="{{ route('templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6">No blog posts found.</td>
                                                            </tr>
                                                        @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->

                        </div><!--end row-->
                        

                    </div> <!-- container-fluid -->
                </div><!-- End Page-content -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        
        <!-- JAVASCRIPT -->
        <script src="<?php echo url('theme')?>/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo url('theme')?>/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo url('theme')?>/dist/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo url('theme')?>/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo url('theme')?>/dist/assets/libs/node-waves/waves.min.js"></script>

        <script src="<?php echo url('theme')?>/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo url('theme')?>/dist/assets/libs/select2/js/select2.min.js"></script>

        <script src="<?php echo url('theme')?>/dist/assets/js/pages/job-list.init.js"></script>

        <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>
    </body>
</html>
