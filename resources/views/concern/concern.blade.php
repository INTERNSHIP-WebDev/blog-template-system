<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Contact Us</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset ('backend/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset ('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!--links----->
  <link rel="stylesheet" type="text/css" href="landing_assets/styles/bootstrap4/bootstrap.min.css">
  <link href="landing_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="landing_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="landing_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="landing_assets/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="landing_assets/plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css">
  <link rel="stylesheet" type="text/css" href="landing_assets/styles/post_nosidebar.css">
  <link rel="stylesheet" type="text/css" href="landing_assets/styles/post_nosidebar_responsive.css">

  <!-- Template Main CSS Files -->
  <link href="{{ asset('backend/assets/css/variables.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/main.css') }}" rel="stylesheet">


</head>

<body>
  <div class="super_container">

    <!-- Header -->

    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header_content d-flex flex-row align-items-center justify-content-start">
              <div class="logo"><a href="#">Blog</a></div>
              <nav class="main_nav">
                <ul>
                  <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="/">This Post</a></li>
                  <li><a href="/concern">Contact</a></li>
                  <li><a href="/about">About</a></li>
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

    <div class="home">
      <div class="home_background parallax-window" data-parallax="scroll" data-image-src="landing_assets/images/post_nosidebar.jpg" data-speed="0.8"></div>
      <div class="home_content">
      </div>
    </div>
  </div>

  <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contact us</h1>
          </div>
        </div>

        <div class="row gy-4">

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>Address 1, Address 2</address>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+00000000000">+0 000 0000 000</a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:anunanaman@baket.com">anunanaman@baket.com</a></p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="form mt-5">

          <form action="{{ route('concern.store') }}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
          
        </div><!-- End Contact Form -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div class="container">
      <div class="row row-lg-eq-height">
        <div class="col-lg-9 order-lg-1 order-2">
          <div class="footer_content">
            <div class="footer_logo"><a href="#">avision</a></div>
            <div class="footer_social">
              <ul>
                @if(isset($socials))
                @if($socials['facebook'] == TRUE)
                <li class="footer_social_facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                @endif
                @if($socials['twitter'] == TRUE)
                <li class="footer_social_twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                @endif
                @if($socials['pinterest'] == TRUE)
                <li class="footer_social_pinterest"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                @endif
                @if($socials['instagram'] == TRUE)
                <li class="footer_social_instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                @endif
                @if($socials['google'] == TRUE)
                <li class="footer_social_google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                @endif
                @endif
              </ul>
            </div>
            <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>
                document.write(new Date().getFullYear());
              </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Nissi Cup Noodles | Clint Garcia | Orange Juice Seal Escala | Anjel Baby by Troye Sivan Babanto | Sam pot </a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
          </div>
        </div>
        <div class="col-lg-3 order-lg-2 order-1">
          <div class="subscribe">
            <div class="subscribe_background"></div>
            <div class="subscribe_content">
              <div class="subscribe_title">Subscribe</div>
              <form action="#">
                <input type="email" class="sub_input" placeholder="Your Email" required="required">
                <button class="sub_button">
                  <svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="13px" viewBox="0 0 19 13" enable-background="new 0 0 19 13" xml:space="preserve">
                    <polygon fill="#FFFFFF" points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 " />
                  </svg>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('backend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('backend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('backend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!--NEW SCRIPTS-->
  <script src="landing_assets/js/jquery-3.2.1.min.js"></script>
  <script src="landing_assets/styles/bootstrap4/popper.js"></script>
  <script src="landing_assets/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="landing_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="landing_assets/plugins/easing/easing.js"></script>
  <script src="landing_assets/plugins/masonry/masonry.js"></script>
  <script src="landing_assets/plugins/parallax-js-master/parallax.min.js"></script>
  <script src="landing_assets/js/post_nosidebar.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset ('backend/assets/js/main.js') }}"></script>

</body>

</html>