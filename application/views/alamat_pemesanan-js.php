<script>
	$(document).ready(function () {
		if (window.location.href.indexOf('#alamatModal') !== -1) {
			var modalAlamat = $('#alamatModal');
			var place = localStorage.getItem('alamat');
			if (place !== null) {
				var decodedPlace = JSON.parse(place);
				modalAlamat.find('input[name="location"]').val(decodedPlace.name)
				modalAlamat.find('input[name="lat"]').val(decodedPlace.geometry.location.lat)
				modalAlamat.find('input[name="long"]').val(decodedPlace.geometry.location.lng)
				var joinAlamat = decodedPlace.address_components.map(function (item) {
					return item.long_name;
				})
				modalAlamat.find('textarea[name="alamat_lengkap"]').text(decodedPlace.name + ', ' + joinAlamat.join(','));
			}
			modalAlamat.modal('show');
		}
	});
</script>
