@extends('dashboard.layouts.main')
@section('container')

<div class="container">
    <div class="row d-flex my-4">
        <div class="col-lg-8">
              
            <h1 class="mb-3">{{$post->title}} </h1>    

            <a href="/dashboard/posts" class="btn btn-outline-secondary">
                 <span data-feather="arrow-left"></span>
                 🔙Back
            </a>
            <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-info"> 
                <span data-feather="edit"></span>
                ✏️Edit
            </a>
            <form action="/dashboard/posts/{{$post->slug}}" method="POST" class="d-inline" >
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0 " onclick="return confirm('Beneran akan dihapus nih?')" > 
                    <span data-feather="x-circle">X Delete
                </button>
              </form>


                @if($post->image)
              <div style="max-height: 500px; overflow: hidden;" >
                  <img src="{{asset('storage/' . $post->image)}}" 
                  class="card-fluid mt-4" alt="{{$post->category->name}}">
              </div>

                @else
                <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" 
                class="card-fluid mt-4" alt="{{$post->category->name}}">
        
                @endif
 
                 <article class="my-3 my-5" >
                     <p>{!! $post->body !!}</p>
                 </article>
        </div>
    </div>
</div>


@endsection