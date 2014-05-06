// http://www.w3schools.com/googleapi/tryit.asp?filename=tryhtml_map_marker_infowindow2

var map;
var myCenter=new google.maps.LatLng(55.5701685, 13.0159724);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:13,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
  });
}

function placeMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', initialize);
