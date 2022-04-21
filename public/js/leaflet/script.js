var map = L.map('mapid');


$("button[name=func]").click(function(e){
  $('.overlay').css('display','block');
  let nis = $("input[name=NIS]").val();
  let jk =$("input[name=JK]").val();
  let kls =$("input[name=KELAS]").val();
  let geo =$("input[name=GEOCODE]").val();
  let jarak =$("input[name=JARAK]").val();
  
  $.get(`https://script.google.com/macros/s/AKfycbwbOeDP22Us9LJydg0JrVKQCPqKmpm9bFfxIo29VFvecVT-iAWlfkWXpGLv_lMKxa1O/exec?ID=AKfycbwbOeDP22Us9LJydg0JrVKQCPqKmpm9bFfxIo29VFvecVT-iAWlfkWXpGLv_lMKxa1O&SH=DataAbsen&func=${this.value}&NIS=${nis}&JK=${jk}&KELAS=${kls}&GEOCODE=${geo}&JARAK=${jarak}`, function(data, status){
    $('.overlay').css('display','none');
    if (status === 'success') {
      Swal.fire(
        'Good job!',
        data,
        'success'
      )
    } else{
      Swal.fire({
        title: 'Error!',
        text: 'Data Gagal disubmit',
        icon: 'error',
    });
    }
  });
});

function masuk() {
  localStorage.setItem('in', 'true');
}

function pulang() {
  localStorage.setItem('in', 'false');
}

function haversineDistance(coords1, coords2, isMiles) {
  function toRad(x) {
    return x * Math.PI / 180;
  }

  var lon1 = coords1[0];
  var lat1 = coords1[1];

  var lon2 = coords2[0];
  var lat2 = coords2[1];

  var R = 6371; // km

  var x1 = lat2 - lat1;
  var dLat = toRad(x1);
  var x2 = lon2 - lon1;
  var dLon = toRad(x2)
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;

  if(isMiles) d /= 1.60934;

  return d;
}

function showSpinner() {
  $('#spinner').show();
}


function hideSpinner() {
  $('#spinner').hide();
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      Swal.fire({
        title: 'Caution!',
        text: 'User denied the request for Geolocation. Please allow permission for doing success presence',
        icon: 'error',
    });
      break;
    case error.POSITION_UNAVAILABLE:
      Swal.fire({
        title: 'Caution!',
        text: 'Location information is unavailable.',
        icon: 'error',
    });
      break;
    case error.TIMEOUT:
      Swal.fire({
        title: 'Caution!',
        text: 'The request to get user location timed out.',
        icon: 'error',
    });
      break;
    case error.UNKNOWN_ERROR:
      Swal.fire({
        title: 'Caution!',
        text: 'An unknown error occurred.',
        icon: 'error',
    });
      break;
  }
}

function routing(lat, long) {
  L.Routing.control({
      waypoints: [
          L.latLng(-6.1928049047693525, 106.56911148308775),
          L.latLng(lat, long)
      ],
      routeWhileDragging: true,
  })
  .on('routingstart', showSpinner)
  .on('routesfound routingerror', hideSpinner)
  .addTo(map);

  $('input[name=GEOCODE]').val(`${long}, ${lat}`)
  let a = haversineDistance([106.56911148308775,-6.1928049047693525],[long, lat])
  
  $('input[name=JARAK]').val(a * 1000)

  if(localStorage.getItem('in') === 'true'){
    $('button[value=Simpan]').prop('disabled', true);
    $('button[value=PULANG]').prop('disabled', false);
  }else if (localStorage.getItem('in') === 'false') {
    $('button[value=PULANG]').prop('disabled', true);
    $('button[value=Simpan]').prop('disabled', false);
  } else{
    $('button[value=PULANG]').prop('disabled', true);
    $('button[value=Simpan]').prop('disabled', false);
    
  }

}

  function success(position) {

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 18,
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    routing(position.coords.latitude, position.coords.longitude);
  }
  
  const options = {
    enableHighAccuracy: true,
    maximumAge: 30000,
    timeout: 27000
  };
  
  let watchID = null;

  if(!navigator.geolocation) {
    alert('Geolocation is not supported by your browser');
  } else {
    // status.textContent = 'Locating…';
    watchID = navigator.geolocation.watchPosition(success, showError, options);
  }

L.Routing.itinerary({
    collapsible : true,
    summaryTemplate : '<h2>{name}</h2><h3 id="waktu">{time}, <span id="jarak">{distance}<></h3>'
    // containerClassName	: 'card card-outline-primary'
});

// let i = $('.leaflet-routing-container h3').val();
//     alert(i);








  



