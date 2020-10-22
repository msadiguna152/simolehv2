<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>
<script>
	const rincianContainer = $('#rincian-container');
	const progressTag = $('#saveProgress');
	const checkoutHelper = {
		saveUser() {
			var no_telpon = $('#nohp').val();
			var nama_pembeli = $('#namalengkap').val();
			if (no_telpon !== '' && nama_pembeli !== '') {
				progressTag.text('Sedang menyimpan data...').removeClass('text-success').removeClass('text-danger');
				$.ajax({
					url: '<?php echo site_url('pesanan/save_user') ?>',
					dataType: 'json',
					data: {
						no_telpon, nama_pembeli
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
		saveCatatan() {
			var catatan = $('#catatan_tambahan').val();
			if (catatan !== '') {
				progressTag.text('Sedang menyimpan data...').removeClass('text-success').removeClass('text-danger');
				$.ajax({
					url: '<?php echo site_url('pesanan/save_catatan') ?>',
					dataType: 'json',
					data: {
						catatan
					},
					method: 'POST'
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
					var distance = '';
					if (typeof response.lokasi_toko !== "undefined") {
						distance = checkoutHelper.getDistance(response.lokasi_toko);
					}
					checkoutHelper.tampilkanRincian(response.data, qty, distance, response.ongkir);
					$('#loading-rincian').remove();
				},
				error(e) {
					console.log(e);
				}
			})
		},
		getDistance(lokasi_toko) {
			const lat = localStorage.getItem('lat');
			const lng = localStorage.getItem('lng');
			if (lat !== null && lng !== null) {
				const userLokasi = new google.maps.LatLng({lat: parseFloat(lat), lng: parseFloat(lng)});
				const tokoLokasi = new google.maps.LatLng({
					lat: parseFloat(lokasi_toko.lat),
					lng: parseFloat(lokasi_toko.lng)
				})
				const resultsDistance = google.maps.geometry.spherical.computeDistanceBetween(userLokasi, tokoLokasi);
				const distance = resultsDistance / 1000;
				console.log(distance.toFixed(1) + ' Km')
				return distance;
			}
			return 0;
		},
		sendOngkir(ongkir) {
			$.ajax({
				url: "<?php echo site_url('pesanan/ongkir') ?>",
				data: {ongkir},
				method: 'POST',
				dataType: 'json',
				success(response) {
					console.log(response);
				},
				error(e) {
					console.log(e);
				}
			})
		},
		tampilkanRincian(data, qty, distance, ongkir) {
			var total = 0;
			const rincianPembelian = data.map(function (item) {
				var subTotal = qty[item.id_produk].count * (item.harga_promosi !== "0" ? parseInt(item.harga_promosi) : parseInt(item.harga));
				total = total + subTotal;
				return `<p class="mb-1 text-muted">${item.nama_produk} X ${qty[item.id_produk].count} <span class="float-right text-dark">Rp. ${$.number(subTotal, 0, ',', '.')}</span></p>`;
			})
			rincianPembelian.push(`<p class="mb-1 text-muted font-weight-bold">Jumlah Belanja <span class="float-right text-dark">Rp. ${$.number(total, 0, ',', '.')}</span></p>`)
			rincianPembelian.push(`<p class="mb-1 text-muted font-weight-bold">Diskon Voucher <span class="float-right text-dark">Rp. ${$.number(0, 0, ',', '.')}</span></p>`)
			var totalOngkir = 0;
			if (distance !== '') {
				totalOngkir = ongkir * distance;
			} else {
				totalOngkir = ongkir
			}
			checkoutHelper.sendOngkir(totalOngkir)
			rincianPembelian.push(`<p class="mb-1 text-muted">Ongkos Kirim<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark">Rp. ${$.number(totalOngkir, 0, ',', '.')}</span></p>`)
			rincianPembelian.push(`<hr><h6 class="font-weight-bold mb-0">Jumlah Pembayaran <span class="float-right">Rp. ${$.number((total + parseFloat(totalOngkir)), 0, ',', '.')}</span></h6>`)
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
		$('textarea#catatan_tambahan').on('blur', checkoutHelper.saveCatatan)
	})
</script>
