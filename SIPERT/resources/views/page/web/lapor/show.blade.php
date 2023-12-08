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
    <div class="card-header">Laporan Pertamanan</div>
    <div class="card-body">
    
          <div class="card-body">
          <h5 class="card-title">Judul Laporan {{ $lapor->judul }}</h5>
          <p class="card-text">Isi Laporan : {{ $lapor->Isi_Keluhan }}</p>
          <p class="card-text">Gambar: {{ $lapor->Choose_File }}</p>
          <img class="d-block w-100 border shadow p-3 mb-5 bg-body rounded mt-5" src="{{ asset('asset/gambar/'.$lapor['Choose_File'])}}" style="width: auto; max-width: 50%; height: auto; border-radius: 10px">
    </div>        
    </div>
  </div>
</div>
</div>
<br>
</x-web-layout>