
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posting Details</title>

    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo url('sociala')?>/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/style.css">
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/emoji.css">
    
    <link rel="stylesheet" href="<?php echo url('sociala')?>/css/lightbox.css">

    <style>
        .card-body {
            max-width: 100%;
            overflow-y: hidden;
            height: auto;
            word-wrap: break-word;
        }

    </style>
</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    <div class="main-wrapper">

        <!-- navigation top-->
        <div class="nav-header bg-white shadow-xs border-0">
            <div class="nav-top">
                <a href="index.html"><i class="feather-file-text text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">Blog.TS</span> </a>
                <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
                <button class="nav-menu me-0 ms-2"></button>
            </div>
            
            <form action="#" class="float-left header-search">
                <div class="form-group mb-0 icon-input">
                    <i class="feather-search font-sm text-grey-400"></i>
                    <input type="text" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
                </div>
            </form>

            <a href="{{ route('guests.index')}}" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current "></i></a>
            
            <a href="#" class="p-2 text-center ms-auto menu-icon" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false"><span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></a>
            <div class="dropdown-menu dropdown-menu-end p-4 rounded-3 border-0 shadow-lg" aria-labelledby="dropdownMenu3">
                
                <h4 class="fw-700 font-xss mb-4">Notification</h4>
                <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                    <img src="images/user-8.png" alt="user" class="w40 position-absolute left-0">
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">Hendrix Stamp <span class="text-grey-400 font-xsssss fw-600 float-right mt-1"> 3 min</span></h5>
                    <h6 class="text-grey-500 fw-500 font-xssss lh-4">There are many variations of pass..</h6>
                </div>
            </div>
            <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"><i class="feather-message-square font-xl text-current"></i></a>
            <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
                <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                <div class="dropdown-menu-settings switchcolor-wrap">
                    <h4 class="fw-700 font-sm mb-4">Settings</h4>
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                                <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="blue" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                                <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                                <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                                <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                                <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                            </label>
                        </li>

                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                                <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                                <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                                <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                                <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                                <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                            </label>
                        </li>
                    </ul>
                    
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Header Background</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu-color"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <a href="default-settings.html" class="p-0 ms-3 menu-icon"><img src="<?php echo url('sociala')?>/images/profile-4.png" alt="user" class="w40 mt--1"></a>
        </div>
        <!-- navigation top -->

         <!-- navigation left -->
         <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <!-- <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div> -->
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="{{ route('guests.index')}}" class="nav-content-bttn open-font" ><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>News Feed</span></a></li>
                            <li><a href="user-page.html" class="nav-content-bttn open-font"><i class="feather-user btn-round-md bg-primary-gradiant me-3"></i><span>Account Profile </span></a></li> 
                            <li><a href="{{ route('chatify', ['from_id' => ' ']) }}"  class="nav-content-bttn open-font" ><i class="feather-message-circle btn-round-md bg-red-gradiant me-3"></i><span>Messenger</span></a></li>                    
                        </ul>
                    </div>

                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="default-group.html" class="nav-content-bttn open-font" ><i class="feather-settings btn-round-md bg-mini-gradiant me-3"></i><span>Settings</span></a></li>   
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"class="nav-content-bttn open-font" ><i class="feather-log-out btn-round-md bg-gold-gradiant me-3"></i><span>Logout</span></a></li>                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation left -->

        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->
                    <div class="row feed-body">
                        <div class="col-xl-12">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3">
                                            <img src="{{ asset('images/photos/' . $template->user->photo) }}" alt="User Photo" class="shadow-sm rounded-circle w45">
                                        </figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $template->user->name }}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $template->created_at->diffForHumans() }}</span></h4>
                                    </div>

                                    <div class="card-body p-0 me-lg-6">
                                        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">
                                            {!! $template->description !!}
                                        </p>
                                    </div>

                                    <div class="card-body d-flex p-0 mt-3">
                                        <a href="#" class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                            <i class="feather-eye text-white bg-mini-gradiant me-1 btn-round-xs font-xss"></i>
                                            {{ $template->views > 0 ? $template->views : '0' }} Views
                                        </a>


                                        <a href="#" class="like-button emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2" data-template-id="{{ $template->id }}">
                                            <i class="like-icon {{ $template->isLikedByUser(auth()->user()) ? 'feather-thumbs-up' : 'feather-thumbs-down' }} text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i>
                                            <span id="likeCount-{{ $template->id }}" style="margin-right: 5px">{{ $template->likes->count() }}</span> Likes 
                                        </a>


                                        <a href="#" class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                            <i class="feather-message-circle text-white bg-gold-gradiant me-1 btn-round-xs font-xss"></i><span class="d-none-xss">{{ $template->comments->count() }} Comments </span>
                                        </a>
                                    </div>

                                     <!-- Display the latest 3 comments for this template -->
                                    <div class="card-body p-0 mt-3">
                                        <h5 class="fw-700 font-xsssss text-grey-900 mt-1 mb-2">All Comments</h5><hr>
                                        @forelse($template->comments as $comment)
                                            <div class="d-flex align-items-start">
                                                <img src="<?php echo url('theme')?>/dist/assets/images/users/avatar-9.png" alt="Profile" class="shadow-sm rounded-circle me-2" style="width: 40px; height: 40px;">
                                            
                                            <div>
                                                <p style="font-size: x-small; margin-bottom: 0px" class="fw-700 font-xssss lh-3 text-grey-900">{{ $comment->name }}</p>
                                                <p style="font-size: x-small; margin-bottom: 5px" class="fw-500 font-xssss lh-4 text-grey-900">{{ $comment->message }}</p>
                                                <p style="font-size: xx-small;" class="fw-300 font-xssss lh-4 text-grey-500">{{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        @empty
                                        <p style="font-size: x-small;">No comments posted.</p>
                                        @endforelse
                                    </div>

                                    <div class="card-body p-0 me-lg-6" style="margin-top: 20px; border-radius: 50px;">
                                        <form action="{{ route('comments.store') }}" method="post" >
                                            @csrf
                                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                            <input type="hidden" name="temp_id" value="{{ $template->id }}">
                                            <div class="input-group">
                                                <textarea name="message" class="form-control" placeholder="Write your comment here" style="height: 50px; border: 1px solid #ccc;"></textarea>
                                                <button type="submit" class="btn btn-success btn-sm"><i class="feather-send text-white btn-round-xs font-xss"></i></button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                        </div>
                    </div>


                </div>
            </div>            
        </div>
        <!-- main content -->

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">USERS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
        
            </div>
        </div>

        
        <!-- right chat -->

    </div> 

    <script src="<?php echo url('sociala')?>/js/plugin.js"></script>

    <script src="<?php echo url('sociala')?>/js/lightbox.js"></script>
    <script src="<?php echo url('sociala')?>/js/scripts.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const likeButtons = document.querySelectorAll('.like-button');
        
        likeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const templateId = button.getAttribute('data-template-id');
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
                        // Update button icon based on like status
                        const likeIcon = button.querySelector('.like-icon');
                        likeIcon.classList.toggle('feather-thumbs-up');
                        likeIcon.classList.toggle('feather-thumbs-down');

                        // Update total likes count
                        const likeCountElement = document.querySelector(`#likeCount-${templateId}`);
                        likeCountElement.textContent = data.totalLikes;
                    } else {
                        console.error(data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>




</body>

</html>