<div class="osahan-order_address">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('keranjang') ?>">
				<i class="icofont-rounded-left back-page"></i></a>
			<h5 class="font-weight-bold m-0 ml-3">Select Address</h5>
			<button type="button" class="btn btn-outline-success btn-sm ml-auto" data-toggle="modal"
					data-target="#alamatModal">Add
			</button>
			<a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
	<div class="p-3">
		<?php foreach ($alamat->result() ?? [] as $index => $item): ?>
			<div class="custom-control custom-radio px-0 mb-3 position-relative border-custom-radio">
				<input type="radio" id="customRadioInline<?= $index ?>" name="alamat"
					   class="custom-control-input" value="<?= $item->id_alamat ?>">
				<label class="custom-control-label w-100" for="customRadioInline<?= $index ?>">
					<div>
						<div class="p-3 bg-white rounded shadow-sm w-100">
							<div class="d-flex align-items-center mb-2">
								<p class="mb-0 h6">Alamat-<?= ($index + 1) ?></p>
								<!--							<p class="mb-0 badge badge-success ml-auto">Default</p>-->
							</div>
							<p class="small text-muted m-0"><?= $item->alamat_lengkap ?></p>
							<p class="small text-muted m-0"><?= $item->rincian_alamat ?></p>
							<p class="pt-2 m-0 text-right"><span class="small"><a href="#" data-toggle="modal"
																				  data-target="#exampleModal"
																				  class="text-decoration-none text-dark">Edit</a></span>
							</p>
						</div>
					</div>
				</label>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- continue -->
<div class="fixed-bottom">
	<a href="delivery_time.html" class="btn btn-success btn-lg btn-block">Continue</a>
</div>
<!-- Modal -->
<div class="modal fade" id="alamatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="<?php echo site_url('keranjang/savealamat') ?>">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tentukan Lokasi Alamat Pengiriman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="col-md-12 form-group">
							<label class="form-label">Pin Peta</label>
							<div class="input-group">
								<input placeholder="Pin Peta" type="text" name="location" class="form-control">
								<input type="hidden" name="lat">
								<input type="hidden" name="long">
								<input type="hidden" name="id_pembeli"
									   value="<?= $this->session->userdata('id_pengguna') ?? '-1' ?>">
								<div class="input-group-append">
									<a href="<?= site_url('keranjang/alamatpeta') ?>" id="button-addon2" type="button"
									   class="btn btn-outline-secondary"><i
												class="icofont-pin"></i></a>
								</div>
							</div>
						</div>
						<div class="col-md-12 form-group"><label class="form-label">Alamat Lengkap</label>
							<textarea rows="5"
									  placeholder="Alamat Lengkap contoh. Nomor Rumah, Nama jalan, RT/RW" type="text"
									  class="form-control" name="alamat_lengkap"></textarea></div>
						<div class="col-md-12 form-group"><label class="form-label">Keterangan Alamat</label>
							<textarea rows="5"
									  placeholder="Tambahkan Keterangan Alamat contoh. Disamping toko butik asmara, didepan Masjid Al-Amin"
									  type="text"
									  name="rincian_alamat"
									  class="form-control"></textarea></div>
					</div>
				</div>
				<div class="modal-footer p-0 border-0">
					<div class="col-6 m-0 p-0">
						<button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close
						</button>
					</div>
					<div class="col-6 m-0 p-0">
						<button type="submit" class="btn btn-success btn-lg btn-block">Save changes</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
