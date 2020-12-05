 <!-- ======= Header/Navbar ======= -->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
   <div class="container">
     <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
       <span></span>
       <span></span>
       <span></span>
     </button>
     <a class="navbar-brand text-brand" href="#">Andi<span class="color-b">Vallen</span></a>
     <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
       <span class="fa fa-search" aria-hidden="true"></span>
     </button>
     <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link active" href="<?= base_url('user') ?>">Home</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Layanan Mandiri
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="<?= base_url('user/aduan') ?>">Layanan Aduan</a>
             <a class="dropdown-item" href="<?= base_url('user/permohonan_surat') ?>">Layanan Surat</a>
             <a class="dropdown-item" href="#">Layanan Berita</a>
           </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="http://localhost:8080/pages/contact">Contact</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="<?= base_url('user/myprofile') ?>">Profil</a>
         </li>
         <!-- <li class="nav-item">
           <a class="nav-link" href="<?= base_url('auth') ?>">Login</a>
         </li> -->
         <li class="nav-item">
           <a class="nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
         </li>
       </ul>
     </div>
     <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
       <span class="fa fa-search" aria-hidden="true"></span>
     </button>
   </div>
 </nav><!-- End Header/Navbar -->