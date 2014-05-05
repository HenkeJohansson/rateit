var customIcons = {
	resturant: {
		icon: 'logga.png'
	},
	bar: {
		icon: 'logga.png'
	}
};

function load() {
	var map = new google.maps.Map(document.getElementById("map"), {
		center: new google.maps.LatLng(55.5701685, 13.0159724),
		zoom: 13,
		mapTypeId: 'roadmap'
	});

	var infoWindow = new google.maps.InfoWindow;

	downloadUrl('createXML.php',function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName('marker');

		for (var i = 0; i < markers.length; i++ ) {
			var placeName = markers[i].getAttribute('placename');
			var address = markers[i].getAttribute('address');
			var description = markers[i].getAttribute('description');
			var type = markers[i].getAttribute('type');
			var point = new google.maps.LatLng(
				parseFloat(markers[i].getAttribute('lat')),
				parseFloat(markers[i].getAttribute('lng'))
				);
			var html = '<b>' + placeName + '</b> <br>' + address;
			var icon = customIcons[type] || {};
			var marker = new google.maps.Marker({
				map: map,
				position: point,
				icon: icon.icon
			});

			bindInfoWindow(marker,map,infoWindow,html);
		}
	});
}

function bindInfoWindow(marker,map,infoWindow,html) {
	google.maps.event.addEventlistener(marker,'click',function() {
		infoWindow.setContent(html);
		infoWindow.open(map,marker);
	});
}

function downloadUrl(url,callback) {
	var request = window.ActiveXObject ?
		new ActiveXObject(Microsoft.XMLHTTP) :
		new XMLHttpRequest;

	request.onreadystatechande = function() {
		if (request.readyState == 4) {
			request.onreadystatechande = doNothing;
			callback(request,request.status);
		}
	};

	request.open('GET',url,true);
	request.send(null);
}