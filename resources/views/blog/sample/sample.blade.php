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

// BLOG DUMMY DATA
$blogs_string = '{
    "header": "Hello this is a header hi hello yohoo it works lezgoowww",
    "author": "Clint Joshua Garcia",
    "created": "2002-06-04 00:00:00",
    "category": "JITS"
}';
$blog = json_decode($blogs_string);

// LATEST BLOGS DUMMY DATA
$latest_string = '{
    "first": {
        "header": "Paano Tinapos ni Clint Lahat ng Projects sa Pixzel",
        "author": "Juice Seal East Scalar",
        "created": "2002-06-04 00:00:00",
        "image": "landing_assets/images/images/post_2.jpg"
    },
    "second": {
        "header": "Ang Alamat ng JITS Fund",
        "author": "Nissi Cup Noodles",
        "created": "2002-06-04 00:00:00",
        "image": "landing_assets/images/images/post_13.jpg"
    },
    "third": {
        "header": "How to Jab | Tutorial",
        "author": "Habibi Hamdain",
        "created": "2002-06-04 00:00:00",
        "image": "landing_assets/images/images/post_26.jpg"
    },
    "fourth": {
        "header": "How to Fly like an Anjel",
        "author": "Anjel Babanto",
        "created": "2002-06-04 00:00:00",
        "image": "landing_assets/images/images/post_27.jpg"
    } 
}';
$latest = json_decode($latest_string);

?>
@extends("blog.layouts.layout", ['socials' => $socials])

@section("title", "Sample Blog")

@section("content")
	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">jea</a></div>
		<div class="search">
			<form action="#">
				<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
				<img class="header_search_icon menu_mm" src="landing_assets/images/search_2.png" alt="">
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.html">home</a></li>
				<li class="menu_mm"><a href="#">This Post</a></li>
				<li class="menu_mm"><a href="contact.html">Contact</a></li>
			</ul>
		</nav>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="landing_assets/images/post_nosidebar.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="post_category trans_200"><a href="category.html" class="trans_200">{{ $blog->category }}</a></div>
			<div class="post_title">{{ $blog->header }}</div>
			<div class="post_author d-flex flex-row align-items-center justify-content-center">
				<div class="author_image"><div><img src="landing_assets/images/author.jpg" alt=""></div></div>
				<div class="post_meta"><a href="#">{{ $blog->author }}</a><span>{{ $blog->created }}<!--Sep 29, 2017 at 9:48 am--></span></div>
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

						<div class="post_body">
							<p class="post_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus eget purus id felis dignissim convallis. Suspendisse et augue dui. Morbi gravida sed justo vel venenatis. Ut tempor pretium maximus. Donec libero diam, faucibus vitae lectus nec, accumsan gravida dui. Nam interdum mi eget lacus aliquet, sit amet ultricies magna pharetra. In ut odio a ligula egestas pretium et quis sapien. Etiam faucibus magna eu porta vulputate. Aliquam euismod rhoncus malesuada. Nunc rutrum hendrerit semper.</p>
							<figure>
								<img src="landing_assets/images/post_body.jpg" alt="">
								<figcaption>Lorem Ipsum Dolor Sit Amet</figcaption>
							</figure>
							<p class="post_p">Maecenas vitae sem varius, imperdiet nisi a, tristique nisi. Sed scelerisque suscipit leo cursus accumsan. Donec vel turpis quam. Mauris non nisl nec nunc gravida ullamcorper id vestibulum magna. Donec non velit finibus, laoreet arcu nec, facilisis augue. Aliquam sed purus id erat accumsan congue. Mauris semper ullamcorper nibh non pellentesque. Aenean euismod purus sit amet quam vehicula ornare.</p>
							<div class="post_quote">
								<p class="post_p">Aliquam auctor lacus a dapibus pulvinar. Morbi in elit erat. Quisque et augue nec tortor blandit hendrerit eget sit amet sapien. Curabitur at tincidunt metus, quis porta ex. Duis lacinia metus vel eros cursus pretium eget.</p>
								<div class="post_quote_source">Robert Morgan</div>
							</div>
							<p class="post_p">Donec orci dolor, pretium in luctus id, consequat vitae nibh. Quisque hendrerit, lorem sit amet mollis malesuada, urna orci volutpat ex, sed scelerisque nunc velit et massa. Sed maximus id erat vel feugiat. Phasellus bibendum nisi non urna bibendum elementum. Aenean tincidunt nibh vitae ex facilisis ultrices. Integer ornare efficitur ultrices. Integer neque lectus, venenatis at pulvinar quis, aliquet id neque. Mauris ultrices consequat velit, sed dignissim elit posuere in. Cras vitae dictum dui.</p>

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
						<div class="grid clearfix">
							<!-- Small Card With Image -->
                            @foreach ($latest as $key => $post) {
                                <div class="card card_small_with_image grid-item">
								<img class="card-img-top" src="{{ asset($post->image) }}" alt="https://unsplash.com/@jakobowens1">
								<div class="card-body">
									<div class="card-title card-title-small"><a href="post.html">{{ $post->header }}</a></div>
									<small class="post_meta"><a href="#">{{ $post->author }}</a><span>{{ $post->created }}</span></small>
								</div>
							</div>
                            }
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
							<form action="#">
								<input type="text" class="comment_input comment_input_name" placeholder="Your Name" required="required">
								<input type="email" class="comment_input comment_input_email" placeholder="Your Email" required="required">
								<textarea class="comment_text" placeholder="Your Comment" required="required"></textarea>
								<button type="submit" class="comment_button">Post Comment</button>
							</form>
						</div>
					</div>

					<!-- Comments -->
					<div class="comments">
						<div class="comments_title">Comments <span>(12)</span></div>
						<div class="comments_container">
							<ul class="comment_list">
								<li class="comment">
									<div class="comment_body">
										<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
											<div class="comment_author_image"><div><img src="landing_assets/images/comment_author_1.jpg" alt=""></div></div>
											<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
											<button type="button" class="reply_button ml-auto">Reply</button>
										</div>
										<div class="comment_content">
											<p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.</p>
										</div>
									</div>

									<!-- Reply -->
									<ul class="comment_list">
										<li class="comment">
											<div class="comment_body">
												<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
													<div class="comment_author_image"><div><img src="landing_assets/images/comment_author_2.jpg" alt=""></div></div>
													<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
													<button type="button" class="reply_button ml-auto">Reply</button>
												</div>
												<div class="comment_content">
													<p>Nulla facilisi. Aenean porttitor quis tortor id tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus molestie varius tincidunt. Vestibulum congue sed libero ac sodales.</p>
												</div>
											</div>

											<!-- Reply -->
											<ul class="comment_list">
												
											</ul>
										</li>
									</ul>
								</li>
								<li class="comment">
									<div class="comment_body">
										<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
											<div class="comment_author_image"><div><img src="landing_assets/images/comment_author_1.jpg" alt=""></div></div>
											<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
											<button type="button" class="reply_button ml-auto">Reply</button>
										</div>
										<div class="comment_content">
											<p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.</p>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="load_more">
						<div id="load_more" class="load_more_button text-center trans_200">Load More</div>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
