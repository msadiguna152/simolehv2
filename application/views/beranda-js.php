<script>
	const berandaHelper = {
		showToast(toast) {
			Snackbar.show({text: toast.message});
		}
	}
	$(document).ready(function () {
		$(document).on('click', '#btn-add-cart', function () {
			var id = $(this).data('id');
			var keranjang = localStorage.getItem('keranjang');
			if (keranjang !== null) {
				var decodeKeranjang = JSON.parse(keranjang);
				var isExist = id in decodeKeranjang;
				decodeKeranjang[id] = isExist ? {count: decodeKeranjang[id].count + 1} : {count: 1};
				var jumlahIsi = Object.keys(decodeKeranjang);
				$('#cart-item-count').text(jumlahIsi.length);
				localStorage.setItem('keranjang', JSON.stringify(decodeKeranjang));
			} else {
				var itemBaru = {id: {count: 1}};
				localStorage.setItem('keranjang', JSON.stringify(itemBaru));
			}
			berandaHelper.showToast({message: 'Berhasil masuk dalam keranjang'})
		})
	})
</script>
