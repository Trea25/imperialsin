<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Foto;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;
use App\Utils;
use Lang;

class FotoController extends Controller
{

    /**
     * Mètode que ens retorna una vista amb una foto determinada donat el seu identificador
     * @param $id identificador de la foto a obtindre
     * @return mixed
     */
    public function find($id){
        $foto = Foto::find($id);
        if(!$foto){
            $response =  Response::json(['errors'=>array(['code'=>404,'message'=>Lang::get('codes.pic_404')])],404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $pic = Image::make($foto->fpic);
            $response = Response::make($pic->encode('jpeg'));

            //setting content-type
            $response->header('Content-Type', 'image/jpeg');

        }

        return $response;
    }
}
