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
    public function redirect()
    {
        Log::info('Redirigint a facebook');
        return \Socialite::driver('facebook')->redirect();   
    }   

    public function callback()
    {
        // when facebook call us a with token 
            $providerUser = \Socialite::driver('facebook')->user();
           session(['fb_user' => $providerUser]);
           Log::info('Realitzant el callback');           
           return redirect ("/publicar");
            
    }
}
