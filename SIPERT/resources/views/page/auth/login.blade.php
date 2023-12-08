<x-auth-layout title="Login">
    <div class="wrap">
        <div class="container">
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
              {{ session('loginError') }}
            
            </div>
        @endif

        <div class="wrap">
            <div class="container">
                @if(session()->has('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; color:rgb(255, 8, 8)">
                  {{ session('status') }}
                </div>
            @endif    
    {{--End of Alert--}}
    <br><br><br>
    <div class="loginadmin container justify-content-center mt-5">
        <div class="text-right">
            <a href="{{ route('dashboard') }}" class="px-4"><i class="fa fa-times fa-lg fa-danger mt-3" style="color: white" aria-hidden="true"></i></a>
        </div>
        <form action="{{ route('auth.login') }}" method="POST" class="container" style="color: white">
            <center>
            <h4 class="mt-4"><i class="fas fa-user-shield"></i>&nbsp;LOGIN </h4>
            </center><br>
            @csrf
            <div class="form-group row">
            <label class="mt-3" for="username">USERNAME</label>
            <div class="col-md-8">
            <input id="username" type="text" name="username" class="form-control input-text @error('username') is-invalid @enderror" placeholder="username" >
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        </div>
        <div class="form-group row">
            <label for="password" class="mt-3">PASSWORD</label>
        <div class="col-md-8">
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror input-text" placeholder="Password" size="20" >
            @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        </div>
            <br>
            <div class="form-group row justify-content-center">
                <div class="col-md-8">
            <button class="btn btn-success btn-sm rounded-pill mt-3" style="font-size: 1rem; font-weight: bold;"> {{ __('Login') }}</button>
        
            <br><br><br>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</x-auth-layout>