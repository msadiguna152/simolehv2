<script>
	const rincianContainer = $('#rincian-container');
	const progressTag = $('#saveProgress');
	const checkoutHelper = {
		saveUser() {
			var nohp = $('#nohp').val();
			var nama = $('#namalengkap').val();
			if (nohp !== '' && nama !== '') {
				progressTag.text('Sedang menyimpan data...').removeClass('text-success').removeClass('text-danger');
				$.ajax({
					url: '<?php echo site_url('pesanan/save_user') ?>',
					dataType: 'json',
					data: {
						nohp, nama
					},
					method: 'POST',
					success(res) {
						progressTag.text('Berhasil disimpan').removeClass('text-muted').addClass('text-success');
					},
					error(error) {
						progressTag.text('Gagal disimpan').removeClass('text-muted').addClass('text-danger');
					}
				})
			}
		},
		getRincian(ids, qty) {
			rincianContainer.html('<p class="mb-1 text-muted" id="loading-rincian">Sedang Mengambil rincian <span class="float-right text-dark">.....</span></p>')
			$.ajax({
				url: "<?php echo site_url('keranjang/items') ?>",
				data: {
					ids, qty
				},
				method: 'POST',
				dataType: 'json',
				success(response) {
					checkoutHelper.tampilkanRincian(response.data, qty);
					$('#loading-rincian').remove();
				},
				error(e) {
					console.log(e);
				}
			})
		},
		tampilkanRincian(data, qty) {
			var total = 0;
			const rincianPembelian = data.map(function (item) {
				var subTotal = qty[item.id_produk].count * (item.harga_promosi !== "0" ? parseInt(item.harga_promosi) : parseInt(item.harga));
				total = total + subTotal;
				return `<p class="mb-1 text-muted">${item.nama_produk} X ${qty[item.id_produk].count} <span class="float-right text-dark">Rp. ${$.number(subTotal, 0, ',', '.')}</span></p>`;
			})
			rincianPembelian.push(`<p class="mb-1 text-muted font-weight-bold">Jumlah Belanja <span class="float-right text-dark">Rp. ${$.number(total, 0, ',', '.')}</span></p>`)
			rincianPembelian.push(`<p class="mb-1 text-muted font-weight-bold">Diskon Voucher <span class="float-right text-dark">Rp. ${$.number(total, 0, ',', '.')}</span></p>`)
			rincianPembelian.push(`<p class="mb-1 text-muted">Ongkos Kirim<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark">Rp. 0</span></p>`)
			rincianPembelian.push(`<hr><h6 class="font-weight-bold mb-0">Jumlah Pembayaran <span class="float-right">Rp. ${$.number(total, 0, ',', '.')}</span></h6>`)
			rincianContainer.html(rincianPembelian.join(''));
		}
	}
	$(document).ready(function () {
		var keranjang = localStorage.getItem('keranjang');
		if (keranjang !== null) {
			var decodedKeranjang = JSON.parse(keranjang);
			var ids = Object.keys(decodedKeranjang);
			checkoutHelper.getRincian(ids, decodedKeranjang);
		}
		$("input#nohp").on('blur', checkoutHelper.saveUser)
		$("input#namalengkap").on('blur', checkoutHelper.saveUser)
	})
</script>
