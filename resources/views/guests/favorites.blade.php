
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsfeed</title>

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

        .notification-card:hover {
            background-color: #000000; 
            transition: background-color 0.3s ease;
        }

    </style>
</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    <div class="main-wrapper">

       @include('guests.header')

       @include('guests.sidebar')

        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                @include('guests.loader')
                
                    <div class="row feed-body">
                        <div class="col-xl-12">
                            @forelse($favorites as $favorite)
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">


                                <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
                                    <button class="btn btn-sm btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton_{{ $favorite->template->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather" style="font-size: 20px;">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $favorite->template->id }}">
                                        @php
                                            $isFavorite = auth()->check() && $favorite->template->favorites()->where('user_id', auth()->user()->id)->exists();
                                        @endphp
                                        <li>
                                            <form id="saveToFavoritesForm_{{ $favorite->template->id }}" action="{{ route('save.to.favorites') }}" method="POST" class="save-to-favorites-form">
                                                @csrf
                                                <input type="hidden" name="temp_id" value="{{ $favorite->template->id }}">
                                                <button type="submit" class="dropdown-item save-to-favorites-btn">
                                                    @if($isFavorite)
                                                        <i class="feather-file-minus"></i>&nbsp; Unsave from Favorites
                                                    @else
                                                        <i class="feather-file-plus"></i>&nbsp; Save to Favorites
                                                    @endif
                                                </button>
                                            </form>
                                        </li>
                                        <!-- Add other dropdown items here if needed -->
                                    </ul>
                                </div>

                                <script>
                                $(document).ready(function() {
                                    $('.save-to-favorites-form').submit(function(e) {
                                        e.preventDefault();

                                        var form = $(this);
                                        var templateId = form.find('input[name="temp_id"]').val();

                                        $.ajax({
                                            type: 'POST',
                                            url: form.attr('action'),
                                            data: form.serialize(),
                                            success: function(response) {
                                                // Toggle button text and icon
                                                var dropdownToggle = $('#dropdownMenuButton_' + templateId);
                                                var isFavorite = response.isFavorite;

                                                if (isFavorite) {
                                                    dropdownToggle.find('.feather').removeClass('feather-file-plus').addClass('feather-heart');
                                                    dropdownToggle.html('<i class="feather-heart" style="font-size: 20px;"></i> Unsave from Favorites');
                                                } else {
                                                    dropdownToggle.find('.feather').removeClass('feather-heart').addClass('feather-file-plus');
                                                    dropdownToggle.html('<i class="feather-file-plus" style="font-size: 20px;"></i> Save to Favorites');
                                                }

                                                // Show success message
                                                alert(response.message);
                                            },
                                            error: function(xhr, status, error) {
                                                alert('An error occurred while saving to favorites.');
                                            }
                                        });
                                    });
                                });
                            </script>




                            <style>
                                .feather {
                                display: flex;
                                flex-direction: column;
                                margin-top: 15px;
                                margin-right: 15px;
                                }

                                .dot {
                                    width: 5px;
                                    height: 5px;
                                    background-color: #212529;
                                    border-radius: 50%;
                                    margin-top: 3px;
                                }

                                </style>


                                    <div class="card-body p-0 d-flex">
                                        <figure class="avatar me-3">
                                            <img src="{{ asset('images/photos/' . $favorite->template->user->photo) }}" alt="User Photo" class="shadow-sm rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        </figure>
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ $favorite->template->user->name }}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">{{ $favorite->template->created_at->diffForHumans() }}</span></h4>
                                    </div>

                                    <div class="card-body p-0 me-lg-6">
                                        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">
                                            <p class="fw-700 text-black lh-26 font-xss w-100">{{ $favorite->template->header }} </p>

                                            {!! Illuminate\Support\Str::limit($favorite->template->description, 150) !!}
                                            <a href="{{ route('guests.show', $favorite->template) }}" class="fw-600 text-primary ms-2"> Read more</a>
                                        </p>
                                    </div>

                                    <div class="card-body d-flex p-0 mt-3">
                                        <a href="#" class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                            <i class="feather-eye text-white bg-mini-gradiant me-1 btn-round-xs font-xss"></i>
                                            {{ $favorite->template->views > 0 ? $favorite->template->views : '0' }} Views
                                        </a>


                                        <a href="#" class="like-button emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2" data-template-id="{{ $favorite->template->id }}">
                                            <i class="like-icon {{ $favorite->template->isLikedByUser(auth()->user()) ? 'feather-thumbs-up' : 'feather-thumbs-down' }} text-white bg-blue-gradiant me-1 btn-round-xs font-xss"></i>
                                            <span id="likeCount-{{ $favorite->template->id }}" style="margin-right: 5px">{{ $favorite->template->likes->count() }}</span> Likes 
                                        </a>


                                        <a href="#" class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2">
                                            <i class="feather-message-circle text-white bg-gold-gradiant me-1 btn-round-xs font-xss"></i><span class="d-none-xss">{{ $favorite->template->comments->count() }} Comments </span>
                                        </a>
                                    </div>

                                     <!-- Display the latest 3 comments for this template -->
                                    <div class="card-body p-0 mt-3">
                                        <h5 class="fw-700 font-xsssss text-grey-900 mt-1 mb-2">Latest Comments</h5><hr>
                                        @forelse($favorite->template->comments as $comment)
                                            <div class="d-flex align-items-start">
                                            @php
                                                // Find the user with the same name as the comment's name
                                                $user = \App\Models\User::where('name', $comment->name)->first();

                                                // Check if the user exists and has a photo
                                                $userPhoto = $user ? (!empty($user->photo) ? asset('images/photos/' . $user->photo) : url('theme/dist/assets/images/users/avatar-9.png')) : url('theme/dist/assets/images/users/avatar-9.png');
                                            @endphp
                                            <img src="{{ $userPhoto }}" alt="Profile" class="shadow-sm rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                            <div>
                                                <p style="font-size: x-small; margin-bottom: 0px" class="fw-700 font-xssss lh-3 text-grey-900">{{ $comment->name }}</p>
                                                <p style="font-size: x-small; margin-bottom: 5px" class="fw-500 font-xssss lh-4 text-grey-900">{{ Illuminate\Support\Str::limit($comment->message, 200) }}</p>
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
                                            <input type="hidden" name="temp_id" value="{{ $favorite->template->id }}">
                                            <div class="input-group">
                                                <textarea name="message" class="form-control" placeholder="Write your comment here" style="height: 50px; border: 1px solid #ccc;"></textarea>
                                                <button type="submit" class="btn btn-success btn-sm"><i class="feather-send text-white btn-round-xs font-xss"></i></button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            @empty
                                No blog saved to favorites.
                            @endforelse
                        </div>

                        <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                            <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                <div class="stage">
                                    <div class="dot-typing"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>            
        </div>
        <!-- main content -->

        
        @include('guests.chat')

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