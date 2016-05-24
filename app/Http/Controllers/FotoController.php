<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Foto;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;
use App\Utils;

class FotoController extends Controller
{
    public function find($id){
        $foto = Foto::find($id);
        if(!$foto){
            $response =  Response::json(['errors'=>array(['code'=>404,'message'=>'No se ha encontrado ninguna foto con ese código.'])],404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }else{
            $pic = Image::make($foto->fpic);
            $response = Response::make($pic->encode('jpeg'));

            //setting content-type
            $response->header('Content-Type', 'image/jpeg');

        }

        return $response;
    }
}
