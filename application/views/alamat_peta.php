<div class="osahan-order_address">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('keranjang') ?>">
				<i class="icofont-rounded-left back-page"></i></a>
			<h5 class="font-weight-bold m-0 ml-3">Pilih Alamat</h5>
			<button type="button" class="btn btn-outline-success btn-sm ml-auto" data-toggle="modal"
					data-target="#alamatModal">Tambah
			</button>
			<a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
	<div class="p-3">
		<div class="pac-card" id="pac-card">
			<div>
				<div id="title" class="d-flex justify-content-between">
					<span>Pilih Lokasi Pengantaran</span>
				</div>
				<div id="type-selector" class="pac-controls">
					<div class="custom-control custom-checkbox">
						<input class="custom-control-input" type="radio"
							   name="type"
							   id="changetype-all"
							   checked="checked">
						<label class="custom-control-label"
							   for="changetype-all">Semua</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input class="custom-control-input" type="radio"
							   name="type"
							   id="changetype-establishment">
						<label class="custom-control-label"
							   for="changetype-establishment">Gedung/Tempat</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input class="custom-control-input" type="radio"
							   name="type"
							   id="changetype-address">
						<label class="custom-control-label"
							   for="changetype-address">Alamat</label>
					</div>
				</div>
			</div>
			<div id="pac-container">
				<input id="pac-input" type="text" class="form-control"
					   placeholder="Masukkan Alamat / Tempat">
			</div>
		</div>
		<div id="map" style="width: 100%;height: 800px"></div>
		<div id="infowindow-content">
			<img src="" width="16" height="16" id="place-icon">
			<span id="place-name" class="title"></span><br>
			<span id="place-address"></span><br>
			<a href="<?php echo site_url('keranjang/alamat#alamatModal') ?>" class="btn btn-sm btn-success">Pilih</a>
		</div>
	</div>
</div>
<!-- continue -->
<div class="fixed-bottom">
	<a href="delivery_time.html" class="btn btn-success btn-lg btn-block">Continue</a>
</div>
