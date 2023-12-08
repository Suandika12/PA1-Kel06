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
        
        <form action="{{ route ('jadwal.update' ,$jadwal->id) }}" method="post">
         @csrf
          @method("PATCH")
          <input type="hidden" name="id" id="id" value="{{$jadwal->id}}" id="id" />
         
         <div> <label>Tanggal</label></br>
          <input type="text" id="from" name="tanggal" id="tanggal" class="form-control @error('tanggal') is invalid @enderror">
        </div>
         @error('tanggal')
         <div class="alert alert-danger">{{ 'The date field is required'}}</div>
          @enderror
        <br>
          <div> <label>Lokasi</label></br>
          <input type="text" name="lokasi" id="lokasi" value="{{$jadwal->lokasi}}" class="form-control @error('lokasi') is invalid @enderror">
        </div>
         @error('lokasi')
         <div class="alert alert-danger">{{'The location field is required' }}</div>
          @enderror
          <br>
          <div>   <label>Nama Petugas</label></br>
          <input type="text" name="nama_petugas" id="nama_petugas" value="{{$jadwal->nama_petugas}}" class="form-control @error('nama_petugas') is invalid @enderror">
        </div>
         @error('nama_petugas')
         <div class="alert alert-danger">{{ 'The officer name field is required' }}</div>
          @enderror
          <br>
          <div> <label>Tugas Pekerjaan</label></br>
          <input type="text" name="tugas" id="tugas" value="{{$jadwal->tugas}}" class="form-control @error('tugas') is invalid @enderror">
        </div>
         @error('tugas')
         <div class="alert alert-danger">{{ 'The job field is required'}}</div>
          @enderror
          <br>
          <input type="submit" value="Simpan" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>
</x-web-layout>