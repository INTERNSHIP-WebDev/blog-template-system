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
    <!-- end main content-->
@endsection

</body>
</html>
