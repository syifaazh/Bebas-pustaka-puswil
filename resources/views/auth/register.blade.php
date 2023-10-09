<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 

  <title>BEBAS PUSTAKA - PERPUSTAKAAN WILAYAH ACEH</title>

  <!-- Custom fonts for this template-->
  <link href="{{ url('') }}/public/admin-assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('') }}/public/admin-assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-dark" style="height: 100vh; background-repeat: no-repeat; background-size: cover; background-image: url({{ url('public/admin-assets/img/bg-log.png') }});">

  <div class="container" style="height: 100vh;">

    <!-- Outer Row -->
    <div class="row h-100 justify-content-center align-items-center">

      <div class="col-xl-7 col-lg-12 col-md-9">
        @include('layouts.admin.alert')
        <div class="card o-hidden border-0 shadow-lg ">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold" style=" font-family: 'Times New Roman', Times, serif;">BEBAS PUSTAKA<br>PERPUSTAKAAN WILAYAH ACEH</h1>
                  </div>
                  <!-- Session Status -->
                  

                  <!-- Validation Errors -->
                  
                  <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                      <input value="{{ old('name') }}" type="text" class="form-control form-control-user" name="name" id="name" placeholder="Masukkan Nama Lengkap . . .">
                      <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                      <input value="{{ old('username') }}" type="text" class="form-control form-control-user" name="username" id="username" placeholder="Masukkan Username . . .">
                      <small class="text-danger">{{ $errors->first('username') }}</small>
                    </div>
                    <div class="form-group">
                      <input value="{{ old('email') }}" type="text" class="form-control form-control-user" name="email" id="email" placeholder="Masukkan Email . . .">
                      <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                      <input value="" type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Masukkan Password . . .">
                      <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <div class="form-group">
                      <input value="" type="password" class="form-control form-control-user" name="password_confirmation" id="exampleInputPassword" placeholder="Ulangi Password . . .">
                      <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                    <hr>
                  </form>
                  <p class="mt-2 text-center">Sudah punya akun? <a style="text-decoration: underline" href="{{ url('login') }}">Login</a></p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('') }}/public/admin-assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('') }}/public/admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('') }}/public/admin-assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('') }}/public/admin-assets/js/sb-admin-2.min.js"></script>

</body>

</html>


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
