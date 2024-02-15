<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blogs | List</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
        .image-container {
    width: 50px; 
    height: 50px;
    overflow: hidden; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
}

.image-container img {
    width: 100%;
    height: 100%; 
   object-fit: cover;
}
        </style>
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
                                                <a href="{{ route('templates.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Blog</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="card-body">
                                        <div id="table_data">
                                            @include('templates.pagination_data')
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
        @endsection
        <script>
            $(document).ready(function(){
                $(document).on('click', '.pagination a', function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetch_data(page);
                });

                function fetch_data(page)
                {
                    $.ajax({
                        url:"/pagination/fetch_data?page="+page,
                        success:function(data)
                        {
                            $('#table_data').html(data);
                        }
                    })
                }
            });
        </script>
    </body>
</html>
