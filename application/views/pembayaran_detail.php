<div class="osahan-status">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('pesanan') ?>">
				<i class="icofont-rounded-left back-page"></i></a>
			<span class="font-weight-bold ml-3 h6 mb-0">ID #<?php echo $pembayaran->id_pembayaran ?? 'NULL' ?></span>
			<a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
	<!-- status complete -->
	<div class="p-3 status-order border-bottom bg-white">
		<p class="small m-0"><i class="icofont-ui-calendar"></i> <?php echo $pembayaran->tanggal_pembayaran ?? 'NULL' ?>
		</p>
	</div>
	<?php if ($this->session->userdata('ewallet')): ?>
		<?php if ($this->session->flashdata('message')): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong><?php echo $this->session->flashdata('message') ?></strong>
			</div>
		<?php endif; ?>
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-center">Silahkan melakukan pembayaran pada aplikasi E-Wallet</h6>
			<?php if ($this->session->userdata('ewallet') === 'OVO'): ?>
				<div class="alert alert-primary" role="alert">
					<h5 class="alert-heading mb-3">Sedang memproses pembayaran</h5>
					<p>Silahkan cek aplikasi OVO anda untuk menyelesaikan proses verifikasi transaksi melalui OTP</p>
					<p class="mb-0">Klik <a href="<?php echo site_url('pesanan') ?>">disini</a> untuk mengecek
						status transaksi</p>
				</div>
			<?php else: ?>
				<div class="alert alert-primary" role="alert">
					<h5 class="alert-heading">Sedang memproses pembayaran</h5>
					<h6>Link Aja</h6>
					<?php if (isset($pembayaran)): ?>
						<a href="<?php echo $pembayaran->checkout_url ?? '' ?>" class="btn btn-primary btn-block">Klik
							Disini</a>
						<small class="mt-2">Silahkan klik tombol di atas untuk mengarahkan anda ke aplikasi Link
							Aja</small>
					<?php else: ?>
						<small>Transaksi gagal dilakukan, silahkan coba beberapa saat lagi.</small>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if ($this->session->userdata('bank')): ?>
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-center">KODE PEMBAYARAN ANDA</h6>
			<div class="tracking-wrap">
				<div class="my-1 step active">
					<span class="icon text-success"><i class="icofont-check-circled"></i></span>
					<span class="text small">Menunggu Pembayaran</span>
				</div>
				<!-- step.// -->
				<div class="my-1 step active">
					<span class="icon text-danger"><i class="icofont-close-circled"></i></span>
					<span class="text small">Pesanan di konfirmasi</span>
				</div>
				<!-- step.// -->
				<div class="my-1 step">
					<span class="icon text-danger"><i class="icofont-close-circled"></i></span>
					<span class="text small">Dalam perjalanan</span>
				</div>
				<!-- step.// -->
				<div class="my-1 step">
					<span class="icon text-danger"><i class="icofont-close-circled"></i></span>
					<span class="text small">Pesanan Selesai</span>
				</div>
				<!-- step.// -->
			</div>
		</div>
		<!-- Destination -->
		<div class="p-3 border-bottom bg-white">
			<h6 class="font-weight-bold">Cara Pembayaran</h6>
			<p class="m-0 small">.....</p>
		</div>
	<?php endif; ?>
	<?php if ($this->session->userdata('cod')): ?>
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-center">KODE PEMBAYARAN ANDA</h6>
			<div class="tracking-wrap">
				<div class="my-1 step active">
					<span class="icon text-success"><i class="icofont-check-circled"></i></span>
					<span class="text small">Menunggu Pembayaran</span>
				</div>
				<!-- step.// -->
				<div class="my-1 step active">
					<span class="icon text-danger"><i class="icofont-close-circled"></i></span>
					<span class="text small">Pesanan di konfirmasi</span>
				</div>
				<!-- step.// -->
				<div class="my-1 step">
					<span class="icon text-danger"><i class="icofont-close-circled"></i></span>
					<span class="text small">Dalam perjalanan</span>
				</div>
				<!-- step.// -->
				<div class="my-1 step">
					<span class="icon text-danger"><i class="icofont-close-circled"></i></span>
					<span class="text small">Pesanan Selesai</span>
				</div>
				<!-- step.// -->
			</div>
		</div>
	<?php endif; ?>
	<?php if (!$this->session->userdata('ewallet')): ?>
		<div class="p-3 border-bottom bg-white">
			<div class="d-flex align-items-center mb-2">
				<h6 class="font-weight-bold mb-1">Total yang harus dibayar</h6>
				<h6 class="font-weight-bold ml-auto mb-1">$8.52</h6>
			</div>
			<p class="m-0 small text-muted">You can check your order detail here,<br>Thank you for order.</p>
		</div>
	<?php endif; ?>
</div>
