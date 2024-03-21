<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement | Create</title>
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
                            <h4 class="mb-sm-0 font-size-18">Create New Advertisement</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('templates.index') }}">Advertisements</a></li>
                                    <li class="breadcrumb-item active">Create</li>
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
                                <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                        
                                <div class="mb-3">
                                    <label for="name" class="form-label">Upload Ad File</label>
                                    <input type="file" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="priority" class="form-label">Prioritize Ad?</label>
                                    <select class="form-select" id="priority" name="priority" required>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary">Create Advertisement</button>
                                
                                
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
