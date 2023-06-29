let _lineas;
let _map;
let _centro;
let _tipo;

$( document ).ready(function() {
    
    let  osmBase = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
    { attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'});
    _map = L.map('map_place', {
       center: [Number(document.getElementById('lat').value), Number(document.getElementById('lng').value)],
       zoom: 15,
       layers: [osmBase]
   });
   osmBase.addTo(_map);

   _tipo = $('#tipo').val();

   let src = (tipo == 'H' ? '/images/sites/map/hospital.png' : '/images/sites/map/municipalidad.png' );
   let icon = L.icon({ iconUrl: src});

   let marcador = L.marker( [Number(document.getElementById('lat').value), Number(document.getElementById('lng').value)],
              {icon: icon, title: $('#place-deno').val()}).addTo(_map);
   

    _map.setView(marcador.getLatLng(), 20);
    //_map.panTo(marcador.getLatLng());
   
    _centro = marcador;
    loadData();

    
}); 
function loadData(){
    let msj = (tipo == 'H' ? 'hospital' : 'municipio');
    showMsg('Obteniendo información','Buscando líneas para el '+msj+' seleccionado');
    
    $.ajax({
        url: "/wscercanos/"+$('#lat').val()+"/"+$('#lng').val()+'/0.3'
      }).done(function(data) {
           _lineas = data;
           console.log(data);
           addLineas();
           hideMsg();
      });
}

function addLineas(){
    if(_lineas){
        for(let item of _lineas){
            let color;
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
    
            let content = '<li class="list-group-item list-group-item-action">'+
                                '<a style="text-decoration: none !important; color: inherit;" href="/recorridos/detalle/'+item.id+'">'+
                                    '<div class="d-flex w-100 justify-content-between">'+
                                        '<h5 class="mb-1" style="text-transform: uppercase;">'+
                                            '<strong style="color:'+color+' !important">'+item.codigo+'</strong> - '+item.denominacion+
                                        '</h5>'+
                                    '<div id="bodyContent">'+
                                        '<p style="font-size:10px !important">'+item.descripcion+'</p>'
                                    '</div>'+
                                    '<br/>'+
                                '</div>'+
                                '</a>'+
                        '</li>';
            $( "#dgLineas" ).append(content);
    
        }
        draw();
    }else{
        let content = '<li class="list-group-item list-group-item-action">'+
                                '<div class="d-flex w-100 justify-content-between">'+
                                    '<h5 class="mb-1" style="text-transform: uppercase;">'+
                                        'No se han localizado recorridos cercanos'+
                                    '</h5>'+
                                '</div>'+
                        '</li>';
            $( "#dgLineas" ).append(content);
    }
    
    
}
function draw(){
      
    for(let item of _lineas){
        
        let color;
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

        let display = [];
        for(let point of item.recorrido){
            display.push({lat: Number(point.lat), lng: Number(point.lng)});
        }

        var content = '<div id="content">'+
            '<h5 id="firstHeading" class="firstHeading"><b style="color:'+color+'">'+item.codigo+'- </b><b>'+item.denominacion+'</b></h5>'+
            '<div id="bodyContent">'+
            '<p style="font-size: 11px">'+item.descripcion+'</p>'+
            '</div>'+
            '</div>';
            
        let ruta = L.polyline(display, 
            {color: color, 
             weight: 4,
             contenido: content});
    
        ruta.on('click', function(event){
            L.popup()
                .setLatLng(event.latlng)
                .setContent(event.target.options.contenido)
                .openOn(_map);
        });
        ruta.addTo(_map);
        
    }

    _map.setView(_centro.getLatLng(), 14);
  }
  
function showMsg(title, msg){
    console.log(title);
    waitingDialog.show(msg,{
        headerText: title,
        headerSize:4,
        contentElement: 'p',
        progressType: 'danger'
    });
}
function hideMsg(){
    waitingDialog.hide();
}