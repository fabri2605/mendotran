$( document ).ready(function() {
    var _desvios = [];
    var _map;
}); 
var _markers = [];  
var _marcadores =[];
var _lines = [];
function search(grupo){
    //$.getJSON("http://168.197.49.140/mirecorrido/app/service/version.php?_managerName=Desvio&_formAction=listByGroup&params="+grupo, function(result){
        $.getJSON("obtenerDesvio/"+grupo, function(result){
        var contenido = '';
        _desvios = result.data;
        
        $.each(result.data, function(i, field){
            
            var articulo = '<article onclick="verDesvio('+field.id+')" class="list-post wow fadeInUp" data-wow-duration="1s">'+
                              '<div class="entry-content-footer">'+
                              '<div class="entry-content">'+
                              '<div class="entry-post-info">'+
                              '<h4><a href="#mapa" style="color: #45A041">'+field.denominacion+'</a></h4>'+
                              '</div>'+
                              '<div class="entry-expert">'+
                              '<p>Localidad: '+field.localidad+'</p>'+
                              '</div> </div> </div>'+
                              '</article>';
                        contenido+=articulo;
        });
        document.getElementById('desvios').innerHTML = contenido;
        location.href="#listado";
  });
}
function verDesvio(id){
    clean();
    _markers =[];
    _marcadores =[];
    _lines =[];

    var bounds = new google.maps.LatLngBounds();
    var ruta =[];

    var seleccion;
    var fullpath = [];

    var styleDesvio = {
        path: 'M 0,-1 0,1',
        strokeOpacity: 2,
        scale: 5,
        strokeColor: '#C20000',
        fillColor: 'red',
        fillOpacity: 1
    };
    
    _desvios.forEach(element => {
        if(element.id == id){
            seleccion = element;
        }
    });
    
    ruta.push(seleccion.inicio);
    fullpath.push({lat: Number(seleccion.inicio.lat), lng: Number(seleccion.inicio.long)});
    _marcadores.push({ location: seleccion.inicio.denominacion, position: new google.maps.LatLng(seleccion.inicio.lat, seleccion.inicio.long), image: 'images/sites/map/' + seleccion.inicio.image, normal: seleccion.inicio.normal });
    
    seleccion.ruta.forEach(element => {
        fullpath.push({lat: Number(element.lat), lng: Number(element.long)});
        ruta.push(element);
        _marcadores.push({ location: element.denominacion, position: new google.maps.LatLng(element.lat, element.long), image: 'images/sites/map/' + element.image, normal: element.normal });
    });
    
    fullpath.push({lat: Number(seleccion.fin.lat), lng: Number(seleccion.fin.long)});
    _marcadores.push({ location: seleccion.fin.denominacion, position: new google.maps.LatLng(seleccion.fin.lat, seleccion.fin.long), image: 'images/sites/map/' + seleccion.fin.image, normal: seleccion.fin.normal });
    ruta.push(seleccion.fin);

   
    var searchParam = "1";
    var path = []
    
    ruta.forEach(element => {
        bounds.extend(new google.maps.LatLng(Number(element.lat),Number(element.long)));    
        
        if(element.normal == searchParam){
            path.push({ lat: Number(element.lat), lng: Number(element.long) });
        }else{
            path.push({ lat: Number(element.lat), lng: Number(element.long) });

            this.drawLine(path, (searchParam == "1" ? null : styleDesvio));

            if (searchParam == "1")
                searchParam = "0";
            else
                searchParam = "1";
            path = [];
            path.push({ lat: Number(element.lat), lng: Number(element.long) });
        }
    });
    this.drawLine(path, (searchParam == "1" ? null : styleDesvio));

    _map.fitBounds(bounds);
    _map.setCenter(bounds.getCenter());

    this.addMarkers();
}
function drawLine(path, style){
    if (style != null) {
        var linea = new google.maps.Polyline({
            path: path,
            strokeColor: '#eee',
            strokeOpacity: 2,
            strokeWeight: 8,
            scale: 10,
            icons: [{
                    icon: style,
                    offset: '0',
                    repeat: '25px'
                }],
            map: _map
        });
        _lines.push(linea);
    }
    else {
        var linea = new google.maps.Polyline({
            path: path,
            strokeColor: '#C20000',
            strokeOpacity: 2,
            strokeWeight: 8,
            scale: 10,
            map: _map
        });
        _lines.push(linea);
    }
}
function addMarkers(){
    _marcadores.forEach(element => {
        var marker = new google.maps.Marker({
            map: _map,
            animation: google.maps.Animation.DROP,
            position: element.position,
            location: element.location,
            icon: element.image
        });
        _markers.push(marker);
    });
}
function clean(){
    if(_markers){
        _markers.forEach(element => {
            element.setMap(null);
        });
    }
    if(_lines){
        _lines.forEach(element => {
            element.setMap(null);
        });
    }
}
function initMap() {
  _map = new google.maps.Map(document.getElementById('map'), {
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
  });
  
}
 