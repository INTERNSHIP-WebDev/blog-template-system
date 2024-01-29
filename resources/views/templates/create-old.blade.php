<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Create</title>

</head>
<body>

@extends('layouts.app')

@section('content')

<script src="https://cdn.tiny.cloud/1/yggdk4mzovf9ua46iairb23jkr4gu7luzq2lyqic0sf6kkm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
        },
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
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
        }
    });
</script>

    <!-- Page Content -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Create New Blog</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('templates.index') }}">Blogs</a></li>
                                    <li class="breadcrumb-item active">Create New Blog</li>
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
                                <!-- Your create form content goes here -->
                                <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="header" class="form-label">Header</label>
                                    <input type="text" class="form-control" id="header" name="header" required>
                                </div>

                                <div class="mb-3">
                                    <label for="banner" class="form-label">Banner</label>
                                    <input type="file" class="form-control" id="banner" name="banner" accept="image/*" required>
                                </div>

                                <div class="mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                                </div> <br>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->text }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="titles">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>

                                <div id="subtitles">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>

                                <div id="descriptions">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>

                                <div id="images">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>

                                <div id="comments">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>

                                <div class="mb-3">
                                    <button type="button" id="addTitle" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Title</button>
                                    <button type="button" id="addSubtitle" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Subtitle</button>
                                    <button type="button" id="addDescription" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Description</button>
                                    <button type="button" id="addImage" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Image</button>
                                    <button type="button" id="addComment" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Comment</button>
                                </div>

                                <div class="mb-3">
                                    <button   button type="submit" class="btn btn-primary">Create Blog</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->
    </div>

    
<script>
    let titleIndex = 1; // Initialize the title index

    // Function to add a new title field
    function addTitleField() {
        let titlesContainer = document.getElementById('titles');
        let newTitleIndex = titlesContainer.children.length;
        let newTitle = document.createElement('div');
        newTitle.className = 'title';
        newTitle.innerHTML = `
            <div class="title-fields" style="margin-bottom: 20px">
                <label for="titles[${newTitleIndex}][text]">{{ __('Title') }}</label>
                <div class="form-group d-flex">
                    <input type="text" name="titles[${newTitleIndex}][text]" class="form-control" placeholder="Title" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeTitleField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        titlesContainer.appendChild(newTitle);
        titleIndex++; // Increment the title index for the next title
    }

    // Function to remove a title field
    function removeTitleField(button) {
        let titleField = button.parentElement.parentElement;
        titleField.remove();
    }

    document.getElementById('addTitle').addEventListener('click', addTitleField);
</script>


<script>
    let subtitleIndex = 1; // Initialize the title index

    // Function to add a new title field
    function addSubtitleField() {
        let subtitlesContainer = document.getElementById('subtitles');
        let newSubtitleIndex = subtitlesContainer.children.length;
        let newSubtitle = document.createElement('div');
        newSubtitle.className = 'subtitle';
        newSubtitle.innerHTML = `
            <div class="subtitle-fields" style="margin-bottom: 20px">
                <label for="subtitles[${newSubtitleIndex}][text]">{{ __('Subtitle') }}</label>
                <div class="form-group d-flex">
                    <input type="text" name="subtitles[${newSubtitleIndex}][text]" class="form-control" placeholder="Subtitle" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeSubtitleField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        subtitlesContainer.appendChild(newSubtitle);
        subtitleIndex++; // Increment the title index for the next title
    }

    // Function to remove a title field
    function removeSubtitleField(button) {
        let subtitleField = button.parentElement.parentElement;
        subtitleField.remove();
    }

    document.getElementById('addSubtitle').addEventListener('click', addSubtitleField);
</script>


<script>
    let descriptionIndex = 1; // Initialize the title index

    // Function to add a new title field
    function addDescriptionField() {
        let descriptionsContainer = document.getElementById('descriptions');
        let newDescriptionIndex = descriptionsContainer.children.length;
        let newDescription = document.createElement('div');
        newDescription.className = 'description';
        newDescription.innerHTML = `
            <div class="description-fields" style="margin-bottom: 20px">
                <label for="descriptions[${newDescriptionIndex}][text]">{{ __('Description') }}</label>
                <div class="form-group d-flex">
                    <input type="text" name="descriptions[${newDescriptionIndex}][text]" class="form-control" placeholder="Description" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeDescriptionField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        descriptionsContainer.appendChild(newDescription);
        descriptionIndex++; // Increment the title index for the next title
    }

    // Function to remove a title field
    function removeDescriptionField(button) {
        let descriptionField = button.parentElement.parentElement;
        descriptionField.remove();
    }

    document.getElementById('addDescription').addEventListener('click', addDescriptionField);
</script>


<script>
    let imageIndex = 1; // Initialize the image index

    // Function to add a new image field
    function addImageField() {
        let imagesContainer = document.getElementById('images');
        let newImageIndex = imagesContainer.children.length;
        let newImage = document.createElement('div');
        newImage.className = 'image';
        newImage.innerHTML = `
            <div class="image-fields" style="margin-bottom: 20px">
                <label for="images[${newImageIndex}][file]">{{ __('Image') }}</label>
                <div class="form-group d-flex">
                    <input type="file" name="images[${newImageIndex}][file]" class="form-control" accept="image/*" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeImageField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        imagesContainer.appendChild(newImage);
        imageIndex++; // Increment the image index for the next image
    }

    // Function to remove an image field
    function removeImageField(button) {
        let imageField = button.parentElement.parentElement;
        imageField.remove();
    }

    document.getElementById('addImage').addEventListener('click', addImageField);
</script>



<script>
    let commentIndex = 1; // Initialize the title index

    // Function to add a new title field
    function addCommentField() {
        let commentsContainer = document.getElementById('comments');
        let newCommentIndex = commentsContainer.children.length;
        let newComment = document.createElement('div');
        newComment.className = 'comment';
        newComment.innerHTML = `
            <div class="comment-fields" style="margin-bottom: 20px">
                <label for="comments[${newCommentIndex}][text]">{{ __('Name') }}</label>
                <div class="form-group d-flex">
                    <input type="text" name="comments[${newCommentIndex}][name]" class="form-control" placeholder="Name" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeCommentField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div><br>

                <label for="comments[${newCommentIndex}][text]">{{ __('Comment') }}</label>
                <div class="form-group d-flex">
                    <input type="text" name="comments[${newCommentIndex}][message]" class="form-control" placeholder="Comment your message" required>
                </div>
            </div>
        `;
        commentsContainer.appendChild(newComment);
        commentIndex++; // Increment the title index for the next title
    }

    // Function to remove a title field
    function removeCommentField(button) {
        let commentField = button.parentElement.parentElement;
        commentField.remove();
    }

    document.getElementById('addComment').addEventListener('click', addCommentField);
</script>


    <!-- end main content-->
@endsection

</body>
</html>
