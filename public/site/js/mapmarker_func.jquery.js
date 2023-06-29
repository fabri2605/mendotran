		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		var myMarkers = {"markers": [
				{"latitude": "-32.8215278", "longitude":"-68.8108167", "icon": "img/map-marker.png"}
			]
		};
		
		$("#map_contact").mapmarker({
			zoom	: 14,
			markers	: myMarkers
		});

});