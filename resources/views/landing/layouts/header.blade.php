<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blog | Travel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Demo project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/bootstrap4/bootstrap.min.css') }}">
	<link href="landing_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('landing_assets/styles/responsive.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css" integrity="sha512-Aa+z1qgIG+Hv4H2W3EMl3btnnwTQRA47ZiSecYSkWavHUkBF2aPOIIvlvjLCsjapW1IfsGrEO3FU693ReouVTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo">
								<a href="{{ url('/') }}">
									BLOG | {{ isset($selectedCategory) ? (str_word_count($selectedCategory->text) > 1 ? implode(' ', array_slice(explode(' ', $selectedCategory->text), 0, 1)) . '...' : $selectedCategory->text) : 'ALL' }}
								</a>
							</div>
							<nav class="main_nav">
								<ul>
									<li class="active"><a href="{{ url('/') }}">Home</a></li>
									<!-- <li><a href="#">Fashion</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Lifestyle</a></li> -->
									<li><a href="{{ route('about') }}">About</a></li>
									<li><a href="{{ route('concern.index') }}">Contact</a></li>
									@if (Route::has('login'))
									@auth
									<li><a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">You are Logged in as {{ Auth::user()->name }}</a></li>
									@else
									<li><a href="{{ route('login') }}" class=""> &nbsp; Log in </a></li>
									@if (Route::has('register'))
									<li><a href="{{ route('login') }}" class=""> &nbsp; Register </a></li>
									@endif
									@endauth
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