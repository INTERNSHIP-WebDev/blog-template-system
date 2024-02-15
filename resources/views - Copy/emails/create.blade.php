<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails | Compose Message</title>

    <script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 300,
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

    <style>
        .unread-email {
            font-weight: bold; /* Make unread emails bold */
        }

        .mailbox-link:hover {
            background-color: #f0f0f0; /* Change the background color on hover */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }
    </style>

</head>
<body>

@extends('layouts.app')

@section('content')

                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="main-content">

                    <div class="page-content">
                        <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">New Message</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                                <li class="breadcrumb-item active">New Message</li>
                                            </ol>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-12">
                                    <!-- Left sidebar -->
                                    <div class="email-leftbar card">
                                        <a href="{{ route('emails.create') }}" class="btn btn-danger btn-block waves-effect waves-light">
                                            Compose
                                        </a>
                                        <div class="mail-list mt-4">
                                            <a href="{{ route('emails.inbox') }}" class="mailbox-link">
                                                <i class="mdi mdi-email-outline me-2"></i> Inbox 
                                                <span class="ms-1 float-end">({{ $InboxCount }})</span>
                                            </a>
                                            <a href="{{ route('emails.sent-mail') }}" class="mailbox-link">
                                                <i class="mdi mdi-email-check-outline me-2"></i>Sent Mail 
                                                <span class="ms-1 float-end">({{ $SentMailCount }})</span>
                                            </a>
                                            <!-- <a href="{{ route('emails.draft') }}" class="mailbox-link">
                                                <i class="mdi mdi-file-outline me-2"></i>Draft 
                                                <span class="ms-1 float-end">({{ $DraftCount }})</span>
                                            </a>
                                            <a href="{{ route('emails.trash') }}" class="mailbox-link">
                                                <i class="mdi mdi-trash-can-outline me-2"></i>Trash 
                                                <span class="ms-1 float-end">({{ $TrashCount }})</span>
                                            </a> -->
                                        </div>
                                    </div>
                                    <!-- End Left sidebar -->
            
            
                                    <!-- Right Sidebar -->
                                    <div class="email-rightbar mb-3">
                                        
                                    <div class="card">
                                        <div class="card-body">
                                        <form action="{{ route('emails.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="send_name" value="{{ Auth::user()->name }}">
                                        <input type="hidden" name="send_email" value="{{ Auth::user()->email }}">
                                            <div class="mb-3">
                                                <label for="rcpt_email" class="form-label">To</label>
                                                <input type="email" class="form-control" id="rcpt_email" name="rcpt_email" placeholder="Enter recipient email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter email subject" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message</label>
                                                <textarea type="text" class="form-control" id="message" name="message" aria-describedby="Text help" placeholder="What's your concern?" required></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </form>

                                        </div>
                                    </div>
                                </div><!-- card -->
                                    </div><!-- card -->
            
                                    </div> <!-- end Col-9 -->
            
                                </div>
            
                            </div><!-- End row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                
                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            @endsection
        </body>
    </html>
