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