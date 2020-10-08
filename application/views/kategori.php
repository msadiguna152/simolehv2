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
   <body class="fixed-bottom-padding">
      <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Nyalakan Mode Malam!</em>
      </div>
      <div class="osahan-listing">
         <div class="p-3">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-success text-decoration-none" href="<?= site_url()?>beranda"><i class="icofont-rounded-left back-page"></i></a><span class="font-weight-bold ml-3 h6 mb-0"><?= ucfirst($nama_kategori); ?></span>
            </div>
         </div>
         <div class="osahan-listing px-3 bg-white">

            <div class="row border-bottom border-top">
               <div class="col-6 p-0 border-right">
                  <div class="list-card-image">
                     <a href="product_details.html" class="text-dark">
                        <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span></div>
                        <div class="p-3">
                           <img src="<?= base_url()?>assets2/img/listing/v1.jpg" class="img-fluid item-img w-100 mb-3">
                           <h6>Chilli</h6>
                           <div class="d-flex align-items-center">
                              <h6 class="price m-0 text-success">$0.8/kg</h6>
                     <a href="cart.html" class="btn btn-success btn-sm ml-auto">+</a>
                     </div>
                     </div>
                     </a>
                  </div>
               </div>

               <div class="col-6 p-0">
                  <div class="list-card-image">
                     <a href="product_details.html" class="text-dark">
                        <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">5%</span></div>
                        <div class="p-3">
                           <img src="<?= base_url()?>assets2/img/listing/v2.jpg" class="img-fluid item-img w-100 mb-3">
                           <h6>Onion</h6>
                           <div class="d-flex align-items-center">
                              <h6 class="price m-0 text-success">$1.8/kg</h6>
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

            <div class="row border-bottom border-top">
               <div class="col-6 p-0 border-right">
                  <div class="list-card-image">
                     <a href="product_details.html" class="text-dark">
                        <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">5%</span></div>
                        <div class="p-3">
                           <img src="<?= base_url()?>assets2/img/listing/v3.jpg" class="img-fluid item-img w-100 mb-3">
                           <h6>Tomato</h6>
                           <div class="d-flex align-items-center">
                              <h6 class="price m-0 text-success">$2.5/kg</h6>
                     <a href="cart.html" class="btn btn-success btn-sm ml-auto">+</a>
                     </div>
                     </div>
                     </a>
                  </div>
               </div>
               <div class="col-6 p-0">
                  <div class="list-card-image">
                     <a href="product_details.html" class="text-dark">
                        <div class="member-plan position-absolute"><span class="badge m-3 badge-warning">15%</span></div>
                        <div class="p-3">
                           <img src="<?= base_url()?>assets2/img/listing/v4.jpg" class="img-fluid item-img w-100 mb-3">
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
      </div>

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