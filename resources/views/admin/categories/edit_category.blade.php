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
                        <h4 class="page-title">Edit Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/add-category') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
                    <div class="col-md-6">
                        <div class="card">
                            <form id="SK-form" class="form-horizontal" action="{{ url('/admin/edit-category') }}" name="validate" method="post"> @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Edit Category</h4>
                                    @include('layouts.back.flash-message')
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Category Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control required category_title" id="category_title" name="category_title" value="{{ $categoryDetails->title }}"><span id="chkCategory"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Category Level</label>
                                        <div class="col-sm-9">
                                           <select class="select2 form-control custom-select" name="parent_id" id="parent_id" style="width: 100%; height:36px;">
                                           <option value="">Main Category</option>
                                            @foreach($levels as $val)
                                              <option value="{{ $val->id }}" @if($val->id == $categoryDetails->parent_id) selected @endif>{{ $val->title }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea type="textarea" class="form-control required" id="description" name="description">{{ $categoryDetails->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control required" id="url" name="url" value="{{ $categoryDetails->url }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-rose">Add Category</button>
                                    </div>
                                </div>
                            </form>
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
     
                  

@endsection