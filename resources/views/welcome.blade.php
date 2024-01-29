<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo url('backend') ?>/backend/assets/img/favicon.png" rel="icon">
  <link href="<?php echo url('backend') ?>/backend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo url('backend') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo url('backend') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo url('backend') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo url('backend') ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo url('backend') ?>/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="<?php echo url('backend') ?>/assets/css/variables.css" rel="stylesheet">
  <link href="<?php echo url('backend') ?>/assets/css/main.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Blog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <!-- <li class="dropdown"><a href="category.html"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="search-result.html">Search Result</a></li>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a href="about.html">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
          @if(auth()->check())
          <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">You are Logged in as "{{ auth()->user()->name }}"</a>
          @else
          <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in &nbsp;&nbsp;</a>
          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
          @endif
          @endauth
        </div>
        @endif
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">

                @foreach($heroTemplates as $heroTemplate)
                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('{{ asset('images/banners/' . $heroTemplate->banner) }}');">
                    <div class="img-bg-inner">
                      <h2>{{ $heroTemplate->header }}</h2>
                      @php
                      $description = $descriptions->where('temp_id', $heroTemplate->id)->first();
                      @endphp
                      @if($description)
                      <p>{{ $description->text }}</p>
                      @else
                      <p>No Description</p>
                      @endif
                    </div>
                  </a>
                </div>
                @endforeach

              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class=row>
          <div class="col-md-8">
          Lorem ipsum dolor sit amPraesetinclectus act temutate malesuadaLorem ipsum dolor sit amPraesetinclectus act temutate malesuada.
          </div>
          <div class="col-md-4">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?
          </div>
        </div>
        <h1 class="logo d-flex align-items-center">Latest Blog</h1>
        <!-- LATEST -->
        <div class="row g-6">
          <div class="col-lg-4">
            <div class="post-entry-1 lg">
              @forelse($latestTemplate ? [$latestTemplate] : [] as $template)
              <a href="{{ route('view_blog', ['id' => $latestTemplate->id]) }}">
                @if($template)
                <img src="{{ asset('images/banners/' . $template->banner) }}" alt="" class="img-fluid">
                @else
                <!-- Handle the case when $latestTemplate is null -->{{ route('view_blog', ['id' => $latestTemplate->id]) }}
                <p>No latest template available</p>
                @endif
              </a>

              <div class="post-meta">
                @if($template && $template->category)
                <span class="date">{{ $template->category->text }}</span>
                @else
                <span class="date">No Category</span>
                @endif
                <span class="mx-1">&bullet;</span>
                @if($template)
                <span>{{ $template->created_at ? $template->created_at->format('M d, Y') : 'No Date' }}</span>
                @else
                <span>No Date</span>
                @endif
              </div>

              <h2><a href="{{ route('view_blog', ['id' => $latestTemplate->id]) }}">{{ $template->header }} {{ $template->id }}</a></h2>

              @php
              $description = \App\Models\Description::where('temp_id', $template->id)->first();
              @endphp

              @if($description)
              <p class="mb-4 d-block">{{ $description->text }}</p>
              @else
              <p class="mb-4 d-block">No Description</p>
              @endif

              <div class="d-flex align-items-center author">
                <div class="photo">
                  <img src="{{ asset('backend/assets/img/person-1.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="name">
                  @php
                  $author = \App\Models\User::where('id', $template->user_id)->first();
                  @endphp

                  @if($author)
                  <h3 class="m-0 p-0">{{ $author->name }}</h3>
                  @else
                  <h3 class="m-0 p-0">Unknown Author</h3>
                  @endif
                </div>
              </div>
              @empty
              <!-- Handle the case when $latestTemplate is null -->
              <p>No latest template available</p>
              @endforelse
            </div>
          </div>
          <!-- END LATEST -->

          <!-- Main Content -->
          <div class="col-lg-8">
            <div class="row g-5">
              @forelse($templates as $index => $template)
              @if($index % 3 == 0)
              <div class="row g-5">
                @endif

                <div class="col-lg-4">
                  <div class="post-entry-1">
                    <a href="{{ route('view_blog', ['id' => $template->id]) }}"><img src="{{ asset('images/banners/' . $template->banner) }}" alt="" class="img-fluid"></a>
                    <div class="post-meta">
                      @if($template && $template->category)
                      <span class="date">{{ $template->category->text }}</span>
                      @else
                      <span class="date">No Category</span>
                      @endif
                      <span class="mx-1">&bullet;</span>
                      <span>{{ $template->created_at->format('M jS \'y') }}</span>
                    </div>
                    <h2><a href="{{ route('view_blog', ['id' => $template->id]) }}">{{ $template->header }} {{ $template->id }}</a></h2>
                    @php
                    $description = $descriptions->where('temp_id', $template->id)->first();
                    @endphp
                    @if($description)
                    <p class="mb-4 d-block">{{ $description->text }}</p>
                    @else
                    <p class="mb-4 d-block">No Description</p>
                    @endif
                  </div>
                </div>

                @if(($index + 1) % 3 == 0)
              </div>
              @endif
              @empty
              <p>No templates available.</p>
              @endforelse
            </div>

            <!-- Pagination -->
            <div class="pagination justify-content-center">
              {{ $templates->links() }}
            </div>
          </div>
          <!-- End Main Content -->

        </div>

      </div> <!-- End .row -->
    </section> <!-- End Post Grid Section -->

    <!-- ======= Post Grid 2 Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <h1 class="logo d-flex align-items-center">Categories</h1>


      </div> <!-- End container -->
    </section>
    <!-- End Post Grid 2 Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">About Blog</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.html" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right"></i> Home </a></li>
              <li><a href="{{ route('category') }}"><i class="bi bi-chevron-right"></i> Categories </a></li>
              <!-- <li><a href="category.html"><i class="bi bi-chevron-right"></i> Categories</a></li>
              <li><a href="single-post.html"><i class="bi bi-chevron-right"></i> Single Post</a></li> -->
              <li><a href="about.html"><i class="bi bi-chevron-right"></i> About us</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Contact</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <ul class="footer-links list-unstyled">
              <div class="col-lg-12">
                <h3 class="footer-heading">Address Location</h3>
                <p><i class="bi bi-geo-alt"></i> &nbsp; Andres Bonifacio Ave, Iligan City, 9200 Lanao del Norte</p>
                <p><a href="about.html" class="footer-link-more">Learn More</a></p>
              </div>
            </ul>
          </div>

          <div class="col-lg-4">
            <h3 class="footer-heading">Recent Posts</h3>

            <ul class="footer-links footer-blog-entry list-unstyled">
              <ul>
                @forelse($fTemplate as $template)
                @php
                $category = \App\Models\Category::where('id', $template->category_id)->first();
                @endphp
                <li>
                  <a href="single-post.html" class="d-flex align-items-center">
                    <img src="{{ asset('images/banners/' . $template->banner) }}" alt="" class="img-fluid me-3" width="100" height="100">
                    <div>
                      <div class="post-meta d-block">
                        @if($template && $template->category)
                        <span class="date">{{ $template->category->text }}</span>
                        <span class="mx-1">&bullet;</span>
                        <span>{{ $template->created_at->format('M d, Y') }}</span>
                        @else
                        <!-- Handle the case when author is not available -->
                        <span class="date">No Category</span>
                        @endif
                      </div>
                      <span>{{ $template->header }}</span>
                    </div>
                  </a>
                </li>
                @empty
                <!-- Handle the case when $fTemplate is empty -->
                <li>No templates available</li>
                @endforelse
              </ul>
            </ul>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>Blog</span></strong>. All Rights Reserved
            </div>

            <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">Sam Pogi</a>
            </div>

          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo url('backend') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo url('backend') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo url('backend') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo url('backend') ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo url('backend') ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo url('backend') ?>/assets/js/main.js"></script>

</body>

</html>