<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blogs | List</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                                    <h5 class="mb-0 card-title flex-grow-1">Blogs List</h5>
                                    <div class="flex-shrink-0">
                                        @can('create-blog')
                                        <a href="{{ route('templates.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New Blog</a>
                                        @endcanany
                                        <button class="btn btn-light" type="button" id="refresh_table"><i class="mdi mdi-refresh"></i></button>
                                        <div class="dropdown d-inline-block">
                                            <button type="menu" class="btn btn-success" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-bottom">
                                <form method="GET" action="{{ route('filter.blog') }}">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-xxl-2 col-lg-3">
                                            <label>Search:</label>
                                            <input type="search" name="search" class="form-control" id="searchInput" placeholder="Search for ...">
                                        </div>
                                        <div class="col-sm-2 col-sm-3">
                                            <label>Start Date:</label>
                                            <div class="input-group">
                                                <input type="date" name="start_date" class="form-control" id="start_date">
                                                <button class="btn btn-primary" type="button" id="set_today_start">Today</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-sm-3">
                                            <label>End Date:</label>
                                            <div class="input-group">
                                                <input type="date" name="end_date" class="form-control" id="end_date">
                                                <button class="btn btn-primary" type="button" id="set_today_end">Today</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-sm-3">
                                                <label>Select Category:</label>
                                                <select class="col-xxl-8 col-md-8 js-category-select-multiple" name="selectedCategories[]" multiple="multiple">
                                                    @foreach($category as $cg)
                                                    <option value="{{ $cg->id }}">{{ $cg->text }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        
                                        <div class="col-sm-2 col-sm-3">
                                                <label>Select User:</label>
                                                <select class="col-xxl-8 col-md-8 js-author-select-multiple" name="selectedAuthors[]" multiple="multiple">
                                                    @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-sm-1 col-sm-1 d-grid">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                        <div class="col-sm-1 col-sm-1 d-grid">
                                            <label>&nbsp;</label>
                                            <button class="btn btn-secondary" type="button" id="clear_filter">Clear</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('.js-author-select-multiple').select2();
                                $('.js-category-select-multiple').select2();
                            });
                        </script>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-data">
                                    <table class="table table-bordered align-middle nowrap">
                                        @include('templates.blog_pagination')
                                    </table>
                                </div>
                            </div>
                            @include('templates.blog_js')
                        </div><!--end card-->

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
</body>

</html>