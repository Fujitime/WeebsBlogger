@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
  </div>
  @if(session()->has('sukses'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('sukses')}}
  </div>
  @endif
  <div class="table-responsive col-lg-7">
    <a href="/dashboard/categories/create" class="btn btn-light mb-3 text-dark" >New Category <span data-feather="file-plus"></a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($categories as $category)         
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$category->name}}</td>
          <td>

            <a href="/dashboard/categories/{{$category->slug}}" class="badge bg-primary" > 
              <span data-feather="eye">
              </a>

            <a href="/dashboard/categories/{{$category->slug}}/edit" class="badge bg-info" > 
              <span data-feather="edit"> </a>
          
                <form action="/dashboard/categories/{{$category->slug}}" method="POST" class="d-inline" >
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0 " onclick="return confirm('Beneran akan dihapus nih?')" > 
                    <span data-feather="x-circle">
                </button>
              </form>
                

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
@endsection