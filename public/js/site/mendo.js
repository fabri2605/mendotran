$( document ).ready(function() {
    var _recorridos;
    var _troncales;
    var _seleccion;
    var _map;
    _listado = [];
    _linesAdd = [];
    _marcadores = [];
    _coordenadas = [];
    _remove = false;
    loadData();

    $('#origin-input').on('input',function(){
        var str = $('#origin-input').val();
        var prefix = 'Mendoza, ';
        if(str.indexOf(prefix) == 0) {
            console.log($('#origin-input').val());
        } else {
            if (prefix.indexOf(str) >= 0) {
                $('#origin-input').val(prefix);
        } else {
            $('#origin-input').val(prefix+str);
       }
        }
    
    });

    $('#destination-input').on('input',function(){
        var str = $('#destination-input').val();
        var prefix = 'Mendoza, ';
        if(str.indexOf(prefix) == 0) {
            console.log($('#destination-input').val());
        } else {
            if (prefix.indexOf(str) >= 0) {
                $('#destination-input').val(prefix);
        } else {
            $('#destination-input').val(prefix+str);
       }
        }
    
    });
});   
function loadData(){
    document.getElementById('recorridos').innerHTML = '';
    
    this.showMsg('Buscando Recorridos', 'Cargando todos los recorridos existentes');

    var paths = [];
    var that = this;
    $.getJSON('map/total.json', function(response){
    var contenido ='';
    response.forEach(element => {
        element.recorrido.forEach(item => {
            var articulo = '<a href="#"  id="'+item.shape_id+'" ondblclick="remove('+item.shape_id+')" onclick="draw('+item.shape_id+')" class="list-group-item list-group-item-action">'+
                            item.nombre+'</a>';
            contenido+=articulo;
            paths.push(item);
        });
    });
    document.getElementById('recorridos').innerHTML = contenido;
    _recorridos = paths;
    hideMsg();
    //that.obtenerTroncales();
});   
    document.getElementById('menuRecorridos')
}
function initMap2() {
    var contenido = '';
    _map = new google.maps.Map(document.getElementById('map'), {
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
    
    var options = {
        componentRestrictions: {country: "ar"}
    };
    
    var input = document.getElementById('origin-input');
    var destiny = document.getElementById('destination-input');
    
    var searchBox = new google.maps.places.Autocomplete(input, options);
    var destinyBox = new google.maps.places.Autocomplete(destiny, options);

    var button = document.getElementById('btnMap');
    
    _map.controls[google.maps.ControlPosition.CENTER_LEFT].push(button);
    _map.controls[google.maps.ControlPosition.LEFT_TOP].push(input);
    _map.controls[google.maps.ControlPosition.TOP_CENTER].push(destiny);
    

    // Bias the SearchBox results towards current map's viewport.
    _map.addListener('bounds_changed', function() {
            searchBox.setBounds(_map.getBounds());
    });
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }
        _marcadores.forEach(function(marker) {
            marker.setMap(null);
        });
        _marcadores = [];
        places.forEach(function(place) {
            if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
            }
            _coordenadas = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
            
        });
        
    });
    destinyBox.addListener('places_changed', function() {
        var places = destinyBox.getPlaces();
        if (places.length == 0) {
            return;
        }
        _marcadores.forEach(function(marker) {
            marker.setMap(null);
        });
        _marcadores = [];
        places.forEach(function(place) {
            if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
            }
            _coordenadas = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
            
        });
    });
    
}
function initMap() {
    var contenido = '';
    _map = new google.maps.Map(document.getElementById('map'), {
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
    

}
function filterList(){
    console.log(_coordenadas);

    var input, filter, ul, li, a, i;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    ul = document.getElementById("recorridos");
    li = ul.getElementsByTagName("a");
        for (i = 0; i < li.length; i++) {
            a = li[i];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
        }
    }
}
function activateItem(id){
    if(!_remove){
        var element = document.getElementById(id);
        element.classList.add("active");
        
        var img  = document.createElement("i");
        img.classList.add("fa");
        img.classList.add("fa-times");
        img.classList.add("fa-lg");
        img.classList.add("margin-pic");

        img.addEventListener("click", function(){
            
            remove(id);

        });

        element.appendChild(img);
    }else{
        _remove = false;
    }
    
    
}

function draw(id){
    var found = this.validate(id);
    if(!found && !_remove){
            this.activateItem(id);
            var bounds = new google.maps.LatLngBounds();

            for(var index = 0; index < _recorridos.length; index++){
                item = _recorridos[index];
                if(item.shape_id == id){
                    _seleccion = item;
                    break;
                }
            }
            var linea =[];
            _seleccion.puntos.forEach(element => {
                linea.push({lat : Number(element.lat), lng : Number(element.lng)});
                bounds.extend({lat : Number(element.lat), lng : Number(element.lng)});
            });
            var ruta = new google.maps.Polyline({
                path: linea,
                geodesic: true,
                strokeColor: _seleccion.color,
                strokeOpacity: 2.0,
                strokeWeight: 8
            });
            ruta.setMap(_map);
            _map.fitBounds(bounds);
            var routeMarker =[];

            if(_seleccion.paradas){
                _seleccion.paradas.forEach(field => {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(field.stop_lat,field.stop_lon),
                        title:field.stop_code,
                        icon: 'images/sites/map/parada.png'
                    });
                    var contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h3 style="font-size:15px; font-weight: 900; color: #7A2983">'+field.stop_code+'</h3>'+
                        '<div id="bodyContent">'+
                        '<p style="font-size:14px; text-align="justify;">'+field.stop_name+' '+'</p>'+
                        '</div>'+
                        '</div>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    marker.setMap(_map);

                    marker.addListener('click', function() {
                        infowindow.open(_map, marker);
                    });
                    
                    routeMarker.push(marker);
                });
            }
            this.addLine(ruta, _seleccion.shape_id, routeMarker);

            addItem(_seleccion);
        }
        _remove = false;
    
}
function validate(id){
    var found = false;
    if(_listado){
        for(var index = 0; index < _listado.length; index++){
            item = _listado[index];
            if(item.shape_id == id){
                found = true;
                break;
            }
        }
        return found;
    }else{
        return false;
    }
}
function addItem(item){
    _listado.push(item);
}
function addLine(line, shape, markers){
    _linesAdd.push({id: shape, item: line, stops: markers});
}
function removeFromList(id){
    var newList = [];
    if(_listado){
        for(var index = 0; index < _listado.length; index++){
            item = _listado[index];
            if(!(item.shape_id == id)){
                newList.push(item);
            }
        }
        _listado = newList;
    }
}
function remove(id){
    if(validate(id)){
        _remove = true;
        for(var i = 0; i < _linesAdd.length; i++){
            if(_linesAdd[i].id == id){
                _linesAdd[i].item.setMap(null);
                if(_linesAdd[i].stops){
                    _linesAdd[i].stops.forEach(parada => {
                        parada.setMap(null);
                    });
                }
                break;
            }
        }
        removeActivateItem(id);
        removeFromList(id);
        
    }
}
function removeActivateItem(id){
    var element = document.getElementById(id);
    if(element){
        element.classList.remove("active");
        if (element.hasChildNodes()) 
            element.removeChild(element.childNodes[1]); 
    }

}
function showMsg(title, msg){
    console.log(title);
    waitingDialog.show(msg,{
        headerText: title,
        headerSize:4,
        contentElement: 'p'
    });
}
function hideMsg(){
    waitingDialog.hide();
}
function cleanAll(){
    if(_listado){
        for(var i =0; i < _listado.length; i++){
            remove(_listado[i].shape_id);
        }
    }
}
function buscarRecorridos(){
    if(document.getElementById('pac-input').value != ''){
        document.getElementById('recorridos').innerHTML = '';
        cleanAll();
        this.showMsg('Buscando Recorridos', 'Actualizando los recorridos cercanos a la ubicación determinada.')

        var paths = [];
        $.getJSON('http://168.197.49.140/recorrido/nuevos/obtenerRecorridoMasCercano.php',{x: _coordenadas.lat, y: _coordenadas.lng}, function(response){
            var contenido ='';
            response.forEach(element => {
                element.recorrido.forEach(item => {
                    var articulo = '<a href="#" id="'+item.shape_id+'" ondblclick="remove('+item.shape_id+')" onclick="draw('+item.shape_id+')" class="list-group-item list-group-item-action">'+
                                    item.nombre+'</a>';
                    contenido+=articulo;
                    paths.push(item);
                });
            });
            document.getElementById('recorridos').innerHTML = contenido;
            _recorridos = paths;
            hideMsg();
        });
    }else{
        $('#notLocation').show();
    }
}
function obtenerTroncales(){
    var full = 'http://168.197.49.140/recorrido/nuevos/obtenerTroncales.php';
    //this.showMsg('Buscando Troncales', 'obteniendo recorridos troncales');
    
    $.getJSON('http://168.197.49.140/recorrido/nuevos/obtenerTroncales.php', function(response){
        //hideMsg();
        response.forEach(element => {
                element.recorrido.forEach(item => {
                    var linea =[];
                    item.puntos.forEach(element => {
                        linea.push({lat : Number(element.lat), lng : Number(element.lng)});
                    });
                    var ruta = new google.maps.Polyline({
                        path: linea,
                        geodesic: true,
                        strokeColor: "#FF0000",
                        strokeOpacity: 2.0,
                        strokeWeight: 8
                    });
                    ruta.setMap(_map);

                    if(item.paradas){
                        item.paradas.forEach(field => {
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(field.stop_lat,field.stop_lon),
                                title:field.stop_code,
                                icon: 'images/sites/map/parada.png'
                            });
                            var contentString = '<div id="content">'+
                                '<div id="siteNotice">'+
                                '</div>'+
                                '<h3 style="font-size:15px; font-weight: 900; color: #7A2983">'+field.stop_code+'</h3>'+
                                '<div id="bodyContent">'+
                                '<p style="font-size:14px; text-align="justify;">'+field.stop_name+' '+'</p>'+
                                '</div>'+
                                '</div>';

                            var infowindow = new google.maps.InfoWindow({
                                content: contentString
                            });

                            marker.setMap(_map);

                            marker.addListener('click', function() {
                                infowindow.open(_map, marker);
                            });
                        
                            //routeMarker.push(marker);
                    });
                }
                    
                });
        });     
        
    });
}
function comoLlegar(){
    var _directionsDisplay = new google.maps.DirectionsRenderer();
    _directionsDisplay.setMap(_map);
    _directionsDisplay.setPanel(document.getElementById('directionsPanel'));
    document.getElementById('directionsPanel').innerHTML ="";

    var directionsService = new google.maps.DirectionsService();
    var start = document.getElementById('origin-input').value;
    var end = document.getElementById('destination-input').value;
    
    var selectedMode = 'TRANSIT';
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode[selectedMode],
        provideRouteAlternatives: true,
        transitOptions: {
            departureTime: new Date(),
            routingPreference: 'FEWER_TRANSFERS'
          },
        unitSystem: google.maps.UnitSystem.METRIC
    };
    directionsService.route(request, function(response, status) {
        console.log(response);
      if (status == 'OK') {
        _directionsDisplay.setDirections(response);
        var lateral = document.getElementById('menuRecorridos');
        lateral.className+= " active";
      }
    });
    
}