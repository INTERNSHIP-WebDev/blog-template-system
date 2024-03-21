{{-- LAYOUT --}}
@extends("landing.layouts.footer")

@section("content")

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About Us</title>
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

        <style>
          .page-title{
            color: #212529;
            letter-spacing: 2px;
          }

          .home {
            position: relative;
            height: 500px;
            overflow: hidden;
          }

          .home_background {
            width: 100%;
            height: 100%;
            background-size: cover;
            position: relative;
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
						<div class="logo"><a href="#">Blog | About</a></div>
						<nav class="main_nav">
							<ul>
								<li><a href="/">Home</a></li>
                <li class="active"><a href="/about">About</a></li>
                <li><a href="/concern">Contact</a></li>
                @guest
                <li><a href="/login">Login</a></li>
                @endguest
							</ul>
						</nav>
						<div class="search_container ml-auto">
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

  	<!-- pic-->
  
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="landing_assets/images/post_nosidebar.jpg" data-speed="2.0"></div>
		<div class="home_content">
			</div>
		</div>
	</div>

	
  <main id="main">
    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">About Us</h1>
          </div>
        </div>

        <div class="row mb-5">

          <div class="d-md-flex post-entry-2 half">
            <a href="#" class="me-4 thumbnail">
              <img src="backend/assets/img/post-landscape-2.jpg" alt="" class="img-fluid">
            </a>
              <div class="ps-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">About Us</div>
              <h2 class="mb-4 display-4">Company History</h2>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
              <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
            </div>
          </div>

          <div class="d-md-flex post-entry-2 half mt-5">
            <a href="#" class="me-4 thumbnail order-2">
              <img src="backend/assets/img/post-landscape-1.jpg" alt="" class="img-fluid">
            </a>
            <div class="pe-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">Mission &amp; Vision</div>
              <h2 class="mb-4 display-4">Mission &amp; Vision</h2>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
              <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
            </div>
          </div>

        </div>

      </div>
    </section>

   

    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h2 class="display-4">Our Team</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sint sed, fugit distinctio ad eius itaque deserunt doloribus harum excepturi laudantium sit officiis et eaque blanditiis. Dolore natus excepturi recusandae.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="backend/assets/img/person-1.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Person 1</h4>
            <span class="d-block mb-3 text-uppercase">Position 1</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="backend/assets/img/person-2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Person 2</h4>
            <span class="d-block mb-3 text-uppercase">Position 2</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="backend/assets/img/person-3.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Person 3</h4>
            <span class="d-block mb-3 text-uppercase">Position 3</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="backend/assets/img/person-4.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Person 4</h4>
            <span class="d-block mb-3 text-uppercase">Person 4</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="backend/assets/img/person-5.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Person 5</h4>
            <span class="d-block mb-3 text-uppercase">Position 5</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="backend/assets/img/person-6.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Person 6</h4>
            <span class="d-block mb-3 text-uppercase">Position 6</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
</div>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script type="text/javascript" src="{{ URL::asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('backend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('backend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('backend/assets/vendor/aos/aos.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

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
  <script type="text/javascript" src="{{ URL::asset('backend/assets/js/main.js') }}"></script>
</body>
</html>
