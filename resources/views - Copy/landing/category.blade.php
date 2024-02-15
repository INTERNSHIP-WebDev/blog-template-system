{{-- LAYOUT --}}
@extends("landing.layouts.layout")

@section("content")


<style>
	.home {
		position: relative;
		height: 500px;
		overflow: hidden;
	}

	.home_slider_background {
		width: 100%;
		height: 100%;
		background-size: cover;
		position: relative;
	}

	.snowflakes {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		pointer-events: none;
		z-index: 1;
		animation: snowfall 10s linear 0s infinite;
	}

	.snowflake {
		position: absolute;
		background-color: #fff;
		border-radius: 50%;
	}

	@keyframes snowfall {
		0% {
			transform: translateY(100%);
		}

		100% {
			transform: translateY(-100%);
		}
	}

</style>
<!-- Home -->

<!-- <div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing_assets/images/post_15.jpg') }}" data-speed="0.8"></div>
</div> -->
<div class="home mb-5">
	<div class="home_slider_container">
		<div class="owl-carousel owl-theme home_slider">
			<div class="owl-item">
				<div class="home_slider_background" style="background-image: url(' {{ asset('landing_assets/images/post_7.jpg') }} ');">
					<div class="snowflakes" id="snow-container"></div>
				</div>
				<div class="home_slider_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const snowContainer = document.getElementById("snow-container");

    function createSnowflake() {
      const snowflake = document.createElement("div");
      snowflake.className = "snowflake";
      snowflake.style.width = `${Math.random() * 4 + 1}px`; 
      snowflake.style.height = snowflake.style.width;
      snowflake.style.top = `${Math.random() * 100}vh`;
      snowflake.style.left = `${Math.random() * 100}vw`;
      snowContainer.appendChild(snowflake);
    }

    function createSnowfall() {
      for (let i = 0; i < 150; i++) {

        createSnowflake();
      }
    }

    createSnowfall();
  });
</script>


<!-- Page Content -->

