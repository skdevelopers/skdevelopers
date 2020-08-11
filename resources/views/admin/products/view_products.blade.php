@extends('layouts.back.app')
@section('style')
      <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
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
                        <h4 class="page-title">Products</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Products</li>
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
                                <h5 class="card-title">View Products</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                              <th>ID </th>
                                              <th>Cat ID</th>
                                              <th>Cat Name</th>
                                              <th>Title</th>
                                              <th>Code</th>
                                              <th>Color</th>
                                              <th>Description</th>
                                              <th>Price</th>
                                              <th>Image</th>
                                              <th>Start date</th>
                                              <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @foreach($products as $product)
                        <tr>
                          <td>{{ $product->id }}</td>
                          <td>{{ $product->category_id }}</td>
                          <td>{{ $product->category_name }}</td>
                          <td>{{ $product->product_name }}</td>
                          <td>{{ $product->product_code }}</td>
                          <td>{{ $product->product_color }}</td>
                          <td>{{ $product->description }}</td>
                          <td>{{ $product->price }}</td>
                          <td>
                            @if(!empty($product->image))
                            <img src="{{ asset('/assets/images/products/small/'.$product->image) }}" style="width: 70px;"> 
                            @endif
                          </td>
                          <td>{{ $product->created_at }}</td>
                          <td class="text-right">
                            <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-success btn-sm margin-5" data-toggle="modal" data-target="#Modal{{ $product->id }}">View</a>
                            <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-cyan btn-sm margin-5 edit">Edit</a>
                            <a rel="{{ $product->id }}" rel1="delete-product" <?php //href="{{ url('/admin/delete-product/'.$product->id) }}" ?> href="javascript:" class="btn btn-danger btn-sm remove">Delete</a>
                          </td>
                        </tr>
                        <!-- Modal -->
                                <div class="modal fade" id="Modal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                                    <div class="modal-dialog" role="document ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $product->product_name }} Full Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true ">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Product ID: {{ $product->id }}</p>
                                                <p>Category ID: {{ $product->category_id }}</p>
                                                <p>Product Code: {{ $product->product_code }}</p>
                                                <p>Product Color: {{ $product->product_color }}</p>
                                                <p>Price: {{ $product->price }}</p>
                                                <p>Description: {{ $product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                        @endforeach
                      </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>ID </th>
                                              <th>Cat ID</th>
                                              <th>Cat Name</th>
                                              <th>Title</th>
                                              <th>Code</th>
                                              <th>Color</th>
                                              <th>Description</th>
                                              <th>Price</th>
                                              <th>Image</th>
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
@section('scripts')
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <sript>
      $(function() {
              $('#zero_config').DataTable();
            });
    </sript>
@endsection
