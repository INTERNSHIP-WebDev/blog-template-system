<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Edit</title>

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

</head>
<body>

@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Blog</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('templates.index') }}">Blogs</a></li>
                                    <li class="breadcrumb-item active">Edit Blog</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <form action="{{ route('templates.update', $template->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="header" class="form-label">Header</label>
                                    <input type="text" class="form-control" id="header" name="header" value="{{ old('header', $template->header) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="banner" class="form-label">Banner</label>
                                    <input type="file" class="form-control" id="banner" name="banner" accept="image/*">
                                    @if ($template->banner)
                                        <img src="{{ asset('images/banners/' . $template->banner) }}" alt="Current Banner" class="img-thumbnail" width="100" height="100">
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                    @if ($template->logo)
                                        <img src="{{ asset('images/logos/' . $template->logo) }}" alt="Current Logo" class="img-thumbnail" width="100" height="100">
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $template->category_id == $category->id ? 'selected' : '' }}>{{ $category->text }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Content</label>
                                    <textarea type="text" id="description" class="form-control" aria-describedby="Text help" name="description" required>{{ old('description', $template->description) }}</textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <button type="button" id="addTitle" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Title</button>
                                    <button type="button" id="addSubtitle" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Subtitle</button>
                                    <button type="button" id="addDescription" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Description</button>
                                    <button type="button" id="addImage" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Image</button>
                                    <button type="button" id="addComment" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Comment</button>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Blog</button>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection

</body>
</html>
