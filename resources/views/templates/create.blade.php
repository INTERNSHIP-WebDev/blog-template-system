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

                                <div id="titles">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>
                                <br><button type="button" id="addTitle" class="btn btn-success">Add Title</button><br><br>

                                <div id="subtitles">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>
                                <br><button type="button" id="addSubtitle" class="btn btn-warning">Add Subtitle</button><br><br>

                                <div id="descriptions">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>
                                <br><button type="button" id="addDescription" class="btn btn-warning">Add Description</button><br><br>

                                <div id="images">
                                    <!-- Existing titles will be added here dynamically -->
                                </div>
                                <br><button type="button" id="addImage" class="btn btn-warning">Add Image</button><br><br>
                                

                                <button type="submit" class="btn btn-primary">Create Blog</button>
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
    let imageIndex = 1; // Initialize the title index

    // Function to add a new title field
    function addImageField() {
        let imagesContainer = document.getElementById('images');
        let newImageIndex = imagesContainer.children.length;
        let newImage = document.createElement('div');
        newImage.className = 'image';
        newImage.innerHTML = `
            <div class="image-fields" style="margin-bottom: 20px">
                <label for="images[${newImageIndex}][text]">{{ __('Image') }}</label>
                <div class="form-group d-flex">
                    <input type="file" name="images[${newImageIndex}][file]" class="form-control" accept="image/*" required>
                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeImageField(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        imagesContainer.appendChild(newImage);
        imageIndex++; // Increment the title index for the next title
    }

    // Function to remove a title field
    function removeImageField(button) {
        let imageField = button.parentElement.parentElement;
        imageField.remove();
    }

    document.getElementById('addImage').addEventListener('click', addImageField);
</script>



    <!-- end main content-->
@endsection

</body>
</html>
