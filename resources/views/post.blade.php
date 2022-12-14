@extends('layouts.main')

@section("container")
<div class="container">
    <div class="row d-flex justify-content-start mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{$post->title}} </h1>    

            <p>Pengarang:  
                <a href="/posts?author={{$post->author->username}}"class="text-decoration-none">{{$post->author->name}}</a>
                 Kategori:  <a href="/posts?category={{$post->category->slug}}">{{ $post->category->name}} </a> </p>
            

                 @if($post->image)
                 <div style="max-height: 500px; overflow: hidden;" >
                     <img src="{{asset('storage/' . $post->image)}}" 
                     class="card-fluid " alt="{{$post->category->name}}">
                 </div>
   
                   @else
                
                   <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="card-fluid" alt="{{$post->category->name}}">
            
           
                   @endif

                 <article class="my-3 my-5" >
                     <p>{!! $post->body !!}</p>
                 </article>
                <a href="/"  class="text-decoration-none btn btn-outline-secondary text-dark" > ←Back</a>

        </div>
    </div>
</div>

@endsection

