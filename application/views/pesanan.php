<div class="osahan-order">
	<div class="order-menu">
		<h5 class="font-weight-bold p-3 d-flex align-items-center">Pesanan</h5>
	</div>
	<div class="order-body px-3 pt-3">
		<?php if (count($pesanan ?? []) == 0): ?>
			<div class="d-flex align-items-center justify-content-center vh-100">
				<h6 class="text-center p-2">Tidak ada pesanan yang anda buat. Silahkan melakukan pemesanan pada halaman
					beranda</h6>
			</div>
		<?php endif; ?>
		<?php foreach ($pesanan ?? [] as $item): ?>
			<div class="pb-3">
				<a href="<?php echo site_url('pesanan/detail/' . $item->id_pesanan) ?>"
				   class="text-decoration-none text-dark">
					<div class="p-3 rounded shadow-sm bg-white">
						<div class="d-flex align-items-center mb-3">
							<p class="bg-success text-white py-1 px-2 mb-0 rounded small"><?php echo $item->status == 1 ? 'Baru' : ($item->status == 2 ? 'Diproses' : ($item->status == 3 ? 'Dikirim' : ($item->status == 4 ? 'Selesai' : 'Batal'))); ?></p>
							<span class="ml-2 bg-<?php echo $item->status_pembayaran == 'PENDING' ? 'danger' : 'success' ?> text-white py-1 px-2 mb-0 rounded small"><?php echo $item->status_pembayaran == 'PENDING' ? 'Belum Bayar' : 'Sudah Bayar' ?></span>
							<p class="text-muted ml-auto small mb-0"><i
										class="icofont-clock-time"></i> <?php echo tanggal_indo($item->tanggal_pesanan, true) ?>
							</p>
						</div>
						<div class="d-flex flex-column">
							<p class="text-muted m-0 my-auto">Alamat Pengiriman<br>
								<span class="text-dark font-weight-bold"><?php echo $item->alamat_lengkap ?></span>
							</p>
							<p class="text-muted m-0 mt-3" style="width: 100px">Total<br>
								<span class="text-dark font-weight-bold">Rp. <?php echo number_format($item->total_pembayaran ?? 0, 0, ',', '.') ?></span>
							</p>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
