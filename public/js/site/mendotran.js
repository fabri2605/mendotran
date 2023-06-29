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
    let _location;
    loadData();
    init();

});  
function init(){
    //var osmBase = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');
    //let  osmBase = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png',
    let  osmBase = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
    { attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'});
     _map = L.map('map', {
        center: [-32.8895571, -68.84483260000002],
        zoom: 13,
        layers: [osmBase]
    });
    osmBase.addTo(_map);
}
function cercanos(){
    this.showMsg('Obteniendo ubicación', '');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          _location = L.marker([pos.lat, pos.lng]).bindPopup('Se encuentra aquí');

          _map.addLayer(_location);
          _map.setView(_location.getLatLng(), 20);
          hideMsg();

          var paths = [];
          $.getJSON('/wscercanos/'+pos.lat+'/'+pos.lng, function(response){
                cleanAll();
                document.getElementById('recorridos').innerHTML = '';
                let contenido ='';
                let color;
                for(let item of response){

                if(Number(item.codigo) < 200)
                    color ='#C8102E';
                else if(Number(item.codigo) < 300)
                    color ='#D0D0CE';
                else if(Number(item.codigo) < 400)
                    color ='#3D9525';
                else if(Number(item.codigo) < 500)
                     color ='#FBE122';
                else if(Number(item.codigo) < 600)
                    color ='#FF6A13';
                else if(Number(item.codigo) < 700)
                    color ='#00A3E0';
                else if(Number(item.codigo) < 800)
                    color ='#003087';
                else if(Number(item.codigo) < 900)
                    color ='#653279';
                else
                    color ='#897A27'; 

                    var articulo = '<a id="'+item.id+'" ondblclick="remove('+item.id+')" onclick="draw('+item.id+')" class="list-group-item list-group-item-action " style="background-color: rgb(236,236,236);text-align: left; text-transform: uppercase;  font-weight: 530; " ><b style="color:'+color+'; font-size: 14px">'+
                                        item.codigo+' - '+'</b>'+item.denominacion+'</a>';
                    contenido+=articulo;
                    paths.push(item);
                }
                document.getElementById('recorridos').innerHTML = contenido;
          });

        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
}
function loadData(){
    cleanAll();
    document.getElementById('recorridos').innerHTML = '';
    
    this.showMsg('Buscando Recorridos', 'Cargando todos los recorridos existentes');

    var paths = [];
    $.getJSON('/site/recorridos/map/lista', function(response){
        let contenido ='';
        let color;
        for(let item of response){

            if(Number(item.codigo) < 200)
                color ='#C8102E';
            else if(Number(item.codigo) < 300)
                color ='#D0D0CE';
            else if(Number(item.codigo) < 400)
                color ='#3D9525';
            else if(Number(item.codigo) < 500)
                 color ='#FBE122';
            else if(Number(item.codigo) < 600)
                color ='#FF6A13';
            else if(Number(item.codigo) < 700)
                color ='#00A3E0';
            else if(Number(item.codigo) < 800)
                color ='#003087';
            else if(Number(item.codigo) < 900)
                color ='#653279';
            else
                color ='#897A27';   

            var articulo = '<a id="'+item.id+'" ondblclick="remove('+item.id+')" onclick="draw('+item.id+')" class="list-group-item list-group-item-action " style="background-color: rgb(236,236,236);text-align: left; text-transform: uppercase;  font-weight: 530; " ><b style="color:'+color+' !important; font-size: 14px">'+
                                item.codigo+' - '+'</b>'+item.denominacion+'</a>';
            contenido+=articulo;
            paths.push(item);
            
        }
        document.getElementById('recorridos').innerHTML = contenido;
    });
    
    _recorridos = paths;
    hideMsg();
    
    document.getElementById('menuRecorridos')
}
/*function initMap() {
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
    
}
function initMapMendoTran() {
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
    loadData();

}*/
function filterList(){
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
        element.classList.add("activado");
        
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
            $.getJSON('/site/recorridos/map/recorrido/'+id, function(response){
                _seleccion = response;
                var linea =[];
                _seleccion.recorrido.forEach(element => {
                    linea.push({lat : Number(element.lat), lng : Number(element.lng)});
                });
                let color;
                if(Number(_seleccion.codigo) < 200)
                    color ='#C8102E';
                else if(Number(_seleccion.codigo) < 300)
                    color ='#D0D0CE';
                else if(Number(_seleccion.codigo) < 400)
                    color ='#3D9525';
                else if(Number(_seleccion.codigo) < 500)
                    color ='#FBE122';
                else if(Number(_seleccion.codigo) < 600)
                    color ='#FF6A13';
                else if(Number(_seleccion.codigo) < 700)
                    color ='#00A3E0';
                else if(Number(_seleccion.codigo) < 800)
                    color ='#003087';
                else if(Number(_seleccion.codigo) < 900)
                    color ='#653279';
                else
                    color ='#897A27';  

                let content = '<div id="content">'+
                    '<h5 id="firstHeading" class="firstHeading"><strong style="color:'+color+'">'+_seleccion.codigo+'</strong> - '+_seleccion.denominacion+'</h5>'+
                    '<div id="bodyContent">'+
                    '<p>'+String(_seleccion.descripcion).toUpperCase();
                    +'</p>'+
                    '</div>'+
                    '</div>';

                let ruta = L.polyline(linea, 
                        {color: color, 
                         weight: 4,
                         contenido: content});
                
                ruta.on('click', function(event){
                    var popup = L.popup()
                    .setLatLng(event.latlng)
                    .setContent(event.target.options.contenido)
                    .openOn(_map);
                });
                ruta.addTo(_map);
                _map.fitBounds(ruta.getBounds());
    
                closeNav();
                
                addLine(ruta, _seleccion.id, null);
                addItem(_seleccion);

                
            });
        }
        _remove = false;
}
function createInfoWindow(poly, content) {

    google.maps.event.addListener(poly, 'click', function(event) {
        var infowindow = new google.maps.InfoWindow();
        infowindow.setContent(content);
        infowindow.setPosition(event.latLng);
        infowindow.open(_map);
    });
}
function validate(id){
    var found = false;
    if(_listado){
        for(var index = 0; index < _listado.length; index++){
            item = _listado[index];
            if(item.id == id){
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
            if(!(item.id == id)){
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
                _map.removeLayer(_linesAdd[i].item);
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
        element.classList.remove("activado");
        if (element.hasChildNodes()) 
            element.removeChild(element.childNodes[2]); 
    }
    closeNav();
}
function showMsg(title, msg){
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
            remove(_listado[i].id);
        }
    }
}


