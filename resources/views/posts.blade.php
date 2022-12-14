@extends('layouts.main')
@section("container")
@auth
<div class="col-md-5 justify-content-start d-flex fff m-4">
  <img src="../img/hello.png" alt="hello" class="mx-3" width="50px" height="50px"> 
   <h2>  Welcome, {{ auth()->user()->name}}</h2>
   <p>  
  <form action="/logout" method="post">
    @csrf 
    <button type="submit" class="border-0"> 
      <div class="btn-sm btn-secondary text-white " >
        <a><i class="bi bi-box-arrow-in-left"></i>Logout</a>
      </div>
    </button>
  </form>
</p>
</div>
@else
<div class="col-md-5 justify-content-start d-flex fff m-4">
  <img src="../img/guest.png" alt="hello" class="mx-3" width="50px" height="50px"> 
   <h6>  Hallo pengunjung, <br> Selamat datang  di WeebsBlogger <h6>
</div>

@endauth

<h1 class="mb-3 text-center" >{{$title}}</h1>
<div class="row justify-content-center mb-3">
  <div class="col-md-6 ">
    <form action="/posts" method="GET">
      @if(request('category'))
      <input type="hidden" name="category" value="{{request('category')}}">
      @endif
      @if(request('author'))
      <input type="hidden" name="author" value="{{request('author')}}">
      @endif
    <div class="input-group mb-3 form-control ">
      <input type="text" class="form-control" placeholder="Cari disini... " name="search" value="{{request('search')}}">
      <button class="btn border-secondary" type="submit"><i class="bi bi-search"></i></button>
    </div>
    </form>
  </div>
</div>
<p  class="lead m-3 h6 "  >Lihat semua kategori : <a href="/categories">Category</a></p>

@if($posts->count())
<div class="card mb-3">


  @if($posts[0]->image)
  <div style="max-height: 500px; overflow: hidden;" >
      <img src="{{ asset('storage/' . $posts[0]->image)}}" alt="{{$posts[0]->category->name}}" class="img-fluid "  >
  </div>

    @else
    <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" 
   width="1200px" height="400px"  class="card-img-top" alt="{{$posts[0]->category->name}}">
    @endif


    <div class="card-body ">
    <h3 class="card-title">
        <a class="text-decoration-none text-dark" href="/posts?author={{$posts[0]->slug}}">{{$posts[0]->title}}</a>
    </h3>  
    <p>
    <small class="text-muted">
     Pengarang:  <a href="/posts?author={{$posts[0]->author->username}}" class="text-decoration-none" >{{$posts[0]->author->name}}</a>
     || Di dalam kategori 
      <a class="text-decoration-none" href="/posts?category={{$posts[0]->category->slug}}">{{ $posts[0]->category->name}} </a>
      || {{$posts[0]->created_at->diffForHumans()}}
    </small>
    </p>
      <p class="card-text">{{$posts[0]->excerpt}}</p>
      <a href="/posts/{{$posts[0]->slug}}"  class="text-decoration-none" >Read More..</a>
    </div>
  </div>



<div class="container">
  <div class="row">
      @foreach($posts->skip(1) as $post)
      <div class="col-sm-4 mb-3">
          <div class="card">

            @if($post->image)
                <img src="{{asset('storage/' . $post->image)}}" 
                class="card-fluid " alt="{{$post->category->name}}">
              @else
              <img src="https://source.unsplash.com/500x400?{{$post->category->name}}" class="card-img-top" alt="{{$post->category->name}}"  width="500px" height="400px" loading="lazy" >
              @endif


           
              <div class="card-body ">
                <h5 class="card-title"> <a class="text-decoration-none text-dark" href="/posts/{{$post->slug}}">{{$post->title}}</a></h5>
                <p>
                  <small class="text-muted">
                   Pengarang:  <a href="/posts?authors={{$post->author->username}}" class="text-decoration-none" >{{$post->author->name}}</a>
                    <br>{{$posts[0]->created_at->diffForHumans()}}
                  <span>|| Kategori:  <a href="/posts?category={{$post->category->slug}}">{{$post->category->name}}</a></span>
              </small>
                  </p>
                <p class="card-text">{{$post->excerpt}}</p>
                <a href="/posts/{{$post->slug}}"  class="text-decoration-none ">Read More...</a>
              </div>
            </div>
      </div>
      @endforeach
    </div>
</div>
@else
<div class=" justify-content-center d-flex m-4">
  <img src="../img/gaketemu.png" alt="gaada" class="text-center d-block"  width="250px" height="250px"> 
<p class="text-center  ">nyari apa? <br> engga ada</p>
</div>
@endif

    
{{-- <footer> --}}
  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
{{-- </footer> --}}

@endsection

