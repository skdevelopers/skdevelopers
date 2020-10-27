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
@section('script')
<script type="text/javascript">
  $(function () {
    
    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('categories.index') }}",
        columns: [
            // { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'id', name: 'id' },
            { data: 'parent_id', name: 'parent_id' },
            { data: 'title', name: 'title' },
            // { data: 'product_count', name: 'product_count' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'url', name: 'url' },
            { data: 'created_at', name: 'created_at' },
            // { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
            
        ]
    });
});

  $('.updateStatus').click(function(){
    let status = $(this).text();
    let status_id = $(this).attr("status_id");
    $.ajax({
      type:'post',
      url: '/admin/update-status',
      data:{status:status,status_id:status_id},
      success:function(resp){
        if(resp['status']==0){
          $('#status-'+status_id).html('<a class="updateStatus" href="javascript:void(0)">Inactive</a>');
        }else if(resp['status']==1){
          $('#status-'+status_id).html('<a class="updateStatus" href="javascript:void(0)">Active</a>');
        }

      },error:function(){

      }

    });
  });
</script>
@endsection