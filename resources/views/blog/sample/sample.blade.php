{{-- Your Blade file --}}
<?php
// FOOTER SOCIALS DUMMY DATA
$socials = [
	'facebook' => TRUE,
	'twitter' => FALSE,
	'pinterest' => TRUE,
	'instagram' => TRUE,
	'google' => TRUE
];
?>

<style>
	.rounded-circle {
		width: 50px;
		height: 50px;
		border-radius: 50%;
		object-fit: cover;
	}

	.home_content {
		position: relative;
		padding: 10px 0px;
		border: 2px solid transparent;
		animation: borderAnimation 1s ease-in-out forwards;
		background-color: rgba(255, 255, 255, 0.1);
		backdrop-filter: blur(10px);
		border-radius: 10px;
	}

	@keyframes borderAnimation {
		to {
			border-color: #fff;
		}
	}

	.post_title {
		opacity: 0;
		animation: fadeIn 3s ease-in-out forwards;
	}

	@keyframes fadeIn {
		to {
			opacity: 1;
		}
	}

	.post_body {
		max-width: 100%;
		overflow-x: hidden;
		background: rgba(255, 255, 255, 0.9);
		border-radius: 10px;
		padding: 20px;
		-webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.9);
		box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.9);
		animation: fadeInOne 1s ease-in-out;
		position: relative;
	}

	.post_body::before,
	.post_body::after {
		content: "";
		position: absolute;
		width: 15px;
		height: 15px;
		background-color: #36454f;
		border-radius: 50%;
		top: 7px;
		left: 50%;
	}

	.post_body::before {
		transform: translateX(60%);
	}

	.post_body::after {
		transform: translateX(-60%);
	}

	.post_tags {
		margin-top: 15px;
	}

	.post_tag {
		display: inline-block;
		margin-right: 10px;
		margin-bottom: 10px;
		background: #3498db;
		color: #fff;
		border-radius: 5px;
		text-decoration: none;
	}

	.post_share {
		margin-top: 15px;
	}

	.post_share span {
		font-weight: bold;
		margin-right: 10px;
	}

	.post_share_list {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.post_share_item {
		display: inline-block;
		margin-right: 10px;
	}

	.post_share_item a {
		color: #3498db;
		text-decoration: none;
		font-size: 20px;
		transition: color 0.3s ease-in-out;
	}

	.post_share_item a:hover {
		color: #2980b9;
	}

	@keyframes fadeInOne {
		0% {
			opacity: 0;
			transform: translateY(20px);
		}

		100% {
			opacity: 1;
			transform: translateY(0);
		}
	}

	hr {
		border-top: 2px solid #2980b9;
		margin-top: 20px;
		margin-bottom: 20px;
	}

</style>

@extends("blog.layouts.layout", ['socials' => $socials, 'template_id' => $template->id])

@section("title", "Sample Blog")

@section("content")
<!-- Menu -->
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<div class="menu_close_container">
		<div class="menu_close">
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- <div class="logo menu_mm">
		@if ($template->logo)
		<img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="rounded-circle">
		@else
		No photo
		@endif
	</div> -->
	<div class="search">
		<form action="#">
			<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
			<img class="header_search_icon menu_mm" src="{{ asset('landing_assets/images/search_2.png') }}" alt="">
		</form>
	</div>
	<nav class="menu_nav">
		<ul class="menu_mm">
			<li class="menu_mm"><a href="index.html">home</a></li>
			<li class="menu_mm"><a href="#">This Post</a></li>
			<li class="menu_mm"><a href="#">Contact</a></li>
		</ul>
	</nav>
</div>






<!-- Home -->
<div class="home">
	@php
	$bannerUrl = asset($banner_dir . $template->banner);
	@endphp
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ $bannerUrl }}" data-speed="1"></div>
	<div class="home_content">
		<div class="post_category trans_200"><a href="category.html" class="trans_200">{{ $template->category->text }}</a></div>
		<div class="post_title">{{ $template->header }}</div>
		<div class="post_author d-flex flex-row align-items-center justify-content-center">
			<div class="author_image">
				<div><img src="{{ asset('/imaes/logos/logo_1706680612.png') }}" alt=""></div>
			</div>
			<div class="post_meta"><a href="#">{{ $template->user->name }}</a><span>{{ $formattedtimestamp }}<!--Sep 29, 2017 at 9:48 am--></span><span>{{ $templateViews }} Views<!--Sep 29, 2017 at 9:48 am--></span></div>
		</div>
	</div>
</div>


<!-- Page Content -->

