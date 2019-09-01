<header class="">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container ">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto d-flex">
               <li class="nav-item active">
                  <a class="nav-link mr-4" href="#">ACCUEIL</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link mr-4" href="#">CHAMBRES</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link mr-4" href="#">ACTIVITES</a>
               </li>

               <li class="nav-item orangea-logo">
                  <a class="nav-link" href="<?= home_url('/') ?>">
                     <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/br_logo.png" class="mr-2 ml-2" width="90" />
                  </a>
               </li>

               <li class="nav-item">
                  <a class="nav-link mr-4" href="#">RESTAURANT & BAR</a>
               </li>

               <li class="nav-item">
                  <a class="nav-link mr-4" href="#">RÉSERVATION & CONTACTS</a>
               </li>
            </ul>
         </div>
      </div>

   </nav>
   <div class="header-footer">
      <!-- <div class="hf-container" style="position: relative">
               <img src="assets/img/bg.png" class="hf-bg" />
            </div> -->
      <div class="hf-container-slider" style="position: relative">
         <div class="fadeOut owl-carousel owl-theme">
            <div class="item">
               <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/home_1.jpg">
            </div>
            <div class="item">
               <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/home_2.jpg">
            </div>
            <div class="item">
               <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/home_3.jpg">
            </div>
         </div>
      </div>


   </div>
</header>