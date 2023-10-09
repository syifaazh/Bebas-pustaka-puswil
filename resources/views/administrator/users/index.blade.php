@extends('layouts.admin.master')

@section('morecss')
<!-- Custom styles for this page -->
<link href="{{ url('public/admin-assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title', 'Users')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-success">Data Users</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="dataTableUsers" width="100%" cellspacing="0">
                    <thead>
                        <tr >
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Menu</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('morejs')
<!-- Page level plugins -->
<script src="{{ url('public/admin-assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('public/admin-assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
{{-- <script>
    $(document).ready( function () {
    $('#dataTableBlogs').DataTable();
} );
</script> --}}
<script>
    //Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTableUsers').DataTable({
        processing : true,
        serverSide : true,
        ajax : {
          url: "{{ url('administrator/users/table-user') }}",
        //   type: 'GET'
        },
        columns: [
          {data:'name',name:'name'},
          {data:'username',name:'username'},
          {data:'userrole',name:'userrole'},
          {data:'action',name:'action'},
        ],
        order: [[0, 'asc']]
      });
    });
</script>
@endsection