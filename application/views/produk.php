<div class="osahan-listing">
	<div class="p-3 bg-white">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?= site_url() ?>beranda">
				<i class="icofont-rounded-left back-page"></i> Kembali</a>
		</div>
	</div>
	<div class="px-3 bg-white pb-2">
        <div class="pt-0">
            <h2 class="font-weight-bold"><?= ucwords(str_replace("-", " ", htmlspecialchars($produk))); ?></h2>
        </div>
    </div>
	<div class="osahan-listing px-3 bg-white">
		<div class="row">
			<?php 
			foreach ($data_produk->result() as $data):
                $nama_produk = strtolower(str_replace(" ", "-", "$data->nama_produk"));

			?>
				<div class="col-6 p-0 border-right border-bottom border-top">
					<div class="list-card-image">
						<a href="<?= base_url()?>beranda/detail_produk/<?= $nama_produk; ?>" class="text-dark">
							<div class="member-plan position-absolute">
								<span class="badge mt-3 mb-3 ml-3 badge-danger"><?= $data->nama_kategori; ?></span>
                                 <?= $data->promosi == 0 ? '' : '<span class="badge badge-success">Promosi</span>';?>
                                 <?= $data->terlaris == 0 ? '' : '<span class="badge badge-primary"><i>Best Seller</i></span>';?>
							</div>
							<div class="p-3">
								<img src="<?= base_url() ?>file/<?= $data->gambar; ?>"
									 class="img-fluid item-img w-100 mb-3">
								<h6><?= htmlspecialchars($data->nama_produk); ?></h6>
								<p>
									<?php
                                       $jml = strlen($data->deskripsi);
                                       echo $jml <= 100 ? htmlspecialchars($data->deskripsi) : substr(htmlspecialchars($data->deskripsi), 0,100)." (Lihat Selengkapnya)";
                                    ?>
								</p>
								<div class="d-flex align-items-center">
									<h6 class="price m-0 text-success">
									<?= $data->promosi == 1 ? '<del class="text-success mr-1">Rp'. number_format($data->harga,0,',','.').'</del>'.' Rp'. number_format($data->harga_promosi,0,',','.') : 'Rp'. number_format($data->harga,0,',','.');?>
											
									</h6>
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
