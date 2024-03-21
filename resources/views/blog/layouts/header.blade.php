<!DOCTYPE html>
<html lang="en">

<head>
	<title>Post</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Demo project">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- LINK TAGS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/bootstrap4/bootstrap.min.css') }}">
	<link href="{{ asset('landing_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/contact.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/post_nosidebar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/post_nosidebar_responsive.css') }}">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<!-- Bootstrap Css -->
	<link href="<?php echo url('theme') ?>/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="<?php echo url('theme') ?>/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />


	<style>
		.rounded-circle {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			object-fit: cover;
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(10px);
			border: 2px solid rgba(255, 255, 255, 0.5);
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			animation: logoAnimation 2s ease-in-out infinite;
		}

		@keyframes logoAnimation {
			0% {
				transform: scale(1);
			}

			50% {
				transform: scale(1.1);
			}

			100% {
				transform: scale(1);
			}
		}
	</style>

</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<!-- <div class="logo">
								@if ($template->logo)
								<img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="rounded-circle">
								@else
								No photo
								@endif
							</div> -->

							<nav class="main_nav">
								<ul>
									<li><a href="/">Home</a></li>
									@if(isset($template_id))
									@else
									@php
									$template_id = $template->id
									@endphp
									@endif
									@if(isset($contacts))
									<li><a href="{{ route('view_blog', ['id' => $template_id]) }}">This Post</a></li>
									<li class="active"><a href="#">Contact</a></li>
									@else
									<li class="active"><a href="#">This Post</a></li>
									<li><a href="{{ route('blog_contacts', ['id' => $template_id]) }}">Contact</a></li>
									@endif
								</ul>
							</nav>
							<div class="search_container ml-auto">
								<div class="weather">
									<div class="temperature">+10°</div>
									<img class="weather_icon" src="images/cloud.png" alt="">
								</div>
								<form action="#">
									<input type="search" class="header_search_input" required="required" placeholder="Type to Search...">
									<img class="header_search_icon" src="images/search.png" alt="">
								</form>

							</div>
							<div class="hamburger ml-auto menu_mm">
								<i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>