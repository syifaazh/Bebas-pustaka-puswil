@extends('layouts.admin.master')

@section('title', 'PROFIL INFO')

@section('css')
    <style>
        .table td, .table th {
            border-top: 0 !important;
            border-bottom: 1px solid #e3e6f0;
        }

        .tabel-nama {
            width: 150px;
        }
    </style>
@endsection

@section('content')

<div class="row">
    <div class="card mb-3 col-12 col-md-8">
        <div class="row no-gutters">
            <div class="col-md-4 pt-2 pb-2">
                <img src="{{ url('public/admin-assets/img/user.jpeg') }}" class="card-img">
            </div>
            <div class="col-10 col-md-8">
                <form action="{{ url('/profil/info/update') }}" method="post"> @csrf @method("PUT")
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}">
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="userrole" id="userrole" value="{{ Auth::user()->userrole->name }}" disabled>
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Ubah Profil</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Sandi Akun</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('profil/password/update') }}" method="post"> @csrf @method("PUT")
                    <div class="form-group">
                        <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Sandi Baru" autocomplete="off">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm">Ubah Sandi</button>
                </form>
            </div>
        </div>
    </div>
</div>
    

    {{-- <div class="h-dashboard"></div> --}}
@endsection
