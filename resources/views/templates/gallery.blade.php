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
                        <h4 class="mb-sm-0 font-size-18">Gallery</h4>
                      

                        <div class="page-title-right">
                       
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blogs</a></li>
                                <li class="breadcrumb-item active">Gallery</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
                
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="d-flex align-items-center">
                                
                                <h5 class="mb-0 card-title flex-grow-1">Banner Images</h5>
                                  <!---button--->
                
                                  <div class="container">
                             <div class="btn-controls">
                <!-- Grid view button -->
                <div class="btn grid_view" onclick="toggleView('gridView')">
                    <ion-icon name="grid-outline"></ion-icon>
                </div>

                <!-- List view button -->
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
                                <p class="card-text text-center" style="font-size: 10px;">{{ $template->banner }}</p>
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
                        <div class="d-flex justify-content-between align-items-center">
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

                <!--button end-->
                            </div>
                        </div>
</div>
<div>   

<!--banner script-->
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

   
    
                
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 card-title flex-grow-1">Logo Images</h5>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                @foreach($templates as $template)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="text-center"> 
                                            @if ($template->logo)
                                                <img src="{{ asset('images/logos/' . $template->logo) }}" alt="{{ $template->logo }}" class="img-thumbnail" width="150" height="150">
                                            @else
                                                No photo
                                            @endif
                                            <p class="card-text text-center" style="font-size: 10px;">{{ $template->logo }}</p>
                                        </div>
 
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->

            </div><!--end row-->
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

@endsection

<!---new script--->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script>
</script>

</body>
</html>