<div class="page_content">
	<div class="container">
		<div class="row">

			<!-- Post Content -->

			<div class="col-lg-10 offset-lg-1">
				<div class="post_content">

					<!-- Post Body -->

					<div class="post_body" style="max-width: 100%; overflow-x: hidden;">
						<p> {!! $template->description !!}</p>


						<!-- Post Tags and Share-->
						<div class="tags_share d-flex flex-row align-items-center justify-content-start">
							<div class="post_tags">
								<ul>
									<li class="post_tag"><a href="#">Liberty</a></li>
									<li class="post_tag"><a href="#">Manual</a></li>
									<li class="post_tag"><a href="#">Interpretation</a></li>
									<li class="post_tag"><a href="#">Recommendation</a></li>
								</ul>
							</div>
							<div class="post_share ml-sm-auto">
								<span>share</span>
								<ul class="post_share_list">
									<li class="post_share_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li class="post_share_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li class="post_share_item"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<br>
		<br>
		<hr>

		<div class="row">
			<div class="col">
				<!-- Similar Posts -->
				<div class="similar_posts">
					<div class="grid-experiment clearfix">

						<!-- Small Card With Image -->
						@php
						// Fetch 4 random templates
						$randomTemplates = \App\Models\Template::inRandomOrder()->limit(4)->get();

						// Loop through each template to count the likes
						foreach ($randomTemplates as $template) {
						$template->likeCount = $template->likes()->count(); // Count the likes for each template
						}
						@endphp

						@forelse($randomTemplates as $template)
						<div class="card card_small_with_image grid-item">
							<img class="card-img-top" src="{{ asset('images/banners/' . $template->banner) }}" width="300" height="165" style="object-fit: cover;">
							<div class="card-body">
								<div class="card-title card-title-small"><a href="{{ url('post/' . $template->id) }}">{{$template->id}} {!! $template->header ? \Illuminate\Support\Str::limit(strip_tags($template->header), 21, $end='...') : "Blog has no header" !!}</a></div>
								<div class="text-center"><i class="bi bi-eye align-middle me-1"></i>{{ $template->views ?? 0}}
								<i class="bx bx-like align-middle me-1"></i>{{ $template->likeCount }}
								<i class="bx bx-comment-dots align-middle me-1"></i>{{ $template->comments->count() }}</div>
								<small class="post_meta"><a href="{{ url('post/' . $template->id) }}">{{ $template->user->name }}</a><span>{{ $template->created_at->format('d M, Y') }}</span></small>
							</div>
						</div>
						@empty
						<tr>
							<td colspan="6" class="text-muted">No posts found.</td>
						</tr>
						@endforelse


					</div>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 offset-lg-3">

				<!-- Post Comment -->
				<div class="post_comment">
					<div class="post_comment_title">Post Comment</div>
					<div class="post_comment_form_container">
						<form action="{{ route('create_comment', ['id' => $template->id]) }}">
							@csrf
							<input type="text" class="comment_input comment_input_name" name="username" placeholder="Your Name" required="required">
							<textarea class="comment_text" placeholder="Your Comment" name="comment" required="required"></textarea>
							<button type="submit" class="comment_button">Post Comment</button>
						</form>
					</div>
				</div>

				<!-- Comments -->
				<div class="comments">
					<div class="comments_title">Comments <span>({{ $comment_count }})</span></div>
					<div class="comments_container mb-5">
						<ul class="comment_list">
							@forelse ($firstFiveComments as $key => $comment)
							@php
							$formattedtimestamp = $comment->created_at->format('F j, Y');
							@endphp
							<li class="comment">
								<div class="comment_body">
									<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
										<div class="comment_author_image">
											<div><img src="{{ asset('/images/logos/logo_1706680612.png') }}" alt=""></div>
										</div>
										<small class="post_meta"><a href="#">{{ $comment->name }}</a><span>{{ $formattedtimestamp }}</span></small>
										<button type="button" class="reply_button ml-auto">Reply</button>
									</div>
									<div class="comment_content">
										<p>{{ $comment->message }}</p>
									</div>
								</div>
							</li>
							@empty
							<li class="comment">
								<div class="comment_body">
									<p>No comments available.</p>
								</div>
							</li>
							@endforelse
						</ul>
						<ul class="comment_list remaining-comments" style="display: none;">
							@foreach ($remainingComments as $key => $comment)
							@php
							$formattedtimestamp = $comment->created_at->format('F j, Y');
							@endphp
							<li class="comment">
								<div class="comment_body">
									<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
										<div class="comment_author_image">
											<div><img src="{{ asset('landing_assets/images/comment_author_1.jpg') }}" alt=""></div>
										</div>
										<small class="post_meta"><a href="#">{{ $comment->name }}</a><span>{{ $formattedtimestamp }}</span></small>
										<button type="button" class="reply_button ml-auto">Reply</button>
									</div>
									<div class="comment_content">
										<p>{{ $comment->message }}</p>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				@if($remainingComments->count() == 0)
				@else
				<div class="load_more">
					<div id="load_more" class="load_more_button text-center trans_200">Load More</div>
				</div>
				<div class="see_fewer">
					<div id="see_fewer" class="load_more_button text-center trans_200">See Fewer</div>
				</div>
				@endif
			</div>
		</div>
	</div>

</div>


<!-- Popup Modal -->
<div id="myModal" class="modal">
	<div class="advertisement-label">Advertisement</div><br><br>

		<div class="modal-body" id="adContent"></div>

	<button class="countdown-label" id="skipButton" style="display: none;"><i class="bx bx-fast-forward"></i> Skip Ad</button>
	<div class="countdown-label" id="countdownTimer" style="display: none;">Skip Ad in <span id="countdownValue">5</span></div>
	<div class="countdown-label" id="imgcountdownTimer" style="display: none;">Close Ad in <span id="imgcountdownValue">10</span></div>
