{{-- LAYOUT --}}
@extends("landing.layouts.layout")

@section("content")

<!-- Menu -->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<div class="menu_close_container">
		<div class="menu_close">
			<div></div>
			<div></div>
		</div>
	</div>
	<div class="logo menu_mm"><a href="#">Blog | Travel</a></div>
	<div class="search">
		<form action="#">
			<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
			<img class="header_search_icon menu_mm" src="{{ asset('landing_assets/images/search_2.png') }}" alt="">
		</form>
	</div>
	<nav class="menu_nav">
		<ul class="menu_mm">
			<li class="menu_mm"><a href="index.html">home</a></li>
			<!-- <li class="menu_mm"><a href="#">Fashion</a></li>
			<li class="menu_mm"><a href="#">Gadgets</a></li>
			<li class="menu_mm"><a href="#">Lifestyle</a></li> -->
			<li class="menu_mm"><a href="{{ route('about') }}">About Us</a></li>
			<li class="menu_mm"><a href="{{ route('concern') }}">Contact</a></li>
		</ul>
	</nav>
</div>

<!-- Home -->

<div class="home">

	<!-- Home Slider -->

	<div class="home_slider_container">
		<div class="owl-carousel owl-theme home_slider">

			<!-- Slider Item -->
			<div class="owl-item">
				@php
				$latestTemplate = $latestTemplates->last();
				@endphp

				@if($latestTemplate)
				<div class="home_slider_background" style="background-image: url('{{ asset('images/banners/' . $latestTemplate->banner) }}');"></div>
				<div class="home_slider_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_content">
									<div class="home_slider_item_category trans_200"><a href="category.html" class="trans_200">
											@if($latestTemplate->category)
											{{ explode(' ', $latestTemplate->category->text)[0] }}
											@else
											General Blog
											@endif
									</div>
									<div class="home_slider_item_title">
										<a href="post.html">{{ $latestTemplate->header }}</a>
									</div>
									<div class="home_slider_item_link">
										<a href="post.html" class="trans_200">Continue Reading
											<svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="13px" viewBox="0 0 19 13" enable-background="new 0 0 19 13" xml:space="preserve">
												<polygon fill="#FFFFFF" points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 " />
											</svg>
										</a>
									</div>
									@else
									<!-- Handle the case when there are no latest templates -->
									<p>No latest templates available</p>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Similar Posts -->
				<div class="similar_posts_container">
					<div class="container">
						<div class="row d-flex flex-row align-items-end">

							<!-- Similar Post -->
							@php
							$secondToLastTemplate = $latestTemplates->reverse()->skip(1)->first();
							@endphp

							@if($secondToLastTemplate)
							<div class="col-lg-3 col-md-6 similar_post_col">
								<div class="similar_post trans_200">
									<a href="post.html">{{ $secondToLastTemplate->header }}</a>
								</div>
							</div>
							@else
							<!-- Handle the case when there is no second-to-last template -->
							<p>No second-to-last template available</p>
							@endif

							<!-- Similar Post -->
							@php
							$thirdToLastTemplate = $latestTemplates->reverse()->skip(2)->first();
							@endphp

							@if($thirdToLastTemplate)
							<div class="col-lg-3 col-md-6 similar_post_col">
								<div class="similar_post trans_200">
									<a href="post.html">{{ $thirdToLastTemplate->header }}</a>
								</div>
							</div>
							@else
							<!-- Handle the case when there is no second-to-last template -->
							<p>No second-to-last template available</p>
							@endif

							<!-- Similar Post -->
							@php
							$fourthToLastTemplate = $latestTemplates->reverse()->skip(3)->first();
							@endphp

							@if($fourthToLastTemplate)
							<div class="col-lg-3 col-md-6 similar_post_col">
								<div class="similar_post trans_200">
									<a href="post.html">{{ $fourthToLastTemplate->header }}</a>
								</div>
							</div>
							@else
							<!-- Handle the case when there is no second-to-last template -->
							<p>No second-to-last template available</p>
							@endif

						</div>
					</div>

					<div class="home_slider_next_container">
						@php
						$fifthToLastTemplate = $latestTemplates->reverse()->skip(4)->first();
						@endphp

						@if($fifthToLastTemplate)
						<div class="home_slider_next" style="background-image: url('{{ asset('images/banners/' . $fifthToLastTemplate->banner) }}');">
							<div class="home_slider_next_background trans_400"></div>
							<div class="home_slider_next_content trans_400">
								<div class="home_slider_next_title">next</div>
								<div class="home_slider_next_link">{{ $fifthToLastTemplate->header }}</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

		<div class="custom_nav_container home_slider_nav_container">
			<div class="custom_prev custom_prev_home_slider">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
					<polyline fill="#FFFFFF" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
				</svg>
			</div>
			<ul id="custom_dots" class="custom_dots custom_dots_home_slider">
				<li class="custom_dot custom_dot_home_slider active"><span></span></li>
				<li class="custom_dot custom_dot_home_slider"><span></span></li>
				<li class="custom_dot custom_dot_home_slider"><span></span></li>
			</ul>
			<div class="custom_next custom_next_home_slider">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
					<polyline fill="#FFFFFF" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
				</svg>
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

					<!-- Blog Section - What's Trending -->

					<div class="blog_section">
						<div class="section_panel d-flex flex-row align-items-center justify-content-start">
							<div class="section_title">What's New</div>
							<div class="section_tags ml-auto">
								<ul>
									<li class="active"><a href="{{ url('/') }}">all</a></li>
									@forelse($categories->sortByDesc('created_at')->take(3) as $category)
									<li><a href="{{ url('category/' . $category->id) }}">{{ $category->text }}</a></li>
									@empty
									<li>No categories available</li>
									@endforelse
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
							<div class="grid clearfix">
								<!-- Large Card With Background -->
								@php
								$latestTemplate = $latestTemplates->last();
								@endphp

								@if($latestTemplate)
								<div class="card card_large_with_background grid-item">
									<div class="card_background" style="background-image: url('{{ asset('images/banners/' . $latestTemplate->banner) }}'); background-size: 690px 155px;">
										<div class="overlay"></div>
									</div>
									<div class="card-body">
										<div class="card-title"><a href="{{ url('post/' . $latestTemplate->id) }}">{{ $latestTemplate->header }}</a></div>
										@if($latestTemplate->user)
										<small class="post_meta"><a href="#">{{ $latestTemplate->user->name }}</a><span>{{ $latestTemplate->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there are no latest templates -->
								<p>No latest templates available</p>
								@endif


								<!-- Large Card With Image -->
								@php
								$secondToLastTemplate = $latestTemplates->reverse()->skip(1)->first();
								@endphp

								@if($secondToLastTemplate)
								<div class="card grid-item card_large_with_image">
									<img class="card-img-top" src="{{ asset('images/banners/' . $secondToLastTemplate->banner) }}" alt="{{ $secondToLastTemplate->header }}" width="690" height="50">
									<div class="card-body">
										<div class="card-title"><a href="{{ url('post/' . $secondToLastTemplate->id) }}">{{ $secondToLastTemplate->header }}</a></div>
										<p class="card-text">
											{{
											Illuminate\Support\Str::limit(
												preg_replace('/<[^>]*>/', '', $secondToLastTemplate->description),
												$limit = 200,
												$end = '...'
											)
										}}
										</p>
										@if($secondToLastTemplate->user)
										<small class="post_meta"><a href="#">{{ $secondToLastTemplate->user->name }}</a><span>{{ $secondToLastTemplate->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif



								<!-- Default Card With Image -->
								@php
								$thirdToLastTemplate = $latestTemplates->reverse()->skip(2)->first();
								@endphp

								@if($thirdToLastTemplate)
								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="{{ asset('images/banners/' . $thirdToLastTemplate->banner) }}" alt="" width="330" height="195">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">{{ $thirdToLastTemplate->header }}</a></div>
										@if($thirdToLastTemplate->user)
										@php
										$userNameWords = explode(' ', $thirdToLastTemplate->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $thirdToLastTemplate->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif


								<!-- Default Card With Background -->
								@php
								$fourthToLastTemplate = $latestTemplates->reverse()->skip(3)->first();
								@endphp

								@if($fourthToLastTemplate)
								<div class="card card_default card_default_with_background grid-item">
									<div class="card_background" style="background-image:url('{{ asset('images/banners/' . $fourthToLastTemplate->banner) }}')"></div>
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">{{ $fourthToLastTemplate->header }}</a></div>
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Default Card No Image -->
								@php
								$fifthToLastTemplate = $latestTemplates->reverse()->skip(4)->first();
								@endphp

								@if($fifthToLastTemplate)
								<div class="card card_default card_default_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">{{ $fifthToLastTemplate->header }}</a></div>
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Default Card No Image -->
								@php
								$sixthToLastTemplate = $latestTemplates->reverse()->skip(5)->first();
								@endphp

								@if($sixthToLastTemplate)
								<div class="card card_default card_default_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">{{ $sixthToLastTemplate->header }}</a></div>
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Default Card With Background -->
								@php
								$seventhToLastTemplate = $latestTemplates->reverse()->skip(5)->first();
								@endphp

								@if($seventhToLastTemplate)
								<div class="card card_default card_default_with_background grid-item">
									<div class="card_background" style="background-image:url('{{ asset('images/banners/' . $seventhToLastTemplate->banner) }}')"></div>
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">{{ $seventhToLastTemplate->header }}</a></div>
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif


							</div>

						</div>
					</div>

					<!-- Blog Section - Latest -->

					<div class="blog_section">
						<div class="section_panel d-flex flex-row align-items-center justify-content-start">
							<div class="section_title">Latest Articles</div>
						</div>
						<div class="section_content">
							<div class="grid clearfix">

								<!-- Small Card With Image -->
								@php
								$latestBlog = $latestTemplates->last();
								@endphp

								@if($latestBlog)
								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="{{ asset('images/banners/' . $latestBlog->banner) }}" alt="" width="330" height="195">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">1{{ $latestBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($latestBlog->category)
												{{ $latestBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($latestBlog->user)
										@php
										$userNameWords = explode(' ', $latestBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $latestBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card Without Image -->
								@php
								$secondBlog = $latestTemplates->reverse()->skip(1)->first();
								@endphp

								@if($secondBlog)
								<div class="card card_default card_small_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">2{{ $secondBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($secondBlog->category)
												{{ $secondBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($secondBlog->user)
										@php
										$userNameWords = explode(' ', $secondBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $secondBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card With Image -->
								@php
								$thirdBlog = $latestTemplates->reverse()->skip(2)->first();
								@endphp

								@if($thirdBlog)
								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="{{ asset('images/banners/' . $thirdBlog->banner) }}" alt="" width="330" height="195">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">3{{ $thirdBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($thirdBlog->category)
												{{ $thirdBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($thirdBlog->user)
										@php
										$userNameWords = explode(' ', $thirdBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $thirdBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif


								<!-- Small Card With Image -->
								@php
								$fourthBlog = $latestTemplates->reverse()->skip(3)->first();
								@endphp

								@if($fourthBlog)
								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="{{ asset('images/banners/' . $fourthBlog->banner) }}" width="330" height="88">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">4{{ $fourthBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($fourthBlog->category)
												{{ $fourthBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($fourthBlog->user)
										@php
										$userNameWords = explode(' ', $fourthBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $fourthBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card With Background -->
								@php
								$fifthBlog = $latestTemplates->reverse()->skip(4)->first();
								@endphp

								@if($fifthBlog)
								<div class="card card_default card_small_with_background grid-item">
									<div class="card_background" style="background-image:url('{{ asset('images/banners/' . $latestTemplate->banner) }}')"></div>
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">5{{ $fifthBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($fifthBlog->category)
												{{ $fifthBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($fifthBlog->user)
										@php
										$userNameWords = explode(' ', $fifthBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $fifthBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card With Background -->
								@php
								$sixthBlog = $latestTemplates->reverse()->skip(5)->first();
								@endphp

								@if($sixthBlog)
								<div class="card card_default card_small_with_background grid-item">
									<div class="card_background" style="background-image:url('{{ asset('images/banners/' . $latestTemplate->banner) }}')"></div>
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">6{{ $sixthBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($sixthBlog->category)
												{{ $sixthBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($sixthBlog->user)
										@php
										$userNameWords = explode(' ', $sixthBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>6{{ $sixthBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card With Image -->
								@php
								$seventhBlog = $latestTemplates->reverse()->skip(6)->first();
								@endphp

								@if($seventhBlog)
								<div class="card card_small_with_image grid-item">
									<img class="card-img-top" src="{{ asset('images/banners/' . $seventhBlog->banner) }}" alt="" width="330" height="150">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">7{{ $seventhBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($seventhBlog->category)
												{{ $seventhBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($seventhBlog->user)
										@php
										$userNameWords = explode(' ', $seventhBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $seventhBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card Without Image -->
								@php
								$eightBlog = $latestTemplates->reverse()->skip(7)->first();
								@endphp

								@if($eightBlog)
								<div class="card card_default card_small_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">8{{ $eightBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($eightBlog->category)
												{{ $eightBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($eightBlog->user)
										@php
										$userNameWords = explode(' ', $eightBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $eightBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Small Card Without Image -->
								@php
								$ninthBlog = $latestTemplates->reverse()->skip(8)->first();
								@endphp

								@if($ninthBlog)
								<div class="card card_default card_small_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">9{{ $ninthBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($ninthBlog->category)
												{{ $ninthBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($ninthBlog->user)
										@php
										$userNameWords = explode(' ', $ninthBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $ninthBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Default Card With Background -->
								@php
								$tenthBlog = $latestTemplates->reverse()->skip(9)->first();
								@endphp

								@if($tenthBlog)
								<div class="card card_default card_default_with_background grid-item">
									<div class="card_background" style="background-image:url('{{ asset('images/banners/' . $tenthBlog->banner) }}')" width="330" height="50"></div>
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">10{{ $tenthBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($tenthBlog->category)
												{{ $tenthBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($tenthBlog->user)
										@php
										$userNameWords = explode(' ', $tenthBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $tenthBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif

								<!-- Default Card With Background -->
								@php
								$eleventhBlog = $latestTemplates->reverse()->skip(10)->first();
								@endphp

								@if($eleventhBlog)
								<div class="card card_default card_default_with_background grid-item">
									<div class="card_background" style="background-image:url('{{ asset('images/banners/' . $eleventhBlog->banner) }}')" width="330" height="50"></div>
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">11{{ $eleventhBlog -> header }}</a></div>

										<div class="mb-4">Tags:
											<a href="javascript: void(0);" class="badge bg-light font-size-12">
												<i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
												@if($eleventhBlog->category)
												{{ $eleventhBlog->category->text }}
												@else
												General Blog
												@endif
											</a>
										</div>

										@if($eleventhBlog->user)
										@php
										$userNameWords = explode(' ', $eleventhBlog->user->name);
										$firstTwoWords = implode(' ', array_slice($userNameWords, 0, 2));
										@endphp
										<small class="post_meta"><a href="#">{{ $firstTwoWords }}</a><span>{{ $eleventhBlog->created_at->format('M d, Y \a\t h:i A') }}</span></small>
										@else
										<span class="date">No User</span>
										@endif
									</div>
								</div>
								@else
								<!-- Handle the case when there is no second-to-last template -->
								<p>No second-to-last template available</p>
								@endif
							</div>

						</div>
					</div>

				</div>
				<div class="load_more">
					<div id="load_more" class="load_more_button text-center trans_200">Load More</div>
				</div>
			</div>

			<!-- Sidebar -->

			<div class="col-lg-3">
				<div class="sidebar">
					<div class="sidebar_background"></div>

					<!-- Top Stories -->

					<div class="sidebar_section">
						<div class="sidebar_title_container">
							<div class="sidebar_title">Recent Blogs</div>
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
														<div class="side_post_title">{{ $sidebarPost->id }}{{ $sidebarPost->header }}</div>
														@if($sidebarPost && $sidebarPost->user)
														@php
														$userNameWords = explode(' ', $sidebarPost->user->name);
														$firstWord = reset($userNameWords);
														@endphp
														<small class="post_meta">{{ $firstWord }}<span>{{ $sidebarPost->created_at->format('M, d') }}</span></small>
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
														<div class="side_post_title">{{ $sidebarPost->id }}{{ $sidebarPost->header }}</div>
														<small class="post_meta">#<span>{{ $sidebarPost->created_at->format('M, d') }}</span></small>
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
															<div class="side_post_title">{{ $sidebarPost->id }}{{ $sidebarPost->header }}</div>
															<small class="post_meta">#<span>{{ $sidebarPost->created_at->format('M, d') }}</span></small>
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

					<!-- Advertising -->
					@php
					$latestTemplate = $latestTemplates->last();
					@endphp

					@if($latestBlog)
					<div class="sidebar_section">
						<div class="advertising">
							<div class="advertising_background" style="background-image: url('{{ asset('images/banners/' . $latestTemplate->banner) }}');"></div>
							<div class="advertising_content d-flex flex-column align-items-start justify-content-end">
								<div class="advertising_perc">-15%</div>
								<div class="advertising_link"><a href="#">{{ $latestTemplate->header }}</a></div>
							</div>
						</div>
					</div>
					@else
					<!-- Handle the case when there is no second-to-last template -->
					<p>No second-to-last template available</p>
					@endif

					<!-- Newest Videos -->

					<div class="sidebar_section newest_videos">
						<div class="sidebar_title_container">
							<div class="sidebar_title">Newest Videos</div>
							<div class="sidebar_slider_nav">
								<div class="custom_nav_container sidebar_slider_nav_container">
									<div class="custom_prev custom_prev_vid">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
											<polyline fill="#bebebe" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 " />
										</svg>
									</div>
									<ul id="custom_dots" class="custom_dots custom_dots_vid">
										<li class="custom_dot custom_dot_vid active"><span></span></li>
										<li class="custom_dot custom_dot_vid"><span></span></li>
										<li class="custom_dot custom_dot_vid"><span></span></li>
									</ul>
									<div class="custom_next custom_next_vid">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
											<polyline fill="#bebebe" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 " />
										</svg>
									</div>
								</div>
							</div>
						</div>
						<div class="sidebar_section_content">

							<!-- Sidebar Slider -->
							<div class="sidebar_slider_container">
								<div class="owl-carousel owl-theme sidebar_slider_vid">

									<!-- Newest Videos Slider Item -->
									<div class="owl-item">

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_1.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_2.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_3.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_4.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

									</div>

									<!-- Newest Videos Slider Item -->
									<div class="owl-item">

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_1.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_2.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_3.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_4.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

									</div>

									<!-- Newest Videos Slider Item -->
									<div class="owl-item">

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_1.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_2.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_3.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

										<!-- Newest Videos Post -->
										<div class="side_post">
											<a href="post.html">
												<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
													<div class="side_post_image">
														<div><img src="landing_assets/images/vid_4.jpg" alt=""></div>
													</div>
													<div class="side_post_content">
														<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
														<small class="post_meta">Katy Liu<span>Sep 29</span></small>
													</div>
												</div>
											</a>
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>

					<!-- Advertising 2 -->

					<div class="sidebar_section">
						<div class="advertising_2">
							<div class="advertising_background" style="background-image:url(landing_assets/images/post_18.jpg)"></div>
							<div class="advertising_2_content d-flex flex-column align-items-center justify-content-center">
								<div class="advertising_2_link"><a href="#">Turbulent <span>Mind</span></a></div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
@endsection