<link rel="stylesheet" href="css/style.css">
<header class="hider" >
  <div class="jumbotron jumbotron-fluid">
    <div class="container m-auto d-block border-1">
    <img src="../img/banner.jpg" class="img-thumbnail" alt="Kanon">
  </div>
  </div>
  <nav class="nap" >
    <ul class="ul" >
      <li class="li" >
       <a   {{($active === "posts") ?"active" : ""}} href="/posts" class="active">🏡Home</a>
      </li>

       <li class="li" ><a class="a" {{($active === "about") ?"active" : ""}} href="/about">About</a></li>
       {{-- <li><li> --}}
       {{-- <li><a {{($active === "Categories") ?"active" : ""}}href="/categories">Category</a><li> --}}
        @auth
        <li class="li" >
          <a class="a" {{($active === "dashboard") ?"active" : ""}} href="/dashboard">Dashboard</a>
        </li>
        @else
        <li class="li" >
          <a {{($active === "login") ?"active" : ""}}href="/login" class="a" ><i class="bi bi-box-arrow-right "></i>Login</a>
         </li>
        @endauth
     </ul>
  </nav>
</header>
