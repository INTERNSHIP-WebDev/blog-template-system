<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | Gallery</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
             .image-container {
    width: 100%;
    height: 0; 
    padding-top: calc(100% * 3 / 4);
    position: relative;
    overflow: hidden;
}

.image-container img {
    position: absolute; 
    width: 100%; 
    height: 100%; 
    top: 0; 
    left: 0; 
    object-fit: cover;
    }

    .list-image-container {
    width: 60px; 
    height: 60px; 
    position: relative;
    overflow: hidden; 
}

.list-image-container img {
    position: absolute; 
    width: 100%; 
    height: 100%; 
    top: 0; 
    left: 0; 
    object-fit: cover;
}
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
                                        <!-- SORT FORM 1 -->
                                        <div id="sortBannerForm" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; border: 1px solid #ccc; z-index: 1000;">
                                            <h4>Sort Options</h4>
                                            <button id="closeSortForm" onclick="hideSortForm()">Close</button>
                                            <form id="sortForm">
                                                <label>
                                                    <input type="radio" name="sortOption" value="latest"> Latest
                                                </label>
                                                <label>
                                                    <input type="radio" name="sortOption" value="oldest"> Oldest
                                                </label>
                                                <button type="submit">Apply</button>
                                            </form>
                                        </div>
                                        <!-- END OF SORT FORM 1 -->
                                        <div class="btn-controls" style="position: absolute; top: 0; right: 0; margin: 10px;">
                                            <div class="btn grid_view" onclick="toggleView('gridView')">
                                                <ion-icon name="grid-outline"></ion-icon>
                                            </div>
                                            <div class="btn list_view" onclick="toggleView('listView')">
                                                <ion-icon name="list-outline"></ion-icon>
                                            </div>
                                            <div class="btn list_view" onclick="sort-banner">
                                                <ion-icon name="filter"></ion-icon>
                                            </div>
                                            <!---sortby
                                            <form class="form-inline">
                                                <select class="form-control" onchange="sort_by(this.value)">
                                                    <option value="latest">Latest</option>
                                                    <option value="latest">Oldest</option>
                                                </select>
                                            </form>-->
                                        </div>

                                        <!-- Grid view -->
                                        <div class="card-body" id="gridView">
                                            <div id="anjelfromheaven">
                                                @include('templates.gallery_banner_pagination')
                                            </div>
                                        </div>

                                        <!-- List view -->
                                        <div class="card-body" id="listView" style="display: none;">
                                            <div id="gal-ban-list">
                                                @include('templates.pagination.gallery_banner_list_pagination')
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                    
                            </div>
                        </div>
                    </div>
               
                    <!-- End Banner Images Section -->

                    <!-- Logo Images Section -->

                    <div class="col-lg-6 ">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="align-items-top">
                                    <h5 class="mb-0 card-title flex-grow-1">Logo Images</h5>
                                    <div class="container">
                                        <!-- SORT FORM 2 -->
                                        <div id="sortBannerForm2" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; border: 1px solid #ccc; z-index: 1000;">
                                            <h4>Sort Options</h4>
                                            <button id="closeSortForm2" onclick="hideSortForm2()">Close</button>
                                            <form id="sortForm2">
                                                <label>
                                                    <input type="radio" name="sortOption2" value="latest"> Latest
                                                </label>
                                                <label>
                                                    <input type="radio" name="sortOption2" value="oldest"> Oldest
                                                </label>
                                                <button type="submit">Apply</button>
                                            </form>
                                        </div>
                                        <!-- END OF SORT FORM 2 -->
                                        <div class="btn-controls" style="position: absolute; top: 0; right: 0; margin: 10px;">
                                            <div class="btn grid_view" onclick="toggleView1('gridView1')">
                                                <ion-icon name="grid-outline"></ion-icon>
                                            </div>
                                            <div class="btn list_view" onclick="toggleView1('listView1')">
                                                <ion-icon name="list-outline"></ion-icon>
                                            </div>
                                            <div class="btn list_view" onclick="sort-banner2">
                                                <ion-icon name="filter"></ion-icon>
                                            </div>
                                        </div>

                                        <!-- Grid view -->
                                        <div class="card-body" id="gridView1">
                                            <div id="juiceseal">
                                                @include('templates.gallery_logo_pagination')
                                            </div>
                                        </div>

                                        <!-- List view -->
                                        <div class="card-body" id="listView1" style="display: none;">
                                            <div id="gal-logo-list">
                                                @include('templates.pagination.gallery_logo_list_pagination')
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
    document.addEventListener("DOMContentLoaded", function() {
        // Retrieve the last saved view from local storage
        var savedView = localStorage.getItem("bannerView");
        if (savedView) {
            toggleView(savedView);
        }
    });

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

        // Save the current view to local storage
        localStorage.setItem("bannerView", viewId);
    }
