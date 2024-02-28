<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisements | List</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

@extends('layouts.app')

@section('content')
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        max-width: 700px;
        height: auto;
        overflow: auto;
    }

    .modal-content {
        position: relative;
        max-width: 100%;
        height: auto;
    }

    .modal-body {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-body img,
    .modal-body video {
        max-width: 100%;
        max-height: 100%;
        height: auto;
        width: auto;
    }

    </style>   
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
                                    <h4 class="mb-sm-0 font-size-18">Advertisements List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Advertisements</a></li>
                                            <li class="breadcrumb-item active">List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                        <div class="card-body border-bottom">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 card-title flex-grow-1">Advertisements List</h5>
                                            <div class="flex-shrink-0">
                                            @can('create-advertisement')
                                                <a href="{{ route('advertisements.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New Advertisement</a>
                                            @endcanany 
                                                <button class="btn btn-light" type="button" id="refresh_table"><i class="mdi mdi-refresh"></i></button>
                                                <div class="dropdown d-inline-block">
                                                    <button type="menu" class="btn btn-success" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body border-bottom">
                                        <form method="GET" action="/filter">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-xxl-2 col-lg-4">
                                                    <label>Search:</label>
                                                    <input type="search" name="search" class="form-control" id="searchInput" placeholder="Search for ...">
                                                </div>
                                                <div class="col-xxl-2 col-lg-3">
                                                    <label>Start Date:</label>
                                                    <div class="input-group">
                                                        <input type="date" name="start_date" class="form-control" id="start_date">
                                                        <button class="btn btn-primary" type="button" id="set_today_start">Today</button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-lg-3">
                                                    <label>End Date:</label>
                                                    <div class="input-group">
                                                        <input type="date" name="end_date" class="form-control" id="end_date">
                                                        <button class="btn btn-primary" type="button" id="set_today_end">Today</button>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-lg-1 d-grid">
                                                    <label>&nbsp;</label>
                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </div>
                                                <div class="col-xxl-2 col-lg-1 d-grid">
                                                    <label>&nbsp;</label>
                                                    <button class="btn btn-secondary" type="button" id="clear_filter">Clear</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                   
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="table-data">
                                                    <table class="table table-bordered align-middle nowrap">
                                                        @include('advertisements.advertisement_pagination')
                                                    </table>
                                                </div>
                                            </div>
                                            @include('advertisements.advertisements_js')
                                        </div><!--end card-->
                                  
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->

                        </div><!--end row-->
                        

                    </div> <!-- container-fluid -->
                </div><!-- End Page-content -->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Modal -->
        <div id="adModal" class="modal">
            <div class="modal-overlay"></div> 
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Advertisement Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div id="adContent"></div>
                    </div>

                </div>
            </div>
        </div>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the modal and modal content
    var adModal = document.getElementById("adModal");
    var adContent = document.getElementById("adContent");
    var videoElement;

    // Delegate click event handling to the document for dynamically loaded elements
    document.addEventListener("click", function(event) {
        var target = event.target;
        if (target.classList.contains("btn-view-ad")) {
            // Get the advertisement details from data attributes
            var adFileType = target.getAttribute("data-file-type");
            var adFileName = target.getAttribute("data-file-name");

            // Populate the modal content based on file type
            if (adFileType === 'Image') {
                adContent.innerHTML = '<img src="{{ asset('images/ads/') }}/' + adFileName + '" alt="Advertisement Image" class="img-fluid">';
            } else if (adFileType === 'Video') {
                adContent.innerHTML = '<video controls autoplay><source src="{{ asset('images/ads/') }}/' + adFileName + '" type="video/mp4">Your browser does not support the video tag.</video>';
            } else if (adFileType === 'GIF') {
                adContent.innerHTML = '<img src="{{ asset('images/ads/') }}/' + adFileName + '" alt="Advertisement GIF" class="img-fluid">';
            }

            // Show the modal
            adModal.classList.add("show");
            adModal.style.display = "block";
        } else if (target.classList.contains("btn-close")) {
            adModal.classList.remove("show");
            adModal.style.display = "none";

            // Pause the video if it exists
            if (videoElement) {
                videoElement.pause();
            }
        }
    });
});
    </script>
        @endsection
    </body>

    <script>
            $(document).ready(function(){
                $(document).on('click', '.pagination a', function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetch_data_advertisement(page);
                });

                function fetch_data_advertisement(page)
                {
                    $.ajax({
                        url:"/pagination/fetch_data_advertisement?page="+page,
                        success:function(data)
                        {
                            $('#advertisement_data').html(data);
                        }
                    })
                }
            });
        </script>
</html>
