<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utils;
use App\Carrer;
use Illuminate\Support\Facades\Response;
use App\Event;
use Lang;
use Session;

class CarrerEventController extends Controller
{

    /**
     * Mètode que retorna tots els events per a un carrer determinat en format JSon
     * @param $lang
     * @param $idCarrer identificador del carrer del cual volem obtindre tots els seus events
     * @return mixed
     */
    public function index($lang,$idCarrer)
    {
        $carrer=Carrer::find($idCarrer);

        if (! $idCarrer)
        {
          $response = Response::json(array("errors"=> array(['code'=>404,'message'=>Lang::get('codes.ca_404')])),404,Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $events = $carrer->event()->get();
            $response = Response::json(array("status"=>"ok", "data"=>$events),200,Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    /**
     * Mètode que ens retorna un event en concret per a un carrer concret en format JSon
     * @param $lang
     * @param $idCarrer identificador del carrer
     * @param $idEvent identificador de l'event
     * @return mixed
     */
    public function show($lang,$idCarrer,$idEvent)
    {
        $event = Event::find($idEvent);
        if(!$event || $event->carrer_id != $idCarrer){
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>Lang::get('codes.ev_404')])),404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $response = Response::json(array("status"=>"ok", "data"=>$event),200,Utils::$headers,JSON_UNESCAPED_UNICODE);
        }
        return $response;

    }


}
