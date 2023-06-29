
$( document ).ready(function() {
    var _recorridos = [];
    var _grupo;
    var _linea;
    var _seleccion;
    var _map;
    
    console.log( "ready!" );
    loadGrupos();
});   
var _markers = [];

function searchLines(){
    var group = document.getElementById('grupos').value;
    _grupo = group;
    var codigo = 0;
    if(group.trim() != ""){
        var opts = document.getElementById('grupos').childNodes;
        for (var i = 0; i < opts.length; i++) {
            if(opts[i].value !== undefined){
            if (opts[i].value === group) {
                codigo = opts[i].value;
                break;
            }
            }
        }
    }
    if(codigo > 0 ){
        showMsg('Obteniendo Líneas', 'Buscando las líneas asociadas al grupo seleccionado');
        $.post('http://168.197.49.140/recorrido/ws_linea.php',{subLinea: 1}, function(response){
            if(response){
                var options = '';
                var result = JSON.parse(response);
                for(var i = 0; i < result.result.length; i++){
                    var element = result.result[i];
                    if(codigo == element.CodigoEmpresa){
                        options += '<option value="'+element.CodigoLineaParada+'" label="'+element.Descripcion+'" />';
                    }
                }
                document.getElementById('lineas').innerHTML = options;
                hideMsg();
            }
        });
    }
}
function getRecorrido(){
    var linea = document.getElementById('lineas').value;
    _linea = linea;
    var codigo = 0;
    if(linea.trim() != ""){
        var opts = document.getElementById('lineas').childNodes;
        for (var i = 0; i < opts.length; i++) {
            if(opts[i].value !== undefined){
            if (opts[i].value === linea) {
                codigo = opts[i].value;
                break;
            }
            }
        }
    }
    if(codigo > 0 ){
        showMsg('Obteniendo Recorridos', 'buscando todos los recorridos afectados a la línea y grupo seleccionados');
        $.post('http://168.197.49.140/recorrido/ws_recorrido.php',{subLinea: 1, codigo: codigo}, function(response){
            if(response){
                var contenido = '';
                if(response){
                    var json = JSON.parse(response);
                    _recorridos = json;
                    json.result.forEach(element => {
                        var articulo = '<article onclick="verRecorrido('+element.codigo+')" class="list-post wow fadeInUp" data-wow-duration="1s">'+
                              '<figure class="entry-header" style=" background-color: #cfcfcf !important" >'+
                              '<div class="post-image" style="padding-left: 50px; color: #9b9b9b !important; font-weight:800">'+
                              '<h1>'+element.codigo+'</h1>'+
                              '</div>'+
                              '</figure>'+
                              '<div class="entry-content-footer">'+
                              '<div class="entry-content">'+
                              '<div class="entry-post-info">'+
                              '<h4><a href="#map">'+_grupo+' Línea ' +_linea+'</a></h4>'+
                              '</div>'+
                              '<div class="entry-expert">'+
                              '<p>'+element.denominacion+'</p>'+
                              '</div> </div> </div>'+
                              '</article>';
                        contenido+=articulo;
                    });
                    document.getElementById("recorridos").innerHTML = contenido;
                    hideMsg();
                    location.href="#listado";
                }
            }
        });
    }
}
function verRecorrido(codigo){
    for(var i = 0; i < _recorridos.result.length; i++){
        if(codigo == _recorridos.result[i].codigo){
            _seleccion = _recorridos.result[i];
            break;
        }
    }
    if(_seleccion != null){
        drawMap();
    }
}

function initMap() {
    _map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
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
function drawMap(){
    clean();

    var bounds = new google.maps.LatLngBounds();


    var ruta = new google.maps.Polyline({
        path: _seleccion.coords,
        geodesic: true,
        strokeColor: '#c20000',
        strokeOpacity: 1.0,
        strokeWeight: 5
    });
    ruta.setMap(_map);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(Number(_seleccion.coords.pop().lat),Number(_seleccion.coords.pop().lng)),
        icon: 'images/sites/map/finish.png',
        title: 'Fin del Recorrido'
    });
    marker.setMap(_map);

    _markers.push(marker);

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(Number(_seleccion.coords[0].lat),Number(_seleccion.coords[0].lng)),
        icon: 'images/sites/map/start.png',
        title: 'Inicio del Recorrido'
    });
    marker.setMap(_map);

    _markers.push(marker);

    _seleccion.coords.forEach(element => {
        bounds.extend(new google.maps.LatLng(Number(element.lat),Number(element.lng)));    
    });
    _map.fitBounds(bounds);
    _map.setCenter(bounds.getCenter());
}
function jump(h){
    var url = location.href;               
    location.href = "#"+h;                 
    history.replaceState(null,null,url);   
}
function loadGrupos(){
    let grupos = [
            {
            "CodigoLineaParada": "1386",
            "Descripcion": "Grupo 1",
            "CodigoEntidad": "109",
            "CodigoEmpresa": 166
            },
            {
            "CodigoLineaParada": "1253",
            "Descripcion": "Grupo 2",
            "CodigoEntidad": "21",
            "CodigoEmpresa": 39
            },
            {
            "CodigoLineaParada": "1443",
            "Descripcion": "Grupo 3",
            "CodigoEntidad": "110",
            "CodigoEmpresa": 168
            },
            {
            "CodigoLineaParada": "1270",
            "Descripcion": "Grupo 4",
            "CodigoEntidad": "107",
            "CodigoEmpresa": 164
            },
            {
            "CodigoLineaParada": "1247",
            "Descripcion": "Grupo 5",
            "CodigoEntidad": "65",
            "CodigoEmpresa": 101
            },
            {
            "CodigoLineaParada": "1255",
            "Descripcion": "Grupo 6",
            "CodigoEntidad": "103",
            "CodigoEmpresa": 161
            },
            {
            "CodigoLineaParada": "1209",
            "Descripcion": "Grupo 7",
            "CodigoEntidad": "102",
            "CodigoEmpresa": 158
            },
            {
            "CodigoLineaParada": "1211",
            "Descripcion": "Grupo 8",
            "CodigoEntidad": "102",
            "CodigoEmpresa": 159
            },
            {
            "CodigoLineaParada": "1215",
            "Descripcion": "Grupo 9",
            "CodigoEntidad": "102",
            "CodigoEmpresa": 160
            },
            {
            "CodigoLineaParada": "1444",
            "Descripcion": "Grupo 11",
            "CodigoEntidad": "102",
            "CodigoEmpresa": 313
            },
            {
            "CodigoLineaParada": "1245",
            "Descripcion": "Grupo 12",
            "CodigoEntidad": "108",
            "CodigoEmpresa": 165
        },
            
        ];
    let options ="";
    grupos.forEach(element => {
        options += '<option value="'+element.CodigoEmpresa+'" label="'+element.Descripcion+'" />';
    });
    document.getElementById('grupos').innerHTML = options;
    location.href="#search";
}
function clean(){
    if(_markers){
        _markers.forEach(element => {
            element.setMap(null);
        });
    }
}