</div>


<style>
    .modal {
        display: none;
		justify-content: center;
		align-items: center;
        position: fixed;
        z-index: 9999;
        left: 50%;
        top: 75%;
        transform: translate(-50%, -50%);
        width: 600px; 
    }


    .advertisement-label {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.2);
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        animation: fadeIn 2s ease-in-out; 
		margin-bottom: 500px;
    }

	.countdown-label {
        position: absolute;
        margin-bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.2);
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
		margin-bottom: 500px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9998;
    }

    .modal-body img,
    .modal-body video {
		width: auto;
		max-height: 300px;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0 auto;
    }
</style>


@if ($templateViews >= 500)
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById("myModal");
        var adContent = document.getElementById("adContent");
        var skipButton = document.getElementById("skipButton");
        var countdownTimer = document.getElementById("countdownTimer");
        var countdownValue = document.getElementById("countdownValue");
        var imgcountdownTimer = document.getElementById("imgcountdownTimer");
        var imgcountdownValue = document.getElementById("imgcountdownValue");
        var fileNames = [];
        var countdownStarted = false;

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        @php
        // Filter ads with priority 'yes'
        $priorityAds = $ads->filter(function($ad) {
            return $ad->priority == 'yes';
        });
        @endphp

        @foreach ($priorityAds as $ad)
        fileNames.push('{{ $ad->name }}');
        @endforeach

        // Shuffle function using Fisher-Yates algorithm
        function shuffleArray(array) {
            for (var i = array.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = array[i];
                array[i] = array[j];
                array[j] = temp;
            }
            return array;
        }

        fileNames = shuffleArray(fileNames);

        var randomIndex = getRandomInt(0, fileNames.length - 1);
        var randomFileName = fileNames[randomIndex];

        // Function to close the modal and remove overlay
        function closeModal() {
            modal.style.display = "none";
            var overlay = document.querySelector(".modal-overlay");
            if (overlay) {
                overlay.parentNode.removeChild(overlay);
            }
            document.body.style.overflow = "";
            // Check if the content inside the modal is a video element and pause it
            var videoElement = adContent.querySelector("video");
            if (videoElement) {
                videoElement.pause();
            }
        }

        // Function to start the countdown timer
        function startCountdown() {
            if (!countdownStarted) {
                countdownStarted = true;
                countdownTimer.style.display = "block";
                var count = 5;
                countdownValue.textContent = count;
                countdownInterval = setInterval(function() {
                    count--;
                    countdownValue.textContent = count;
                    countdownTimer.textContent = "Skip Ad in " + count;

                    if (count <= 0) {
                        clearInterval(countdownInterval);
                        countdownTimer.style.display = "none";
                        skipButton.style.display = "block";
                    }
                }, 1000);
            }
        }

        // Function to start the countdown timer for images
        function imgStartCountdown() {
            if (!countdownStarted) {
                countdownStarted = true;
                imgcountdownTimer.style.display = "block";
                var count = 10;
                imgcountdownValue.textContent = count;
                countdownInterval = setInterval(function() {
                    count--;
                    imgcountdownValue.textContent = count;
                    imgcountdownTimer.textContent = "Close Ad in " + count;

                    if (count <= 0) {
                        clearInterval(countdownInterval);
                        imgcountdownTimer.style.display = "none";
                    }
                }, 1000);
            }
        }

        // Add event listener to the skip button
        skipButton.addEventListener("click", function() {
            closeModal();
        });

        var fileType = '{{ $ad->file_type }}';

        if (fileType === 'Video') {
            var videoElement = document.createElement('video');
            videoElement.setAttribute('controls', true);
            videoElement.setAttribute('autoplay', true);
            var sourceElement = document.createElement('source');
            sourceElement.setAttribute('src', '{{ asset("images/ads/") }}/' + randomFileName);
            sourceElement.setAttribute('type', 'video/mp4');
            videoElement.appendChild(sourceElement);
            adContent.appendChild(videoElement);

            videoElement.addEventListener("play", function() {
                if (videoElement.duration > 30) {
                    startCountdown();
                }
            });

            videoElement.addEventListener("ended", function() {
                closeModal();
            });

            if (videoElement.duration < 30) {
                videoElement.addEventListener("seeking", function() {
                    videoElement.currentTime = 0;
                });
            }

        } else if (fileType === 'Image' || fileType === 'GIF') {
            var imgElement = document.createElement('img');
            imgElement.setAttribute('src', '{{ asset("images/ads/") }}/' + randomFileName);
            imgElement.setAttribute('alt', 'Advertisement File');
            adContent.appendChild(imgElement);
            imgStartCountdown();

            setTimeout(function() {
                closeModal();
            }, 10000);
        }

        var randomDelay = Math.floor(Math.random() * 2000);
        setTimeout(function() {
            var overlay = document.createElement("div");
            overlay.classList.add("modal-overlay");
            document.body.appendChild(overlay);
            modal.style.display = "block";
            document.body.style.overflow = "hidden";
        }, randomDelay);
    });
</script>
@endif

@endsection