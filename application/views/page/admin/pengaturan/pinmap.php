<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-1">
				<div class="col-sm-6">
					<h5 class="m-0 text-dark">
						PENGATURAN | Lokasi Bisnis
					</h5>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<!-- Main row -->
			<div class="row">

				<div class="col-md-12 connectedSortable">

					<!-- PRODUCT LIST -->
					<div class="card">
						<!-- /.card-header -->
						<div class="card-body">
							<div>
								<div id="title" class="d-flex justify-content-between">
									<span>Pilih Lokasi Bisnis</span>
								</div>
								<div id="type-selector" style="display: none" class="pac-controls">
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="radio"
											   name="type"
											   id="changetype-all"
											   checked="checked">
										<label class="custom-control-label"
											   for="changetype-all">Semua</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="radio"
											   name="type"
											   id="changetype-establishment">
										<label class="custom-control-label"
											   for="changetype-establishment">Gedung/Tempat</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="radio"
											   name="type"
											   id="changetype-address">
										<label class="custom-control-label"
											   for="changetype-address">Alamat</label>
									</div>
								</div>
							</div>
							<div id="pac-container">
								<input id="pac-input" type="text" class="form-control"
									   placeholder="Masukkan Alamat / Tempat">
							</div>
						</div>
						<div id="map" style="width: 100%;height: 800px"></div>
						<div id="infowindow-content">
							<img src="" width="16" height="16" id="place-icon">
							<span id="place-name" class="title"></span><br>
							<span id="place-address"></span><br>
							<a href="<?php echo site_url('page/admin/pengaturan') ?>" class="btn btn-sm btn-success">Pilih</a>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBakEvFkjYe1zd73WhPmyA_rxkkVigCZXU&libraries=places&amp;"></script>

