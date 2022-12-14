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
        
<main class="form-registration w-100 fff">
    <form class="text-center" action="/register" method="POST" >
      @csrf
        <div class="atas">
            <img class="text-center" src="../img/LoginBang.png" alt="Login" width="250" height="250">
            <h1 class="h2 mb-5 mt-0 fw-normal" > <b>(„• ֊ •„)</b><br>Registration</h1>
        </div>

      <div class="form-floating m-3">
        <input  type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror " id="name" placeholder="Takanashi" required value="{{old('name')}}"  >
        <label for="name">Name</label>
          @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

      <div class="form-floating m-3">
        <input type="text" name="username" class="form-control @error('username')is-invalid @enderror " id="username" placeholder="Takanashi Rikka"  required  value="{{old('username')}}"  >
        <label for="username">Username </label>
          @error('username')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>

      <div class="form-floating m-3">
        <input type="email" class="form-control  @error('email')is-invalid @enderror " id="email" name="email" placeholder="HitoriGoto@example.com"  required  value="{{old('email')}}" >
        <label for="email">Email address</label>
        @error('email')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="form-floating m-3 ">
        <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror "id="password" placeholder="Password" required >
        <label for="password">Password</label>

        @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror

      </div>
      <button class="w-75 btn btn-lg btn-warning text-white" type="submit">Register</button>
    </form>
    <small class="d-block text-center mt-3 mb-5" >Already registered? <a href="/login">Login</a> </small>
  </main>
  
    </div>
</div>

@endsection