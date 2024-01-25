<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog</title>
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

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Blog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ url('/') }}">Blog</a></li>
          <li><a href="single-post.html">Single Post</a></li>
          <li class="dropdown"><a href="category.html"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
          </li>

          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
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
                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url(<?php echo url('backend') ?>/assets2/img/post-slide-1.jpg);">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('{{ asset('backend/assets/img/post-slide-2.jpg') }}');">
                    <div class="img-bg-inner">
                      <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('{{ asset('backend/assets/img/post-slide-3.jpg') }}');">
                    <div class="img-bg-inner">
                      <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('{{ asset('backend/assets/img/post-slide-4.jpg') }}');">
                    <div class="img-bg-inner">
                      <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>
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
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <!-- LATEST -->
        <div class="row g-6">
          <div class="col-lg-4">
            <div class="post-entry-1 lg">
              <a href="{{ route('view_blog', ['id' => $latestTemplate->id]) }}"><img src="{{ asset('images/banners/' . $latestTemplate->banner) }}" alt="" class="img-fluid"></a>
              <div class="post-meta">
                @if($latestTemplate->title)
                <span class="date">{{ $latestTemplate->title->text }}</span>
                @else
                <span class="date">No Title</span>
                @endif
                <span class="mx-1">&bullet;</span>
                <span>{{ $latestTemplate->created_at->format('M d, Y') }}</span>
              </div>
              <h2><a href="{{ route('view_blog', ['id' => $latestTemplate->id]) }}">{{ $latestTemplate->header }} {{ $latestTemplate->id }}</a></h2>
              @php
                  $description = \App\Models\Description::where('temp_id', $latestTemplate->id)->first();
              @endphp
              @if($description)
                <p class="mb-4 d-block">{{ $description->text }}</p>
              @else
                <p class="mb-4 d-block">No Description</p>
              @endif
              <div class="d-flex align-items-center author">
              <div class="photo"><img src="{{ asset('backend/assets/img/person-1.jpg') }}" alt="" class="img-fluid"></div>
              <div class="name">
              @php
                  $author = \App\Models\User::where('id', $latestTemplate->user_id)->first();
              @endphp
              @if($author)
                    <h3 class="m-0 p-0">{{ $author->name }}</h3>
              @else
                    <h3 class="m-0 p-0">Unknown Author</h3>
              @endif
                </div>
              </div>
            </div>
          </div>
          <!-- END LATEST -->

          <!-- Main Content -->
          <div class="col-lg-8">
            <div class="row g-5">
              @foreach($templates as $index => $template)
              @if($index % 3 == 0)
    
              <div class="row g-5">
                @endif

                <div class="col-lg-4">
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ asset('images/banners/' . $template->banner) }}" alt="" class="img-fluid"></a>
                    <div class="post-meta">
                      @php
                      $title = $titles->where('temp_id', $template->id)->first();
                      @endphp
                      @if($title)
                      <span class="date">{{ $title->text }}</span>
                      @else
                      <span class="date">No Title</span>
                      @endif
                      <span class="mx-1">&bullet;</span>
                      <span>{{ $template->created_at->format('M d, Y') }}</span>
                    </div>
                    <h2><a href="single-post.html">{{ $template->header }}</a></h2>
                      @php
                      $description = \App\Models\Description::where('id', $template->user_id)->first();
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
              @endforeach
            </div>
          </div>
          <!-- End Main Content -->


        </div>

      </div> <!-- End .row -->
    </section> <!-- End Post Grid Section -->

  </main><!-- End #main -->

  @foreach($users as $user) 

    {{$user->name }}
    
  @endforeach
  
  @foreach($subtitles as $subtitle) 

  {{$subtitle->text }}

  @endforeach

  @foreach($descriptions as $description)

  {{$description->text}} 
  
  @endforeach

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
              <li><a href="{{ url('/') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
              <!-- <li><a href="index.html"><i class="bi bi-chevron-right"></i> Blog</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Categories</a></li>
              <li><a href="single-post.html"><i class="bi bi-chevron-right"></i> Single Post</a></li>
              <li><a href="about.html"><i class="bi bi-chevron-right"></i> About us</a></li>
              <li><a href="contact.html"><i class="bi bi-chevron-right"></i> Contact</a></li> -->
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Categories</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> ??? </a></li>
              <!-- <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li> -->

            </ul>
          </div>

          <div class="col-lg-4">
            <h3 class="footer-heading">Recent Posts</h3>

            <ul class="footer-links footer-blog-entry list-unstyled">
              <ul>
                  @foreach($fTemplate as $template)
                      @php
                          $author = \App\Models\User::where('id', $template->user_id)->first();
                      @endphp
                          <li>
                              <a href="single-post.html" class="d-flex align-items-center">
                                  <img src="{{ asset('images/banners/' . $template->banner) }}" alt="" class="img-fluid me-3" width="100" height="100">
                                  <div>
                                      <div class="post-meta d-block">
                                        @if($author)
                                        <span class="date">{{ $author->name }}</span>
                                        <span class="mx-1">&bullet;</span>
                                        <span>{{ $template->created_at->format('M d, Y') }}</span>
                                      </div>
                                      <span>{{ $template->header }}</span>
                                  </div>
                              </a>
                          </li>
                      @endif
                  @endforeach
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