<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" href="img/logo.svg">
	<style>
		#map_canvas {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
		}

		#map_canvas {
			position: relative;
		}

		#map {
			border-radius: 4px;
		}

		#description {
			font-family: "Roboto", serif;
			font-size: 15px;
			font-weight: 300;
		}

		#infowindow-content .title {
			font-weight: bold;
		}

		#infowindow-content {
			display: none;
		}

		#map #infowindow-content {
			display: inline;
		}

		.pac-card {
			margin: auto;
			border-radius: 6px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			outline: none;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			background-color: #fff;
			font-family: "Roboto", serif;
			width: 100%;
		}

		#pac-container {
			padding-bottom: 12px;
			margin-right: 12px;
		}

		.pac-controls {
			display: none;
			padding: 5px 11px;
		}

		.pac-controls label {
			font-family: "Roboto", serif;
			font-size: 13px;
			font-weight: 300;
		}

		#pac-input {
			background-color: #fff;
			font-family: "Roboto", serif;
			font-size: 15px;
			font-weight: 300;
			/*margin-left: 12px;*/
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
		}

		#pac-input:focus {
			border-color: #28a745;
		}

		#title {
			border-radius: 6px 6px 0 0;
			color: #fff;
			background-color: #28a745;
			font-size: 12px;
			font-weight: 500;
			padding: 6px 12px;
		}

		.border-custom-radio .custom-control-label::before {
			width: 100%;
			height: 100%;
			left: 0;
			right: 0;
			bottom: 0;
			top: 0;
			border-radius: .25rem !important;
			background: transparent !important;
			box-shadow: none !important;
		}

		.border-custom-radio .custom-control-input:checked ~ .custom-control-label::before {
			border-color: #28a744;
			border: 2px solid #28a744;
		}

		.my-custom-control-label::before {
			right: 1.5rem;
			position: absolute;
			display: block;
			width: 1rem;
			border-radius: 10px;
			height: 1rem;
			pointer-events: none;
			content: "";
			background-color: #fff;
			border: #adb5bd solid 1px;
		}

		.my-custom-control-input:checked ~ .my-custom-control-label::before {
			color: #fff;
			border-color: #28a744;
			background-color: #28a744;
		}

		.custom-radio .my-custom-control-input:checked ~ .my-custom-control-label::after {
			background-image: url(data:image/svg+xml,%3csvg xmlns= 'http://www.w3.org/2000/svg' width= '12' height= '12' viewBox= '-4 -4 8 8' %3e%3ccircle r= '3' fill= '%23fff' /%3e%3c/svg%3e);
		}

		.my-custom-control-label::after {
			position: absolute;
			/*top: .25rem;*/
			right: 1.5rem;
			display: block;
			width: 1rem;
			height: 1rem;
			content: "";
			background: no-repeat 50%/50% 50%;
		}
	</style>
	<script language='javaScript'>
		var txt = "E-Commerce Simpel Oleh Oleh (SIMOLEH)       ";
		var speed = 300;
		var refresh = null;

		function action() {
			document.title = txt;
			txt = txt.substring(1, txt.length) + txt.charAt(0);
			refresh = setTimeout("action()", speed);
		}

		action();
	</script>
	<!-- Slick Slider -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/vendor/slick/slick.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets2/vendor/slick/slick-theme.min.css"/>
	<!-- Icofont Icon-->
	<link href="<?php echo base_url() ?>assets2/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url() ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets2/vendor/snackbar/snackbar.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url() ?>assets2/css/style.css" rel="stylesheet">
	<!-- Sidebar CSS -->
	<link href="<?php echo base_url() ?>assets2/vendor/sidebar/demo.css" rel="stylesheet">
</head>
<body class="fixed-bottom-padding">
<div class="theme-switch-wrapper"
	 style="display: <?php echo ($this->uri->segment(2) === 'alamatpeta' || $this->uri->segment(2) === 'checkout' || $this->uri->segment(2) === 'proses') ? 'none' : 'block' ?>">
	<label class="theme-switch" for="checkbox">
		<input type="checkbox" id="checkbox"/>
		<div class="slider round"></div>
		<i class="icofont-moon"></i>
	</label>
	<em>Nyalakan Mode Gelap!</em>
</div>
