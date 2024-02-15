<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisements | List</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
                                            <h5 class="mb-0 card-title flex-grow-1">Advertisement Lists</h5>
                                            <div class="flex-shrink-0">
                                                <a href="{{ route('advertisements.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Advertisement</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="card-body">
                                        <div id="advertisement_data">
                                            @include('advertisements.pagination_advertisement')
                                        </div>
                                    </div>
                                  
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

        // Add click event listener to the eye icon buttons
        var eyeButtons = document.querySelectorAll(".btn-view-ad");
        eyeButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Get the advertisement details from data attributes
                var adFileType = button.getAttribute("data-file-type");
                var adFileName = button.getAttribute("data-file-name");

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
            });
        });

        // Close the modal when the close button is clicked
        var closeModalButtons = document.querySelectorAll(".btn-close");
        closeModalButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                adModal.classList.remove("show");
                adModal.style.display = "none";

                // Pause the video if it exists
                if (videoElement) {
                    videoElement.pause();
                }
            });
        });
    });
</script>

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
