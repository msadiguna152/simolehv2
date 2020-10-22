<?php

foreach ($data_pengaturan->result() as $data):
	$nama_bisnis = $data->nama_bisnis;
	$no_wa = $data->no_wa;
	$alamat_toko = $data->alamat_toko;
	$kota = $data->kota;
	$provinsi = $data->provinsi;
	$latitude = $data->latitude;
	$longitude = $data->longitude;
	$tipe_ongkir = $data->tipe_ongkir;
	$harga_ongkir_flat = $data->harga_ongkir_flat;
	$harga_ongkir_perkm = $data->harga_ongkir_perkm;
endforeach;
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-1">
				<div class="col-sm-6">
					<h5 class="m-0 text-dark">
						PENGATURAN
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
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" enctype="multipart/form-data"
								  action="<?php echo site_url('page/admin/pengaturan/update') ?>" method="post"
								  id="quickForm">
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="nama_bisnis">Nama Bisnis</label>
											<input type="text" class="form-control" id="" name="nama_bisnis"
												   value="<?= $nama_bisnis; ?>">
										</div>

										<div class="form-group">
											<label for="no_wa">Nomor Whatsapp</label>
											<input type="text" class="form-control" id="" name="no_wa"
												   value="<?= $no_wa; ?>">
										</div>

										<div class="form-group">
											<label for="alamat_toko">Alamat Toko</label>
											<textarea class="form-control" id=""
													  name="alamat_toko"><?= $alamat_toko; ?></textarea>
										</div>

										<div class="form-group">
											<label for="kota">Kabupaten/Kota</label>
											<input type="text" class="form-control" id="" name="kota"
												   value="<?= $kota; ?>">
										</div>

										<div class="form-group">
											<label for="provinsi">Provinsi</label>
											<input type="text" class="form-control" id="" name="provinsi"
												   value="<?= $provinsi; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="tipe_ongkir">Tipe Harga Ongkir</label>
											<div class="form-check">
												<input class="form-check-input" <?php if (htmlspecialchars($tipe_ongkir) == 1) {
													echo "checked";
												} ?> type="radio" name="tipe_ongkir" id="exampleRadios1" value="1">
												<label class="form-check-label" for="exampleRadios1">
													Flat
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" <?php if (htmlspecialchars($tipe_ongkir) == 2) {
													echo "checked";
												} ?> type="radio" name="tipe_ongkir" id="exampleRadios2" value="2">
												<label class="form-check-label" for="exampleRadios2">
													Perkilometer
												</label>
											</div>
										</div>

										<div class="form-group">
											<label for="harga_ongkir_flat">Harga Ongkir Flat</label>
											<input type="number" min="-1" maxlength="12" class="form-control" id=""
												   name="harga_ongkir_flat" value="<?= $harga_ongkir_flat; ?>">
										</div>

										<div class="form-group">
											<label for="harga_ongkir_perkm">Harga Ongkir Perkm</label>
											<input type="number" min="-1" maxlength="12" class="form-control" id=""
												   name="harga_ongkir_perkm" value="<?= $harga_ongkir_perkm; ?>">
										</div>

										<div class="form-group">
											<label for="latitude">Latitude</label>
											<input type="text" class="form-control" id="" name="latitude"
												   value="<?= $latitude; ?>">

										</div>

										<div class="form-group">
											<label for="longitude">Longitude</label>
											<input type="text" class="form-control" id="" name="longitude"
												   value="<?= $longitude; ?>">
										</div>
										<a href="<?= site_url('page/admin/pengaturan/pinmap') ?>"
										   class="btn btn-primary btn-icon text-white"><i class="fa fa-map-pin"></i>
											&nbsp;Pin Peta</a>
									</div>

								</div>
								<div class="row">
									<div class="col-md-2">
										<div class="form-group">
											<button type="submit" name="simpan"
													class="btn btn-primary btn-block btn-sm">Simpan
											</button>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<button type="reset" name="reset" class="btn btn-danger btn-block btn-sm">
												Reset
											</button>
										</div>
									</div>
								</div>
							</form>
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
<script src="<?php echo base_url('/assets2/vendor/jquery/jquery.min.js') ?>"></script>
<script type="text/javascript">
	function validasiFile() {
		var inputFile = document.getElementById('customFile');
		var pathFile = inputFile.value;
		var file_size = inputFile.files[0].size;
		if (file_size > 1000000) {
			alert("File Tidak Boleh Lebih Dari 1 MB!")
			inputFile.value = '';
			return false;
		}
		if (inputFile.files && inputFile.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById('pratinjauGambar').innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="height: 200px;">';
			};
			reader.readAsDataURL(inputFile.files[0]);
		}
	}

	$(document).ready(function () {
		var lat = localStorage.getItem('lat');
		var lng = localStorage.getItem('lng');
		if (lat !== null) {
			$('input[name="latitude"]').val(lat);
		}
		if (lng !== null) {
			$('input[name="longitude"]').val(lng);
		}
	})
</script>

<script type="text/javascript">
	function validasiFile2() {
		var inputFile = document.getElementById('customFile2');
		var pathFile = inputFile.value;
		var file_size = inputFile.files[0].size;
		if (file_size > 2000000) {
			alert("File Tidak Boleh Lebih Dari 2 MB!")
			inputFile.value = '';
			return false;
		}

	}
</script>

