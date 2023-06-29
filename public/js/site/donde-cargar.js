var _map;
var _infowindow;
let _location;
let _circle;
initMap();
function initMap() {
    /*_map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: -32.8895571, lng: -68.84483260000002},
          mapTypeId: 'roadmap',
          zoomControl: true,
          mapTypeControl: false,
          scaleControl: false,
          streetViewControl: false,
          rotateControl: false,
          fullscreenControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.TOP_LEFT
          }

    });*/
    let  osmBase = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
    { attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'});
    _map = L.map('map', {
       center: [-32.8895571, -68.84483260000002],
       zoom: 13,
       layers: [osmBase]
    });
    osmBase.addTo(_map);


    $.getJSON("/site/puntosCarga", function(result){
          $.each(result, function(i, field){

            var contenido = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 style="font-size:15px; font-weight: 900; color: #c20000">'+field.denominacion+'</h3>'+
            '<div id="bodyContent">'+
            '<p style="font-size:14px; text-align="justify;">'+field.domicilio+' '+'</p>'+
            (field.tipo == 3 ? '<p style="font-size:14px; font-weight: 900"> Terminal</p>' : '')+
            '</div>'+
            '</div>';

            let icon = L.icon({ iconUrl: (field.tipo == 3 ? '/images/sites/map/terminal.png' : '/images/sites/map/icon.png')});
            let marcador = L.marker( [Number(field.lat), Number(field.lng)], {icon: icon, title: field.denominacion, contenido: contenido}).addTo(_map);
            
            marcador.on('click', function(event) {
                  L.popup()
                  .setLatLng(event.latlng)
                  .setContent(event.target.options.contenido)
                  .openOn(_map);
            });
            
          });
    });
    _map.locate({setView: true, watch: false})
            .on('locationfound', function(e){
              _location = L.marker([e.latitude, e.longitude]).bindPopup('Se encuentra aqui');
              _circle = L.circle([e.latitude, e.longitude], e.accuracy/2, {
                  weight: 1,
                  color: '#C20000',
                  fillColor: '#45A041',
                  fillOpacity: 0.2
              });
              _map.addLayer(_location);
              _map.addLayer(_circle);
              

          })
        .on('locationerror', function(e){
              console.log(e);
              alert("No se pudo obtener su ubicación");
          });
  }
  /*function getLocation(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          _infowindow = new google.maps.InfoWindow;
          _infowindow.setPosition(pos);
          _infowindow.setContent('Ubicación localizada');
          _infowindow.open(_map);
          _map.setCenter(pos);
        }, function() {
          handleLocationError(true, _infowindow, _map.getCenter());
        });
      }
  }
  function handleLocationError(browserHasGeolocation, _infowindow, pos) {
    _infowindow.setPosition(pos);
    _infowindow.setContent(browserHasGeolocation ?
                          'No se ha podido detectar su ubicación' :
                          'Su navegador no soporta la gelocalización ');
    _infowindow.open(_map);
  }*/