</script>

<!-- Logo script -->
<script>
    $(document).ready(function(){
        $(document).on('click', '#juiceseal .pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_gallery_logo_data(page);
        });

        function fetch_gallery_logo_data(page)
        {
            $.ajax({
                url:"/pagination/fetch_gallery_logo_data?page="+page,
                success:function(data)
                {
                    $('#juiceseal').html(data);
                }
            })
        }
    });
    $(document).ready(function(){
        $(document).on('click', '#gal-logo-list .pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_gallery_logo_list_data(page);
        });

        function fetch_gallery_logo_list_data(page)
        {
            $.ajax({
                url:"/pagination/fetch_gallery_logo_list_data?page="+page,
                success:function(data)
                {
                    $('#gal-logo-list').html(data);
                }
            })
        }
    });
    $(document).ready(function(){
        $(document).on('click', '#gal-ban-list .pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_gallery_banner_list_data(page);
        });

        function fetch_gallery_banner_list_data(page)
        {
            $.ajax({
                url:"/pagination/fetch_gallery_banner_list_data?page="+page,
                success:function(data)
                {
                    $('#gal-ban-list').html(data);
                }
            })
        }
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click', '#anjelfromheaven .pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_gallery_banner_data(page);
        });

        function fetch_gallery_banner_data(page)
        {
            $.ajax({
                url:"/pagination/fetch_gallery_banner_data?page="+page,
                success:function(data)
                {
                    $('#anjelfromheaven').html(data);
                }
            })
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Retrieve the last saved view from local storage
        var savedView1 = localStorage.getItem("logoView");
        if (savedView1) {
            toggleView1(savedView1);
        }
    });

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

        // Save the current view to local storage
        localStorage.setItem("logoView", viewId1);
    }

   
</script>

   

<!-- banner sorting Script -->
<script>
    var query = {};

    function sort_by(value) {
        Object.assign(query, { 'sort_by': value });
        var ajaxUrl = "{{ route('templates.gallery') }}" + '?' + $.param(query);
        fetchGalleryData(ajaxUrl);
    }

    function toggleSortForm() {
        $("#sortBannerForm").toggle();
        // Close the other sorting form
        $("#sortBannerForm2").hide();
    }

    $(document).ready(function () {
        $(".btn.list_view[onclick='sort-banner']").click(function () {
            toggleSortForm();
        });

        $("#sortForm").submit(function (e) {
            e.preventDefault();
            var sortOption = $("input[name='sortOption']:checked").val();
            console.log("Selected sort option:", sortOption);
            toggleSortForm();
        });

        $("#closeSortForm").click(function () {
            toggleSortForm();
        });
    });
</script>

<!-- logo sorting Script -->
<script>
    var query2 = {};

    function sort_by2(value) {
    Object.assign(query2, { 'sort_by': value });
    var ajaxUrl = "{{ route('templates.gallery') }}" + '?' + $.param(query2);
    fetchGalleryData(ajaxUrl); // Call a function to fetch gallery data with AJAX
}

function fetchGalleryData(ajaxUrl) {
    $.ajax({
        url: ajaxUrl,
        type: 'get',
        success: function (data) {
            // Update the gallery content with the fetched data
            $('#galleryContainer').html(data);
        },
        error: function (error) {
            console.error('Error fetching gallery data:', error);
        }
    });
}

    function toggleSortForm2() {
        $("#sortBannerForm2").toggle();
        // Close the other sorting form
        $("#sortBannerForm").hide();
    }

    $(document).ready(function () {
        $(".btn.list_view[onclick='sort-banner2']").click(function () {
            toggleSortForm2();
        });

        $("#sortForm2").submit(function (e) {
            e.preventDefault();
            var sortOption2 = $("input[name='sortOption2']:checked").val();
            console.log("Selected sort option:", sortOption2);
            toggleSortForm2();
        });

        $("#closeSortForm2").click(function () {
            toggleSortForm2();
        });
    });
</script>





</body>
</html>