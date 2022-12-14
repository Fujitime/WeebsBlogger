@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data" >
        @csrf
        <div class="mb-2">
          <label   for="title" class="form-label">
            Title
            @error('title')
            <div class="text-danger">
              {{$message}}
            @enderror
          </label>
          <input   value="{{old('title')}}" type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" required autofocus>
        </div>

        <div class="mb-2">
          <label   for="slug" class="form-label">
            Slug
            @error('slug')
            <div class="text-danger">
              {{$message}}
            @enderror
          </label>
          <input  value="{{old('slug')}}" required type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug"  >
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select form-select-sm" name="category_id" >
            @foreach ($categories as $category)
            @if(old('category_id') == $category->id )
            <option value="{{$category->id}}" selected >{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Tambahkan Foto</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror " type="file" id="image" name="image" onchange="previewImage()" >

          @error('image')
          <div class="text-danger">
            {{$message}}
          @enderror

        </div>

        <div class="mb-4">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger" >{{$message}}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{old('body')}}" >
          <trix-editor input="body"></trix-editor>
        </div>
        

        <button type="submit" class="btn btn-dark text-white mb-5 ">Add +</button>
      </form>
  </div>


  <script>
    const title = document.querrySelector('#title')
    const slug = document.querrySelector('#slug')

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = (data.slug))
    })
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    function previewImage(){
      const image = document.querrySelector('#image')
      const imgPreview = document.querrySelector(".img-preview ")

      imgPreview.style.display = 'block'

      const oFReader = new FileReader()
      oFReader.readAsDataURL(image.files[0])

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result
      }
    }
  </script>

@endsection