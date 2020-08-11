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
                        <h4 class="page-title">Add Category</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/add-category') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                <div class="row">@include('layouts.back.flash-message')
                    <div class="col-md-6">
                        <div class="card">
                            <form id="SK-form" class="form-horizontal" action="{{ url('/admin/add-category') }}" name="validate" method="post"> @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Add Category</h4>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Category Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control category_title required" id="category_title" name="category_title"><span id="chkCategory"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Category Level</label>
                                        <div class="col-sm-9">
                                          <select class="select2 form-control custom-select " name="parent_id" id="parent_id">
                                           <option value="">Main Category</option>
                                            @foreach($levels as $val)
                                              <option value="{{ $val->id }}"> {{ $val->title }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea type="textarea" class="form-control required" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control required" id="url" name="url">
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
@section('scripts')
<script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script>
    $('#parent_id').attr('required',true);
    
    $("form[name='settings']").on('change', function () {
                $(this).valid();
            }); //onChange
// Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='validate']").validate({
     errorPlacement: function errorPlacement(error, element) { element.before(error); },
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      category_title: "required",
      parent_id: {
      required: true,
      },
      url: "required",
      description: {
        required: true,
        minlength: 5
      },
      new_password:{
                required: true,
                minlength:6,
                maxlength:20
            },
      password_confirm:{
                required:true,
                minlength:6,
                maxlength:20,
                equalTo:"#new_password"
            },
      validatedCustomFile: "required",
      category_id:"required",
      price:{
        required:true,
        number:true
        }
    }, // rules
    // Specify validation error messages
    messages: {
      category_title: "Please enter your category title",
      parent_id: "Please enter your Level",
      description: {
        required: "Please provide a description",
        minlength: "Your description must be at least 5 characters long"
      },
      url: "Please enter a valid address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
      }
    }); //validation 
    $('.remove').click(function(){
        if(confirm('Are You sure you want to delete this ?')){
            return true;
        }
        return false;
    });
});
</script>
@endsection