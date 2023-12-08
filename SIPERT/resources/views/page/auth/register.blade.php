<x-auth-layout title="Register">
    <div class="col-md-10 container">
   <br><br><br>
   <div class="loginadmin container justify-content-center mt-5">
       <div class="text-right">
           <a href="{{ route('dashboard') }}" class="px-4"><i class="fa fa-times fa-lg fa-danger mt-3" style="color: white" aria-hidden="true"></i></a>
       </div>
       <form action="{{ route('auth.register') }}" method="POST" class="container" style="color: white">
           <center>
           <h4 class="mt-4"><i class="fas fa-user-shield"></i>&nbsp;Register</h4>
           </center><br>
           @csrf
           <div class="form-group row">
           <label class="mt-3" for="name">Nama</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <div class="col-md-8">
           <input id="username" type="text" name="name"  class="form-control input-text @error('name') is-invalid @enderror" placeholder="Nama">
           @error('name')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
    </div>
</div>
           <div class="form-group row">
           <label class="mt-3" for="username">Username</label>&nbsp;&nbsp;&nbsp;
           <div class="col-md-8">
           <input id="username" type="text" name="username"class="form-control input-text @error('username') is-invalid @enderror" placeholder="username">
            @error('username')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
    </div>
</div>

            <div class="form-group row">
           <label class="mt-3" for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <div class="col-md-8">
            <input id="email" type="text" name="email" class="form-control input-text @error('email') is-invalid @enderror" placeholder="email">
            @error('email')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
    </div>
</div>
            <div class="form-group row">
            <label for="password" class="mt-3">PASSWORD</label>&nbsp;
            <div class="col-md-8">
           <input id="password" type="password" name="password"class="form-control input-text @error('password') is-invalid @enderror" placeholder="Password">
           @error('password')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
    </div>
</div>
           <br>
           <button class="btn btn-success btn-sm rounded-pill mt-3" style="font-size: 1rem; font-weight: bold;">Register</button>
           <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sudah memiliki akun <a href="{{ route('auth.index') }}" >&nbsp;&nbsp;&nbsp;Login here!</a></p>
           <br><br><br>
       </form>
   </div>
</x-auth-layout>