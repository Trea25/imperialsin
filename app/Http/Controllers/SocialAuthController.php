<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;

use App\Carrer;

class SocialAuthController extends Controller
{
    /**
    * mètode que redirigeix al driver de facebook de Socialite per demanar el token de login
    * @return redirect
    */
    public function redirect()
    {
        Log::info('Redirigint a facebook');
        return \Socialite::driver('facebook')->redirect();   
    }   

    /**
    * mètode que rep el callback de facebook i recupera l'objecte User per poder publicar
    * @return redirect
    */
    public function callback()
    {
        
            $providerUser = \Socialite::driver('facebook')->user();
           session(['fb_user' => $providerUser]);
           Log::info('Realitzant el callback');           
           return redirect ("/publicar");
            
    }
}
