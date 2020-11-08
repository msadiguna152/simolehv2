<?php
$pengaturan = $query = $this->db->get('tb_pengaturan');
foreach ($pengaturan->result() as $data) {
	$nama_bisnis = $data->nama_bisnis;
	$icon = $data->icon;
	$alamat = $data->alamat_toko;
	$kota = $data->kota;
	$provinsi = $data->provinsi;
}
?>

<!-- home page -->
<div class="osahan-home-page">
	<div class="border-bottom p-3">
		<div class="title d-flex align-items-center text-center">
			<a href="" class="text-decoration-none text-dark d-flex align-items-center">
				<img class="osahan-logo mr-2" src="<?= base_url() ?>pengaturan/<?= $icon; ?>">
				<h4 class="font-weight-bold text-success m-0"><?= $nama_bisnis; ?></h4>
			</a>
		</div>
		<a href="<?= site_url() ?>pencarian" class="text-decoration-none">
			<div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
				<div class="input-group-prepend">
					<button class="border-0 btn btn-outline-secondary text-success bg-white"><i
								class="icofont-search"></i></button>
				</div>
				<input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Pencarian . . ."
					   aria-label="" aria-describedby="basic-addon1">
			</div>
		</a>
	</div>
	<!-- body -->
	<div class="osahan-body">
		<!-- categories -->
		<div class="p-3 osahan-categories">
			<h6 class="mb-2">KATEGORI</h6>
			<?php $chunks = array_chunk($data_kategori->result(), 4); ?>
			<?php foreach ($chunks as $data_chunk): ?>
				<div class="row m-0">
					<?php foreach ($data_chunk as $key => $data): ?>
						<div class="col pl-0 pr-1 py-1">
							<div class="bg-white shadow-sm rounded text-center  px-2 py-3 c-it">
								<a href="<?= base_url('') ?>beranda/kategori/<?= strtolower($data->slug); ?>">
									<img src="<?php echo base_url() ?>file/<?php echo $data->icon; ?>"
										 class="img-fluid px-2">
									<p class="m-0 pt-2 text-muted text-center"><?= $data->nama_kategori; ?></p>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Promos -->
		<div class="py-3 bg-white osahan-promos shadow-sm">
			<div class="promo-slider">
				<?php foreach ($data_sliders->result() as $data): ?>
					<div class="osahan-slider-item m-2">
						<a target="_BLANK" href="<?= $data->url_sliders; ?>">
							<img src="<?= base_url() ?>sliders/<?= $data->gambar_sliders; ?>"
								 class="img-fluid mx-auto rounded" alt="<?= $data->keterangan_sliders; ?>">
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Grid 2 -->
		<div class="title d-flex align-items-center mb-3 mt-3 px-3">
			<h6 class="m-0">PROMO HARI INI</h6>
			<a class="ml-auto text-success" href="<?= base_url() ?>beranda/produk/promo-hari-ini">Lihat Semua</a>
		</div>

		<div class="promo_today px-3">
			<?php $a = 1;
			$chunks = array_chunk($data_grid2->result(), 2); ?>
			<?php foreach ($chunks as $data_chunk): ?>
				<div class="row <?= $a < 2 ? '' : 'pt-3'; ?>">
					<?php foreach ($data_chunk as $key => $data_p): ?>
						<div class="col-6">
							<div data-id="<?php echo $data_p->id_produk ?>"
								 class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
								<div class="list-card-image">
									<div class="member-plan position-absolute">
										<?= $data_p->promosi == 0 ? '' : '<span class="badge badge-success">Promo</span>'; ?>
										<?= $data_p->terlaris == 0 ? '' : '<span class="badge badge-primary"><i>Best Seller</i></span>'; ?>

									</div>
									<div class="p-3">
										<a href="<?= base_url() ?>beranda/detail_produk/<?= $data_p->slug_p; ?>"
										   class="text-dark">
											<img src="<?= base_url() ?>file/<?= $data_p->gambar; ?>"
												 class="img-fluid item-img w-100 mb-3">
											<p class="font-weight-bold text-lg mb-0"
											   style="height: 30px"><?= strlen($data_p->nama_produk) <= 24 ? $data_p->nama_produk : substr($data_p->nama_produk, 0, 21) . '...'; ?></p>
										</a>

										<p class="text-muted mt-2"
										   style="height: 65px">
											<?php
											$jml = strlen($data_p->deskripsi);
											echo $jml <= 51 ? $data_p->deskripsi : substr($data_p->deskripsi, 0, 44) . '<a href="' . base_url("beranda/detail_produk/$data_p->slug_p") . '"> more...</a>';
											?>
										</p>
										<div class="" id="container-button">
											<div class="price h6 mt-2 mb-3 d-flex flex-column justify-content-between"
												 style="height: 30px">
												<?= $data_p->promosi == 1 ? 'Rp ' . number_format($data_p->harga_promosi, 0, ',', '.') . '<del class="text-success mr-1">Rp ' . number_format($data_p->harga, 0, ',', '.') . '</del>' : 'Rp' . number_format($data_p->harga, 0, ',', '.'); ?>
											</div>
											<button data-id="<?= $data_p->id_produk ?>"
													id="btn-add-cart"
													class="btn btn-success btn-block ml-auto mt-2">Tambah
											</button>
											<div id="container-qty-btn"
												 class="input-group input-spinner cart-items-number mx-auto mt-2"
												 style="display: none">
												<div class="input-group-prepend">
													<button data-id="<?= $data_p->id_produk ?>"
															class="btn btn-success btn-sm"
															type="button" id="button-main-plus"> +
													</button>
												</div>
												<input type="text" class="form-control" value="0" readonly>
												<div class="input-group-append">
													<button data-id="<?= $data_p->id_produk ?>"
															class="btn btn-success btn-sm"
															type="button" id="button-main-minus"> −
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php $a++; endforeach; ?>
		</div>

		<!-- Grid 1 -->
		<div class="title d-flex align-items-center mb-3 mt-3 px-3">
			<h6 class="m-0">UNTUKMU HARI INI</h6>
			<a class="ml-auto text-success" href="<?= base_url() ?>beranda/produk/untumu-hari-ini">Lihat Semua</a>
		</div>
		<div class="pick_today px-3">
			<?php $a = 1;
			$chunks = array_chunk($data_grid1->result(), 2); ?>
			<?php foreach ($chunks as $data_chunk): ?>
				<div class="row <?= $a < 2 ? '' : 'pt-3'; ?>">
					<?php foreach ($data_chunk as $key => $data_p): ?>
						<div class="col-6">
							<div data-id="<?php echo $data_p->id_produk ?>"
								 class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
								<div class="list-card-image">
									<div class="member-plan position-absolute">
										<?= ($data_p->promosi == 0) ? '' : '<span class="badge badge-success">Promo</span>'; ?>
										<?= ($data_p->terlaris == 0) ? '' : '<span class="badge badge-primary"><i>Best Seller</i></span>'; ?>

									</div>
									<div class="p-3">
										<a href="<?= base_url() ?>beranda/detail_produk/<?= $data_p->slug_p; ?>"
										   class="text-dark">
											<img src="<?= base_url() ?>file/<?= $data_p->gambar; ?>"
												 class="img-fluid item-img w-100 mb-3">
											<p class="font-weight-bold text-lg mb-0"
											   style="height: 30px"><?= strlen($data_p->nama_produk) <= 24 ? $data_p->nama_produk : substr($data_p->nama_produk, 0, 21) . '...'; ?></p>
										</a>
										<p class="text-muted mt-2"
										   style="height: 65px">
											<?php
											$jml = strlen($data_p->deskripsi);
											echo $jml <= 51 ? $data_p->deskripsi : substr($data_p->deskripsi, 0, 44) . '<a href="' . base_url("beranda/detail_produk/$data_p->slug_p") . '"> more...</a>';
											?>
										</p>
										<div class="mt-1" id="container-button">
											<div class="price h6 mt-2 mb-3 d-flex flex-column justify-content-between"
												 style="height: 30px">
												<?= $data_p->promosi == 1 ? 'Rp ' . number_format($data_p->harga_promosi, 0, ',', '.') . '<del class="text-success mr-1">Rp ' . number_format($data_p->harga, 0, ',', '.') . '</del>' : 'Rp' . number_format($data_p->harga, 0, ',', '.'); ?>
											</div>
											<button data-id="<?= $data_p->id_produk ?>"
													id="btn-add-cart"
													class="btn btn-success btn-block ml-auto mt-2">Tambah
											</button>
											<div id="container-qty-btn"
												 class="input-group input-spinner cart-items-number mx-auto mt-2"
												 style="display: none">
												<div class="input-group-prepend">
													<button data-id="<?= $data_p->id_produk ?>"
															class="btn btn-success btn-sm"
															type="button" id="button-main-plus"> +
													</button>
												</div>
												<input type="text" class="form-control" value="0" readonly>
												<div class="input-group-append">
													<button data-id="<?= $data_p->id_produk ?>"
															class="btn btn-success btn-sm"
															type="button" id="button-main-minus"> −
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php $a++; endforeach; ?>
		</div>

		<!-- Grid 3 -->
		<div class="title d-flex align-items-center mb-3 mt-3 px-3">
			<h6 class="m-0"><i>BEST SELLER</i></h6>
			<a class="ml-auto text-success" href="<?= base_url() ?>beranda/produk/best-seller">Lihat Semua</a>
		</div>

		<div class="best_seller px-3">
			<?php $a = 1;
			$chunks = array_chunk($data_grid3->result(), 2); ?>
			<?php foreach ($chunks as $data_chunk): ?>
				<div class="row <?= $a < 2 ? '' : 'pt-3'; ?>">
					<?php foreach ($data_chunk as $key => $data_p):
						$nama_produk = strtolower(str_replace(" ", "-", "$data_p->nama_produk"));
						?>
						<div class="col-6">
							<div data-id="<?php echo $data_p->id_produk ?>"
								 class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
								<div class="list-card-image">

									<div class="member-plan position-absolute">
										<?= $data_p->promosi == 0 ? '' : '<span class="badge badge-success">Promo</span>'; ?>
										<?= $data_p->terlaris == 0 ? '' : '<span class="badge badge-primary"><i>Best Seller</i></span>'; ?>

									</div>
									<div class="p-3">
										<a href="<?= base_url() ?>beranda/detail_produk/<?= $data_p->slug_p; ?>"
										   class="text-dark">
											<img src="<?= base_url() ?>file/<?= $data_p->gambar; ?>"
												 class="img-fluid item-img w-100 mb-3">
											<p class="font-weight-bold text-lg mb-0"
											   style="height: 30px"><?= strlen($data_p->nama_produk ) <= 24 ? $data_p->nama_produk : substr($data_p->nama_produk , 0, 21) . '...'; ?></p>
										</a>
										<p class="text-muted mt-2"
										   style="height: 65px">
											<?php
											$jml = strlen($data_p->deskripsi);
											echo $jml <= 51 ? $data_p->deskripsi : substr($data_p->deskripsi, 0, 44) . '<a href="' . base_url("beranda/detail_produk/$data_p->slug_p") . '"> more...</a>';
											?>
										</p>
										<div class="" id="container-button">
											<div class="price h6 mt-2 mb-3 d-flex flex-column justify-content-between"
												 style="height: 30px">
												<?= $data_p->promosi == 1 ? 'Rp ' . number_format($data_p->harga_promosi, 0, ',', '.') . '<del class="text-success mr-1">Rp ' . number_format($data_p->harga, 0, ',', '.') . '</del>' : 'Rp' . number_format($data_p->harga, 0, ',', '.'); ?>
											</div>
											<button data-id="<?= $data_p->id_produk ?>"
													id="btn-add-cart"
													class="btn btn-success btn-block ml-auto mt-2">Tambah
											</button>
											<div id="container-qty-btn"
												 class="input-group input-spinner cart-items-number mx-auto mt-2"
												 style="display: none">
												<div class="input-group-prepend">
													<button data-id="<?= $data_p->id_produk ?>"
															class="btn btn-success btn-sm"
															type="button" id="button-main-plus"> +
													</button>
												</div>
												<input type="text" class="form-control" value="0" readonly>
												<div class="input-group-append">
													<button data-id="<?= $data_p->id_produk ?>"
															class="btn btn-success btn-sm"
															type="button" id="button-main-minus"> −
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php $a++; endforeach; ?>
		</div>

		<!-- Most sales -->
		<div class="title align-items-center pl-4 pr-4 pt-4 pb-2">
			<center><?= $alamat; ?>, <?= $kota; ?>, <?= $provinsi; ?></center>
		</div>
		<?php $chunks = array_chunk($data_medsos->result(), 3); ?>
		<?php foreach ($chunks as $data_chunk): ?>
			<div class="title align-items-center pl-4 pr-4 pt-2 pb-2">
				<center>
					<?php foreach ($data_chunk as $key => $data): ?>
						<a class="text-dark ml-3" target="_BLANK" href="<?= $data->url; ?>">
							<img style="width: 15px; height: 15px;"
								 src="<?= base_url() ?>pengaturan/<?= $data->icon; ?>"
								 class="img-fluid mx-auto" alt="<?= $data->medsos; ?>">
							<?= $data->medsos; ?>
						</a>
					<?php endforeach; ?>
				</center>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- Footer -->
