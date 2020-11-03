<div class="osahan-checkout">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('keranjang') ?>">
				<i class="icofont-rounded-left back-page"></i></a>
			<h6 class="font-weight-bold m-0 ml-3">Checkout Pesanan</h6>
			<a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
</div>
<?php if ($this->session->userdata('message')): ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Peringatan</strong> <?php echo $this->session->userdata('message') ?>
	</div>
<?php endif; ?>
<div class="pembeli p-3 bg-white">
	<h6 class="m-0 text-dark d-flex align-items-center">Identitas Pemesan <span class="small ml-auto">
			</span>
	</h6>
</div>
<?php if (!$this->session->userdata('username')): ?>
	<div class="px-3">
		<div class="d-flex align-items-center">
			<p class="mb-2 font-weight-bold">Nama Lengkap</p>
		</div>
		<div class="form-group">
			<input type="text"
				   class="form-control" name="namalengkap" id="namalengkap" aria-describedby="helpId"
				   placeholder="Contoh. Hendra Kumbara"
				   value="<?php echo $this->session->userdata('nama_pengguna') ?? '' ?>">
		</div>
	</div>
	<div class="px-3">
		<div class="d-flex align-items-center">
			<p class="mb-2 font-weight-bold">Nomor Hp</p>
		</div>
		<div class="form-group">
			<input type="text"
				   class="form-control" name="nohp" data-mask="0000-0000-0000" id="nohp" aria-describedby="helpId"
				   placeholder="0000-0000-0000" value="<?php echo $this->session->userdata('no_telpon') ?? '' ?>">
			<small id="saveProgress" class="form-text text-muted"></small>
		</div>
	</div>
<?php else: ?>
	<div class="px-3">
		<div class="d-flex align-items-center">
			<p class="mb-2 font-weight-bold">Nama Lengkap</p>
		</div>
		<div class="form-group">
			<input type="text"
				   class="form-control" name="namalengkap" id="namalengkap" aria-describedby="helpId"
				   placeholder="Contoh. Hendra Kumbara"
				   value="<?php echo $this->session->userdata('nama_pengguna') ?? '' ?>">
		</div>
	</div>
	<div class="px-3">
		<div class="d-flex align-items-center">
			<p class="mb-2 font-weight-bold">Nomor Hp</p>
		</div>
		<div class="form-group">
			<input type="text"
				   class="form-control" name="nohp" data-mask="0000-0000-0000" id="nohp" aria-describedby="helpId"
				   placeholder="0000-0000-0000" value="<?php echo $this->session->userdata('no_telpon') ?? '' ?>">
			<small id="saveProgress" class="form-text text-muted"></small>
		</div>
	</div>
<?php endif ?>
<?php if (!$this->session->userdata('id_pengguna')): ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong class="mb-2">Informasi</strong><br>Silahkan <a href="<?php echo site_url('akun') ?>">login</a> atau
		<a href="<?php echo site_url('akun/registrasi') ?>">daftar</a> untuk menerima kemudahan pada transaksi
		selanjutnya.
	</div>
<?php endif; ?>
<?php $alamat_dipilih = $alamat->row() ?? null ?>
<div class="address p-3 bg-white">
	<h6 class="m-0 text-dark d-flex align-items-center">Alamat Pengantaran <span class="small ml-auto">
			<a href="<?php echo site_url('keranjang/alamat') ?>"
			   class="font-weight-bold text-decoration-none text-success">
				<i class="icofont-location-arrow"></i> <?php echo $alamat_dipilih ? 'Ganti' : 'Tambah' ?></a></span>
	</h6>
</div>
<?php if ($alamat_dipilih): ?>
	<div class="p-3">
		<div class="d-flex align-items-center">
			<p class="mb-2 font-weight-bold" id="lokasi-pengantaran" data-lat="<?php echo $alamat_dipilih->lat ?>"
			   data-lng="<?php echo $alamat_dipilih->long ?>">Alamat Pengantaran</p>
			<p class="mb-2 badge badge-success ml-auto">Dipilih</p>
		</div>
		<p class="small text-muted m-0"><?= $alamat_dipilih->alamat_lengkap ?></p>
		<p class="small text-muted m-0"><?= $alamat_dipilih->rincian_alamat ?></p>
	</div>
