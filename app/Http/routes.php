<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Aqui van totes les rutes de l'aplicacio

Route::get('/', 'NoticiaController@home');

Route::get('/administracio', function () {
    return view('festa.admin');
});

Route::get('/carrerinfo', function () {
    return view('festa.carrerinfo');
});
Route::get('/afegirFoto', 'CarrerController@afegirFotoForm');
Route::post('/fotoCarrer', 'carrerController@afegirFoto');


Route::auth();
Route::get('/redirect','SocialAuthController@redirect');
Route::get('/callback','SocialAuthController@callback');
Route::get('/publicar','NoticiaController@store');

Route::get('noticies', 'NoticiaController@noticies');
Route::get('noticia/view/{id}','NoticiaController@showNoticia');

Route::get('search', 'EventController@searchmap');
Route::get('searchresults', 'EventController@search');

Route::get('llistatipus', 'TipusEventController@llista');
Route::get('llistacarrers', 'CarrerController@llista');
Route::get('llistaeventspen', 'EventController@llistapen');
Route::get('llistaevents', 'EventController@llista');
Route::get('llistanoticiespen', 'NoticiaController@llistapen');
Route::get('llistanoticies', 'NoticiaController@llista');



Route::resource('tipusevent', 'TipusEventController');
Route::resource('carrer', 'CarrerController');
Route::resource('event', 'EventController');
Route::resource('noticia', 'NoticiaController');
Route::resource('carrer.noticia', 'CarrerNoticiaController');
Route::resource('carrer.event', 'CarrerEventController');
Route::get('/foto/{id}', 'FotoController@find');



Route::get('carrer/{id}/noticia', 'CarrerController@showNews');