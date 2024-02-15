<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Edit</title>
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

                                <div id="titles">
                                    @if ($titles)
                                        @foreach ($titles as $title)
                                            <div class="title-fields" style="margin-bottom: 20px">
                                                <label for="titles[{{ $title->id }}][text]">Title</label>
                                                <div class="form-group d-flex">
                                                    <input type="text" name="titles[{{ $title->id }}][text]" class="form-control" value="{{ old('titles.' . $title->id . '.text', $title->text) }}" required>
                                                    <input type="hidden" name="titles[{{ $title->id }}][id]" value="{{ $title->id }}">
                                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeTitleField(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div id="subtitles">
                                    @if ($subtitles)
                                        @foreach ($subtitles as $subtitle)
                                            <div class="subtitle-fields" style="margin-bottom: 20px">
                                                <label for="subtitles[{{ $subtitle->id }}][text]">Subtitle</label>
                                                <div class="form-group d-flex">
                                                    <input type="text" name="subtitles[{{ $subtitle->id }}][text]" class="form-control" value="{{ old('subtitles.' . $subtitle->id . '.text', $subtitle->text) }}" required>
                                                    <input type="hidden" name="subtitles[{{ $subtitle->id }}][id]" value="{{ $subtitle->id }}">
                                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeSubtitleField(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div id="descriptions">
                                    @if ($descriptions)
                                        @foreach ($descriptions as $description)
                                            <div class="description-fields" style="margin-bottom: 20px">
                                                <label for="descriptions[{{ $description->id }}][text]">Description</label>
                                                <div class="form-group d-flex">
                                                    <input type="text" name="descriptions[{{ $description->id }}][text]" class="form-control" value="{{ old('descriptions.' . $description->id . '.text', $description->text) }}" required>
                                                    <input type="hidden" name="descriptions[{{ $description->id }}][id]" value="{{ $description->id }}">
                                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeDescriptionField(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div id="images">
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <div class="image-fields" style="margin-bottom: 20px">
                                                <label for="images[{{ $image->id }}][text]">Image</label>
                                                <div class="form-group d-flex">
                                                    <input type="text" name="images[{{ $image->id }}][text]" class="form-control" value="{{ old('images.' . $image->id . '.text', $image->text) }}" required>
                                                    <input type="hidden" name="images[{{ $image->id }}][id]" value="{{ $image->id }}">
                                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeImageField(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div id="comments">
                                    @if ($comments)
                                        @foreach ($comments as $comment)
                                            <div class="comment-fields" style="margin-bottom: 20px">
                                                <label for="comments[{{ $comment->id }}][name]">Name</label>
                                                <div class="form-group d-flex">
                                                    <input type="text" name="comments[{{ $comment->id }}][name]" class="form-control" value="{{ old('comments.' . $comment->id . '.name', $comment->name) }}" required>
                                                    <input type="hidden" name="comments[{{ $comment->id }}][id]" value="{{ $comment->id }}">
                                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeCommentField(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div><br>

                                                <label for="comments[{{ $comment->id }}][message]">Comment</label>
                                                <div class="form-group d-flex">
                                                    <input type="text" name="comments[{{ $comment->id }}][message]" class="form-control" value="{{ old('comments.' . $comment->id . '.message', $comment->message) }}" required>
                                                    <input type="hidden" name="comments[{{ $comment->id }}][id]" value="{{ $comment->id }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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

<script>
    let titleIndex = 1; // Initialize the title index with existing titles count

    // Function to add a new title field
    function addTitleField() {
        let titlesContainer = document.getElementById('titles');
        let newTitleIndex = titleIndex++;
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
    }

    // Function to remove a title field
    function removeTitleField(button) {
        let titleContainer = button.closest('.title-fields');
        titleContainer.remove();
    }

    document.getElementById('addTitle').addEventListener('click', addTitleField);
</script>


<script>
    let subtitleIndex = 1; // Initialize the title index with existing titles count

    // Function to add a new title field
    function addSubtitleField() {
        let subtitlesContainer = document.getElementById('subtitles');
        let newSubtitleIndex = subtitleIndex++;
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
    }

    // Function to remove a title field
    function removeSubtitleField(button) {
        let subtitleContainer = button.closest('.subtitle-fields');
        subtitleContainer.remove();
    }

    document.getElementById('addSubtitle').addEventListener('click', addSubtitleField);
</script>


<script>
    let descriptionIndex = 1; // Initialize the title index with existing description count

    // Function to add a new title field
    function addDescriptionField() {
        let descriptionsContainer = document.getElementById('descriptions');
        let newDescriptionIndex = descriptionIndex++;
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
    }

    // Function to remove a title field
    function removeDescriptionField(button) {
        let descriptionContainer = button.closest('.description-fields');
        descriptionContainer.remove();
    }

    document.getElementById('addDescription').addEventListener('click', addDescriptionField);
</script>

<script>
    let imageIndex = 1; // Initialize the title index with existing titles count

    // Function to add a new title field
    function addImageField() {
        let imagesContainer = document.getElementById('images');
        let newImageIndex = imageIndex++;
        let newImage = document.createElement('div');
        newImage.className = 'image';
        newImage.innerHTML = `
            <div class="image-fields" style="margin-bottom: 20px">
                <label for="images[${newImageIndex}][file]">{{ __('Image') }}</label>
                <div class="form-group d-flex">
                    <input type="file" name="images[${newImageIndex}][file]" class="form-control" placeholder="Image" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeImageField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        imagesContainer.appendChild(newImage);
    }

    // Function to remove a title field
    function removeImageField(button) {
        let imageContainer = button.closest('.image-fields');
        imageContainer.remove();
    }

    document.getElementById('addImage').addEventListener('click', addImageField);
</script>


<script>
    let commentIndex = 1; // Initialize the title index with existing comment count

    // Function to add a new title field
    function addCommentField() {
        let commentsContainer = document.getElementById('comments');
        let newCommentIndex = commentIndex++;
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
    }

    // Function to remove a title field
    function removeCommentField(button) {
        let commentContainer = button.closest('.comment-fields');
        commentContainer.remove();
    }

    document.getElementById('addComment').addEventListener('click', addCommentField);
</script>

    <!-- end main content-->
@endsection

</body>
</html>
