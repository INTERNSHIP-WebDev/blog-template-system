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
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/regular.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<!-- Post Comment -->
						<div class="post_comment">
							<div class="contact_form_container">
								<form action="#">
									<input type="text" class="contact_input contact_input_name" placeholder="Your Name" required="required">
									<input type="email" class="contact_input contact_input_email" placeholder="Your Email" required="required">
									<textarea class="contact_text" placeholder="Your Message" required="required"></textarea>
									<button type="submit" class="contact_button">Send Message</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
@endsection