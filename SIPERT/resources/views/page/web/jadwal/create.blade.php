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
    <div class="card-header">Jadwal Pemeliharaan Taman</div>
    <div class="card-body">
        
        <form action="{{ route ('jadwal.store') }}" method="post">
          @csrf
          <label>Tanggal</label></br>
          <div class="input-group mb-3">
          <input type="text" id="from" name="tanggal" id="tanggal" class="form-control @error('tanggal') is invalid @enderror">
          </div>
          @error('tanggal')
          <div class="alert alert-danger">{{ 'The date field is required'}}</div>
          @enderror
        </br>
          <label>Lokasi</label></br>
          <div class="input-group mb-3">
          <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is invalid @enderror">
        </div>
          @error('lokasi')
          <div class="alert alert-danger">{{ 'The location field is required' }}</div>
          @enderror
        </br>
          <label>Nama Petugas</label></br>
          @php
          $user = \App\Models\User::where('role', '=','user')->get();
          @endphp
          <div class="input-group mb-3">
          <select class="form-control" id="nama_petugas" name="nama_petugas">
            <option value="">Pilih Nama Petugas</option>
              @foreach ($user as $item)
                 <option value="{{ $item->name }}">{{ $item->name }}</option>
              @endforeach
           </select>
        </div>
          @error('nama_petugas')
          <div class="alert alert-danger">{{ 'The officer name field is required'}}</div>
          @enderror
          
        </br>
          <label>Tugas Pekerjaan</label></br>
          <div class="input-group mb-3">
          <input type="text" name="tugas" id="tugas" class="form-control @error('tugas') is invalid @enderror">
        </div>
          @error('tugas')
          <div class="alert alert-danger">{{ 'The job field is required'}}</div>
          @enderror
          <input type="submit" value="Tambah" class="btn btn-success"></br>
      </form>
    </div>
  </div>
</x-web-layout>
</body>
</html>