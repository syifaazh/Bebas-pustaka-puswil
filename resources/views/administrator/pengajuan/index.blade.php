@extends('layouts.admin.master')

@section('morecss')
<!-- Custom styles for this page -->
<link href="{{ url('public/admin-assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title', 'Pengajuan')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-2 font-weight-bold text-success">Data Pengajuan</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="dataTableUsers" width="100%" cellspacing="0">
                    <thead>
                        <tr >
                            <th>Nama</th>
                            <th>No Anggota</th>
                            <th>NIM</th>
                            <th>Alamat</th>
                            <th>Menu</th>
                        </tr>
                    </thead>

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
          url: "{{ url('administrator/pengajuan/table-pengajuan') }}",
        //   type: 'GET'
        },
        columns: [
          {data:'name',name:'name'},
          {data:'no_anggota',name:'no_anggota'},
          {data:'nim',name:'nim'},
          {data:'alamat',name:'alamat'},
          {data:'action',name:'action'},
        ],
        order: [[0, 'asc']]
      });
    });
</script>
@endsection