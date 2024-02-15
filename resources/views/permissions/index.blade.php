<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blogs | Permission</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
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
                            <h4 class="mb-sm-0 font-size-18">Permissions List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Permissions</a></li>
                                    <li class="breadcrumb-item active">Permissions List</li>
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
                                    <h5 class="mb-0 card-title flex-grow-1">Permissions List</h5>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add New Permission</a>
                                        <a href="{{ route('permissions.index') }}" class="btn btn-light"><i class="mdi mdi-refresh"></i></a>
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
                                <div class="row g-3">
                                    <div class="col-xxl-4 col-lg-6">
                                        <label>Search:</label>
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search for ...">
                                    </div>
                                    <div class="col-xxl-2 col-lg-6">

                                        <form method="GET" action="/filter">
                                            <div class="row pb=3">
                                                <div class="col-md-4">
                                                    <label>Start Date:</label>
                                                    <input type="date" name="start_date" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>End Date:</label>
                                                    <input type="date" name="end_date" class="form-control">
                                                </div>
                                                <div class="col-md-1 pt-4">
                                                    <button type="submit" class="btn btn-primary"> Filter </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-data">
                                    <table class="table table-bordered align-middle nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">No</th>
                                                <th class="text-center" scope="col">Permission</th>
                                                <th class="text-center" scope="col">Date Created</th>
                                                <th class="text-center" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($permissions as $key => $permission)
                                            <tr>
                                                <th class="text-center" scope="col">{{ ($permissions->currentPage()-1)*$permissions->perPage() + $loop->iteration }}</th>
                                                <td class="text-center" scope="col">{{ $permission->name }}</td>
                                                <td class="text-center" scope="col">{{ $permission->created_at->format('M d, Y \a\t h:i A') }}</td>
                                                <td class="text-center" scope="col">
                                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm delete-btn"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No permissions found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {!! $permissions->links() !!}
                                </div>
                            </div>

                            @include('permissions.permissions_js')

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
    @endsection

</body>

</html>