<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Utils;
use App\Carrer;
use Illuminate\Support\Facades\Response;
use App\Event;
use Lang;

class CarrerEventController extends Controller
{


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


    public function create($lang,$idCarrer)
    {
        $this->middleware('auth');
        // return formulari creacio event per al carrer amb id $idCarrer

    }


    public function store()
    {
        $this->middleware('auth');
        //
    }


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
