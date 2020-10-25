<div class="osahan-status">
	<div class="p-3 border-bottom">
		<div class="d-flex align-items-center">
			<a class="font-weight-bold text-success text-decoration-none" href="<?php echo site_url('pesanan') ?>">
				<i class="icofont-rounded-left back-page"></i> List Pesanan</a>
			<span class="font-weight-bold ml-3 h6 mb-0"><?php echo isset($pembayaran->id_pembayaran) ? "ID #" . $pembayaran->id_pembayaran : null ?></span>
			<a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
		</div>
	</div>
	<!-- status complete -->
	<div class="p-3 status-order border-bottom bg-white">
		<p class="small m-0"><?php echo isset($pembayaran->tanggal_pembayaran) ? '<i class="icofont-ui-calendar"></i>' . $pembayaran->tanggal_pembayaran : null ?>
		</p>
	</div>
	<!--	TODO: ganti jadi $pembayaran variable-->
	<?php if ($this->session->userdata('metode_pembayaran') === 'ewallet'): ?>
		<?php if ($this->session->flashdata('message')): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong><?php echo $this->session->flashdata('message') ?></strong><br>
				<small><?php echo $this->session->flashdata('addtional_info') ?></small>
			</div>
		<?php endif; ?>
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-center">Silahkan melakukan pembayaran pada aplikasi E-Wallet</h6>
			<?php if (isset($pembayaran->jenis_pembayaran) && $pembayaran->jenis_pembayaran === 'OVO'): ?>
				<div class="alert alert-primary" role="alert">
					<h5 class="alert-heading mb-3">Sedang memproses pembayaran</h5>
					<p>Silahkan cek aplikasi OVO anda untuk menyelesaikan proses verifikasi transaksi melalui OTP</p>
					<p class="mb-0">Klik <a href="<?php echo site_url('pesanan') ?>">disini</a> untuk mengecek
						status transaksi</p>
				</div>
			<?php elseif (isset($pembayaran->jenis_pembayaran) && $pembayaran->jenis_pembayaran === 'LINKAJA'): ?>
				<?php if ($this->session->flashdata('status_pemesanan') != 'gagal'): ?>
					<div class="alert alert-primary" role="alert">
						<h5 class="alert-heading">Sedang memproses pembayaran</h5>
						<h6>Link Aja</h6>
						<?php if (isset($pembayaran)): ?>
							<a href="<?php echo $pembayaran->checkout_url ?? '' ?>" class="btn btn-primary btn-block">Klik
								Disini</a>
							<small class="mt-2">Silahkan klik tombol di atas untuk mengarahkan anda ke aplikasi Link
								Aja</small>
							<small>Batas waktu pembayaran adalah 5 Menit</small>
							<p class="mb-0">Klik <a href="<?php echo site_url('pesanan') ?>">disini</a> untuk mengecek
								status transaksi</p>
						<?php else: ?>
							<small>Transaksi gagal dilakukan, silahkan coba beberapa saat lagi.</small>
						<?php endif; ?>
					</div>
				<?php else: ?>
					<div class="alert alert-danger" role="alert">
						<h5 class="alert-heading">Gagal melakukan transaksi</h5>
						<small>Silahkan ulangi beberapa saat lagi. Pastikan nomor anda terdaftar pada aplikasi
							LinkAja</small>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="alert alert-danger" role="alert">
					<h5 class="alert-heading">Gagal melakukan transaksi</h5>
					<small>Metode pembayaran tidak tersedia. Silahkan ulangi lagi.</small>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if ($this->session->userdata('metode_pembayaran') === 'bank'): ?>
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-center text-uppercase">Nomor Virtual Akun Anda</h6>
			<p class="font-weight-bold text-center bg-white py-2 h4 rounded"><?php echo $pembayaran->account_number ?? 'NULL' ?>
				<br><small><?php echo $pembayaran->jenis_pembayaran ?? 'NULL' ?> Virtual Account</small>
			</p>

		</div>
		<!-- Destination -->
		<div class="address p-3 bg-white">
			<h6 class="text-dark m-0">Cara Pembayaran Virtual Akun</h6>
			<small>Hanya untuk bank yang sama</small>
		</div>
		<div>
			<?php if (isset($pembayaran->jenis_pembayaran)): ?>
				<div class="accordion" id="accordionATM">
					<div class="d-flex align-items-center" id="headingThree">
						<a class="p-3 d-flex align-items-center text-decoration-none text-success w-100" type="button"
						   data-toggle="collapse" data-target="#collapseAtm" aria-expanded="false"
						   aria-controls="collapseAtm">
							<i class="icofont-badge mr-3"></i> ATM
							<i class="icofont-rounded-down ml-auto"></i>
						</a>
					</div>
					<div id="collapseAtm" class="collapse p-3 border-top" aria-labelledby="headingThree"
						 data-parent="#accordionATM">
						<?php if ($pembayaran->jenis_pembayaran === 'BRI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Pilih menu Transaksi Lain</li>
								<li>Pilih menu Lainnya</li>
								<li>Pilih menu Pembayaran</li>
								<li>Pilih menu Lainnya</li>
								<li>Pilih menu BRIVA</li>
								<li>Masukkan Nomor BRI Virtual Account (Contoh: 26215-xxxxxxxxxxxx), lalu tekan
									“Benar”
								</li>
								<li>Konfirmasi pembayaran, tekan “Ya” bila sesuai</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Pilih Menu lain</li>
								<li>Pilih Transfer</li>
								<li>Pilih dari rekening tabungan</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Masukkan kode bank dilanjutkan dengan nomor Virtual Account anda (BRI 002+xxxxxxx
									xxxxxxxx)
								</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'MANDIRI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Masukkan kartu ATM dan pilih "Bahasa Indonesia"</li>
								<li>Ketik nomor PIN dan tekan BENAR</li>
								<li>Pilih menu “BAYAR/BELI”</li>
								<li>Pilih menu “MULTI PAYMENT”</li>
								<li>Ketik kode perusahaan: "88908", tekan "BENAR"</li>
								<li>Masukkan nomor Virtual Account dan tekan “BENAR”</li>
								<li>Isi NOMINAL, kemudian tekan "BENAR"</li>
								<li>Muncul konfirmasi data customer. Pilih Nomor 1 sesuai tagihan yang akan dibayar,
									kemudian tekan "YA"
								</li>
								<li>Muncul konfirmasi pembayaran. Tekan "YA" untuk melakukan pembayaran</li>
								<li>Bukti pembayaran dalam bentuk struk agar disimpan sebagai bukti pembayaran yang sah
									dari
									Bank Mandiri
								</li>
								<li>Transaksi Anda sudah selesai</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Pilih Menu lain</li>
								<li>Pilih Transfer</li>
								<li>Pilih dari rekening tabungan</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Masukkan kode bank dilanjutkan dengan nomor Virtual Account anda (Mandiri 008+nomor
									virtual account)
								</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'BNI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Masukkan Kartu Anda.</li>
								<li>Pilih Bahasa.</li>
								<li>Masukkan PIN ATM Anda.</li>
								<li>Pilih "Menu Lainnya".</li>
								<li>Pilih "Transfer".</li>
								<li>Pilih Jenis rekening yang akan Anda gunakan (Contoh; "Dari Rekening Tabungan").</li>
								<li>Pilih “Virtual Account Billing” .</li>
								<li>Masukkan nomor Virtual Account Anda (contoh: 88089999XXXXXX).</li>
								<li>Konfirmasi, apabila telah sesuai, lanjutkan transaksi.</li>
								<li>Transaksi Anda telah selesai</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Pilih Menu lain</li>
								<li>Pilih Transfer</li>
								<li>Pilih dari rekening tabungan</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Masukkan kode bank dilanjutkan dengan nomor Virtual Account anda (BNI
									009+xxxxxxxxxxxxxxx)
								</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'BCA'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Masukkan kartu ATM dan PIN BCA Anda</li>
								<li>Di menu utama, pilih "Transaksi Lainnya". Pilih "Transfer". Pilih "Ke BCA Virtual
									Account"
								</li>
								<li>Masukkan nomor
									VirtualAccount <?php echo $pembayaran->account_number ?? 'NULL' ?></li>
								<li>Pastikan data Virtual Account Anda benar, kemudian masukkan angka yang perlu Anda
									bayarkan, kemudian pilih "Benar"
								</li>
								<li>Cek dan perhatikan konfirmasi pembayaran dari layar ATM, jika sudah benar pilih
									"Ya",
									atau pilih "Tidak" jika data di layar masih salah
								</li>
								<li>Transaksi Anda sudah selesai. Pilih "Tidak" untuk tidak melanjutkan transaksi lain
								</li>
								<li>Setelah transaksi pembayaran Anda selesai, invoice ini akan diperbarui secara
									otomatis.
									Ini bisa memakan waktu hingga 5 menit.
								</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'PERMATA'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Pada menu utama, pilih transaksi lain</li>
								<li>Pilih Pembayaran Transfer</li>
								<li>Pilih pembayaran lainnya</li>
								<li>Pilih pembayaran Virtual Account</li>
								<li>Masukkan nomor virtual account anda</li>
								<li>Pada halaman konfirmasi, akan muncul nominal yang dibayarkan, nomor, dan nama
									merchant,
									lanjutkan jika sudah sesuai
								</li>
								<li>Pilih sumber pembayaran anda dan lanjutkan</li>
								<li>Transaksi anda selesai</li>
								<li>Ketika transaksi anda sudah selesai, invoice anda akan diupdate secara otomatis. Ini
									mungkin memakan waktu hingga 5 menit.
								</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ul>
								<li><h6>ATM Prima</h6>
									<ol>
										<li>Pada menu utama, pilih transaksi lain</li>
										<li>Pilih Transfer</li>
										<li>Pilih transfer antar bank lain</li>
										<li>Masukkan kode 13 (Kode Bank Permata) dan lanjut</li>
										<li>Masukkan nominal yang anda ingin bayarkan. Harus sesuai dengan nominal
											invoice
											anda
										</li>
										<li>Masukkan nomor virtual account anda</li>
										<li>Pada halaman konfirmasi, akan muncul nominal yang dibayarkan, nomor, dan
											nama
											merchant,
											lanjutkan jika sudah sesuai
										</li>
										<li>Transaksi anda selesai</li>
										<li>Ketika transaksi anda sudah selesai, invoice anda akan diupdate secara
											otomatis.
											Ini
											mungkin memakan waktu hingga 5 menit.
										</li>
									</ol>
								</li>
								<li><h6>ATM Bersama</h6>
									<ol>
										<li>Pada menu utama, pilih transaksi lain</li>
										<li>Pilih Transfer</li>
										<li>Pilih Transfer Online Antarbank</li>
										<li>Masukkan 013 (Kode Bank Permata), diikuti dengan nomor virtual account</li>
										<li>Masukkan nominal. Nominal harus sama dengan yang ada di invoice</li>
										<li>Biarkan nomor referensi kosong dan lanjutkan</li>
										<li>Pada halaman konfirmasi,akan muncul nominal yang dibayarkan, nomor, dan nama
											merchant,
											lanjutkan jika sudah sesuai
										</li>
										<li>Transaksi anda telah selesai</li>
										<li>Ketika transaksi anda sudah selesai, invoice anda akan diupdate secara
											otomatis.
											Ini
											mungkin memakan waktu hingga 5 menit.
										</li>
									</ol>
								</li>
								<li><h6>ATM Link</h6>
									<ol>
										<li>Pada menu utama, pilih transaksi lain</li>
										<li>Pilih Transfer</li>
										<li>Masukkan kode 013 (Kode Bank Permata) diikuti dengan nomor virtual account,
											dan
											lanjutkan.
										</li>
										<li>Masukkan nominal yang anda ingin bayarkan. Harus sesuai dengan nominal
											invoice
											anda
										</li>
										<li>Pilih sumber rekening pembayaran dan lanjutkan</li>
										<li>Biarkan nomor referensi kosong dan lanjutkan</li>
										<li>Pada halaman konfirmasi, akan muncul nominal yang dibayarkan, nomor, dan
											nama
											merchant,
											lanjutkan jika sudah sesuai
										</li>
										<li>Transaksi anda selesai</li>
										<li>Ketika transaksi anda sudah selesai, invoice anda akan diupdate secara
											otomatis.
											Ini
											mungkin memakan waktu hingga 5 menit.
										</li>
									</ol>
								</li>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				<div class="accordion" id="accordionInternetBanking">
					<div class="d-flex align-items-center" id="headingThree">
						<a class="p-3 d-flex align-items-center text-decoration-none text-success w-100" type="button"
						   data-toggle="collapse" data-target="#collapseInternetBanking" aria-expanded="false"
						   aria-controls="collapseInternetBanking">
							<i class="icofont-badge mr-3"></i> Internet Banking
							<i class="icofont-rounded-down ml-auto"></i>
						</a>
					</div>
					<div id="collapseInternetBanking" class="collapse p-3 border-top" aria-labelledby="headingThree"
						 data-parent="#accordionInternetBanking">
						<?php if ($pembayaran->jenis_pembayaran === 'BRI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>

							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih menu Pembayaran</li>
								<li>Pilih menu BRIVA</li>
								<li>Pilih rekening Pembayar</li>
								<li>Masukkan Nomor Virtual Account BRI Anda (Contoh: 26215-xxxxxxxxxxxx)</li>
								<li>Masukkan nominal yang akan dibayar</li>
								<li>Masukkan password dan Mtoken anda</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (BRI xxxxxxx xxxxxxxx)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'MANDIRI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Kunjungi website Mandiri Internet Banking: <a
											href="https://ibank.bankmandiri.co.id/retail3/">disini</a>
								</li>
								<li>Login dengan memasukkan USER ID dan PIN</li>
								<li>Pilih "Pembayaran"</li>
								<li>Pilih "Multi Payment"</li>
								<li>Pilih "No Rekening Anda"</li>
								<li>Pilih Penyedia Jasa "Xendit 88908"</li>
								<li>Pilih "No Virtual Account"</li>
								<li>Masukkan nomor Virtual Account anda</li>
								<li>Masuk ke halaman konfirmasi 1</li>
								<li>Apabila benar/sesuai, klik tombol tagihan TOTAL, kemudian klik "LANJUTKAN"</li>
								<li>Masuk ke halaman konfirmasi 2</li>
								<li>Masukkan Challenge Code yang dikirimkan ke Token Internet Banking Anda, kemudian
									klik
									"Kirim"
								</li>
								<li>Anda akan masuk ke halaman konfirmasi jika pembayaran telah selesai</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (Mandiri 88608-nomor virtual account)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'BNI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Ketik alamat https://ibank.bni.co.id kemudian klik “Enter”.</li>
								<li>Masukkan User ID dan Password.</li>
								<li>Pilih menu “Transfer”</li>
								<li>Pilih “Virtual Account Billing”.</li>
								<li>Kemudian masukan nomor Virtual Account Anda (contoh: 88089999XXXXXX) yang hendak
									dibayarkan. Lalu pilih rekening debet yang akan digunakan. Kemudian tekan ‘’lanjut’’
								</li>
								<li>Periksa ulang mengenai transaksi yang anda ingin lakukan</li>
								<li>Masukkan Kode Otentikasi Token.</li>
								<li>Pembayaran Anda berhasil</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (BNI xxxxxxxxxxxxxxx)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'BCA'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Login ke KlikBCA Individual</li>
								<li>Pilih "Transfer", kemudian pilih "Transfer ke BCA Virtual Account"</li>
								<li>Masukkan nomor
									VirtualAccount <?php echo $pembayaran->account_number ?? 'NULL' ?></li>
								<li>Pilih "Lanjutkan" untuk melanjutkan pembayaran</li>
								<li>Masukkan "RESPON KEYBCA APPLI 1" yang muncul pada Token BCA Anda, lalu klik tombol
									"Kirim"
								</li>
								<li>Transaksi Anda sudah selesai</li>
								<li>Setelah transaksi pembayaran Anda selesai, invoice ini akan diperbarui secara
									otomatis.
									Ini bisa memakan waktu hingga 5 menit.
								</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'PERMATA'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Buka situs <a href="https://new.permatanet.com">https://new.permatanet.com</a> dan
									login
								</li>
								<li>Pilih menu “Pembayaran”.</li>
								<li>Pilih menu “Pembayaran Tagihan”.</li>
								<li>Pilih “Virtual Account”</li>
								<li>Pilih sumber pembayaran</li>
								<li>Pilih menu "Masukkan Daftar Tagihan Baru"</li>
								<li>Masukan nomor Virtual Account Anda</li>
								<li>Konfirmasi transaksi anda</li>
								<li>Masukkan SMS token response</li>
								<li>Pembayaran Anda berhasil</li>
								<li>Ketika transaksi anda sudah selesai, invoice anda akan diupdate secara otomatis. Ini
									mungkin memakan waktu hingga 5 menit.
								</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (Permata xxxxxxxxxxxxxxx)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php endif; ?>
					</div>
				</div>
				<div class="accordion" id="accordionMobileBanking">
					<div class="d-flex align-items-center" id="headingThree">
						<a class="p-3 d-flex align-items-center text-decoration-none text-success w-100" type="button"
						   data-toggle="collapse" data-target="#collapseMobileBanking" aria-expanded="false"
						   aria-controls="collapseMobileBanking">
							<i class="icofont-badge mr-3"></i> Mobile Banking
							<i class="icofont-rounded-down ml-auto"></i>
						</a>
					</div>
					<div id="collapseMobileBanking" class="collapse p-3 border-top" aria-labelledby="headingThree"
						 data-parent="#accordionMobileBanking">
						<?php if ($pembayaran->jenis_pembayaran === 'BRI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Log in ke Mobile Banking</li>
								<li>Pilih menu Pembayaran</li>
								<li>Pilih menu BRIVA</li>
								<li>Masukkan nomor BRI Virtual Account dan jumlah pembayaran</li>
								<li>Masukkan nomor PIN anda</li>
								<li>Tekan “OK” untuk melanjutkan transaksi</li>
								<li>Transaksi berhasil</li>
								<li>SMS konfirmasi akan masuk ke nomor telepon anda</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (BRI xxxxxxx xxxxxxxx)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'MANDIRI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Log in Mobile Banking Mandiri Online (Install M andiri Online by PT. Bank Mandiri
									(Persero Tbk.) dari App Store: <a
											href="https://itunes.apple.com/id/app/mandiri-online/id1117312908?mt=8">disini</a>
									atau Play Store:
									<a href="https://play.google.com/store/apps/details?id=com.bankmandiri.mandirionline&hl=en">disini</a>)
								</li>
								<li>Klik “Icon Menu” di sebelah kiri atas</li>
								<li>Pilih menu “Pembayaran”</li>
								<li>Pilih “Buat Pembayaran Baru”</li>
								<li>Pilih “Multi Payment”</li>
								<li>Pilih Penyedia Jasa “Xendit 88908”</li>
								<li>Pilih “No. Virtual”</li>
								<li>Masukkan no virtual account dengan kode perusahaan “88908” lalu pilih “Tambah
									Sebagai
									Nomor Baru”
								</li>
								<li>Masukkan “Nominal” lalu pilih “Konfirmasi”</li>
								<li>Pilih “Lanjut”</li>
								<li>Muncul tampilan konfirmasi pembayaran</li>
								<li>Scroll ke bawah di tampilan konfirmasi pembayaran lalu pilih “Konfirmasi”</li>
								<li>Masukkan “PIN” dan transaksi telah selesai</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (MandiriI 88608-nomor virtual account)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'BNI'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Akses BNI Mobile Banking dari handphone kemudian masukkan user ID dan password.</li>
								<li>Pilih menu “Transfer”.</li>
								<li>Pilih menu “Virtual Account Billing” kemudian pilih rekening debet.</li>
								<li>Masukkan nomor Virtual Account Anda (contoh: 88089999XXXXXX) pada menu “input baru”.
								</li>
								<li>Konfirmasi transaksi anda</li>
								<li>Masukkan Password Transaksi.</li>
								<li>Pembayaran Anda Telah Berhasil.</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>

						<?php elseif ($pembayaran->jenis_pembayaran === 'BCA'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<ol>
								<li>Buka Aplikasi BCA Mobile</li>
								<li>Pilih "m-BCA", kemudian pilih "m-Transfer"</li>
								<li>Pilih "BCA Virtual Account"</li>
								<li>Masukkan nomor VirtualAccount <?php echo $pembayaran->account_number ?? 'NULL' ?>,
									lalu
									pilih "OK"
								</li>
								<li>Klik tombol "Send" yang berada di sudut kanan atas aplikasi untuk melakukan transfer
								</li>
								<li>Klik "OK" untuk melanjutkan pembayaran</li>
								<li>Masukkan PIN Anda untuk meng-otorisasi transaksi</li>
								<li>Setelah transaksi pembayaran Anda selesai, invoice ini akan diperbarui secara
									otomatis.
									Ini bisa memakan waktu hingga 5 menit.
								</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (BNI xxxxxxxxxxxxxxx)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php elseif ($pembayaran->jenis_pembayaran === 'PERMATA'): ?>
							<h6 class="font-weight-bold">Sesama Bank</h6>
							<h6>Permata Mobile</h6>
							<ol>
								<li>Buka Permata Mobile dan Login</li>
								<li>Pilih Pay "Pay Bills"/ "Pembayaran Tagihan"</li>
								<li>Pilih menu “Transfer”</li>
								<li>Pilih sumber pembayaran</li>
								<li>Pilih “daftar tagihan baru”</li>
								<li>Masukan nomor Virtual Account Anda</li>
								<li>Periksa ulang mengenai transaksi yang anda ingin lakukan</li>
								<li>Konfirmasi transaksi anda</li>
								<li>Masukkan SMS token respons</li>
								<li>Pembayaran Anda berhasil</li>
								<li>Ketika transaksi anda sudah selesai, invoice anda akan diupdate secara otomatis. Ini
									mungkin memakan waktu hingga 5 menit.
								</li>
							</ol>
							<h6 class="font-weight-bold">dari Bank Lain</h6>
							<ol>
								<li>Masukan User ID dan Password</li>
								<li>Pilih Transfer</li>
								<li>Pilih ke rek. Bank lain</li>
								<li>Pilih bank tujuan</li>
								<li>Masukkan nomor Virtual Account anda (Permata xxxxxxxxxxxxxxx)</li>
								<li>Input Nominal yang ditagihkan sebagai Nominal Transfer</li>
								<li>Selesai, transaksi berhasil</li>
							</ol>
						<?php endif; ?>

					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if ($this->session->userdata('metode_pembayaran') === 'cod'): ?>
		<div class="p-3 border-bottom">
			<div class="p-3 border-bottom">
				<h6 class="font-weight-bold text-center text-uppercase">COD (Bayar ditempat)</h6>
				<p class="font-weight-bold text-center bg-white py-2 h4 rounded">Pesanan anda akan segera di proses.
					Mohon menunggu.
					<br><small>Mohon berikan uang pas untuk kurir demi kemudahan dalam proses pengantaran.
						Terimakasih.</small>
				</p>

			</div>
		</div>
	<?php endif; ?>
	<?php if (!$this->session->userdata('ewallet') && isset($pembayaran->id_pembayaran)): ?>
		<div class="p-3 border-bottom bg-white">
			<div class="d-flex align-items-center mb-2">
				<h6 class="font-weight-bold mb-1">Total yang harus dibayar</h6>
				<h6 class="font-weight-bold ml-auto mb-1">
					Rp. <?php echo number_format($pembayaran->total_pembayaran ?? 0, 0, ',', '.') ?></h6>
			</div>
			<p class="m-0 small text-muted">Terimakasih telah membeli produk kami.</p>
		</div>
	<?php endif; ?>
</div>
