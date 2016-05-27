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


//====ROUTES SENSE IDIOMA => REDIRECT
    Route::get('/administracio', function () {
     return redirect('/'.App::getLocale().'/administracio');
    });
    Route::get('/', function () {
        return redirect('/'.App::getLocale());
    });
    Route::get('/home', function () {
        return redirect('/'.App::getLocale().'/home');
    });
    Route::get('/carrerinfo', function () {
        return redirect('/'.App::getLocale().'/carrerinfo');
    });
    Route::auth();
    Route::get('noticies', function () {
        return redirect('/'.App::getLocale().'/noticies');
    });
    Route::get('noticia/view/{id}',function () {
        return redirect('/'.App::getLocale().'/noticia/view/'.Route::input('id'));
    });
    Route::get('search', function () {
        return redirect('/'.App::getLocale().'/search');
    });
    Route::get('searchresults', function () {
        return redirect('/'.App::getLocale().'/searchresults');
    });
    Route::get('llistatipus', function () {
        return redirect('/'.App::getLocale().'/llistatipus');
    });
    Route::get('llistacarrers',function () {
        return redirect('/'.App::getLocale().'/llistacarrers');
    });
    Route::get('llistaeventspen', function () {
        return redirect('/'.App::getLocale().'/llistaeventspen');
    });
    Route::get('llistaevents', function () {
        return redirect('/'.App::getLocale().'/llistaevents');
    });
    Route::get('llistanoticiespen', function () {
        return redirect('/'.App::getLocale().'/llistanoticiespen');
    });
    Route::get('llistanoticies', function () {
        return redirect('/'.App::getLocale().'/llistanoticies');
    });
    Route::get('/foto/{id}', 'FotoController@find');
    Route::get('carrer/{id}/noticia', function () {
        return redirect('/'.App::getLocale().'/carrer/'.Route::input('id').'/noticia');
    });
    Route::get('/afegirFoto', function () {
        return redirect('/'.App::getLocale().'/afegirFoto');
    });
    Route::get('password/email',function () {
        return redirect('/'.App::getLocale().'/password/email');
    });
    Route::get('password/reset/{token}',function () {
        return redirect('/'.App::getLocale().'/password/reset/'.Route::input('token'));
    });
    //===RESOURCES===//
    Route::get('tipusevent/create', function () {
        return redirect('/'.App::getLocale().'/tipusevent/create');
    });
    Route::get('tipusevent/{id}/edit', function () {
        return redirect('/'.App::getLocale().'/tipusevent/'.Route::input('id').'/edit');
    });
    Route::get('carrer/create', function () {
        return redirect('/'.App::getLocale().'/carrer/create');
    });
   Route::get('carrer/{id}/edit', function () {
        return redirect('/'.App::getLocale().'/carrer/'.Route::input('id').'/edit');
    });
    Route::get('event/create', function () {
        return redirect('/'.App::getLocale().'/event/create');
    });
     Route::get('event/{id}/edit', function () {
        return redirect('/'.App::getLocale().'/event/'.Route::input('id').'/edit');
    });
    Route::get('noticia/create', function () {
        return redirect('/'.App::getLocale().'/noticia/create');
    });
     Route::get('noticia/{id}/edit', function () {
        return redirect('/'.App::getLocale().'/noticia/'.Route::input('id').'/edit');
    });

//=======================//
//====GROUP amb idioma====//
Route::group([
    'prefix' =>'{lang}'
    ],function(){
        Route::get('/', 'NoticiaController@home');
        Route::get('/home', function () {
        return view('festa.home');
    });
        Route::get('/administracio', function () {
        return view('festa.admin');
    });

    Route::get('/carrerinfo', function () {
        return view('festa.carrerinfo');
    });
    Route::get('/afegirFoto', 'CarrerController@afegirFotoForm');
    
    Route::auth();
    /*
    Route::get('/redirect','SocialAuthController@redirect');
    Route::get('/callback','SocialAuthController@callback');
    Route::get('/publicar','NoticiaController@store');
    */
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

    Route::get('carrer/foto/{id}', 'CarrerController@carrerfoto');
    Route::get('carrer/{id}/noticia', 'CarrerController@showNews');
    
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    });
    
//=========================//
//====POST====//
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::post('/fotoCarrer', 'carrerController@afegirFoto');
//===RESOURCES===//
Route::resource('carrer', 'CarrerController',
    ['except' => ['create', 'edit']]);
Route::resource('event', 'EventController',
    ['except' => ['create', 'edit']]);
Route::resource('noticia', 'NoticiaController',
    ['except' => ['create', 'edit']]);
Route::resource('carrer.noticia', 'CarrerNoticiaController');
Route::resource('carrer.event', 'CarrerEventController');
Route::resource('tipusevent', 'TipusEventController',
    ['except' => ['create', 'edit']]);