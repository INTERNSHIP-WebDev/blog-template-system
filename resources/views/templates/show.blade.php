<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Details</title>
    
    <script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
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
                                    <h4 class="mb-sm-0 font-size-18">Blog Details</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                            <li class="breadcrumb-item active">Blog Details</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pt-3">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-8">
                                                    <div>
                                                        <div class="text-center">
                                                            <div class="mb-4">
                                                                <a href="javascript: void(0);" class="badge bg-light font-size-12">
                                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> 
                                                                            @if($template->category)
                                                                                {{ $template->category->text }}
                                                                            @else
                                                                                General Blog
                                                                            @endif
                                                                </a>
                                                            </div>
                                                            <h1>{{ $template->header }}</h1>
                                                        </div>

                                                        <hr>
                                                        <div class="text-center">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="mt-4 mt-sm-0">
                                                                        <p class="text-muted mb-2">Published on</p>
                                                                        <h5 class="font-size-15">{{ $template->created_at->format('d M, Y') }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="mt-4 mt-sm-0">
                                                                        <p class="text-muted mb-2">Author</p>
                                                                        <h5 class="font-size-15">
                                                                            @if($template->user)
                                                                                {{ $template->user->name }}
                                                                            @else
                                                                                Anonymous
                                                                            @endif
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="mt-4 mt-sm-0">
                                                                        <p class="text-muted mb-2">Updated on</p>
                                                                        <h5 class="font-size-15">{{ $template->updated_at->format('d M, Y') }}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="my-5">
                                                            <img src="assets/images/small/img-2.jpg" alt="" class="img-thumbnail mx-auto d-block">
                                                        </div>

                                                        <hr>

                                                        <div class="mt-4">

                                                        {!! $template->description !!}
                           
                                                        <hr>
                                                        <div class="mt-5">
                                                        <h5 class="font-size-15"><i class="bx bx-message-dots text-muted align-middle me-1"></i> Comments :</h5>
                                                        <div>
                                                            @forelse($comments as $comment)
                                                                <div class="d-flex py-3 border-top">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-xs">
                                                                            <div class="avatar-title rounded-circle bg-light text-primary">
                                                                                <i class="bx bxs-user"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="font-size-14 mb-1">{{ $comment->name }} <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small></h5>
                                                                        <p class="text-muted">{{ $comment->message }}</p>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="text-muted">No comments found.</div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                                    
                                                        
                                                        <div class="mt-4">
                                                            <h5 class="font-size-16 mb-3">Leave a Comment</h5>
            
                                                            <form action="{{ route('comments.store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="temp_id" value="{{ $template->id }}">
                                                                <div class="row">
                                                                    <div class="mb-6">
                                                                        <label for="name" class="form-label">Name</label>
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="mb-6">
                                                                        <label for="message" class="form-label">Message</label>
                                                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter comment" required></textarea>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-end">
                                                                        <button type="submit" class="btn btn-success w-sm">Post</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>
            <!-- end main content-->

@endsection

</body>
</html>
