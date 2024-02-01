{{-- Your Blade file --}}
<?php
// FOOTER SOCIALS DUMMY DATA
$socials = [
    'facebook' => TRUE,
    'twitter' => FALSE,
    'pinterest' => TRUE,
    'instagram' => TRUE,
    'google' => TRUE
];
?>

<style>
	.rounded-circle {
    width: 70px;
    height: 70px; 
    border-radius: 50%;
    object-fit: cover; 
}
</style>

	<script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 1000,
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


@extends("blog.layouts.layout", ['socials' => $socials])

@section("title", "Sample Blog")

@section("content")
	<!-- Menu -->
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm">
			@if ($template->logo)
				<img src="{{ asset('images/logos/' . $template->logo) }}" alt="Logo Image" class="rounded-circle">
			@else
				No photo
			@endif
		</div>
		<div class="search">
			<form action="#">
				<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
				<img class="header_search_icon menu_mm" src="{{ asset('landing_assets/images/search_2.png') }}" alt="">
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.html">home</a></li>
				<li class="menu_mm"><a href="#">This Post</a></li>
				<li class="menu_mm"><a class="active" href="contact.html">Contact</a></li>
			</ul>
		</nav>
	</div>
    <!-- Home -->
    <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('landing_assets/images/regular.jpg') }}" data-speed="0.8"></div>
		<div class="home_content">
			<div class="container">
				@if(session('status'))
				<div id="status_card" class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="status_card">
						<h5>Comment posted successfully</h5>
						</div>
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<!-- Post Comment -->
						<div class="post_comment">
							<div class="contact_form_container">
							<form action="{{ route('emails.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div>
										<input type="text" class="contact_input contact_input_name" name="send_name"  placeholder="Your Name" required="required">
										<input type="email" class="contact_input contact_input_email" name="send_email"  placeholder="Your Email" required="required">
										<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter email subject" required>
										<input type="hidden" name="rcpt_name" value="{{ $template->user->name }}">
										<input type="hidden" name="rcpt_email" value="{{ $template->user->email }}">
										<textarea type="text" id="message" class="form-control" aria-describedby="Text help" name="message"  placeholder="Build your content here" required></textarea>
										<button type="submit" class="contact_button">Send Message</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
@endsection