<div class="page_content">
	<div class="container">
		<div class="row row-lg-eq-height">

			<!-- Main Content -->

			<div class="col-lg-9">
				<div class="main_content">

					<!-- Category -->

					<div class="category">
						<div class="section_panel d-flex flex-row align-items-center justify-content-start">
							<div class="section_title">{{ \Illuminate\Support\Str::limit(strip_tags($selectedCategory->text), 12, $end='...') }}</div>

							<div class="section_tags ml-auto">

								<ul>
									<li><a href="{{ url('/') }}">all</a></li>
									@if($selectedCategory)
									<li class="active"><a href="{{ url('category/' . $selectedCategory->id) }}">{{ $selectedCategory->text }}</a></li>
									@php
									$remainingCategories = $categories->reject(function ($category) use ($selectedCategory) {
									return $category->id === $selectedCategory->id;
									})->sortByDesc('created_at')->take(2);
									@endphp
									@forelse($remainingCategories as $category)
									<li><a href="{{ url('category/' . $category->id) }}">{{ \Illuminate\Support\Str::limit(strip_tags($category->text), 15, $end='...') }}</a></li>
									@empty
									<li>No categories available</li>
									@endforelse
									@else
									@forelse($categories->sortByDesc('created_at')->take(3) as $category)
									<li><a href="{{ url('category/' . $category->id) }}">{{ \Illuminate\Support\Str::limit(strip_tags($category->text), 15, $end='...') }}</a></li>
									@empty
									<li>No categories available</li>
									@endforelse
									@endif
								</ul>

							</div>

							<div class="section_panel_more">
								<ul>
									<li>more
										<ul>
											@forelse($categories->sortByDesc('created_at')->slice(3) as $category)
											<li><a href="{{ url('category/' . $category->id) }}">{{ $category->text }}</a></li>
											@empty
											<li>No categories available</li>
											@endforelse
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="section_content">
							<div id="more_category">
								@include('landing.more_category')
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- Sidebar -->

			<div class="col-lg-3">
				<div class="sidebar">
					<div class="sidebar_background"></div>

					<!-- Top Stories -->

					<div class="sidebar_section">
						<div class="sidebar_title_container">
							<div class="sidebar_title">Latest Articles</div>
							<div class="sidebar_slider_nav">
								<div class="custom_nav_container sidebar_slider_nav_container">
									<div class="custom_prev custom_prev_top">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
											<polyline fill="#bebebe" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
										</svg>
									</div>
									<ul id="custom_dots" class="custom_dots custom_dots_top">
										<li class="custom_dot custom_dot_top active"><span></span></li>
										<li class="custom_dot custom_dot_top"><span></span></li>
										<li class="custom_dot custom_dot_top"><span></span></li>
									</ul>
									<div class="custom_next custom_next_top">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
											<polyline fill="#bebebe" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
										</svg>
									</div>
								</div>
							</div>
						</div>
						<div class="sidebar_section_content">

							<!-- Top Stories Slider -->
							<div class="sidebar_slider_container">
								<div class="owl-carousel owl-theme sidebar_slider_top">

									<!-- Top Stories Slider Item -->
									<div class="owl-item">
										<!-- Sidebar Posts -->
										@forelse($sidebarPosts->sortByDesc('created_at')->take(5) as $sidebarPost)
										<div class="side_post">
											<a href="{{ url('post/' . $sidebarPost->id) }}">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div>
															<img src="{{ asset('images/banners/' . $sidebarPost->banner) }}" alt="{{ $sidebarPost->header }}" width="50" height="50">
														</div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">{{ $sidebarPost->id }}{!! $sidebarPost->header ? \Illuminate\Support\Str::limit(strip_tags($sidebarPost->header), 22, $end='...') : "Blog has no header" !!}</div>
														@if($sidebarPost && $sidebarPost->user)
														@php
														$userNameWords = explode(' ', $sidebarPost->user->name);
														$firstWord = reset($userNameWords);
														@endphp
														<small class="post_meta">{{ $firstWord }}<span>{{ $sidebarPost->created_at->format('M d') }}</span></small>
														@else
														<span class="date">No User</span>
														@endif
													</div>
												</div>
											</a>
										</div>
										@empty
										<!-- Handle the case when there are no sidebar posts -->
										<p>No sidebar posts available</p>
										@endforelse
									</div>

									<!-- Top Stories Slider Item -->
									<div class="owl-item">
										<!-- Sidebar Posts -->
										@forelse($sidebarPosts->sortByDesc('created_at')->slice(5, 5) as $sidebarPost)
										<div class="side_post">
											<a href="{{ url('post/' . $sidebarPost->id) }}">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div>
															<img src="{{ asset('images/banners/' . $sidebarPost->banner) }}" alt="{{ $sidebarPost->header }}" width="50" height="50">
														</div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">{{ $sidebarPost->id }}{!! $sidebarPost->header ? \Illuminate\Support\Str::limit(strip_tags($sidebarPost->header), 22, $end='...') : "Blog has no header" !!}</div>
														<small class="post_meta">
															@if($sidebarPost && $sidebarPost->user)
															@php
															$userNameWords = explode(' ', $sidebarPost->user->name);
															$firstWord = reset($userNameWords);
															@endphp
															<small class="post_meta">{{ $firstWord }}<span>{{ $sidebarPost->created_at->format('M d') }}</span></small>
															@else
															<span class="date">No User</span>
															@endif
														</small>
													</div>
												</div>
											</a>
										</div>
										@empty
										<!-- Handle the case when there are no sidebar posts -->
										<p>No sidebar posts available</p>
										@endforelse
									</div>

									<!-- Top Stories Slider Item -->
									<div class="owl-item">

										<div class="owl-item">
											<!-- Sidebar Posts -->
											@forelse($sidebarPosts->sortByDesc('created_at')->slice(10, 5) as $sidebarPost)
											<div class="side_post">
												<a href="{{ url('post/' . $sidebarPost->id) }}">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="side_post_image">
															<div>
																<img src="{{ asset('images/banners/' . $sidebarPost->banner) }}" alt="{{ $sidebarPost->header }}" width="50" height="50">
															</div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title">{{ $sidebarPost->id }}{!! $sidebarPost->header ? \Illuminate\Support\Str::limit(strip_tags($sidebarPost->header), 22, $end='...') : "Blog has no header" !!}</div>
															<small class="post_meta"> @if($sidebarPost && $sidebarPost->user)
																@php
																$userNameWords = explode(' ', $sidebarPost->user->name);
																$firstWord = reset($userNameWords);
																@endphp
																<small class="post_meta">{{ $firstWord }}<span>{{ $sidebarPost->created_at->format('M d') }}</span></small>
																@else
																<span class="date">No User</span>
																@endif
															</small>
														</div>
													</div>
												</a>
											</div>
											@empty
											<!-- Handle the case when there are no sidebar posts -->
											<p>No sidebar posts available</p>
											@endforelse
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
@endsection