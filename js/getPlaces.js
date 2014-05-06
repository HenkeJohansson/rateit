var customIcons = {
	Resturang: {
		icon: ''
	},
	Bar: {
		icon: ''
	}
};

function load() {
	var map = new google.maps.Map(document.getElementById("map"), {
		center: new google.maps.LatLng(55.5969955, 12.9849017),
		zoom: 13,
		mapTypeId: 'roadmap',
		styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]
	});

	var infoWindow = new google.maps.InfoWindow;

	downloadUrl("php/createXML.php", function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
		
		for (var i = 0; i < markers.length; i++) {
			var placeName = markers[i].getAttribute("placeName");
			var address = markers[i].getAttribute("address");
			var description = markers[i].getAttribute("description");
			var rating = markers[i].getAttribute("rating");
			var type = markers[i].getAttribute("type");
            var pic = markers[i].getAttribute("pic");
			var point = new google.maps.LatLng(
					parseFloat(markers[i].getAttribute("lat")),
					parseFloat(markers[i].getAttribute("lng")));
            var html = '<h4>' + placeName + '</h4> <br>' + description + '<br>' + '<b> Adress: </b>' + address + '<br>' + '<b> Betyg: </b>' + rating + '<br>' +  '<img src="' + pic + '">';
			var icon = customIcons[type] || {};
			var marker = new google.maps.Marker({
				map: map,
				position: point,
				icon: icon.icon
			});

			bindInfoWindow(marker, map, infoWindow, html);
            
		}
        
	});
    
        
     
}
       
function bindInfoWindow(marker, map, infoWindow, html) {
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
}

function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
			new ActiveXObject('Microsoft.XMLHTTP') :
			new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = doNothing;
			callback(request, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}

function doNothing() {}