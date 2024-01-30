<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Details</title>

    <script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- CSS only -->
    <style>
        .page-title-box {
            position: relative;
            padding: 0 15px;
            border-radius: 14px;
        }

        .header-text {
            position: relative;
            z-index: 1; /** place in front of header bg **/
            padding: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 1px 8px 20px 3px rgba(0,0,0,0.7); 
                box-shadow: 1px 8px 20px 3px rgba(0,0,0,0.7);
        }
        .mb-4 {
            width: fit-content;
            position: relative;
            padding: 5px;
            height: 28px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 14px 1cm;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px !important;
        }
        
    </style>
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
                                            <div class="text-center page-title-box dynamic-text-color" style="background-image: url('{{ asset('images/banners/' . $template->banner) }}');">
                                                <div class="mb-4">
                                                    <a href="javascript: void(0);" class="badge bg-light font-size-12"></a>
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                    @if($template->category)
                                                    {{ $template->category->text }}
                                                    @else
                                                    General Blog
                                                    @endif
                                                    </a>
                                                </div>
                                                <h1 class="header-text">{{ $template->header }}</h1>
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

                                            <hr>

                                            <div class="mt-4">

                                                <div style="max-width: 100%; overflow-x: hidden;">
                                                    <p>{!! $template->description !!}</p>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="mt-5">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h5 class="font-size-15">
                                                                <i class="bx bx-message-dots text-muted align-middle me-1"></i> Comments :
                                                            </h5>

                                                            <div class="d-flex align-items-center">
                                                                <button id="likeButton" data-template-id="{{ $template->id }}" class="btn like-button" style="font-size: 20px;  margin-right: -10px;">
                                                                    @if($template->isLikedByUser(auth()->user()))
                                                                    <i class="bx bxs-like text-primary"></i>
                                                                    @else
                                                                    <i class="bx bx-like"></i>
                                                                    @endif
                                                                </button>
                                                                <span id="totalLikes" class="ms-2" style="margin-right: 7px;">
                                                                    {{ $totalTempLikes }}
                                                                    {{ $totalTempLikes == 1 ? 'like' : 'likes' }}
                                                                </span>


                                                            </div>
                                                        </div>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var pageTitleBox = document.querySelector('.dynamic-text-color');
        var headerText = pageTitleBox.querySelector('.header-text');

        var img = new Image();
        img.src = pageTitleBox.style.backgroundImage.slice(4, -1).replace(/["']/g, "");

        img.onload = function() {
            var brightness = getAverageBrightness(img);
            headerText.style.backgroundColor = brightness > 128 ? 'rgba(0, 0, 0, 0.4)' : 'rgba(255, 255, 255, 0.4)';
            headerText.style.color = brightness > 128 ? 'white' : 'black';
        };
    });

    function getAverageBrightness(img) {
        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");

        canvas.width = img.width;
        canvas.height = img.height;

        ctx.drawImage(img, 0, 0, img.width, img.height);

        var imageData = ctx.getImageData(0, 0, img.width, img.height);
        var data = imageData.data;

        var sum = 0;

        for (var i = 0; i < data.length; i += 4) {
            sum += (data[i] + data[i + 1] + data[i + 2]) / 3;
        }

        var avgBrightness = sum / (data.length / 4);

        return avgBrightness;
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const likeButton = document.getElementById('likeButton');
        const totalLikesElement = document.getElementById('totalLikes');
        let isProcessing = false;

        likeButton.addEventListener('click', function() {
            if (isProcessing) {
                return;
            }

            isProcessing = true;

            const templateId = likeButton.getAttribute('data-template-id');
            const token = '{{ csrf_token() }}';

            fetch(`/templates/${templateId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        _token: token,
                        template_id: templateId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update button text/icon based on like status
                        if (data.liked) {
                            likeButton.innerHTML = '<i class="bx bxs-like text-primary"></i>';
                            likeButton.classList.add('liked');
                        } else {
                            likeButton.innerHTML = '<i class="bx bx-like"></i>';
                            likeButton.classList.remove('liked');
                        }

                        // Update total likes count
                        totalLikesElement.textContent = data.totalLikes + ' ' + (data.totalLikes == 1 ? 'like' : 'likes');
                    } else {
                        console.error(data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                })
                .finally(() => {
                    isProcessing = false;
                });
        });
    });
</script>

@endsection

</body>

</html>