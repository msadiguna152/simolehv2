<?php
	$pengaturan = $query = $this->db->get('tb_pengaturan');
	foreach ($pengaturan->result() as $data){
		$nama_bisnis = $data->nama_bisnis;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<script language='javaScript'>
		var txt = "<?= $nama_bisnis; ?> .:.      ";
		var speed = 300;
		var refresh = null;

		function action() {
			document.title = txt;
			txt = txt.substring(1, txt.length) + txt.charAt(0);
			refresh = setTimeout("action()", speed);
		}

		action();
	</script>
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

	</style>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.css">

	<!-- pace-progress -->
	<link rel="stylesheet"
		  href="<?php echo base_url() ?>assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.css">
</head>
