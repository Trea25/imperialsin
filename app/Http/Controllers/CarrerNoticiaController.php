<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrer;
use Illuminate\Support\Facades\Response;
use App\Utils;
use App\Noticia;
use Lang;


class CarrerNoticiaController extends Controller
{

    /**
     * Mètode que ens retorna totes les noticies per a un carrer determinat en format JSon
     * @param $lang
     * @param $idCarrer identificador del carrer del cual volem obtindre totes les seves noticies
     * @return mixed
     */
    public function index($lang,$idCarrer){
        $carrer = Carrer::find($idCarrer);
        if(!$carrer){
            $response= Response::json(array("errors" => array(['code'=>404,'message'=>Lang::get('codes.ca_404')])),404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $noticies = $carrer->noticia()->get();
            $response = Response::json(array("status"=>"ok","data"=>$noticies),200,Utils::$headers,JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    /**
     * Mètode que ens retorna una noticia en concret per a un carrer en concret en format JSon
     * @param $lang
     * @param $idCarrer identificador del carrer
     * @param $idNoticia identificador de la noticia
     * @return mixed
     */
    public function show($lang,$idCarrer,$idNoticia)
    {
        $noticia = Noticia::find($idNoticia);
        if(!$noticia || $noticia->carrer_id != $idCarrer){
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>Lang::get('codes.not_404')])),404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $response = Response::json(array("status"=>"ok","data"=>$noticia));
        }
        return $response;
    }

}
