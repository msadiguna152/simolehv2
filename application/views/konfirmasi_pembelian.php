<div class="osahan-checkout">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('keranjang') ?>">
				<i class="icofont-rounded-left back-page"></i></a>
			<h6 class="font-weight-bold m-0 ml-3">Konfirmasi Pembelian</h6>
			<a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
</div>
<div class="address p-3 bg-white">
	<h6 class="m-0 text-dark d-flex align-items-center">Alamat <span class="small ml-auto">
			<a href="<?php echo site_url('keranjang/alamat') ?>"
			   class="font-weight-bold text-decoration-none text-success">
				<i class="icofont-location-arrow"></i> Ganti</a></span></h6>
</div>
<?php $alamat_dipilih = $alamat->row() ?? [] ?>
<div class="p-3">
	<div class="d-flex align-items-center">
		<p class="mb-2 font-weight-bold">Alamat</p>
		<p class="mb-2 badge badge-success ml-auto">Dipilih</p>
	</div>
	<p class="small text-muted m-0"><?= $alamat_dipilih->alamat_lengkap ?></p>
	<p class="small text-muted m-0"><?= $alamat_dipilih->rincian_alamat ?></p>
</div>
<div class="address p-3 bg-white">
	<h6 class="m-0 text-dark">Metode Pembayaran</h6>
</div>
<div class="p-3">
	<a href="<?= site_url('keranjang/pembayaran') ?>" class="text-success text-decoration-none w-100">
		<div class="d-flex align-items-center">
			<i class="icofont-credit-card"></i> <span class="ml-3">Tambah Metode Pembayaran</span>
			<i class="icofont-rounded-right ml-auto"></i>
		</div>
	</a>
</div>
<div class="address p-3 bg-white">
	<h6 class="text-dark m-0">Promo Code</h6>
</div>
<div>
	<div class="accordion" id="accordionExample">
		<div class="d-flex align-items-center" id="headingThree">
			<a class="p-3 d-flex align-items-center text-decoration-none text-success w-100" type="button"
			   data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				<i class="icofont-badge mr-3"></i> Add Promo Code
				<i class="icofont-rounded-down ml-auto"></i>
			</a>
		</div>
		<div id="collapseThree" class="collapse p-3 border-top" aria-labelledby="headingThree"
			 data-parent="#accordionExample">
			<form class="row">
				<div class="col-8 m-0 pr-1">
					<input type="text" class="form-control" id="exampleInputPromo1" placeholder="Enter Promo Code"
						   required>
				</div>
				<div class="col-4 pl-1">
					<button type="submit" class="btn btn-success btn-block">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="address p-3 bg-white">
	<h6 class="text-dark m-0">Total</h6>
</div>
<div class="p-3">
	<div class="clearfix" id="rincian-container">

	</div>
</div>
<!-- continue -->
<div class="fixed-bottom">
	<a href="successful.html" class="btn btn-success btn-block">Proses Pembayaran</a>
</div>