<script type="text/javascript">
	var lat = 0;
	var long = 0;

	function showError(error) {
		switch (error.code) {
			case error.PERMISSION_DENIED:
				Snackbar.show({text: "User denied the request for Geolocation."});
				break;
			case error.POSITION_UNAVAILABLE:
				Snackbar.show({text: "Location information is unavailable."});
				break;
			case error.TIMEOUT:
				Snackbar.show({text: "The request to get user location timed out."});
				break;
			case error.UNKNOWN_ERROR:
				Snackbar.show({text: "An unknown error occurred."});
				break;
		}
	}

	let marker;
	let opts = {
		zoom: 4,
		center: {lat: -33, lng: 151},
		disableDefaultUI: true
	}
	let maps = new google.maps.Map(document.getElementById('map'), opts);
	var myloc = new google.maps.Marker({
		clickable: false,
		icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
				new google.maps.Size(22, 22),
				new google.maps.Point(0, 18),
				new google.maps.Point(11, 11)),
		shadow: null,
		zIndex: 999,
		map: maps
	});
	let myLatlng = {lat: -25.363, lng: 131.044};
	var geocoder = new google.maps.Geocoder;
	var infowindow = new google.maps.InfoWindow;
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function (position) {
			const pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			infowindow.setPosition(pos);
			geocoder.geocode({'location': pos}, function (results, status) {
				if (status === 'OK') {
					if (results[0]) {
						maps.panTo(pos);
						smoothZoom(maps, 17, maps.getZoom());
						if (marker && marker.setMap) {
							console.log(marker.setMap);
							marker.setMap(null);
						}
						marker = new google.maps.Marker({
							position: pos,
							map: maps
						});
						infowindow.setContent(`${results[0].formatted_address}<br><a href="<?php echo site_url('page/admin/pengaturan') ?>" class="btn btn-sm btn-success">Pilih</a>`);
						localStorage.setItem('alamat', JSON.stringify(results[0]));
						infowindow.open(maps, marker);
					} else {
						window.alert('No results found');
					}
				} else {
					window.alert('Geocoder failed due to: ' + status);
				}
			});
			maps.setCenter(pos);
			maps.setZoom(16);
		}, showError);
	} else {
		console.log("Geolocation is not supported by this browser.");
	}


	//=======================SAAT PETA DI KLIK======================================================
	maps.addListener('click', function (mapsMouseEvent) {
		let latLng = mapsMouseEvent.latLng.toString();
		saveCoordinateToLocStorage(latLng);
		let filterLatLng = latLng.slice(1, latLng.length - 1);
		geocodeLatLng(geocoder, maps, infowindow, filterLatLng);
	});
	var card = document.getElementById('pac-card');
	var input = document.getElementById('pac-input');
	var types = document.getElementById('type-selector');

	maps.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

	var autocomplete = new google.maps.places.Autocomplete(input);

	autocomplete.bindTo('bounds', maps);

	autocomplete.setFields(
			['address_components', 'geometry', 'icon', 'name']);

	var infowindow = new google.maps.InfoWindow();
	var infowindowContent = document.getElementById('infowindow-content');
	infowindow.setContent(infowindowContent);
	marker = new google.maps.Marker({
		map: maps,
		anchorPoint: new google.maps.Point(0, -29)
	});
	//=======================SAAT MENCARI LOKASI DAN MEMILIH LOKASI=========================================
	autocomplete.addListener('place_changed', function (e) {
		infowindow.close();
		marker.setVisible(false);
		var place = autocomplete.getPlace();
		if (!place.geometry) {

			window.alert("No details available for input: '" + place.name + "'");
			return;
		}

		if (place.geometry.viewport) {
			maps.fitBounds(place.geometry.viewport);
		} else {
			maps.setCenter(place.geometry.location);
			maps.setZoom(17);  // Why 17? Because it looks good.
		}
		saveCoordinateToLocStorage(place.geometry.location.toString());
		marker.setPosition(place.geometry.location);
		marker.setVisible(true);

		var address = '';
		if (place.address_components) {
			address = [
				(place.address_components[0] && place.address_components[0].short_name || ''),
				(place.address_components[1] && place.address_components[1].short_name || ''),
				(place.address_components[2] && place.address_components[2].short_name || '')
			].join(' ');
		}

		infowindowContent.children['place-icon'].src = place.icon;
		infowindowContent.children['place-name'].textContent = place.name;
		infowindowContent.children['place-address'].textContent = address;
		localStorage.setItem('alamat', JSON.stringify(place));
		infowindow.open(map, marker);
	});


	function setupClickListener(id, types) {
		var radioButton = document.getElementById(id);
		radioButton.addEventListener('click', function () {
			autocomplete.setTypes(types);
		});
	}

	setupClickListener('changetype-all', []);
	setupClickListener('changetype-address', ['address']);
	setupClickListener('changetype-establishment', ['establishment']);

	function geocodeLatLng(geocoder, map, infowindow, input) {
		var latlngStr = input.split(',', 2);
		var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
		geocoder.geocode({'location': latlng}, function (results, status) {
			if (status === 'OK') {
				if (results[0]) {
					map.panTo(latlng);
					smoothZoom(map, 17, map.getZoom());
					if (marker && marker.setMap) {
						console.log(marker.setMap);
						marker.setMap(null);
					}
					marker = new google.maps.Marker({
						position: latlng,
						map: map
					});
					infowindow.setContent(`${results[0].formatted_address}<br><a href="<?php echo site_url('page/admin/pengaturan') ?>" class="btn btn-sm btn-success">Pilih</a>`);
					localStorage.setItem('alamat', JSON.stringify(results[0]));
					infowindow.open(map, marker);
				} else {
					window.alert('No results found');
				}
			} else {
				window.alert('Geocoder failed due to: ' + status);
			}
		});
	}

	function saveCoordinateToLocStorage(coordinates) {
		let filterLatLng = coordinates.slice(1, coordinates.length - 1);
		let splitLatLng = filterLatLng.split(',');
		console.log(splitLatLng);
		let lat = parseFloat(splitLatLng[0]);
		let lng = parseFloat(splitLatLng[1]);
		localStorage.setItem('lat', lat);
		localStorage.setItem('lng', lng);
	}


	function smoothZoom(map, max, cnt) {
		if (cnt >= max) {
			return;
		} else {
			z = google.maps.event.addListener(map, 'zoom_changed', function (event) {
				google.maps.event.removeListener(z);
				smoothZoom(map, max, cnt + 1);
			});
			setTimeout(function () {
				map.setZoom(cnt)
			}, 80);
		}
	}
</script>


