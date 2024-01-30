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
@extends("blog.layouts.layout", ['socials' => $socials, 'template_id' => $template->id])

@section("title", "Sample Blog")

@section("content")

	@if (isset($status))
		<div class="alert alert-success" role="alert">
			{{ $status }}
		</div>
	@endif
	<!-- Menu -->
	{{  }}
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">jea</a></div>
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
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ $bannerUrl }}" data-speed="0.8"></div>
		<div class="home_content">
			<div class="post_category trans_200"><a href="category.html" class="trans_200">{{ $template->category->text }}</a></div>
			<div class="post_title">{{ $template->header }}</div>
			<div class="post_author d-flex flex-row align-items-center justify-content-center">
				<div class="author_image"><div><img src="{{ asset('landing_assets/images/author.jpg') }}" alt=""></div></div>
				<div class="post_meta"><a href="#">{{ $template->user->name }}</a><span>{{ $formattedtimestamp }}<!--Sep 29, 2017 at 9:48 am--></span></div>
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

						<div class="post_body"  style="max-width: 100%; overflow-x: hidden;">
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

			<div class="row">
				<div class="col">
					<!-- Similar Posts -->
					<div class="similar_posts">
						<div class="grid-experiment clearfix">
							<!-- Small Card With Image -->
							@foreach ($latest as $key => $post)
								<div class="card card_small_with_image grid-item">
									@php
										$imageUrl = asset($banner_dir . $post->banner);
									@endphp
									<img class="card-img-top" src="{{ $imageUrl }}" alt="{{ $post->header }}">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">{{ $post->header }}</a></div>
										<small class="post_meta"><a href="#">{{ $post->author }}</a><span>{{ $post->created }}</span></small>
									</div>
								</div>
							@endforeach

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
						<div class="comments_container">
							<ul class="comment_list">
							@forelse ($firstFiveComments as $key => $comment) 
								@php
									$formattedtimestamp = $comment->created_at->format('F j, Y');
								@endphp
								<li class="comment">
									<div class="comment_body">
										<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
											<div class="comment_author_image"><div><img src="{{ asset('landing_assets/images/comment_author_1.jpg') }}" alt=""></div></div>
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
												<div class="comment_author_image"><div><img src="{{ asset('landing_assets/images/comment_author_1.jpg') }}" alt=""></div></div>
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
					<div class="load_more">
						<div id="load_more" class="load_more_button text-center trans_200">Load More</div>
					</div>
					<div class="see_fewer">
						<div id="see_fewer" class="load_more_button text-center trans_200">See Fewer</div>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
