<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <title>Grofar - Online Grocery Supermarket HTML Mobile Template</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets2/vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets2/vendor/slick/slick-theme.min.css"/>
      <!-- Icofont Icon-->
      <link href="<?= base_url()?>assets2/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?= base_url()?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?= base_url()?>assets2/css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?= base_url()?>assets2/vendor/sidebar/demo.css" rel="stylesheet">
   </head>
   <body>
      <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Nyalakan Mode Malam!</em>
      </div>
      <div class="osahan-search">
         <div class="p-3 border-bottom">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-success text-decoration-none" href="<?= site_url()?>beranda">
               <i class="icofont-rounded-left back-page"></i></a>
               <div class="input-group ml-3 rounded shadow-sm overflow-hidden bg-white">
                  <div class="input-group-prepend">
                     <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                  </div>
                  <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Pencarian . . ." aria-label="" aria-describedby="basic-addon1">
               </div>
            </div>
         </div>
      </div>
      <a href="listing.html" class="text-dark">
         <div class="d-flex align-items-center border-bottom p-3">
            <img src="img/search/s1.jpg" class="img-fluid rounded shadow-sm mr-3">
            <span class="font-weight-bold">
               Japan Green Apple
               <p class="small text-muted m-0">High quality Apple fresh from Japan.</p>
            </span>
         </div>
      </a>
      
      <!-- Bootstrap core JavaScript -->
      <script src="<?= base_url()?>assets2/vendor/jquery/jquery.min.js"></script>
      <script src="<?= base_url()?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?= base_url()?>assets2/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?= base_url()?>assets2/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?= base_url()?>assets2/js/osahan.js"></script>
   </body>
</html>