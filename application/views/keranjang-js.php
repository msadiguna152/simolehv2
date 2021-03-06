<script>
	const keranjangItemElemen = $('#item-keranjang');
	const detailCekoutHref = $('#detail-checkout-href');
	const keranjangHelper = {
		getItems(ids, qty) {
			keranjangItemElemen.html(`<h5 class="text-center text-muted mt-4">Sedang mengambil data</h5>`);
			return $.ajax({
				url: "<?php echo site_url('keranjang/items') ?>",
				data: {
					ids
				},
				method: 'POST',
				dataType: 'json',
				success(response) {
					keranjangHelper.tampilkanItems(response.data, qty);
				},
				error(e) {
					console.log(e);
				}
			})
		},
		tampilkanItems(data, qty) {
			if (data.length === 0) {
				return keranjangItemElemen.html('<h5 class="text-center text-muted mt-4">Keranjang Kosong</h5>');
			}
			const items = data.map(function (item) {
				return `<div class="cart-items bg-white position-relative border-bottom">
							<div class="d-flex  align-items-center p-3">
							   <a href="<?php echo site_url('beranda/detail_produk/') ?>${item.slug_p}"><img src="<?php echo base_url('/file/') ?>${item.gambar}" class="img-fluid"></a>
							   <a href="<?php echo site_url('beranda/detail_produk/') ?>${item.slug_p}" class="ml-3 text-dark text-decoration-none w-100">
								  <h5 class="mb-1">${item.nama_produk}</h5>
								  <div class="d-flex align-items-center">
									 <p class="total_price font-weight-bold m-0">${item.harga_promosi !== "0" ? '<del class="text-success mr-1">Rp. ' + item.harga + '</del>' : ''} Rp. <span>${item.harga_promosi !== "0" ? $.number(item.harga_promosi, 0, ',', '.') : $.number(item.harga, 0, ',', '.')}</span></p>
									 <div class="input-group input-spinner ml-auto cart-items-number">
										<div class="input-group-prepend">
										   <button class="btn btn-success btn-sm" id="button-plus" data-id="${item.id_produk}"> + </button>
										</div>
										<input type="text" class="form-control qty-produk" readonly value="${qty[item.id_produk].count ?? 1}">
										<div class="input-group-append">
										   <button class="btn btn-success btn-sm" id="button-minus" data-id="${item.id_produk}"> − </button>
										</div>
									 </div>
								  </div>
							   </a>
							</div>
         				</div>`;
			});
			keranjangItemElemen.html(items);
			detailCekoutHref.show();
			keranjangHelper.tampilkanRincianCekout();
		},
		tampilkanRincianCekout() {
			var subTotal = 0;
			keranjangItemElemen.find('.cart-items').each(function () {
				var hargaString = $(this).find('.total_price>span').text();
				var qty = $(this).find('.qty-produk').val();
				var hargaInt = parseInt(hargaString.replace('.', ''));
				subTotal = subTotal + (qty * hargaInt);
			})
			$('#subtotal').text('Jumlah Belanja Rp. ' + $.number(subTotal, 0, ',', '.'));
		},
		kurangiJumlah(e) {
			var currentQty = $(this).parent('div').siblings('input').val();
			var updateQty = parseInt(currentQty) - 1;
			if (updateQty < 1) {
				$(this).parents('.cart-items').remove();
				var banyakItem = $('#item-keranjang').find('.cart-items').length;
				if (banyakItem === 0) {
					keranjangItemElemen.html('<h5 class="text-center text-muted mt-4">Keranjang Kosong</h5>');
					$('#detail-checkout-href').hide();
				}
			}
			$(this).parent('div').siblings('input').val(updateQty);
			keranjangHelper.tampilkanRincianCekout();
			keranjangHelper.updateKeranjang(updateQty, $(this).data('id'));
			return false;
		},
		tambahJumlah(e) {
			var currentQty = $(this).parent('div').siblings('input').val();
			var updateQty = parseInt(currentQty) + 1;
			$(this).parent('div').siblings('input').val(updateQty);
			keranjangHelper.tampilkanRincianCekout();
			keranjangHelper.updateKeranjang(updateQty, $(this).data('id'));
			return false;
		},
		updateKeranjang(qty, id) {
			var freshKeranjang = localStorage.getItem('keranjang')
			var decodeKeranjang = JSON.parse(freshKeranjang);
			var isExist = id in decodeKeranjang;
			if (qty < 1) {
				delete decodeKeranjang[id];
			} else {
				decodeKeranjang[id] = isExist ? {count: qty} : {count: 1};
			}
			var jumlahIsi = Object.keys(decodeKeranjang);
			$('#cart-item-count').text(jumlahIsi.length);
			localStorage.setItem('keranjang', JSON.stringify(decodeKeranjang));
		}

	}
	$(document).ready(function () {
		var keranjang = localStorage.getItem('keranjang');
		if (keranjang !== null) {
			var decodedKeranjang = JSON.parse(keranjang);
			var ids = Object.keys(decodedKeranjang);
			keranjangHelper.getItems(ids, decodedKeranjang);
		} else {
			keranjangItemElemen.html('<h5 class="text-center text-muted mt-4">Keranjang Kosong</h5>');
		}
		$(document).on('click', '#button-minus', keranjangHelper.kurangiJumlah)
		$(document).on('click', '#button-plus', keranjangHelper.tambahJumlah)
	})
</script>
