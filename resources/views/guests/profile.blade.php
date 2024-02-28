
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Newsfeed</title>

        <link rel="stylesheet" href="<?php echo url('sociala')?>/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo url('sociala')?>/css/feather.css">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo url('sociala')?>/images/favicon.png">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="<?php echo url('sociala')?>/css/style.css">
        <link rel="stylesheet" href="<?php echo url('sociala')?>/css/emoji.css">
        
        <link rel="stylesheet" href="<?php echo url('sociala')?>/css/lightbox.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">


        <style>
            .card-body {
                max-width: 100%;
                overflow-y: hidden;
                height: auto;
                word-wrap: break-word;
            }

        </style>
    </head>

    <body class="color-theme-blue mont-font">

        <div class="preloader"></div>

        <div class="main-wrapper">

        @include('guests.header')

        @include('guests.sidebar')

        <!-- main content -->
            <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
                
                <div class="middle-sidebar-bottom">
                    <div class="middle-sidebar-left">
                        <div class="middle-wrap">
                            <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                                <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                    <a href="{{ route('newsfeed')}}" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                    <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                                </div>
                                <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 text-center">
                                    <figure class="avatar ms-auto me-auto mb-0 mt-2 w100"><img src="{{ asset('images/photos/' . $user->photo) }}" alt="image" class="shadow-sm rounded-circle"  style="width: 100px; height: 100px; object-fit: cover;"></figure>
                                    <h2 class="fw-700 font-sm text-grey-900 mt-3">{{ $user->name }}</h2>
                                    <br><hr><br>  
                                <!-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a> -->
                                    </div>
                                </div>

                                <form id="profile" action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                        </div>        
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        </div>        
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>        
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation">
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-12 mb-3">
                                            <div class="card mt-3 border-0">
                                                <div class="card-body d-flex justify-content-between align-items-end p-0">
                                                    <div class="form-group mb-0 w-100">
                                                        <label class="mont-font fw-600 font-xsss">New Profile Photo</label>
                                                        <input type="file" name="photo" id="photo" class="input-file" onchange="previewImage(event)">
                                                        <label for="photo" class="rounded-3 text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                                            <i class="ti-cloud-down large-icon me-3 d-block"></i>
                                                            <span class="js-fileName">Drag and drop or click to replace</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%;">
                                        </div>

                                            <input type="hidden" id="croppedImageData" name="croppedImageData"> <!-- Hidden input for cropped data -->
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="button" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block" onclick="cropImageAndSubmit()">Save</button>
                                        </div>
                                    </form>

                                    </div>
                                </form>
                                </div>
                            </div>
                            <!-- <div class="card w-100 border-0 p-2"></div> -->
                        </div>
                    </div>
                    
                </div>            
            </div>
            <!-- main content -->

            @include('guests.chat')

        </div> 

        <script src="<?php echo url('sociala')?>/js/plugin.js"></script>
        <script src="<?php echo url('sociala')?>/js/lightbox.js"></script>
        <script src="<?php echo url('sociala')?>/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeButtons = document.querySelectorAll('.like-button');
            
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const templateId = button.getAttribute('data-template-id');
                    const token = '{{ csrf_token() }}';

                    fetch(`/templates/${templateId}/like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            _token: token,
                            template_id: templateId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update button icon based on like status
                            const likeIcon = button.querySelector('.like-icon');
                            likeIcon.classList.toggle('feather-thumbs-up');
                            likeIcon.classList.toggle('feather-thumbs-down');

                            // Update total likes count
                            const likeCountElement = document.querySelector(`#likeCount-${templateId}`);
                            likeCountElement.textContent = data.totalLikes;
                        } else {
                            console.error(data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });
    </script>


<script>
    const input = document.getElementById('photo');
    const image = document.getElementById('imagePreview');
    let cropper;

    input.addEventListener('change', (e) => {
        if (e.target.files.length) {
            const reader = new FileReader();
            reader.onload = (e) => {
                if (cropper) {
                    cropper.destroy();
                }
                image.src = e.target.result;
                image.style.display = 'block';
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1,
                    autoCropArea: 1,
                });
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

      // Function to crop the image
      function cropImage() {
        if (cropper) {
            // Get the cropped rectangle coordinates
            const croppedData = cropper.getData();
            const canvas = cropper.getCroppedCanvas();
            const ctx = canvas.getContext('2d');

            // Create a new canvas with the cropped size
            const croppedCanvas = document.createElement('canvas');
            croppedCanvas.width = croppedData.width;
            croppedCanvas.height = croppedData.height;
            const croppedCtx = croppedCanvas.getContext('2d');

            // Draw the cropped portion onto the new canvas
            croppedCtx.drawImage(
                canvas,
                croppedData.x,
                croppedData.y,
                croppedData.width,
                croppedData.height,
                0,
                0,
                croppedData.width,
                croppedData.height
            );

            // Convert the cropped canvas to a data URL
            const croppedDataURL = croppedCanvas.toDataURL();

            // Replace the preview with the cropped image
            image.src = croppedDataURL;

            // Save the cropped data URL to a hidden input field for submitting
            document.getElementById('croppedImageData').value = croppedDataURL;
        }
    }

    // Function to crop the image and submit the form
    function cropImageAndSubmit() {
        cropImage(); // Crop the image first

        // Then submit the form
        document.getElementById('profile').submit();
    }
</script>


    </body>

    </html>