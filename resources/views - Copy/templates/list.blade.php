<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | List</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
          .image-container {
    width: 100%;
    height: 0; 
    padding-top: calc(100% * 3 / 4);
    position: relative;
    overflow: hidden;
}

.image-container img {
    position: absolute; 
    width: 100%; 
    height: 100%; 
    top: 0; 
    left: 0; 
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
                                    <h4 class="mb-sm-0 font-size-18">Blog List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                            <li class="breadcrumb-item active">Blog List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom justify-content-center pt-2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#all-post" role="tab">
                                               All Post
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="all-post" role="tabpanel">
                                            <div>
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-12">
                                                        <div>
                                                            <div class="row align-items-center">
                                                                <div class="col-4">
                                                                    <div>
                                                                        <h5 class="mb-0">Blog List</h5>
                                                                    </div>
                                                                </div>
                                    
                                                                <div class="col-8">
                                                                    <div>
                                                                        <ul class="nav nav-pills justify-content-end">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">View :</a>
                                                                            </li>
                                                                            <li class="nav-item" data-bs-placement="top" title="List">
                                                                                <a class="nav-link active" href="{{ route('templates.list') }}">
                                                                                    <i class="mdi mdi-format-list-bulleted"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item" data-bs-placement="top" title="Grid">
                                                                                <a class="nav-link" href="{{ route('templates.grid') }}">
                                                                                    <i class="mdi mdi-view-grid-outline"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->

                                                            <hr class="mb-4">

                                                    
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div id="nissijeap">
                                                                        @include('templates.list_pagination')
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <!-- <div>
                                                            @foreach($templates as $template)
                                                                <h5><a href="{{ route('templates.show', $template->id) }}" class="text-dark">{{ $template->header }}</a></h5>
                                                                <p class="text-muted">{{ $template->created_at->format('d M, Y') }}</p>
                                                                
                                                                <div class="position-relative mb-3">
                                                                        @if ($template->banner)
                                                                            <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="100%" height="50">
                                                                        @else
                                                                            No photo
                                                                        @endif
                                                                </div>

                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item me-3">
                                                                        <a href="javascript: void(0);" class="text-muted">
                                                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                                                    @if($template->category)
                                                                                        {{ $template->category->text }}
                                                                                    @else
                                                                                        General Blog
                                                                                    @endif
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item me-3">
                                                                        <a href="javascript: void(0);" class="text-muted">
                                                                            <i class="bx bx-comment-dots align-middle text-muted me-1"></i> {{ $template->comments->count() }} Comments
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                                <p>{!! $template->description ? \Illuminate\Support\Str::limit(strip_tags($template->description), 150, $end='...') : "Blog has no content." !!}</p>

                                                                <div>
                                                                    <a href="{{ route('templates.show', $template->id) }}">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                </div>
                                                                <hr>
                                                                @endforeach
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="search-box">
                                            <p class="text-muted">Search</p>
                                            <div class="position-relative">
                                                <input type="text" class="form-control rounded bg-light border-light" placeholder="Search...">
                                                <i class="mdi mdi-magnify search-icon"></i>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div>
                                            <p class="text-muted">Categories</p>

                                            <ul class="list-unstyled fw-medium">
                                                @foreach($categories as $category)
                                                    <li>
                                                        <a href="javascript:void(0);" class="text-muted py-2 d-block">
                                                            <i class="mdi mdi-chevron-right me-1"></i>
                                                            {{ $category->text }}
                                                            <span class="badge badge-soft-success badge-pill ms-1 float-end font-size-12">{{ $category->templates_count }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                        <hr class="my-4">

                                        
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->
                        
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
        <script>
            $(document).ready(function(){
                $(document).on('click', '.pagination a', function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetch_list_data(page);
                });

                function fetch_list_data(page)
                {
                    $.ajax({
                        url:"/pagination/fetch_list_data?page="+page,
                        success:function(data)
                        {
                            $('#nissijeap').html(data);
                        }
                    })
                }
            });
        </script>
    </body>
</html>
