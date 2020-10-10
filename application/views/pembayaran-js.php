<script>
	$(document).ready(function () {
		const pembayaranHelper = {
			showSnackbar(message) {
				Snackbar.show({text: message});
			},
		}
		var metodePembayaran = $('input[name="pembayaran"]');
		$('#collapseThree').on('show.bs.collapse', function () {
			$(this).find('input[name="cod"]').prop('checked', false);
			metodePembayaran.data('metode', 'cod');
		})
		$('#collapseTwo').on('show.bs.collapse', function () {
			$(this).find('input[name="nomorhp"]').val('');
			$(this).find('input[name="ewallet"]').prop('checked', false);
			$(this).find('label.btn.btn-outline-secondary').removeClass('active');
			metodePembayaran.data('metode', 'ewallet');
		})
		$('#collapseOne').on('show.bs.collapse', function () {
			$(this).find('input[name="bank"]').prop('checked', false);
			metodePembayaran.data('metode', 'transfer');
		});
		$('#btn-submit-pembayaran').on('click', function () {
			$('#form-pembayaran').submit();
		})
	})
</script>
