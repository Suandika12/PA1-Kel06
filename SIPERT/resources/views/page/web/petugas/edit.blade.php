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
    <div class="card-header">Mengedit akun petugas</div>
    <div class="card-body">
        
        <form action="{{ route ('petugas.update' ,$user->id) }}" method="post">
         @csrf
          @method("PATCH")
          <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />
         
         <div> <label>Name</label></br>
          <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control @error('name') is invalid @enderror">
        </div>
         @error('name')
         <div class="alert alert-danger">{{ 'The name field is required'}}</div>
          @enderror
        <br>
          <div> <label>Username</label></br>
          <input type="text" name="username" id="lokasi" value="{{$user->username}}" class="form-control @error('username') is invalid @enderror">
        </div>
         @error('username')
         <div class="alert alert-danger">{{'The username field is required' }}</div>
          @enderror
          <br>
          <div>   <label>Email</label></br>
          <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control @error('email') is invalid @enderror">
        </div>
         @error('email')
         <div class="alert alert-danger">{{ 'The email field is required' }}</div>
          @enderror
          <br>
          <div> <label>Password</label></br>
          <input type="text" name="password" id="password"  class="form-control @error('tugas') is invalid @enderror">
        </div>
         @error('password')
         <div class="alert alert-danger">{{ 'The password field is required'}}</div>
          @enderror
          <br>
          <input type="submit" value="Simpan" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>
</x-web-layout>