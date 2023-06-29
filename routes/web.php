<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'SitioController@inicio')->name('web');
Route::get('/politica', function () {
    return view('politica');
})->name('politica_app');
Route::group(['prefix' => 'site'], function () {
    Route::get('/actualizaciones', 'SitioController@actualizaciones')->name('site.actualizaciones');
    Route::get('/eventosProvinciales', 'SitioController@actualizaciones')->name('site.eventos_provinciales');
    Route::get('/hospitales', 'SitioController@hospitales')->name('site.hospitales');
    Route::get('/mendotran', 'SitioController@mendotran')->name('site.mendotran');
    Route::get('/dondecargar', function () {
        return view('site.cargar');
    })->name('site.cargar');

    // Route::get('/cargavirtual', function () {
    //     return view('site.cargavirtual');
    // })->name('site.cargavirtual'); // se comenta porque ya no esta vigente

    Route::get('/troncal', function () {
        return view('site.troncal');
    })->name('site.troncal');
    Route::get('/troncal/trasbordo/lista', 'SitioController@troncalTransbordo')->name('site.troncal.trasbordo.lista');
    Route::get('/faq', function () {
        return view('site.faq');
    })->name('site.faq');
    Route::get('/puntosCarga', 'SitioController@puntos')->name('puntos');

    Route::group(['prefix' => 'recorridos'], function () {
        Route::get('/', 'SitioController@getRecorridosHorariosPrueba')->name('site.recorridos');
        Route::get('/prueba', 'SitioController@getRecorridosHorariosPrueba')->name('site.recorridos.prueba');
        Route::get('/map', 'SitioController@recorridos')->name('site.recorridos.map');

        Route::get('/detalle/{data}', 'SitioController@getRecorridoDetalle')->name('site.detalle.recorrido');
        Route::get('/map/lista', 'SitioController@recorridosListado')->name('site.recorridos.map.lista');
        Route::get('/map/recorrido/{data}', 'SitioController@recorridoDetalle')->name('site.recorridos.map.detalle');
    });
    Route::group(['prefix' => 'hospitales'], function () {
        Route::get('/', 'SitioController@hospitales')->name('site.hospitales');
        Route::get('/detalle/{data}', 'SitioController@hospitalDetalle')->name('sitio.hospital_detalle');
    });
    Route::group(['prefix' => 'municipios'], function () {
        Route::get('/', 'SitioController@municipios')->name('site.municipios');
        Route::get('/detalle/{data}', 'SitioController@municipioDetalle')->name('sitio.municipio_detalle');
    });
    Route::group(['prefix' => 'escuelas'], function () {
        Route::get('/', 'SitioController@escuelas')->name('site.escuelas');
        Route::get('/detalle/{data}', 'SitioController@escuelaDetalle')->name('sitio.escuela_detalle');
    });

    Route::get('/linea/recorrido/map/{data}', 'SitioController@recorridoMap')->name('lrecorridos.linea.map');
});



Auth::routes();
Route::resource('users', 'UserController');
Route::resource('puntos', 'PuntoController');
Route::resource('grupos', 'GrupoController');
Route::resource('lineas', 'LineaController');
Route::resource('stops', 'ParadaController');
Route::resource('places', 'LugarController');
Route::resource('noticias', 'NoticiaController');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'parametros'], function () {
    Route::get('/configuracion', 'ParametroController@configuracion')->name('parametros.configuracion');
    Route::put('/{parametro}', 'ParametroController@update')->name('parametros.editar');
});
Route::group(['prefix' => 'noticias'], function () {
    Route::post('/upload/img', 'NoticiaController@uploadImage')->name('noticias.upload_image');
    Route::delete('/eliminar/{data}', 'NoticiaController@destroy')->name('noticias.eliminar');
});
