<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | Grid</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Blog Grid</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                            <li class="breadcrumb-item active">Blog Grid</li>
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
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#archive" role="tab">
                                               Archive  
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
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" href="{{ route('templates.list') }}">
                                                                                    <i class="mdi mdi-format-list-bulleted"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active" href="{{ route('templates.grid') }}">
                                                                                    <i class="mdi mdi-view-grid-outline"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->

                                                            <hr class="mb-4">

                                                            <div class="row">
                                                            @foreach($templates as $template)
                                                                <div class="col-sm-4">
                                                                    <div class="card p-1 border shadow-none" style="max-width: 100%;">
                                                                        <div class="p-3">
                                                                            <h5><a href="{{ route('templates.show', $template->id) }}" class="text-dark">{{ $template->header }}</a></h5>
                                                                            <p class="text-muted mb-0">{{ $template->created_at->format('d M, Y') }}</p>
                                                                        </div>
                                                                        
                                                                        <div class="position-relative">
                                                                            @if ($template->banner)
                                                                                <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="100%" height="50">
                                                                            @else
                                                                                No photo
                                                                            @endif
                                                                        </div>


                                                                        <div class="p-3">
                                                                        <div class="list-inline">
                                                                            <div class="list-inline-item me-3">
                                                                                <a href="javascript:void(0);" class="text-muted">
                                                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                                                    @if($template->category)
                                                                                        {{ $template->category->text }}
                                                                                    @else
                                                                                        General Blog
                                                                                    @endif
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="list-inline">
                                                                            <div class="list-inline-item me-3">
                                                                                <a href="javascript:void(0);" class="text-muted">
                                                                                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 
                                                                                    {{ $template->comments->count() }} Comments
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <hr>

                                                                        <p class="teaser">
                                                                            {!! $template->description ? \Illuminate\Support\Str::limit(strip_tags($template->description), 150, $end='...') : "Blog has no content." !!}
                                                                        </p>


                                                                        <div>
                                                                            <a href="{{ route('templates.show', $template->id) }}" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                </div>

                                                                @endforeach
                                                            </div>

                                                            
        

                                                            <hr class="my-4">

                                                            <div class="text-center">
                                                                <ul class="pagination justify-content-center pagination-rounded">
                                                                    <li class="page-item disabled">
                                                                        <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                                    </li>
                                                                    <li class="page-item">
                                                                        <a href="javascript: void(0);" class="page-link">1</a>
                                                                    </li>
                                                                    <li class="page-item active">
                                                                        <a href="javascript: void(0);" class="page-link">2</a>
                                                                    </li>
                                                                    <li class="page-item">
                                                                        <a href="javascript: void(0);" class="page-link">3</a>
                                                                    </li>
                                                                    <li class="page-item">
                                                                        <a href="javascript: void(0);" class="page-link">...</a>
                                                                    </li>
                                                                    <li class="page-item">
                                                                        <a href="javascript: void(0);" class="page-link">10</a>
                                                                    </li>
                                                                    <li class="page-item">
                                                                        <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="archive" role="tabpanel">
                                            <div>
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-8">
                                                        <h5>Archive</h5>

                                                        <div class="mt-5">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="me-2">
                                                                    <h4>2020</h4>
                                                                </div>
                                                                <div class="ms-auto">
                                                                    <span class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">03</span>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-2">

                                                            <div class="list-group list-group-flush">
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Beautiful Day with Friends</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Drawing a sketch</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Project discussion with team</a>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="mt-5">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="me-2">
                                                                    <h4>2019</h4>
                                                                </div>
                                                                <div class="ms-auto">
                                                                    <span class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">06</span>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-2">

                                                            <div class="list-group list-group-flush">
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Coffee with Friends</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Neque porro quisquam est</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Quis autem vel eum iure</a>

                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Cras mi eu turpis</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Drawing a sketch</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Project discussion with team</a>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="mt-5">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="me-2">
                                                                    <h4>2018</h4>
                                                                </div>
                                                                <div class="ms-auto">
                                                                    <span class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">03</span>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-2">

                                                            <div class="list-group list-group-flush">
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Beautiful Day with Friends</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Drawing a sketch</a>
                                                                
                                                                <a href="blog-details.html" class="list-group-item text-muted"><i class="mdi mdi-circle-medium me-1"></i> Project discussion with team</a>
                                                                
                                                            </div>
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
    </body>
</html>
