<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
  <title>Create Jadwal</title>
</head>
<body>
<x-web-layout title="Jadwal Pemeliharaan Taman">
  <div class="hero">
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url({{ asset('image/slide4.jpeg') }}); background-size: cover; background-position: center center; width: 100%; height: 100%">
        <div class="overlay"></div> 
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
            <div class="col-md-6 ftco-animate">
              <div class="text px-4">
                </h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('image/slide2.jpeg') }})); background-size: cover; background-position: center center; width: 100%; height: 100%">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
            <div class="col-md-6 ftco-animate">
              <div class="text px-4">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('image/slide3.jpeg') }}); background-size: cover; background-position: center center; width: 100%; height: 100%">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
            <div class="col-md-6 ftco-animate">
              <div class="text px-4">
                <br><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <br>
  <br>
<div class="card">
    <div class="card-header">Menambah Akun Petugas Pertamanan</div>
    <div class="card-body">
        
        <form action="{{ route ('petugas.store') }}" method="post">
          @csrf
          <label>Name</label></br>
          <div class="input-group mb-3">
          <input type="text" id="name" name="name"  class="form-control @error('name') is invalid @enderror">
          </div>
          @error('name')
          <div class="alert alert-danger">{{ 'The name field is required'}}</div>
          @enderror
        </br>
          <label>Username</label></br>
          <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control @error('username') is invalid @enderror">
        </div>
          @error('username')
          <div class="alert alert-danger">{{ 'The username field is required' }}</div>
          @enderror
        </br>
          <label>Email</label></br>
          <div class="input-group mb-3">
          <input type="text" name="email" id="email" class="form-control  @error('email') is invalid @enderror">
        </div>
          @error('email')
          <div class="alert alert-danger">{{ 'The email name field is required'}}</div>
          @enderror
        </br>
          <label>Password</label></br>
          <div class="input-group mb-3">
          <input type="text" name="password" id="password" class="form-control @error('password') is invalid @enderror">
        </div>
          @error('password')
          <div class="alert alert-danger">{{ 'The password field is required'}}</div>
          @enderror
          <input type="submit" value="Tambah" class="btn btn-success"></br>
      </form>
    </div>
  </div>
</x-web-layout>
</body>
</html>