@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Selamat Datang, {{ Auth::user()->userrole->name }} </h2>
        </div>
    </div>
@endsection