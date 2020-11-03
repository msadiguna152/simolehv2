<script>

	$(document).ready(function () {
		if (window.location.href.indexOf('#alamatModal') !== -1) {
			var modalAlamat = $('#alamatModal');
			var place = localStorage.getItem('alamat');
			if (place !== null) {
				var decodedPlace = JSON.parse(place);
				modalAlamat.find('input[name="location"]').val(typeof decodedPlace.name === "undefined" ? 'Alamat Ditentukan' : decodedPlace.name);
				modalAlamat.find('input[name="lat"]').val(localStorage.getItem('lat'));
				modalAlamat.find('input[name="long"]').val(localStorage.getItem('lng'));
				var joinAlamat = decodedPlace.address_components.map(function (item) {
					return item.long_name;
				})
				modalAlamat.find('textarea[name="alamat_lengkap"]').text((typeof decodedPlace.name === "undefined" ? '' : decodedPlace.name) + ' ' + joinAlamat.join(','));
			}
			modalAlamat.modal('show');
		}
	});
</script>
