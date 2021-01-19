var mymap = null;
var popup = L.popup();
$(document).ready(function() {
    $('#vozilo_saloni').select2();
    $('.price').mask('000.000,00', {reverse: true});
    mymap = L.map('map').setView([44.60, 16.70], 5);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiYXN1cGFuIiwiYSI6ImNrajhyMms5NjA4c2UyeXBldWxpaTEzN3kifQ.lk1KeaqGyg-Z0tJv-3J9FQ'
    }).addTo(mymap);
    mymap.on('click', onMapClick);
    asyncCall();
    mymap.on('geosearch/showlocation', hendlajEventAdrese);


});

function hendlajEventAdrese(data)
{
  $("#salon_lat").val(data.location.y.toString());
  $("#salon_lng").val(data.location.x.toString());
  $("#salon_adresa").val(data.location.label);
  popup
  .setLatLng([data.location.y, data.location.x])
  .setContent("Lokacija salona postavljena na lat:" + data.location.y.toString() + " lng:" + data.location.x.toString())
  .openOn(mymap);
}


async function asyncCall() {
  const provider = new GeoSearch.OpenStreetMapProvider();
  const search = new GeoSearch.GeoSearchControl({
    style: 'bar',
    provider: provider,
    searchLabel: 'Unesite adresu',
    animateZoom: true,
    autoClose: true,
  });
  mymap.addControl(search);
}

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Lokacija salona postavljena na " + e.latlng.toString())
        .openOn(mymap);

        $("#salon_lat").val(e.latlng.lat.toString());
        $("#salon_lng").val(e.latlng.lng.toString());
}

