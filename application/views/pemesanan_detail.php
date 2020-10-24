<div class="osahan-status">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('pesanan') ?>">
				<i class="icofont-rounded-left back-page"></i> List Pesanan</a>
			<span class="font-weight-bold ml-3 h6 mb-0">ID #<?php echo $transaksi[0]->id_pesanan ?? 'NULL' ?></span>
			<a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
	<!-- status complete -->
	<div class="p-3 status-order border-bottom bg-white">
		<p class="small m-0"><i class="icofont-ui-calendar"></i> <?php echo $transaksi[0]->tanggal_pesanan ?? 'NULL' ?>
		</p>
	</div>
	<div class="p-3 bg-white">
		<h6 class="text-dark m-0">Status Pemesanan</h6>
	</div>
	<div class="p-3 border-bottom">
		<div class="my-1 step <?php echo $transaksi[0]->status > 0 ? 'active' : '' ?>">
				<span class="icon text-<?php echo $transaksi[0]->status > 0 ? 'success' : 'danger' ?>"><i
							class="<?php echo $transaksi[0]->status > 0 ? 'icofont-check-circled' : 'icofont-close-circled' ?>"></i></span>
			<span class="text small">Menunggu Pembayaran</span>
		</div>
		<div class="my-1 step <?php echo $transaksi[0]->status > 1 ? 'active' : '' ?>">
				<span class="icon text-<?php echo $transaksi[0]->status > 1 ? 'success' : 'danger' ?>"><i
							class="<?php echo $transaksi[0]->status > 1 ? 'icofont-check-circled' : 'icofont-close-circled' ?>"></i></span>
			<span class="text small">Pesanan di konfirmasi</span>
		</div>
		<div class="my-1 step <?php echo $transaksi[0]->status > 2 ? 'active' : '' ?>">
				<span class="icon text-<?php echo $transaksi[0]->status > 2 ? 'success' : 'danger' ?>"><i
							class="<?php echo $transaksi[0]->status > 2 ? 'icofont-check-circled' : 'icofont-close-circled' ?>"></i></span>
			<span class="text small">Dalam perjalanan</span>
		</div>
		<div class="my-1 step <?php echo $transaksi[0]->status > 3 ? 'active' : '' ?>">
				<span class="icon text-<?php echo $transaksi[0]->status > 3 ? 'success' : 'danger' ?>"><i
							class="<?php echo $transaksi[0]->status > 3 ? 'icofont-check-circled' : 'icofont-close-circled' ?>"></i></span>
			<span class="text small">Pesanan Selesai</span>
		</div>
	</div>
</div>
<div class="p-3 bg-white">
	<h6 class="text-dark m-0">Alamat Pengiriman</h6>
</div>
<div class="p-3">
	<div class="d-flex flex-column align-items-start text-success">
		<div class="d-flex align-items-center">
			<i class="icofont-location-arrow"></i>
			<span class="ml-3"><?php echo $transaksi[0]->alamat_lengkap ?? 'NULL' ?></span>
		</div>
		<small class="ml-4 mt-2 pl-1"><?php echo $transaksi[0]->rincian_alamat ?? 'NULL' ?></small>
	</div>
</div>
<div class="p-3 bg-white">
	<h6 class="text-dark m-0">Pembayaran</h6>
</div>
<div class="p-3">
	<div class="d-flex align-items-center text-success">
		<i class="icofont-credit-card"></i>
		<span class="ml-3"><?php echo $transaksi[0]->jenis_pembayaran ?></span>
	</div>
	<div class="mt-2">
		<span class="ml-6 mt-3 font-weight-bold">Status Pembayaran : <?php echo $transaksi[0]->status_pembayaran == 'PENDING' ? 'Belum dibayar' : ($transaksi[0]->status == 5 ? 'Transaksi Gagal' : ($transaksi[0]->status == 1 ? 'Menunggu Konfirmasi' : 'Sudah Dibayar')) ?></span>
	</div>
</div>
<div class="address p-3 bg-white">
	<h6 class="text-dark m-0">Total</h6>
</div>
<div class="p-3">
	<div class="clearfix" id="rincian-container">
		<?php
		$total_produk = 0;
		foreach ($transaksi as $item): ?>
			<p class="mb-1 text-muted"><?php echo $item->nama_produk ?> X <?php echo $item->banyak ?> <span
						class="float-right text-dark">Rp. <?php echo number_format($item->sub_total, 0, ',', '.') ?></span>
			</p>
			<?php $total_produk = $total_produk + $item->sub_total ?>
		<?php endforeach; ?>
		<p class="mb-1 text-muted font-weight-bold">Jumlah Belanja <span
					class="float-right text-dark">Rp. <?php echo number_format($total_produk, 0, ',', '.') ?></span>
		</p>
		<p class="mb-1 text-muted font-weight-bold">Diskon Voucher <span
					class="float-right text-dark">Rp. <?php echo number_format($transaksi[0]->voucher, 0, ',', '.') ?></span>
		</p>
		<p class="mb-1 text-muted">Ongkos Kirim<span class="text-info ml-1"><i
						class="icofont-info-circle"></i></span><span
					class="float-right text-dark">Rp. <?php echo number_format($transaksi[0]->ongkir, 0, ',', '.') ?></span>
		</p>
		<hr>
		<h6 class="font-weight-bold mb-0">Jumlah Pembayaran <span
					class="float-right">Rp. <?php echo number_format($transaksi[0]->total_pembayaran, 0, ',', '.') ?></span>
		</h6></div>
</div>
</div>
