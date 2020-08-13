@extends('layouts.back.app')
@section('style')
      <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
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
                        <h4 class="page-title">Add Product Attributes</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/add-attributes') }}">Home</a></li>
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
                            <form id="SK-form" class="form-horizontal" action="{{ url('/admin/add-attributes/'.$productDetails->id) }}" name="validate" method="post" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Add Product Attributes</h4>
                                    @include('layouts.back.flash-message')
                                    <input type="hidden" name="proudct_id" value="{{ $productDetails->id}}">
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                        <label for="product_name" class="col-sm-3 text-right control-label col-form-label">{{ $productDetails->product_name }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="product_code" class="col-sm-3 text-right control-label col-form-label">Product Code</label>
                                        <label for="product_code" class="col-sm-3 text-right control-label col-form-label">{{ $productDetails->product_code }}</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="product_color" class="col-sm-3 text-right control-label col-form-label">Product Color</label>
                                        <label for="product_color" class="col-sm-3 text-right control-label col-form-label">{{ $productDetails->product_color }}</label>
                                    </div>
                                    <label for="product_attributes" class="col-sm-12 text-center control-label col-form-label">Product Attributes</label>
                                   <div class="field_wrapper col-sm-12">

                                     <div class="input-group">
                                        <input type="text" class="form-control" id="sku" name="sku[]" placeholder="SKU" />
                                        <input type="text" class="form-control" id="size" name="size[]" placeholder="Size" />
                                        <input type="text" class="form-control" id="price" name="price[]" placeholder="Price" />
                                        <input type="text" class="form-control" id="stock" name="stock[]" placeholder="Stock" />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus-square fa-1x" aria-hidden="true"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                    </div> 
                                   
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-rose">Add Attributes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>
                    <div class="col-md-6">
                     <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">View Products Attributes</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                              <th>ID </th>
                                              <th>SKU</th>
                                              <th>SIZE</th>
                                              <th>PRICE</th>
                                              <th>STOCK</th>
                                              <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @foreach($productDetails['attributes'] as $attributes)
                        <tr>
                          <td>{{ $attributes->id }}</td>
                          <td>{{ $attributes->sku }}</td>
                          <td>{{ $attributes->size }}</td>
                          <td>{{ $attributes->price }}</td>
                          <td>{{ $attributes->stock }}</td>
                          <td class="text-right">
                            <button class="btn btn-danger btn-sm" onclick="deleteConfirmation('{{ $attributes->id }}')">Delete</button>
                            
                          </td>
                        </tr>
                        <!-- Modal -->
                                
                                <!-- Modal -->
                        @endforeach
                      </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>ID </th>
                                              <th>SKU</th>
                                              <th>SIZE</th>
                                              <th>PRICE</th>
                                              <th>STOCK</th>
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
@endsection
@section('scripts')
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script>
    $(function() {
         
     $('#zero_config').DataTable();   
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
    
});
</script>
<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/delete-attribute')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            
                            swal("Done!", results.message, "success");
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group"><input type="text" class="form-control" id="sku" name="sku[]" placeholder="SKU" /><input type="text" class="form-control" id="size" name="size[]" placeholder="Size" /><input type="text" class="form-control" id="price" name="price[]" placeholder="Price" /><input type="text" class="form-control" id="stock" name="stock[]" placeholder="Stock" /><div class="input-group-append"><div class="input-group-text"><a href="javascript:void(0);" class="remove_button"><i class="fas fa-trash fa-1x" aria-hidden="true"></i></a></div></div></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent().parent().parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
@endsection