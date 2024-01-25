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

                                <div id="titles">
                                    @foreach ($template->titles as $title)
                                        <div class="title">
                                            <div class="form-group">
                                                <label for="titles[{{ $title->id }}][text]">Title</label>
                                                <input type="text" name="titles[{{ $title->id }}][text]" class="form-control" value="{{ old('titles.' . $title->id . '.text', $title->text) }}" required>
                                                <input type="hidden" name="titles[{{ $title->id }}][id]" value="{{ $title->id }}">
                                            </div><br>
                                            <button type="button" onclick="removeTitleField(this)">Remove</button>
                                        </div><br>
                                    @endforeach
                                </div>
                                <button type="button" id="addTitle">Add Title</button><br><br>

                                <button type="submit" class="btn btn-primary">Update Blog</button>
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
            <div class="title-fields">
                <div class="form-group">
                    <label for="titles[${newTitleIndex}][text]">Title</label>
                    <input type="text" name="titles[${newTitleIndex}][text]" class="form-control" placeholder="Title" required>
                </div><br>
                <button type="button" onclick="removeTitleField(this)">Remove</button>
            </div><br>
        `;
        titlesContainer.appendChild(newTitle);
    }

    // Function to remove a title field
    function removeTitleField(button) {
        let titleField = button.parentElement;
        titleField.remove();
    }

    document.getElementById('addTitle').addEventListener('click', addTitleField);
</script>

    <!-- end main content-->
@endsection

</body>
</html>
