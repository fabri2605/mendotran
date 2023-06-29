var _map;
var _recorrido;
const client_id = 3;
const client_secret = 'qfVqVpQ1s4Dr1MYzkxX8T57zZbvM7SPClq36PUfm';
const client_grant = 'password';

$( document ).ready(function() {
    initMap();
    
}); 
function initMap() {
    let  osmBase = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
    { attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'});
    _map = L.map('map_linea', {
       center: [-32.8895571, -68.84483260000002],
       zoom: 13,    
       layers: [osmBase]
   });
   osmBase.addTo(_map);
    draw();
  }

  function draw(){
    let color;
    if(Number($('#code').val()) < 200)
        color ='#C8102D';
    else if(Number($('#code').val()) < 300)
        color ='#D0D0CE';
    else if(Number($('#code').val()) < 400)
        color ='#3D9525';
    else if(Number($('#code').val()) < 500)
        color ='#FBE123';
    else if(Number($('#code').val()) < 600)
        color ='#FA6A13';
    else if(Number($('#code').val()) < 700)
        color ='#21A3E0';
    else if(Number($('#code').val()) < 800)
        color ='#002F87';
    else if(Number($('#code').val()) < 900)
        color ='#653179';
    else
        color ='#897B26';   

    let display = [];

    let data = polyline.decode($("#traza").val());
    for(let punto of data){
        display.push({lat: Number(punto[0]), lng: Number(punto[1])});
    }  
    var content = '<div id="content">'+
            '<h5 id="firstHeading" class="firstHeading"><b style="color:'+color+'">'+$('#code').val()+'- </b><b>'+$('#name').val()+'</b></h5>'+
            '<div id="bodyContent">'+
            '<p style="font-size: 11px; text-transform: uppercase !important;">'+$('#desc').val()+'</p>'+
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
    
    _map.fitBounds(ruta.getBounds());
    horario();
    
  }
  function horario(){
        
  }
 