<div class="osahan-listing">
	<div class="p-3 bg-white">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?= site_url() ?>beranda"><i
						class="icofont-rounded-left back-page"></i> Kembali</a>
		</div>
	</div>
	<div class="px-3 bg-white pb-2">
		<div class="pt-0">
			<h2 class="font-weight-bold"><?= ucwords(str_replace("-", " ", htmlspecialchars($nama_kategori))); ?></h2>
		</div>
	</div>
	<div class="osahan-listing kategori-produk px-3 bg-white">
		<div class="row">
			<?php
			foreach ($data_perkategori->result() as $data): ?>
				<div class="col-6 p-0 border-right border-bottom border-top">
					<div data-id="<?php echo $data->id_produk ?>" class="list-card-image">
						<div class="member-plan position-absolute">
							<?= $data->promosi == 0 ? '' : '<span class="badge badge-success">Promo</span>'; ?>
							<?= $data->terlaris == 0 ? '' : '<span class="badge badge-primary"><i>Best Seller</i></span>'; ?>
						</div>
						<div class="p-3">
							<a href="<?= base_url() ?>beranda/detail_produk/<?= $data->slug_p; ?>" class="text-dark">

								<img src="<?= base_url() ?>file/<?= $data->gambar; ?>"
									 class="img-fluid item-img w-100 mb-3">
								<h6><?= htmlspecialchars($data->nama_produk); ?></h6>
							</a>
							<p style="height: 60px">
								<?php
								$jml = strlen($data->deskripsi);
								echo $jml <= 100 ? $data->deskripsi : substr($data->deskripsi, 0, 100) . " more...";
								?>
							</p>
							<div class="" id="container-button">
								<h6 class="price m-0 text-success">                                                <?= $data->promosi == 1 ? '<del class="text-success mr-1">Rp' . number_format($data->harga, 0, ',', '.') . '</del>' . ' Rp' . number_format($data->harga_promosi, 0, ',', '.') : 'Rp' . number_format($data->harga, 0, ',', '.'); ?>
								</h6>
								<button data-id="<?= $data->id_produk ?>"
										id="btn-add-cart"
										class="btn btn-success btn-block ml-auto mt-2">Tambah
								</button>
								<div id="container-qty-btn"
									 class="input-group input-spinner cart-items-number mx-auto mt-2"
									 style="display: none">
									<div class="input-group-prepend">
										<button data-id="<?= $data->id_produk ?>" class="btn btn-success btn-sm"
												type="button" id="button-main-plus"> +
										</button>
									</div>
									<input type="text" class="form-control" value="0" readonly>
									<div class="input-group-append">
										<button data-id="<?= $data->id_produk ?>" class="btn btn-success btn-sm"
												type="button" id="button-main-minus"> −
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
