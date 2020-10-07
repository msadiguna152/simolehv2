<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <script language='javaScript'>
         var txt="E-Commerce Simpel Oleh Oleh (SIMOLEH)       ";
         var speed=300;
         var refresh=null;
         function action() { document.title=txt;
         txt=txt.substring(1,txt.length)+txt.charAt(0);
         refresh=setTimeout("action()",speed);}action();
      </script>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets2/vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets2/vendor/slick/slick-theme.min.css"/>
      <!-- Icofont Icon-->
      <link href="<?php echo base_url()?>assets2/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo base_url()?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo base_url()?>assets2/css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?php echo base_url()?>assets2/vendor/sidebar/demo.css" rel="stylesheet">
   </head>
   <body class="fixed-bottom-padding">
      <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Nyalakan Mode Gelap!</em>
      </div>
      <!-- home page -->
      <div class="osahan-home-page">
         <div class="border-bottom p-3">
            <div class="title d-flex align-items-center">
               <a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
                  <img class="osahan-logo mr-2" src="img/logo.svg">
                  <h4 class="font-weight-bold text-success m-0">SIMOLEH</h4>
               </a>
               <p class="ml-auto m-0">
                  <a href="notification.html" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
                  <i class="text-dark icofont-notification"></i>
                  <span class="badge badge-danger p-1 ml-1 small">2</span>
                  </a>
               </p>
               <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
            <a href="search.html" class="text-decoration-none">
               <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
                  <div class="input-group-prepend">
                     <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                  </div>
                  <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Pencarian.." aria-label="" aria-describedby="basic-addon1">
               </div>
            </a>
         </div>
         <!-- body -->
         <div class="osahan-body">
            <!-- categories -->
            <div class="p-3 osahan-categories">
               <h6 class="mb-2">Kategori</h6>
               <div class="row m-0">
                  <?php foreach ($data_kategori->result() as $data): ?>
                  <div class="col pl-0 pr-1 py-1">
                     <div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
                        <a href="<?= site_url('')?>beranda?kategori=<?= strtolower($data->nama_kategori); ?>">
                           <img src="<?php echo base_url()?>file/<?php echo $data->icon; ?>" class="img-fluid px-2">
                           <p class="m-0 pt-2 text-muted text-center"><?= $data->nama_kategori; ?></p>
                        </a>
                     </div>
                  </div>
                  <?php endforeach;?>
               </div>
            </div>

            <!-- Promos -->
            <div class="py-3 bg-white osahan-promos shadow-sm">
               <div class="d-flex align-items-center px-3 mb-2">
                  <h6 class="m-0">Promosi Untuk Kamu</h6>
                  <a href="promos.html" class="ml-auto text-success">Lihat Semua</a>
               </div>
               <div class="promo-slider">
                  <?php foreach ($data_promosi->result() as $data): ?>
                  <div class="osahan-slider-item m-2">
                     <a href=""><img src="<?= base_url()?>file/<?php echo $data->gambar; ?>" class="img-fluid mx-auto rounded" alt="<?= $data->nama_produk; ?>"></a>
                  </div>
                  <?php endforeach;?>
               </div>
            </div>

            <!-- Pick's Today -->
            <div class="title d-flex align-items-center mb-3 mt-3 px-3">
               <h6 class="m-0">Pilih Hari Ini</h6>
               <a class="ml-auto text-success" href="picks_today.html">Lihat Semua</a>
            </div>
            <!-- pick today -->

            <div class="pick_today px-3">
               <?php $a=1; foreach ($data_kategori->result() as $data): ?>
               <div class="row <?php if ($a>=2) { echo "pt-3"; }?>">
                  <div class="col-6 pr-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">5%</span></div>
                              <div class="p-3">
                                 <img src="img/listing/v3.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Tomato</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$1/kg</h6>
                           <a class="ml-auto" href="cart.html">
                           <div class="input-group input-spinner ml-auto cart-items-number">
                           <div class="input-group-prepend">
                           <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                           </div>
                           <input type="text" class="form-control" value="1">
                           <div class="input-group-append">
                           <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                           </div>
                           </div>
                           </a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 pl-2">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="product_details.html" class="text-dark">
                              <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">15%</span></div>
                              <div class="p-3">
                                 <img src="img/listing/v4.jpg" class="img-fluid item-img w-100 mb-3">
                                 <h6>Cabbage</h6>
                                 <div class="d-flex align-items-center">
                                    <h6 class="price m-0 text-success">$0.8/kg</h6>
                           <a href="cart.html" class="btn btn-success btn-sm ml-auto">+</a>
                           </div>
                           </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php $a++; endforeach;?>
            </div>

            <!-- Most sales -->
            <div class="title d-flex align-items-center p-3">
            </div>

         </div>
      </div>
      <!-- Footer -->

      <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
         <div class="row m-0">
            <a href="home.html" class="text-dark small col font-weight-bold text-decoration-none p-2 selected">
               <p class="h5 m-0"><i class="text-success icofont-grocery"></i></p>
               Beranda
            </a>
            <a href="cart.html" class="text-muted col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-cart"></i></p>
               Keranjang
            </a>
            <a href="complete_order.html" class="text-muted col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-bag"></i></p>
               Pesanan ku
            </a>
            <a href="my_account.html" class="text-muted small col text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-user"></i></p>
               Account
            </a>
         </div>
      </div>

      <nav id="main-nav">
         <ul class="second-nav">
            <li>
               <a href="account-setup.html">Account Setup</a>
            </li>
         </ul>
         <ul class="bottom-nav">
            <li class="email">
               <a href="<?= base_url('auth')?>">
                  <p class="h5 m-0"><i class="icofont-login"></i></p>
                  Login
               </a>
            </li>
            <li class="email">
               <a href="home.html">
                  <p class="h5 m-0"><i class="icofont-home"></i></p>
                  Home
               </a>
            </li>
            <li class="ko-fi">
               <a href="help_ticket.html">
                  <p class="h5 m-0"><i class="icofont-headphone"></i></p>
                  Help
               </a>
            </li>
         </ul>
      </nav>
      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo base_url()?>assets2/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url()?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo base_url()?>assets2/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo base_url()?>assets2/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo base_url()?>assets2/js/osahan.js"></script>
   </body>
</html>