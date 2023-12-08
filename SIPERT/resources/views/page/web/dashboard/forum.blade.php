<x-web-layout title="Home">
@if(Auth::user())
 <style>
    .paglink{
      margin-top: -40px;
    }
    .paglink2{
      margin-bottom: 30px;
    }
    .w-5{
      width: 20px;
    }
    .text-sm{
      margin-top: 10px;
    }
    </style>
<section class="Saran">
  <br />
  <div class="saran container">
    <h1 class="text-center">Forum Saran</h1>
    <br />
    <div class="container col-md-10" id="inform">
      <div class="row">
        <div class="col-md-3">
          <center>
            <p id="userimg" class="mt-3 fw-bold text-dark"> <img src={{ asset('img/user.png')}} style="width: 35px; height: 35px" alt="" />&nbsp;{{Auth::user()->name}}</p>
          </center>
        </div>
        <div class="col-md-9 mt-2">
          <form action="{{ route('forum.input_saran') }}"  method="post">
          {{ method_field('POST') }}
          @csrf
              <input type="hidden" name="nama" class="form-control" value="{{Auth::user()->name}}">
            <div class="form-group">
              <label for="saran">Saran : </label>
              <textarea type="text" name="saran" class="form-control" placeholder="Tuliskan Pesan Anda Disini...." required></textarea>
            </div>
            <div class="button">
              <button  id="kirim" class="btn btn-success mt-1" type="submit">Kirim</button>
              <button type="reset" id="reset" class="btn btn-danger mt-1">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="user-saran container col-md-10">
      <div class="message row container pb-4">
        @foreach($saran as $user)
          <div class="col-md-8 fw-bold">
            <br />
            <p id="userimg" class="text-dark"><img src={{ asset('img/user.png')}} class="rounded-circle" style="width: 30px; height: 30px" alt="" />&nbsp;{{$user->name}} <b style="font-size: 10px; margin-left: 50px;"><i class="far fa-calendar-alt"></i> &nbsp;{{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}} </b></p>
          </div>
          <div class="container mx-4 areareply">
          <i class="fas fa-quote-left"></i> <p id="usersaran" style="font-size: 1rem" class="px-4">{{$user->saran}}</p>
          </div>
        @endforeach
      </div>
      <br />
    </div>
    <br />
  </div>
  <br /><br />
</section>
@endif 


<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>
  
</x-web-layout>