<?php else: ?>
	<div class="p-3">
		<a href="<?= site_url('keranjang/alamat') ?>" class="text-success text-decoration-none w-100">
			<div class="d-flex align-items-center">
				<i class="icofont-credit-card"></i>
				<span class="ml-3">Tambah Alamat Pengiriman</span>
				<i class="icofont-rounded-right ml-auto"></i>
			</div>
		</a>
	</div>
<?php endif; ?>
<div class="address p-3 bg-white">
	<h6 class="m-0 text-dark">Metode Pembayaran</h6>
</div>
<?php if ($this->session->userdata('ewallet')): ?>
	<div class="p-3 bg-white">
		<a href="<?= site_url('keranjang/pembayaran') ?>" class="text-success mb-1 text-decoration-none w-100">
			<div class="d-flex align-items-center">
				<span class="ml-3 text-muted font-weight-bold"><?php echo $this->session->userdata('ewallet') ?></span>
				<span class="ml-5 text-muted font-weight-bold"><?php echo $this->session->userdata('nohpwallet') ?></span>
			</div>
		</a>
	</div>
<?php endif; ?>
<?php if ($this->session->userdata('cod')): ?>
	<div class="p-3 bg-white">
		<a href="<?= site_url('keranjang/pembayaran') ?>" class="text-success mb-1 text-decoration-none w-100">
			<div class="d-flex align-items-center">
				<span class="ml-3 text-muted font-weight-bold">COD (Bayar ditempat)</span>
			</div>
		</a>
	</div>
<?php endif; ?>
<?php if ($this->session->userdata('bank')): ?>
	<div class="p-3 bg-white">
		<a href="<?= site_url('keranjang/pembayaran') ?>" class="text-success mb-1 text-decoration-none w-100">
			<div class="d-flex align-items-center">
				<span class="ml-3 text-muted font-weight-bold h6">Bank <?php echo $this->session->userdata('bank') ?> Virtual Akun</span>
			</div>
			<small style="font-size: 10px" class="text-muted">Anda akan memperoleh nomor rekening virtual setelah
				mengeklik tombol Proses Pembayaran</small>
		</a>
	</div>
<?php endif; ?>
<div class="p-3">
	<a href="<?= site_url('keranjang/pembayaran') ?>" class="text-success text-decoration-none w-100">
		<div class="d-flex align-items-center">
			<i class="icofont-credit-card"></i>
			<?php if ($this->session->userdata('bank') || $this->session->userdata('cod') || $this->session->userdata('ewallet')): ?>
				<span class="ml-3">Ganti Metode Pembayaran</span>
			<?php else: ?>
				<span class="ml-3">Tambah Metode Pembayaran</span>
			<?php endif; ?>
			<i class="icofont-rounded-right ml-auto"></i>
		</div>
	</a>
</div>
<div class="address p-3 bg-white">
	<h6 class="text-dark m-0">Kode Promo</h6>
</div>
<div>
	<div class="accordion" id="accordionExample">
		<div class="d-flex align-items-center" id="headingThree">
			<a class="p-3 d-flex align-items-center text-decoration-none text-success w-100" type="button"
			   data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				<i class="icofont-badge mr-3"></i> Tambahkan Kode Promo
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
	<h6 class="text-dark m-0">Catatan Tambahan</h6>
</div>
<div class="p-3">
	<div class="form-group">
		<textarea class="form-control" name="catatan" rows="4" id="catatan_tambahan"
				  placeholder="Contoh. Ukuran Baju, Jenis Rasa"><?php echo $this->session->userdata('catatan') ?? '' ?></textarea>
		<small id="saveProgress" class="form-text text-muted"></small>
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
	<?php if ($alamat_dipilih): ?>
		<?php if ($this->session->userdata('bank') || $this->session->userdata('cod') || $this->session->userdata('ewallet')): ?>
		<a href="<?php echo site_url('pesanan/proses') ?>" class="btn btn-success btn-block">Proses Pembayaran</a>
	<?php else: ?>
		<a href="javascript:validate()" class="btn btn-success btn-block">Proses Pembayaran</a>
		<script>
			function validate() {
				Snackbar.show({text: "Silahkan pilih metode pembayaran terlebih dahulu"})
			}
		</script>
	<?php endif; ?>
	<?php else: ?>
		<a href="javascript:validate()" class="btn btn-success btn-block">Proses Pembayaran</a>
		<script>
			function validate() {
				Snackbar.show({text: "Silahkan tentukan Alamat Pengiriman terlebih dahulu"})
			}
		</script>
	<?php endif; ?>
</div>
