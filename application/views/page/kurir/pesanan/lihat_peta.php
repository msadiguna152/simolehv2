<?php

$token2 = md5($get_token2);
$token = $this->session->flashdata('token');
if (!empty($token) and $token == $token2) {
	if (isset($data_pembeli)) {
		$lat = $data_pembeli->lat ?? '0';
		$long = $data_pembeli->long ?? '0';
	}
} else {
	echo '<script language="javascript">document.location="' . site_url('page/admin/pesanan') . '";</script>';
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-1">
				<div class="col-sm-6">
					<h5 class="m-0 text-dark">
						<?php
						$menu = $this->session->userdata('menu') . " / " . $this->session->userdata('aksi') . " Rincinan Pesanan";
						echo strtoupper($menu);
						?>
					</h5>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<!-- Main row -->
			<div class="row">

				<div class="col-md-12 connectedSortable">

					<!-- PRODUCT LIST -->
					<div class="card">
						<div class="card-header ">
							<div class="d-flex justify-content-between">
								<h3 class="card-title">Peta Arah Pengantaran</h3>
								<button id="start-travel" class="btn btn-primary">Lihat Guideline dalam peta</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div id="map" style="height: 700px;position: relative;"></div>
							<div class="shadow bg-white p-3" id="instructions"
								 style="position: absolute;top:70px;right: 20px;border-radius: 14px;"></div>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>

<script src="<?php echo site_url('assets2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="https://maps.google.com/maps/api/js?key=<?php echo $pengaturan->google_api_key ?? '' ?>&libraries=places&language=id&region=ID&amp;"></script>
<script src="<?php echo site_url('assets2/vendor/gmaps/gmaps.min.js') ?>"></script>
<script>
	var latToko = '<?php echo (strpos($pengaturan->latitude, '-') !== false ? $pengaturan->latitude : '-' . $pengaturan->latitude) ?? '0' ?>'
	var longToko = '<?php echo $pengaturan->longitude ?? '0' ?>'
	var latTujuan = '<?php echo (strpos($lat, '-') !== false ? $lat : '-' . $lat) ?? '0' ?>';
	var longTujuan = '<?php echo $long ?? '0' ?>';
	console.log(latToko);
	console.log(longToko);
	console.log(longTujuan);
	console.log(latTujuan);

	let koordinat = {lat: parseFloat(latToko), lng: parseFloat(longToko), callback: void (0)}
	var map = new GMaps({
		div: '#map',
		lat: koordinat.lat,
		lng: koordinat.lng,
	})
	map.setCenter(koordinat);
	map.addMarker({
		lat: koordinat.lat,
		lng: koordinat.lng,
		title: 'Lokasimu',
		infoWindow: {
			content: '<p>Lokasi Toko Berada</p>'
		}
	});
	//ketika user mengeklik tombil start/travel/mulai
	$("#start-travel").click(function () {
		// $(this).fadeOut();
		$('#instructions').html('');
		map.removePolylines();
		$("#instructions").append("<div class='section-title'>Instruksi Arah</div>");
		//menambahkan title intruction sebelum tag id intruction
		map.travelRoute({
			//origin, ambil dari koordinat pengguna yang sudah di ambil sebelumnya tadi
			origin: [parseFloat(latToko), parseFloat(longToko)],
			//destination, ambil dari pengantaran jasa, atau rumah yang akan dituju
			destination: [parseFloat(latTujuan), parseFloat(longTujuan)],
			travelMode: 'driving',
			step: function (e) {
				//dalam tag id intruction, akan di tambahkan daftar list lokasi yang akan di lewati oleh driver tersebut.
				$('#instructions').append('<div class="route"><span class="media-icon"><i class="far fa-circle">&nbsp;</i></span><span class="media-body">' + e.instructions + '</span></div>');
				//console.log(e) untuk lebih tau object apa aj disana, biar bisa variasi, sapa tau bisa mengukur distance, jarak, harga, dll.
				$('#instructions div.route:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function () {
					map.setCenter(e.end_location.lat(), e.end_location.lng());
					//animasi menambah garis setiap lokasi yang dilewati
					map.drawPolyline({
						path: e.path,
						//ganti warna
						strokeColor: '#131540',
						//merubah tingkat transparan
						strokeOpacity: 0.6,
						//mengubah tebal garis
						strokeWeight: 6
					});
				});
			}
		});
	});
</script>

