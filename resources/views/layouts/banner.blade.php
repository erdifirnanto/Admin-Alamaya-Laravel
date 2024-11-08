<section class="main-page" id="main-page" style="margin-top: -100px">
           <!-- Banner -->
           <div class="container-fluid banner-image1 position-relative text-center"
               style="background-image: url('images/walpaper3.png'); background-size: cover; background-position: center;">
               <div class="container">
                   <div class="centered-title">
                       <div class="row align-items-center" style="min-height: 300px;">
                           <!-- Kolom untuk gambar -->
                           <div class="col-sm-2 col-lg-1 col-3" style="margin-top: 150px; z-index: 500;">
                               <img src="images/handwave.png" class="img-fluid" alt="Hand Wave">
                           </div>
                           <!-- Kolom untuk teks -->
                           <div class="col-9 col-sm-8 text-light text-start" style="margin-top: 150px; z-index: 500;">
                               <h3>Welcome Back, {{ Auth::user()->name }}</h3>
                               <h6>This is an update from Alamaya Company</h6>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Banner End -->
       </section>