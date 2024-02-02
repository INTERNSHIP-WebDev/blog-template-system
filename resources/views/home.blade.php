<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .comment-item:hover {
            background-color: #f7f7f7;
            cursor: pointer;
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
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Blog</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">

                                        <div class="d-flex flex-wrap">
                                            <div class="me-3">
                                                <p class="text-muted mb-2">Total Post</p>
                                                <h5 class="mb-0">{{ $totalPosts }}</h5>
                                            </div>

                                            <div class="avatar-sm ms-auto">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                    <i class="bx bxs-book-bookmark"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card blog-stats-wid">
                                    <div class="card-body">

                                        <div class="d-flex flex-wrap">
                                            <div class="me-3">
                                                <p class="text-muted mb-2">Total Mails</p>
                                                <h5 class="mb-0">{{ $totalConcerns }}</h5>
                                            </div>

                                            <div class="avatar-sm ms-auto">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                    <i class="bx bxs-envelope"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card blog-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap">
                                            <div class="me-3">
                                                <p class="text-muted mb-2">Total Comments</p>
                                                <h5 class="mb-0">{{ $totalComments }}</h5>
                                            </div>

                                            <div class="avatar-sm ms-auto">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                    <i class="bx bxs-message-square-dots"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-start">
                                    <h5 class="card-title me-2">Visitors</h5>
                                    <div class="ms-auto">
                                        <div class="toolbar d-flex flex-wrap gap-2 text-end">
                                            <button type="button" class="btn btn-light btn-sm">
                                                ALL
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm">
                                                1M
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm">
                                                6M
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm active">
                                                1Y
                                            </button>

                                        </div>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-lg-4">
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Today</p>
                                            <h5>1024</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">This Month</p>
                                            <h5>12356 <span class="text-success font-size-13">0.2 % <i class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">This Year</p>
                                            <h5>102354 <span class="text-success font-size-13">0.1 % <i class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <!-- <canvas id="weekly-postings-chart" style="max-height: 300px;"></canvas> -->

                                <!-- <div class="apex-charts" data-colors='["--bs-primary", "--bs-warning"]' id="area-chart" dir="ltr"></div> -->
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="{{ asset('/images/logos/logo_1706680612.png') }}" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="text-muted">
                                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                                    <p class="mb-0">{{ $user->role }}</p>
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0 dropdown ms-2">
                                                <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bxs-cog align-middle me-1"></i> Setting
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else</a>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>

                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Total Posts</p>
                                                    <h5 class="mb-0">{{ $totalUserPosts }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <p class="text-muted text-truncate mb-2">Comments</p>
                                                    <h5 class="mb-0">{{ $totalUserComments }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-start">
                                    <h5 class="card-title mb-3 me-2">Likes</h5>

                                    <div class="dropdown ms-auto">
                                        <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>

                                @php
                                $totalLikes = 0;
                                foreach ($templates as $template) {
                                $totalLikes += $template->likes()->count();
                                }
                                @endphp

                                <div class="d-flex flex-wrap">
                                    <div>
                                        <p class="text-muted mb-1">Total Likes</p>
                                        <h4 class="mb-3">{{ $totalLikes }}</h4>
                                    </div>
                                    <div class="ms-auto align-self-end">
                                        <i class="bx bx-like display-4 text-light"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom">
                                <div class="d-flex flex-wrap align-items-start">
                                    <div class="me-2">
                                        <h5 class="card-title mt-1 mb-0">Mails</h5>
                                    </div>
                                    <ul class="nav nav-tabs nav-tabs-custom card-header-tabs ms-auto" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#post-recent" role="tab">
                                                Recent
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                            <div class="card-body">

                                <div data-simplebar style="max-height: 295px;">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @forelse($concerns as $concern)
                                        @if($concern->rcpt_email === auth()->user()->email)
                                        <div class="tab-pane active" id="post-recent" role="tabpanel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item py-3">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <img src="{{ asset('images/banners/' . $concern->banner) }}" alt="Concern Banner" class="avatar-md h-auto d-block rounded" width="100%" height="50">
                                                        </div>
                                                        <div class="align-self-center overflow-hidden me-auto">
                                                            <div>
                                                                <h5 class="font-size-14 text-truncate"><a href="javascript: void(0);" class="text-dark">{{ $concern->header }}</a></h5>
                                                                <p class="text-muted mb-0">{{ $concern->created_at->format('d M, Y') }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown ms-2">
                                                            <a class="text-muted font-size-14" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                        @empty
                                        <div class="text-muted">No concerns found.</div>
                                        @endforelse
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-start">
                                    <div class="me-2">
                                        <h5 class="card-title mb-3">Comments</h5>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 310px;">
                                    <ul class="list-group list-group-flush">
                                        @foreach($comments as $comment)
                                        @if($comment->template->user_id === auth()->id())
                                        <li class="list-group-item py-3 comment-item">
                                            <a href="{{ route('templates.show', $comment->template->id) }}" class="text-decoration-none">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle bg-light text-primary">
                                                                <i class="bx bxs-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="font-size-14 mb-1">{{ $comment->name }}<span style="color: black; margin-left: 5px; margin-right: 5px;">commented on your blog</span>
                                                            "@php
                                                            $words = str_word_count($comment->template->header, 1);
                                                            $limitedWords = implode(' ', array_slice($words, 0, 5));
                                                            @endphp

                                                            {{ count($words) > 5 ? $limitedWords . '...' : $limitedWords }}"
                                                        </h5>
                                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                        @if($comments->isEmpty())
                                        <div class="text-muted">No comments found.</div>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-start">
                                    <div class="me-2">
                                        <h5 class="card-title mb-3">Top Visitors</h5>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <div class="mt-3">
                                            <p class="text-muted mb-1">Today</p>
                                            <h5>1024</h5>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mt-3">
                                            <p class="text-muted mb-1">This Month</p>
                                            <h5>12356 <span class="text-success font-size-13">0.2 % <i class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="py-2">
                                                <h5 class="font-size-14">California <span class="float-end">78%</span></h5>
                                                <div class="progress animated-progess progress-sm">
                                                    <div class="progress-bar" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="py-2">
                                                <h5 class="font-size-14">Nevada <span class="float-end">69%</span></h5>
                                                <div class="progress animated-progess progress-sm">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="py-2">
                                                <h5 class="font-size-14">Texas <span class="float-end">61%</span></h5>
                                                <div class="progress animated-progess progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 61%" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="me-2">
                                        <h5 class="card-title mb-4">Activity</h5>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>

                                <div data-simplebar class="mt-2" style="max-height: 280px;">
                                    <ul class="verti-timeline list-unstyled">
                                        <li class="event-list active">
                                            <div class="event-timeline-dot">
                                                <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                            </div>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <h5 class="font-size-14">{{ date('d M', strtotime($latestTemplate->created_at)) }}<i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div>
                                                        <span class="fw-semibold">
                                                            {{ implode(' ', array_slice(str_word_count($latestTemplate->user->name, 1), 0, 2)) }}
                                                        </span>
                                                        Posted
                                                        <span class="fw-semibold">
                                                            "@php
                                                            $words = str_word_count($latestTemplate->header, 1);
                                                            $limitedWords = implode(' ', array_slice($words, 0, 5));
                                                            @endphp

                                                            {{ count($words) > 5 ? $limitedWords . '...' : $limitedWords }}"
                                                        </span>
                                                        blog... <a href="{{ url('post/' . $latestTemplate->id) }}">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        @foreach ($activityTemplate->skip(1) as $template)
                                        <li class="event-list">
                                            <div class="event-timeline-dot">
                                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                                            </div>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <h5 class="font-size-14">{{ date('d M', strtotime($template->created_at)) }}<i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div>
                                                        <span class="fw-semibold">
                                                            {{ implode(' ', array_slice(str_word_count($template->user->name, 1), 0, 2)) }}
                                                        </span>
                                                        Posted
                                                        <span class="fw-semibold">
                                                            "@php
                                                            $words = str_word_count($latestTemplate->header, 1);
                                                            $limitedWords = implode(' ', array_slice($words, 0, 5));
                                                            @endphp

                                                            {{ count($words) > 5 ? $limitedWords . '...' : $limitedWords }}"
                                                        </span>
                                                        blog... <a href="{{ url('post/' . $template->id) }}">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="text-center mt-4"><a href="{{ route('templates.all_activities') }}" class="btn btn-primary waves-effect waves-light btn-sm">View All <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="me-2">
                                        <h5 class="card-title mb-4">Popular Posts</h5>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="text-muted font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="2">Post</th>
                                                <th scope="col">Views</th>
                                                <th scope="col">Likes</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($mostViewedTemplates as $template)
                                            <tr>
                                                <td><img src="{{ asset('images/banners/' . $template->banner) }}" alt="Template Banner" class="avatar-md h-auto d-block rounded" width="100%" height="50"></td>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1"><a href="javascript: void(0);" class="text-dark">
                                                        <a>    
                                                        {!! $template->header ? \Illuminate\Support\Str::limit(strip_tags($template->header), 20, $end='...') : "Blog has no header" !!}
                                                        </a>
                                                    </h5>
                                                    <p class="text-muted mb-0">{{ $template->created_at->format('d M, Y') }}</p>
                                                </td>
                                                <td><i class="bi bi-eye align-middle me-1"></i>{{ $template->views }}</td>
                                                <td><i class="bx bx-like align-middle me-1"></i>{{ $template->likeCount }}</td> <!-- Updated likes count -->
                                                <td><i class="bx bx-comment-dots align-middle me-1"></i>{{ $template->comments->count() }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('templates.show', $template->id) }}" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-muted">No posts found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>




                                </div>
                            </div>
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
    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @endsection
</body>

</html>