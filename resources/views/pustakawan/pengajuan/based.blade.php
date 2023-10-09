@extends('layouts.admin.master')

@section('title', 'Pengajuan Bebas Pustaka')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="mt-0 font-weight-bold text-success">Form Pengajuan Bebas Pustaka</h6>
            </div>
            <div class="card-body">
                @include($pengajuan)
            </div>
        </div>
    </div>
</div>
@endsection