<div class="osahan-payment">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none"
			   href="<?php echo site_url('keranjang/checkout') ?>">
				<i class="icofont-rounded-left back-page"></i></a>
			<h6 class="font-weight-bold m-0 ml-3">Metode Pembayaran</h6>
			<a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
	<div class="payment p-3">
		<form id="form-pembayaran" action="<?php echo site_url('keranjang/checkout') ?>" method="POST">
			<div class="accordion" id="accordionExample">
				<div class="osahan-card rounded shadow-sm bg-white mb-3">
					<div class="osahan-card-header" id="headingOne">
						<h2 class="mb-0">
							<button
									class="d-flex p-3 align-items-center border-0 btn btn-outline-success bg-white text-decoration-none text-success w-100"
									type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
									aria-controls="collapseOne">
								<i class="icofont-credit-card mr-3"></i> Transfer Bank
								<i class="icofont-rounded-down ml-auto"></i>
							</button>
						</h2>
					</div>
					<div id="collapseOne" class="collapse tab-content filter bg-white" data-parent="#accordionExample">
						<div class="tab-pane fade show active" id="mon" role="tabpanel" aria-labelledby="mon-tab">
							<form>
								<?php
								$bank_assets = [
										'MANDIRI' => base_url('assets2/img/bank/Mandiri.svg'),
										'BNI' => base_url('assets2/img/bank/BNI.svg'),
										'BRI' => base_url('assets2/img/bank/BRI.svg'),
										'PERMATA' => base_url('assets2/img/bank/Permata.svg'),
										'BCA' => base_url('assets2/img/bank/BCA.svg')
								]
								?>
								<?php foreach ($fabanks ?? [] as $key => $bank): ?>
									<div class="custom-control border-bottom px-0 custom-radio">
										<input class="custom-control-input" type="radio" name="bank"
											   id="<?= $key + 1 ?>"
											   value="<?= $bank['code'] ?>">
										<label class="custom-control-label py-3 w-100 px-3" for="<?= $key + 1 ?>">
											<img class="mr-2" src="<?= $bank_assets[$bank['code']] ?? NULL ?>"
												 alt=""> <?= $bank['name'] ?>
										</label>
									</div>
								<?php endforeach; ?>
							</form>
						</div>
					</div>
				</div>
				<div class="osahan-card rounded shadow-sm bg-white mb-3">
					<div class="osahan-card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="d-flex p-3 align-items-center btn text-decoration-none text-success w-100"
									type="button" data-toggle="collapse" data-target="#collapseTwo"
									aria-expanded="false"
									aria-controls="collapseTwo">
								<i class="icofont-globe mr-3"></i> E-Wallet
								<i class="icofont-rounded-down ml-auto"></i>
							</button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="osahan-card-body p-3 border-top">
							<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
								<label class="btn btn-outline-secondary" for="ovo">
									<input type="radio" name="ewallet" id="ovo" value="OVO"> <img
											style="height: 23px;border-radius: 5px;"
											src="<?php echo base_url('/assets2/img/ovo.svg') ?>" class="mr-2"
											alt="">
									OVO
								</label>
								<label class="btn btn-outline-secondary" for="linkaja">
									<input type="radio" name="ewallet" id="linkaja" value="LINKAJA"> <img
											style="height: 23px;border-radius: 5px;"
											src="<?php echo base_url('/assets2/img/linkaja.svg') ?>" class="mr-2"
											alt=""> Link Aja
								</label>
							</div>
							<div class="form-row pt-3">
								<div class="col-md-12 form-group">
									<label class="form-label small font-weight-bold">Masukkan Nomor
										Telepon</label><br>
									<div class="input-group">
										<div class="input-group-prepend">
											<button id="button-addon2" type="button"
													class="btn btn-outline-secondary">
												<i class="icofont-phone"></i></button>
										</div>
										<input name="nomorhp" data-mask="0000 0000 0000" class="form-control"
											   type="text"
											   placeholder="0000 0000 0000"/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="osahan-card rounded shadow-sm bg-white mb-3">
					<div class="osahan-card-header" id="headingThree">
						<h2 class="mb-0">
							<button class="d-flex p-3 align-items-center btn text-decoration-none text-success w-100"
									type="button" data-toggle="collapse" data-target="#collapseThree"
									aria-expanded="false"
									aria-controls="collapseThree">
								<i class="icofont-dollar mr-3"></i> Cash on Delivery (COD)
								<i class="icofont-rounded-down ml-auto"></i>
							</button>
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
						 data-parent="#accordionExample">
						<div class="border-top">
							<div class="card-body">
								<div class="custom-control custom-checkbox mr-sm-2">
									<input type="checkbox" name="cod" class="custom-control-input"
										   id="customControlAutosizing">
									<label class="custom-control-label" for="customControlAutosizing">
										<b>Uang Cas</b><br>
										<p class="small text-muted m-0">Dimohon untuk memberikan uang pas pada saat
											pembayaran untuk mempermudah kurir bertransaksi. Terimakasih.</p>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')): ?>
					<div class="alert alert-warning mt-3" role="alert">
						<h6 class="alert-heading">Informasi</h6>
						<p><?php echo $this->session->flashdata('message') ?></p>
						<p class="mb-0"></p>
					</div>
				<?php endif; ?>
			</div>
		</form>

	</div>
</div>
<div class="fixed-bottom">
	<button id="btn-submit-pembayaran" class="btn btn-success btn-block">Selanjutnya</button>
</div>
