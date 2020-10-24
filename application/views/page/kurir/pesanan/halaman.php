<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-1">
				<div class="col-sm-6">
					<h5 class="m-0 text-dark">
						<?php
						$menu = $this->session->userdata('menu');
						echo strtoupper($menu);
						?>
					</h5>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<!-- Main row -->
			<div class="row">

				<div class="col-md-12 connectedSortable">

					<label hidden=""
							<?php if ($this->session->flashdata('hasil') == "swalberhasilsimpan") {
								echo 'class="swalberhasilsimpan"';
							} ?>>
					</label>
					<label hidden=""
							<?php if ($this->session->flashdata('hasil') == "swalberhasilhapus") {
								echo 'class="swalberhasilhapus"';
							} ?>>
					</label>
					<label hidden=""
							<?php if ($this->session->flashdata('hasil') == "swalberhasilubah") {
								echo 'class="swalberhasilubah"';
							}; ?>>
					</label>

					<!-- PRODUCT LIST -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">DATA <?php echo strtoupper($menu); ?></h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body  table-responsive">
							<table id="example4" class="table table-hover table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Pesanan</th>
									<th>Pengantar</th>
									<th>Nama Pembeli</th>
									<th>Status Pesanan</th>
									<th>Jenis Pembayaran</th>
									<th>Total Pembayaran</th>
									<th>Status Pembayaran</th>
									<th>Rincian Pesanan</th>
									<th>Pilihan</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1;
								foreach ($data_pesanan->result() as $data): ?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo htmlspecialchars($data->tanggal_pesanan); ?></td>
										<td><?php echo htmlspecialchars($data->nama_pengguna); ?></td>
										<td><?php echo htmlspecialchars($data->nama_pembeli); ?></td>
										<td>
											<?php
											$status = htmlspecialchars($data->status);
											if ($status == 1) {
												echo '<span class="badge badge-primary">Baru</span>';
											} elseif ($status == 2) {
												echo '<span class="badge badge-warning">Diproses</span>';
											} elseif ($status == 3) {
												echo '<span class="badge badge-info">Dikirim</span>';
											} elseif ($status == 4) {
												echo '<span class="badge badge-success">Selesai</span>';
											} elseif ($status == 5) {
												echo '<span class="badge badge-danger">Batal</span>';
											}
											?>
										<td><?php echo htmlspecialchars($data->jenis_pembayaran); ?></td>
										<td><?php echo "Rp " . number_format(htmlspecialchars($data->total_pembayaran), 0, ',', '.'); ?></td>
										<td>
											<?= htmlspecialchars($data->status_pembayaran); ?>
										</td>

										<td>
											<a class="btn btn-success btn-sm btn-block" data-toggle="tooltip"
											   data-placement="bottom" title="Lihat Rincian Pesanan"
											   href="<?php echo base_url() ?>page/kurir/pesanan/lihat?id=<?php echo $data->id_pesanan ?>&token=<?php echo md5($data->id_pesanan) ?>">
												<i class="fas fa-eye"></i>
											</a>
										</td>
										<td align="center">

											<!-- Tombol Edit -->
											<a class="btn btn-info btn-sm btn-block" target="_BLANK"
											   data-toggle="tooltip" data-placement="bottom" title="Kirim Pesan"
											   href="https://api.whatsapp.com/send?phone=<?php echo $data->no_telpon; ?>">
												<i class="fas fa-envelope"></i>
											</a>

											<!-- Tombol Edit -->
											<a class="btn btn-success btn-sm btn-block" data-toggle="tooltip"
											   data-placement="bottom" title="Edit Data Pesanan"
											   href="<?php echo base_url() ?>page/kurir/pesanan/edit?id=<?php echo $data->id_pesanan ?>&token=<?php echo md5($data->id_pesanan) ?>">
												<i class="fas fa-edit"></i>
											</a>
										</td>
									</tr>
									<?php $no++; endforeach; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer text-center">
							<a href="javascript:void(0)" class="uppercase">View All Products</a>
						</div>
						<!-- /.card-footer -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
