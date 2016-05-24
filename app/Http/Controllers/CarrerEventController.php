<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utils;
use App\Carrer;
use Illuminate\Support\Facades\Response;
use App\Event;
class CarrerEventController extends Controller
{


    public function index($idCarrer)
    {

        $carrer=Carrer::find($idCarrer);

        if (! $idCarrer)
        {
          $response = Response::json(array("errors"=> array(['code'=>404,'message'=>"No se ha encontrado ninguna calle con ese código"])),404,Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $events = $carrer->event()->get();
            $response = Response::json(array("status"=>"ok", "data"=>$events),200,Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;

    }


    public function create($idCarrer)
    {
        $this->middleware('auth');
        // return formulari creacio event per al carrer amb id $idCarrer

    }


    public function store()
    {
        $this->middleware('auth');
        //
    }


    public function show($idCarrer,$idEvent)
    {
        $event = Event::find($idEvent);
        if(!$event || $event->carrer_id != $idCarrer){
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"No se ha encontrado ningun evento con ese código para la calle seleccionada"])),404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $response = Response::json(array("status"=>"ok", "data"=>$event),200,Utils::$headers,JSON_UNESCAPED_UNICODE);
        }
        return $response;

    }


}
