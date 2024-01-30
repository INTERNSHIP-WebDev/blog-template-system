{{-- LAYOUT --}}
@extends("landing.layouts.layout")

@section("content")



<!-- Home -->

<!-- <div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing_assets/images/post_15.jpg') }}" data-speed="0.8"></div>
</div> -->
<div class="home mb-5">
	<div class="home_slider_container">
		<div class="owl-carousel owl-theme home_slider">
			<div class="owl-item">
				<div class="home_slider_background" style="background-image: url('{{ asset('landing_assets/images/post_1.jpg') }}');"></div>
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
							<div class="section_title">Don't Miss</div>
							<div class="section_tags ml-auto">
								<ul>
									<li class="active"><a href="category.html">all</a></li>
									<li><a href="category.html">style hunter</a></li>
									<li><a href="category.html">vogue</a></li>
									<li><a href="category.html">health & fitness</a></li>
									<li><a href="category.html">travel</a></li>
								</ul>
							</div>
							<div class="section_panel_more">
								<ul>
									<li>more
										<ul>
											<li><a href="category.html">new look 2018</a></li>
											<li><a href="category.html">street fashion</a></li>
											<li><a href="category.html">business</a></li>
											<li><a href="category.html">recipes</a></li>
											<li><a href="category.html">sport</a></li>
											<li><a href="category.html">celebrities</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="section_content">

							<div class="grid clearfix">

								<!-- Small Card Without Image -->
								@foreach ($latestTemplates as $latestTemplate)
								<div class="card card_default card_small_no_image grid-item">
									<div class="card-body">
										<img class="card-img-top" src="{{ asset('images/banners/' . $latestTemplate->banner) }}" alt="{{ $latestTemplate->header }}" width="300" height="150">
										<div class="card-title card-title-small"><a href="post.html">{{ $latestTemplate-> header }}</a></div>
										<small class="post_meta"><a href="#">
												@if($latestTemplate && $latestTemplate->user)
												@php
												$userNameWords = explode(' ', $latestTemplate->user->name);
												$firstWord = reset($userNameWords);
												@endphp
												{{ $firstWord }}
											</a>
											<span>
												{{ $latestTemplate->created_at->format('M d, Y \a\t h:i A') }}
											</span>
											@else
											<span class="date">No User</span>
											@endif
										</small>
									</div>
								</div>
								@endforeach

							</div>

						</div>
					</div>

				</div>
				<div class="load_more">
					<div id="load_more" class="load_more_button text-center trans_200">END</div>
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
														<div class="side_post_title">{{ $sidebarPost->id }}{{ implode(' ', array_slice(str_word_count($sidebarPost->header, 1), 0, 5)) }}</div>
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
														<div class="side_post_title">{{ $sidebarPost->id }}{{ implode(' ', array_slice(str_word_count($sidebarPost->header, 1), 0, 5)) }}</div>
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
															<div class="side_post_title">{{ $sidebarPost->id }}{{ implode(' ', array_slice(str_word_count($sidebarPost->header, 1), 0, 5)) }}</div>
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