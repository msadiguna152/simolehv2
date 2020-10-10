"use strict";

// initialize map
// ambil lokasi pengguna disini.

//fungsi ambil lokasi pengguna ()
//let koordinat = {lat:123,lng:123}
var map = new GMaps({
  div: '#map',
  //lat: koordinat.lat
  //lng: koordinat.lng
  //ganti pakai itu
  lat: -6.5637928,
  lng: 106.7535061,

});

//ketika user mengeklik tombil start/travel/mulai
$("#start-travel").click(function() {
  $(this).fadeOut();
  $("#instructions").before("<div class='section-title'>Instructions</div>");
  //menambahkan title intruction sebelum tag id intruction
  map.travelRoute({
    //origin, ambil dari koordinat pengguna yang sudah di ambil sebelumnya tadi
    origin: [-6.5637928, 106.7535061],
    //destination, ambil dari pengantaran jasa, atau rumah yang akan dituju
    destination: [-6.5956157, 106.788236],
    travelMode: 'driving',
    step: function(e) {
      //dalam tag id intruction, akan di tambahkan daftar list lokasi yang akan di lewati oleh driver tersebut.
      $('#instructions').append('<li class="media"><div class="media-icon"><i class="far fa-circle"></i></div><div class="media-body">'+e.instructions+'</div></li>');
      //console.log(e) untuk lebih tau object apa aj disana, biar bisa variasi, sapa tau bisa mengukur distance, jarak, harga, dll.
      $('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function() {
        map.setCenter(e.end_location.lat(), e.end_location.lng());
        //animasi menambah garis setiap lokasi yang dilewati
        map.drawPolyline({
          path: e.path,
          //ganti warna
          strokeColor: '#131540',
          //merubah tingkat transparan
          strokeOpacity: 0.6,
          //mengubah tebal garis
          strokeWeight: 6
        });
      });
    }
  });
});
