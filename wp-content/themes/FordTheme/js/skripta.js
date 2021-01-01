var backToTopButton;
var mymap = null;
var map = null;
var employeemap = null;
$(document).ready(function() {
    $('#vozilo_saloni').select2();
    $('.price').mask('000.000,00', {reverse: true});
    backToTopButton = document.getElementById('back-to-top');
    backToTopButton.addEventListener("click", goToTop);
    mymap = L.map('map').setView([44.60, 16.70], 5);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiYXN1cGFuIiwiYSI6ImNrajhyMms5NjA4c2UyeXBldWxpaTEzN3kifQ.lk1KeaqGyg-Z0tJv-3J9FQ'
    }).addTo(mymap);
});

function goToTop() {
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }

  window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
  }
}


function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}

