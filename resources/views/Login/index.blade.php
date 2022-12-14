@extends('layouts.main');
@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
      
      @if(session()->has('sukses'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('sukses')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      

<main class="form-signin w-100 fff">
    <form class="text-center" action="/login" method="post" >
      @csrf
        <div class="atas">
           
            @if(session()->has('eror'))
            <img class="text-center" src="../img/GagalLogin.png" alt="Login" width="200px" height="200px">
            @else
            <img class="text-center" src="../img/LoginBang.png" alt="Login" width="200px" height="200px">
            @endif
            
            @if(session()->has('eror'))
            <h3 class="h3 mb-5 mt-0 fw-normal text-danger" > {{session('eror')}} Silahkan untuk registrasi terlebih dahulu!</h3>
            @else
            <h1 class="h3 mb-5 mt-0 fw-normal" >Login ヾ(•ω•`)o</h1>
            @endif
          </div>

      <div class="form-floating m-3">
        <input value="{{old('email')}}" type="email" name="email" autofocus required class="form-control rounded-top  @error('email') is-invalid @enderror "   id="email" placeholder="name@example.com">
        <label for="email">Email address</label>

     @error('email')
     <div class="invalid-feedback">
      {{$message}}
     </div>
     @enderror

      </div>
      <div class="form-floating m-3 ">
        <input type="password" name="password" class="form-control rounded-bottom "  required id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <button class="w-75 btn btn-lg btn-warning text-white" type="submit">Login</button>
    </form>
    <small class="d-block text-center mt-3 mb-5" >Not registered? <a href="/register">Register Now!</a> </small>
  </main>
  
    </div>
</div>

@endsection