<script>
	$(document).ready(function () {
		const pembayaranHelper = {
			showSnackbar(message) {
				Snackbar.show({text: message});
			},
		}
		var metodePembayaran = $('input[name="pembayaran"]');
		$('#collapseOne').on('show.bs.collapse', function () {
			$('#form-pembayaran').find('input[name="ewallet"]:checked').prop('checked', false);
			$('#form-pembayaran').find('input[name="cod"]:checked').prop('checked', false);
			metodePembayaran.data('metode', 'transfer');
		});
		$('#collapseTwo').on('show.bs.collapse', function () {
			$('#form-pembayaran').find('input[name="bank"]:checked').prop('checked', false);
			$('#form-pembayaran').find('input[name="cod"]:checked').prop('checked', false);
			$(this).find('input[name="nomorhp"]').val('').prop('disabled', true);
			$(this).find('input[name="ewallet"]').prop('checked', false);
			$(this).find('label.btn.btn-outline-secondary').removeClass('active');
			metodePembayaran.data('metode', 'ewallet');
		})
		$('#collapseThree').on('show.bs.collapse', function () {
			$('#form-pembayaran').find('input[name="bank"]:checked').prop('checked', false);
			$('#form-pembayaran').find('input[name="ewallet"]:checked').prop('checked', false);
			$(this).find('input[name="cod"]').prop('checked', false);
			metodePembayaran.data('metode', 'cod');
		})
		$('#btn-submit-pembayaran').on('click', function () {
			var pembayaranBank = $('#form-pembayaran').find('input[name="bank"]:checked').val();
			var pembayaranCod = $('#form-pembayaran').find('input[name="cod"]:checked').val();
			var pembayaranEWallet = $('#form-pembayaran').find('input[name="ewallet"]:checked').val();
			var nohp = $('#form-pembayaran').find('input[name="nomorhp"]').val();

			if (typeof pembayaranBank === "undefined" && typeof pembayaranCod === "undefined" && typeof pembayaranEWallet === "undefined") {
				return pembayaranHelper.showSnackbar('Metode Pembayaran tidak boleh kosong.');
			}
			if (typeof pembayaranEWallet !== "undefined") {
				if (nohp === '') {
					return pembayaranHelper.showSnackbar('Nomor Handphone tidak boleh kosong.');
				}
			}
			console.log(pembayaranBank);
			console.log(pembayaranCod);
			console.log(pembayaranEWallet);
			$('#form-pembayaran').submit();
		})
		$('input[name="ewallet"]').on('click', function () {
			$('input[name="nomorhp"]').prop('disabled', false);
		})
	})
</script>
