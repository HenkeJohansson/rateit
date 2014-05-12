

// https://developers.google.com/maps/documentation/webservices/
// https://developers.google.com/maps/articles/phpsqlajax_v3

window.onload = function() {

	// Kollar om webbläsaren stödjer geolocation
	if (navigator.geolocation) {
		// Hämtar platsen
		navigator.geolocation.getCurrentPosition(function(position) {
			var lat = position.coords.latitude;
			var lon = position.coords.longitude;

			// Visa kartan
			showMap(lat, lon);
		})
	} else {
		// Skriver utt ett medelande åt besökare
		document.write('Yerr browser sucks mate!');
	}
}

// Stylingen av kartan

var pinkColor = '#F9BCBE';

function showMap(lat, lon) {
	// Skapa LatLng objekt med gps-kordinater
	var myLatLng = new google.maps.LatLng(lat, lon);

	// Skapar kart-kontrollerna
	// https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		zoom: 15, // Sätta denna i en variabel, som har olika värden beroende på upplösning.
		scrollwheel: false,
		zoomControl: false,
		streetViewControl: false,
		panControl: false,
		mapTypeControl: false,
		keyboardShortcuts: false,		center: myLatLng,
		backgroundColor: pinkColor,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]},{
	    featureType: "poi.business",
	    elementType: "labels",
	    stylers: [
	      { visibility: "off" }
	    ]
	  }]
	};

	// Skapar kartan
	var map = new google.maps.Map(document.getElementById('map'),
		mapOptions);

	// Sätter en "pin" på kartan
	// var marker = new google.maps.Marker( {
	// 	position: myLatLng,
	// 	map: map,
	// 	title: 'Njahahaha!'
	// });
}