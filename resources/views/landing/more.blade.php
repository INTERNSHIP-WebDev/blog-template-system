
<!-- Home -->

<!-- <div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing_assets/images/post_15.jpg') }}" data-speed="0.8"></div>
</div> -->
<div class="home mb-5">
	<div class="home_slider_container">
		<div class="owl-carousel owl-theme home_slider">
		@forelse ($templates as $template)
			<div class="owl-item">
				<div class="home_slider_background" style="background-image: url('{{ asset('images/banners/' . $template->banner) }}'); background-size: cover; height: 500px; "></div>
				<div class="home_slider_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
							</div>
						</div>
					</div>
				</div>
			</div>
		@empty
        <p>No blog posts found.</p>
    	@endforelse
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
							<div class="section_title">All Blogs</div>
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

					</div>

				</div>
			</div>

		</div>
	</div>
</div>

