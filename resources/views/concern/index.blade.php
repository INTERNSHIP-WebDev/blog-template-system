{{-- LAYOUT --}}
@extends("landing.layouts.footer")

@section("content")

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Contact Us</title>

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
        </style>


</head>
<script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 250,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss fullscreen', // Add 'fullscreen' plugin here
            toolbar: 'undo redo | fullscreen | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            image_title: true,
            automatic_uploads: true,
            images_uplaod_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>

<body>

@guest
    @php
        // Redirect to /login
        header("Location: " . url('/login'));
        exit();
    @endphp
@endguest

  <div class="super_container">
    <div class="home">
      <div class="home_background parallax-window" data-parallax="scroll" data-image-src="landing_assets/images/post_nosidebar.jpg" data-speed="0.8"></div>
      <div class="home_content">
      </div>
    </div>


    
    <!-- Header -->

    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header_content d-flex flex-row align-items-center justify-content-start">
              <div class="logo"><a href="#">Blog | Contact</a></div>
              <nav class="main_nav">
                <ul>
                  <li><a href="/">Home</a></li>
                  <li><a href="/about">About</a></li>
                  <li class="active"><a href="/concern">Contact</a></li>
                  @guest
                  <li><a href="/login">Login</a></li>
                  @endguest
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

    

  <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contact Us</h1>
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

          <form action="{{ route('concern.store') }}" method="POST">
            @csrf
            <div class="row">
              <input type="hidden" name="send_name" value="{{ Auth::user()->name }}">
              <input type="hidden" name="send_email" value="{{ Auth::user()->email }}">
              <div class="form-group col-md-6">
                Recipient:
                <input type="email" class="form-control" name="rcpt_email" id="rcpt_name" placeholder="Enter Recipient Email" required>
              </div>
              <div class="form-group col-md-6">
                Subject:
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Email Subject" required>
              </div>
            </div>
            <div class="form-group">
              <label for="message" class="form-label">Message</label>
              <textarea type="text" class="form-control" id="message" name="message" aria-describedby="Text help" placeholder="What's your concern?" required></textarea>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-primary">Send</button></div>
          </form>

        </div><!-- End Contact Form -->

      </div>
    </section>

  </main><!-- End #main -->


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