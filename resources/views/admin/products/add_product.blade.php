@extends('layouts.back.app')
@section('style')
      <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
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
                        <h4 class="page-title">Add Product</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/add-Product') }}">Home</a></li>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form id="SK-form" class="form-horizontal" action="{{ url('/admin/add-product') }}" name="validate" method="post" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    @include('layouts.back.flash-message')
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                          <select class="select2 form-control custom-select " name="category_id" id="
                                          category_id">
                                          <?php echo $categories_dropdown; ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control product_name required" id="product_name" name="product_name"><span id="chkProd"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Product Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control required" id="product_code" name="product_code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Product Color</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control required" id="product_color" name="product_color">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea type="textarea" class="form-control required" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control required" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                            <input type="file" class="form-control required custom-file-input" id="validatedCustomFile" name="image" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-rose">Add Product</button>
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
    $(function() {
         
            $("form[name='settings']").on('change', function () {
                $(this).valid();
            }); //onChange     
        /****************************************
         *       Basic Table                   *
         ****************************************/
   
        $(".current_password").blur(function(e){
                        e.preventDefault();
                      var current_password = $("#current_password").val();
                        $.ajax({
                          type: 'get',
                          url: '/admin/check-pwd',
                          data: {current_password:current_password},
                          success:function(resp){
                            //alert(resp);
                            if(resp=="false"){
                              $("#chkPassword").html("<font color='red'>Current Password is Incorrect</font>");
                            }else{
                              $("#chkPassword").html("<font color='green'>Current Password is correct</font>");
                            }
                          },error:function(){
                            $("#chkPassword").html("<font color='red'>Error!!!</font>");
                          }

                        });
                    });
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