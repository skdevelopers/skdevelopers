@extends('layouts.back.app')
@section('content')
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Categories</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Categories</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        @include('layouts.back.flash-message')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">View Categories</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                              <th>ID </th>
                                              <th>Title</th>
                                              <th>Level</th>
                                              <th>Description</th>
                                              <th>URL</th>
                                              <th>Start date</th>
                                              <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->title }}</td>
                          <td>{{ $category->parent_id ?: 'Main' }}</td>
                          <td>{{ $category->description }}</td>
                          <td>{{ $category->url }}</td>
                          <td>{{ $category->created_at }}</td>
                          <td class="text-right">
                            <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-cyan btn-sm edit"><i class="m-r-10 mdi mdi-24px mdi-account-edit"></i></a>
                            <a href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-sm remove"><i class="mdi mdi-24px mdi-delete-forever"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>ID </th>
                                              <th>Title</th>
                                              <th>Level</th>
                                              <th>Description</th>
                                              <th>URL</th>
                                              <th>Start date</th>
                                              <th class="text-right">Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
@endsection
