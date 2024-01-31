<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | Gallery</title>

    <style>
   

    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')     
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Gallery</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Blogs</a></li>
                                    <li class="breadcrumb-item active">Gallery</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->

                <!-- Banner Images Section -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="align-items-top">
                                    <h5 class="mb-0 card-title flex-grow-1">Banner Images</h5>
                                    <div class="container">
                                        <div class="btn-controls" style="position: absolute; top: 0; right: 0; margin: 10px;">
                                            <div class="btn grid_view" onclick="toggleView('gridView')">
                                                <ion-icon name="grid-outline"></ion-icon>
                                            </div>
                                            <div class="btn list_view" onclick="toggleView('listView')">
                                                <ion-icon name="list-outline"></ion-icon>
                                            </div>
                                        </div>

                                        <!-- Grid view -->
                                        <div class="card-body" id="gridView">
                                            <div class="row" id="imagesRow">
                                                @foreach($templates as $template)
                                                <div class="col-md-4 mb-4">
                                                    <div class="card">
                                                        <div class="text-center">
                                                            @if ($template->banner)
                                                            <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="150" height="150">
                                                            @else
                                                            No photo
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- List view -->
                                        <div class="card-body" id="listView" style="display: none;">
                                            <ul class="list-group" id="imagesList">
                                                @foreach($templates as $template)
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-top">
                                                        <div class="text-center">
                                                            @if ($template->banner)
                                                            <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="50" height="50">
                                                            @else
                                                            No photo
                                                            @endif
                                                        </div>
                                                        <p class="card-text text-center" style="font-size: 12px;">{{ $template->banner }}</p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <nav aria-label="...">
                                    <ul class="pagination" id="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner Images Section -->

                <!-- Logo Images Section -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="align-items-top">
                                    <h5 class="mb-0 card-title flex-grow-1">Logo Images</h5>
                                    <div class="container">
                                        <div class="btn-controls" style="position: absolute; top: 0; right: 0; margin: 10px;">
                                            <div class="btn grid_view" onclick="toggleView1('gridView1')">
                                                <ion-icon name="grid-outline"></ion-icon>
                                            </div>
                                            <div class="btn list_view" onclick="toggleView1('listView1')">
                                                <ion-icon name="list-outline"></ion-icon>
                                            </div>
                                        </div>

                                        <!-- Grid view -->
                                        <div class="card-body" id="gridView1">
                                            <div class="row" id="imagesRow">
                                                @foreach($templates as $template)
                                                <div class="col-md-4 mb-4">
                                                    <div class="card">
                                                        <div class="text-center">
                                                            @if ($template->logo)
                                                            <img src="{{ asset('images/logos/' . $template->logo) }}" alt="{{ $template->logo }}" class="img-thumbnail" width="150" height="150">
                                                            @else
                                                            No photo
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- List view -->
                                        <div class="card-body" id="listView1" style="display: none;">
                                            <ul class="list-group" id="imagesList">
                                                @foreach($templates as $template)
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-top">
                                                        <div class="text-center">
                                                            @if ($template->logo)
                                                            <img src="{{ asset('images/logos/' . $template->logo) }}" alt="{{ $template->logo }}" class="img-thumbnail" width="50" height="50">
                                                            @else
                                                            No photo
                                                            @endif
                                                        </div>
                                                        <p class="card-text text-center" style="font-size: 12px;">{{ $template->logo }}</p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Logo Images Section -->

            </div><!-- end container-fluid -->
        </div><!-- End Page-content -->
    </div><!-- end main content -->

    </div><!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @endsection

    <!-- New script -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Banner script -->
    <script>
        function toggleView(viewId) {
            var gridView = document.getElementById("gridView");
            var listView = document.getElementById("listView");

            if (viewId === "gridView") {
                gridView.style.display = "block";
                listView.style.display = "none";
            } else if (viewId === "listView") {
                gridView.style.display = "none";
                listView.style.display = "block";
            }
        }
    </script>

    <!-- Logo script -->
    <script>
        function toggleView1(viewId1) {
            var gridView1 = document.getElementById("gridView1");
            var listView1 = document.getElementById("listView1");

            if (viewId1 === "gridView1") {
                gridView1.style.display = "block";
                listView1.style.display = "none";
            } else if (viewId1 === "listView1") {
                gridView1.style.display = "none";
                listView1.style.display = "block";
            }
        }
    </script>

<!-- JavaScript Script -->
<script>
</script>


</body>
</html>
