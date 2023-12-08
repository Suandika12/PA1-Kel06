<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-green ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a id="title-web" class="navbar-brand" href="/" style="font-size: 2rem"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"><span class="oi oi-menu"></span> Menu</button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link" style="font-size: 1rem">Home</a></li>
          <li class="nav-item"><a href="{{ route('informasi') }}" class="nav-link" style="font-size: 1rem">Informasi Taman</a></li>
          <li class="nav-item"><a href="{{ route('jadwal.index') }}" class="nav-link" style="font-size: 1rem">Jadwal</a></li>
          
          <li class="nav-item dropdown">
            <a class="nav-link" style="cursor: pointer;" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
             &nbsp;About
            </a>
            <ul style="margin-top: -15px;" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li class="container"><a href="{{ route('about') }}" style="font-size: 0.9rem; cursor:pointer;text-decoration:none;font-color:black;color:black"></i>Personil Pertamanan</a></li>
            <hr>
              <li class="container"><a href="{{ route('about1') }}" style="font-size: 0.9rem; cursor:pointer;text-decoration:none;font-color:black;color:black"></i>Struktur Organisasi Pertamanan</a></li>
            <hr>
              <li class="container"><a href="{{ route('about2') }}" style="font-size: 0.9rem; cursor:pointer;text-decoration:none;font-color:black;color:black"></i>SOP Pertamanan</a></li>
          </ul
        </li>

          <li class="nav-item"><a href="{{ route('lapor.index') }}" class="nav-link" style="font-size: 1rem">Lapor Pertamanan</a></li>
          <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link" style="font-size: 1rem">Contact Us</a></li>
       
          <li class="nav-item"><a href="{{ route('petugas.index') }}" class="nav-link" style="font-size: 1rem">Menambah Petugas</a></li>
       
        </ul>
          <ul class="navbar-nav ml-auto ">
          <li class="nav-item  dropdown">
          @if(Auth::user())
            <a href="" style="font-size: 1rem" class="nav-link bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1rem;">
              <i class="fas fa-user"></i>&nbsp; {{Auth::user()->username}}
            </a>
            @if (Auth::user())
              <ul style="border: 1px solid red; margin-top: -20px;" class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li>
                  <a class="badge dropdown-item text-danger fs-6" {{--style="background-color: red; transform: scale(0.5); border-radius: 40px;"--}}  href="{{ route('auth.logout') }}">
                  <i class="fas fa-power-off"></i> {{ __('Logout') }}
                </a>
                </li>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </ul>
        </li>
          @endif
            
          @else
          <ul style="margin-top: -15px;">
            <a href="{{ route('auth.index') }}" class="nav-link">
              <li class="container"> <a href="{{ route('auth.index') }}" style="font-size: 20px;font-weight:bold;font:color;text-decoration:none"><i class="fas fa-user"></i> Login </a></li>
          </ul>
            @endif
        </li>
        </ul>
        </div>
  </nav>