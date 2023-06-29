<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/* if (isset($_SERVER['HTTPS']))
{ */
if (getenv('APP_DEBUG') === 'false') {
    URL::forceScheme('https');
}
/* } */


Route::get('/wscercanos/{lat}/{lng}/{dis}', 'SitioController@getRecorridosCercanosDistancia')->name('cercanos.distancia.mendotran');
Route::get('/wscargas', 'SitioController@getPuntosCarga')->name('puntos.cargas');
Route::get('/wstrasbordos', 'SitioController@getTrasbordos')->name('trasbordos.cargas');
Route::get('/wsgrupos', 'SitioController@getGrupos')->name('grupos.mendotran');
Route::get('/wslineas/{grupo}', 'SitioController@getLineas')->name('lineas.mendotran');
Route::get('/wsrecorrido/{linea}', 'SitioController@getRecorrido')->name('recorrido.mendotran');
Route::get('/wscercanos/{lat}/{lng}', 'SitioController@getRecorridosCercanos')->name('cercanos.mendotran');
Route::get('/wscercanos/{lat}/{lng}/{dis}', 'SitioController@getRecorridosCercanosDistancia')->name('cercanos.distancia.mendotran');
Route::get('/wsrecolinea/{linea}', 'SitioController@getRecorridoXLinea')->name('recolinea.mendotran');
Route::get('/wsrecolineaparada/{linea}', 'SitioController@getRecorridoXLineaXParada')->name('recolineaparada.mendotran');
Route::get('/wsplaces/{tipo}', 'SitioController@getPlaces')->name('places.list');
Route::get('/wsstops/{lat}/{lng}', 'SitioController@getParadasCercanas')->name('stopscercanos.mendotran');
Route::get('/wsstopline/{linea}', 'SitioController@paradasXLinea')->name('stopslinea.mendotran');
Route::get('/wsall', 'SitioController@getLastVersion')->name('weball.mendotran');
Route::get('/wslocation', 'SitioController@getLocation')->name('location.mendotran');
Route::get('/wsschool/{data}', 'SitioController@escuelaFiltro')->name('schools.list');
Route::get('/wsrecorrido/horario/{data}', 'SitioController@getHorarios')->name('recorridos.horarios');
Route::get('/wsnews/{actual}/{limit}', 'SitioController@getNoticias')->name('noticias.listado');
Route::get('/wshorarios/wara/{codigo}', 'SitioController@getHoariosXLineaApp')->name('horarios.wara');
