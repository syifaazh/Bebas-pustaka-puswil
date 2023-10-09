@if(Auth::user()->userroles_id == 1)
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon">
          <img src="{{ url('public/img/TI.png') }}" alt="" style="width: 50% " class="mt-3">
        </div>
    <div class="sidebar-brand-text mx-3">
    </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Dashboard
          </div>
          <!-- Nav Item -->
          
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ url('dashboard') }}">
                        <i class="fa-solid fa-gauge-high"></i>
                      <span>Dashboard</span></a>
                  </li>
                  
        <hr class="sidebar-divider d-none d-md-block">
          
          <div class="sidebar-heading">
            User Konfigurasi
          </div>
          <!-- Nav Item -->
          
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/administrator/users') }}">
                <i class="fa-solid fa-users"></i>
                  <span>Users</span></a>
            </li>

        <hr class="sidebar-divider d-none d-md-block">
         
          <div class="sidebar-heading">
            Menu
          </div>
          <!-- Nav Item -->
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/administrator/pengajuan') }}">
              <i class="fa-solid fa-inbox"></i>
                <span>Pengajuan</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/administrator/rekap') }}">
              <i class="fa-solid fa-table"></i>
                <span>Rekap</span></a>
          </li>
          

          <hr class="sidebar-divider d-none d-md-block">
          

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
@endif

@php
    use App\Models\Biodatapustakawan;
    $cekbiodata = count(Biodatapustakawan::where('users_id', '=', Auth::user()->id)->get());
@endphp

@if(Auth::user()->userroles_id == 2)
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon">
          <img src="{{ url('public/img/TI.png') }}" alt="" style="width: 50% " class="mt-3">
        </div>
    <div class="sidebar-brand-text mx-3">
    </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Dashboard
          </div>
          <!-- Nav Item -->
          
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="fa-solid fa-gauge-high"></i>
              <span>Dashboard</span></a>
          </li>
                  
        <hr class="sidebar-divider d-none d-md-block">
          
          <div class="sidebar-heading">
            User Konfigurasi
          </div>
          <!-- Nav Item -->
          
            <li class="nav-item">
              <a class="nav-link" href="{{ url('profil') }}">
                <i class="fa-solid fa-user-gear"></i>
                  <span>Profil Akun</span></a>
            </li>

        <hr class="sidebar-divider d-none d-md-block">
         
          <div class="sidebar-heading">
            Menu
          </div>
          <!-- Nav Item -->
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/pustakawan/biodata') }}">
              <i class="fa-solid fa-user-pen"></i>
                <span>Biodata</span></a>
          </li>

          @if ($cekbiodata == 0)
              <div></div>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/pustakawan/pengajuan') }}">
              <i class="fa-solid fa-envelope-open-text"></i>
                <span>Ajukan Bebas Pustaka</span></a>
          </li>
          @endif
          

          <hr class="sidebar-divider d-none d-md-block">
          

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
@endif
