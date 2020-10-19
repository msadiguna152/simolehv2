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
	<div class="osahan-listing px-3 bg-white">
		<div class="row">
			<?php 
			foreach ($data_perkategori->result() as $data):
                $nama_produk = strtolower(str_replace(" ", "-", "$data->nama_produk"));

			?>
				<div class="col-6 p-0 border-right border-bottom border-top">
					<div class="list-card-image">
						<a href="<?= base_url()?>beranda/detail_produk/<?= $nama_produk; ?>" class="text-dark">
							<div class="member-plan position-absolute"><span class="badge m-3 badge-danger">10%</span>
							</div>
							<div class="p-3">
								<img src="<?= base_url() ?>file/<?= $data->gambar; ?>"
									 class="img-fluid item-img w-100 mb-3">
								<h6><?= htmlspecialchars($data->nama_produk); ?></h6>
								<p><?= htmlspecialchars($data->deskripsi); ?></p>
								<div class="d-flex align-items-center">
									<h6 class="price m-0 text-success"><?= "Rp " . number_format(htmlspecialchars($data->harga), 0, ',', '.'); ?></h6>
									<a href="javascript:void(0)" data-id="<?= $data->id_produk ?>"
									   id="btn-add-cart"
									   class="btn btn-success btn-sm ml-auto">+
									</a>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
