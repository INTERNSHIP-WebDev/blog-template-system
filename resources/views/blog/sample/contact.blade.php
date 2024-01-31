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
    width: 70px;
    height: 70px; 
    border-radius: 50%;
    object-fit: cover; 
}
</style>

@extends("blog.layouts.layout", ['socials' => $socials])

@section("title", "Sample Blog")

@section("content")
	<!-- Menu -->
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm">
			@if ($template->logo)
				<img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="rounded-circle">
			@else
				No photo
			@endif
		</div>
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
				<li class="menu_mm"><a class="active" href="contact.html">Contact</a></li>
			</ul>
		</nav>
	</div>
    <!-- Home -->
    <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing_assets/images/regular.jpg') }}" data-speed="0.8"></div>
		<div class="home_content">
			<div class="container">
				@if(session('status'))
				<div id="status_card" class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="status_card">
						<h5>Comment posted successfully</h5>
						</div>
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<!-- Post Comment -->
						<div class="post_comment">
							<div class="contact_form_container">
								<form action="{{ route('send_specific_concern', ['id' => $template->id]) }}" method="post">
									@csrf
									<div>
										<input type="text" class="contact_input contact_input_name" placeholder="Your Name" required="required">
										<input type="email" class="contact_input contact_input_email" placeholder="Your Email" required="required">
										<textarea class="contact_text" placeholder="Your Message" required="required"></textarea>
										<button type="submit" class="contact_button">Send Message</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
@endsection