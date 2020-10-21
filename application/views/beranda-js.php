<script>
	const berandaHelper = {
		showToast(toast) {
			Snackbar.show({text: toast.message});
		},
		tambahQty(id) {
			var keranjang = localStorage.getItem('keranjang');
			if (keranjang !== null) {
				var decodeKeranjang = JSON.parse(keranjang);
				var isExist = id in decodeKeranjang;
				decodeKeranjang[id] = isExist ? {count: decodeKeranjang[id].count + 1} : {count: 1};
				var jumlahIsi = Object.keys(decodeKeranjang);
				$('#cart-item-count').text(jumlahIsi.length);
				localStorage.setItem('keranjang', JSON.stringify(decodeKeranjang));
			} else {
				var itemBaru = {};
				itemBaru[id] = {count: 1};
				localStorage.setItem('keranjang', JSON.stringify(itemBaru));
			}
			berandaHelper.showToast({message: 'Berhasil masuk dalam keranjang'})
		}, kurangQty(id) {
			var keranjang = localStorage.getItem('keranjang');
			if (keranjang !== null) {
				var decodeKeranjang = JSON.parse(keranjang);
				var isExist = id in decodeKeranjang;
				if (isExist) {
					if (decodeKeranjang[id].count > 1) {
						decodeKeranjang[id] = isExist ? {count: decodeKeranjang[id].count - 1} : {count: 1};
					} else {
						delete decodeKeranjang[id];
					}
				}
				var jumlahIsi = Object.keys(decodeKeranjang);
				$('#cart-item-count').text(jumlahIsi.length);
				localStorage.setItem('keranjang', JSON.stringify(decodeKeranjang));
			} else {
				var itemBaru = {};
				itemBaru[id] = {count: 1};
				localStorage.setItem('keranjang', JSON.stringify(itemBaru));
			}
			berandaHelper.showToast({message: 'Berhasil mengurangi item keranjang'})
		}
	}
	$(document).ready(function () {
		$(document).on('click', '#btn-add-cart', function () {
			$(this).hide();
			$(this).siblings('div.cart-items-number').show();
			var id = $(this).data('id');
			berandaHelper.tambahQty(id);
			return false;
		}).on('click', '#button-main-plus', function () {
			var inputQty = $(this).parent('div').siblings('input');
			inputQty.val(parseInt(inputQty.val()) + 1);
			berandaHelper.tambahQty($(this).data('id'));
			return false;
		}).on('click', '#button-main-minus', function () {
			var inputQty = $(this).parent('div').siblings('input');
			var currentVal = parseInt(inputQty.val());
			if (currentVal > 1) {
				inputQty.val(currentVal - 1);
				berandaHelper.kurangQty($(this).data('id'));
			} else {
				var containerButton = $(this).parents('div#container-button');
				containerButton.find('#btn-add-cart').show();
				$(this).parents('div#container-qty-btn').hide();
				berandaHelper.kurangQty($(this).data('id'));
				inputQty.val(1);
			}
			return false;
		})
	})
</script>
