@extends('layouts.main')
@section("container")

@auth
<div class="jumbotron ">
  <img src="../img/guest.png" alt="{{$name}}" width="200" height="200px" class="ml-5 border-1 border-dark img-thumbnail " >
  <h2>{{ auth()->user()->name}}</h2>
</div>
@else
      <div class="jumbotron ">
        <img src="img/{{$image}}" alt="{{$name}}" width="200" height="200px" class="ml-5 border-1 border-dark img-thumbnail " >
</div>
@endauth

@auth
<p>Yahallo👋 <br> Terima kasih karena sudah login <br>
 Silahkan untuk membuat postingan di dashboard
  <br>Kalian boleh membuat postingan sebanyak yang kalian inginkan <b>TAPI</b> . <br>
  <p>
  <b>  Aturan dalam membuat Post : </b>
  <ul>
    <li>
      DILARANG membuat post yang berisikan SARA, DP, or Buka bukaan yang terlalu vulgar <br>
    </li>
    <li>
      DILARANG membuat post yang berisikan promosi baik itu promosi web lain atau promosi lapak  secara berlebihan<br>
    </li>
    <li>
      DILARANG membuat banyak post sekaligus dalam waktu yang hampir bersamaan  <br>
    </li>
    <li>
      DILARANG post hanya menggunakan emoticon saja <br>
    </li>
  </ul>
  </p>

  

@else
<table class="mb-5 " >
  <p class="m-2" >Yahallo👋 <br> Perkenalkan nama saya {{$name}} <br>
    Perancang sekaligus pembuat website <b><i> WeebsBlogger</i> </b> ini
    <br>Kalian boleh memanggil saya Fuji. <br>
     Saya tinggal di Bandung. Saya juga lahir di Bandung, <br>
     Dan saat ini bersekolah di SMKN 01 Cisarua. <br><br>
    <tr>
      <th>Age :</th>
      <td>{{$umur}}</td>
    </tr>
    <tr>
      <th>Birth:</th>
      <td>{{$tanggal_lahir}}</td>
    </tr>
    <tr>
      <th>Now   :</th>
      <td>{{$jabatan}}</td>
    </tr>
    <tr>
      <th>Email :</th>
      <td>{{$email}}</td>
    </tr>
  </table>
@endauth
<param name="" value="">
        <p class="mb-5" >
        Jika anda ingin menghubungi 
        @auth
       Pembuat WeebsBlogger
        @else
        saya
        @endauth
         <br> anda dapat dengan mudah mengirim pesan ke alamat email <br>
        <b>racun1601@gmail.com</b>
       <a class="text-decoration-none" href="/blog"> <i> atau klik link ini </i> </a> <br>
        Dimohon untuk mengirim pesan dengan topik pembahasan /  <br>
        subjek dan juga isi kata- kata yang sopan. <br> Agar saya dapat tenang dan enak disaat membaca pesan
        email yang anda kirim.
          <br>
        Terima kasih..  </p>
        </param>
@endsection