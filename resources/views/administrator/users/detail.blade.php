@extends('layouts.admin.master')

@section('title', 'User: '.$user->name)

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
                <form action="{{ url('administrator/users/update/'.$user->id) }}" method="post"> @csrf @method("PUT")
                <div class="card-body">
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="username" id="username" value="{{ $user->username }}">
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                    </div>
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="userroles_id">
                            <option selected disabled>Pilih Hak Akses</option>
                            @foreach ($userroles as $userrole)
                                    <option {{ $user->userroles_id == $userrole->id ? 'selected' : ''; }} value="{{ $userrole->id }}">{{ $userrole->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Ubah Hak Akses</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Reset Sandi Akun</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('administrator/users/resetpass/'.$user->id) }}" method="post"> @csrf @method("PUT")
                    <div class="form-group">
                        <input disabled type="text" name="password" id="password" class="form-control" placeholder="bebasperpus123" autocomplete="off">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm">Reset Sandi</button>
                </form>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hapus Akun</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('administrator/users/del-user/'.$user->id) }}" method="post"> @csrf @method("PUT")
                    <button type="submit" class="btn btn-danger btn-sm">Hapus Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>
    

    {{-- <div class="h-dashboard"></div> --}}
@endsection
