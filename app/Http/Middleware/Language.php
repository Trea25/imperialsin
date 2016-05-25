<?php
// app/Http/Middleware/Language.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Route;
use Illuminate\Support\Facades\URL;

class Language
{
    public function handle($request, Closure $next)
    {
        // Si hemos pasado un lang correcto, intentamos cambiar el idioma
         if (array_key_exists(Route::input('lang'),Config::get('languages')) && (Route::input('lang') != '')){
             App::setLocale(Route::input('lang'));
             // Si el lang es incorrecto, ponemos el por defecto
            }else if(Route::input('lang') != ''){
                $url = str_replace('/'.Route::input('lang').'/','/'.App::getLocale().'/',URL::current());
                 return Redirect::to($url);
                 echo $url.'//////'.Route::input('lang');
            }else { // Si no hay lang, lo añadimos a la ruta
              // $url = str_replace('festesdesants-definitiu.dev:8000 ','festesdesants-definitiu.dev:8000/'.App::getLocale(),URL::current());
            //return Redirect::to($url);
           // echo $url;
        }
        return $next($request);
    }
}
?>