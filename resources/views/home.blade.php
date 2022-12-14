@extends('layouts.main')
@section("container")
    
    <!-- contact   -->
    <div class="card p-3 m-5">
      <param class="card-text">
        <p class="card-title text-uppercase fsw-italic" >Di mohon untuk :</p><br>
        🕐Perhatikan waktu berkirim pesan. <br><br>
        🗣 Sampaikan maksud dan tujuan dengan memperhatikan penggunaan bahasa yang formal. 
        <br><span><b>For mutual convenience</b></span>
      </param>
    </div>
    
       <section >
        <div class="container">
          <div class="row text-center mb-3">
            <div class="col">
               <h2>Contact Me</h2>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8">
            
              <form name="FujitimmeC-for">
                <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                  <strong>Pesan sudah dikirim!</strong> harap jangan spam, <i>terimakasih...</i>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input class="form-control" id="name" aria-describedby="name"
                         name="nama"/>
             
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email </label>
                  <input type="email" class="form-control" id="Email" aria-describedby="email"
                         name="email"/>
                  
                  <div class="mb-3">
                    <label for="Pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="Pesan" rows="3" name="pesan"></textarea>
                  </div>
    
                <button type="submit" class="btn btn-danger btn-kirim">Kirim</button>
    
                <button class="btn btn-danger btn-loading d-none" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </form>
            </div>
          </div>
        </div>
       </section>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
       <script >
                const scriptURL = 'https://script.google.com/macros/s/AKfycbxm9c-0uqR24CO7uCiLjffjU32HZ3rMswLLQZNTg1A97lJVfMBHNaLPZxpbMLX_pT0KLQ/exec'
              const form = document.forms['FujitimmeC-for'];
              const btnKirim = document.querySelector('.btn-kirim')
              const btnLoading = document.querySelector('.btn-loading')
              const btnDAlert = document.querySelector('.my-alert');
           form.addEventListener('submit', e => {
             e.preventDefault()
     
             // a
             btnLoading.classList.toggle('d-none')
             btnKirim.classList.toggle('d-none')
     
             fetch(scriptURL, { method: 'POST', body: new FormData(form)})
               .then(response => {      
     
               btnLoading.classList.toggle('d-none')
               btnKirim.classList.toggle('d-none')
               btnDAlert.classList.toggle('d-none');
     
     
               form.reset()
               console.log('Success!', response)  
             })
             .catch(error => console.error('Error!', error.message))
             
           })
         </script>
@endsection
      

 