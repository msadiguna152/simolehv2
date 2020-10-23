<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url() ?>assets2/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets2/vendor/jquery/plugins/jquery.number.min.js"></script>
<script src="<?php echo base_url() ?>assets2/vendor/jquery/plugins/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- slick Slider JS-->
<script type="text/javascript" src="<?php echo base_url() ?>assets2/vendor/slick/slick.min.js"></script>
<!-- Sidebar JS-->
<script type="text/javascript" src="<?php echo base_url() ?>assets2/vendor/sidebar/hc-offcanvas-nav.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets2/vendor/snackbar/snackbar.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets2/js/osahan.js"></script>
<?php switch ($this->uri->segment(1)): ?>
<?php case 'beranda': ?>
		<?php $this->load->view('beranda-js') ?>
		<?php break; ?>
	<?php case 'keranjang': ?>
		<?php $this->load->view('keranjang-js') ?>
		<?php if ($this->uri->segment(2) === 'alamat'): ?>
			<?php $this->load->view('alamat_pemesanan-js') ?>
		<?php elseif ($this->uri->segment(2) === 'checkout'): ?>
			<?php $this->load->view('konfirmasi_pembelian-js') ?>
		<?php elseif ($this->uri->segment(2) === 'pembayaran'): ?>
			<?php $this->load->view('pembayaran-js') ?>
		<?php elseif ($this->uri->segment(2) === 'alamatpeta'): ?>
			<?php $this->load->view('alamat_peta-js') ?>
		<?php endif ?>
		<?php break; ?>
	<?php default: ?>
		<?php $this->load->view('beranda-js') ?>
	<?php endswitch; ?>
<script>
	var keranjang = localStorage.getItem('keranjang');
	var decodeKeranjang = {};
	var jumlahIsi = [];
	if (keranjang !== null) {
		decodeKeranjang = JSON.parse(keranjang);
		jumlahIsi = Object.keys(decodeKeranjang);
	}
	$('#cart-item-count').text(jumlahIsi.length);
	if (jumlahIsi.length === 0) {
		$('#item-keranjang').html('<h5 class="text-center text-muted mt-4">Keranjang belanja kosong</h5>')
	}
</script>
</body>
</html>
