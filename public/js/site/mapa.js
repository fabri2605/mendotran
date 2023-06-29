
function initMap() {
    var map = new google.maps.Map(document.getElementById('map_kml'), {
            zoom: 13,
            center: {lat: -32.8895571, lng: -68.84483260000002},
            mapTypeId: 'roadmap',
            mapTypeControl: false,
            streetViewControl: false,
            scaleControl: false,
            fullscreenControl: false,
            zoomControl: true,
            scrollwheel: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.CENTER_LEFT
            }
    });
    var src = 'http://mendotran.com.ar/map/red.kml';
   
    var layer = new google.maps.KmlLayer({ 
        url: src, 
        preserveViewport: true 
      }); 
      layer.setMap(map); 
}