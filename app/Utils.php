<?php
namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Image;
use Illuminate\Support\Facades\Response;
class Utils
{
    public static $headers = array(
        'Content-Type' => 'application/json; charset=utf-8'
    );

    public static function date_formater($date, $time)
    {
        $date = explode("/", $date);
        $format = $date[2] . "-" . $date[1] . "-" . $date[0] . " " . $time;
        return $format;
    }

    public static function separate_date($date)
    {
        $date = explode(" ", $date);
        $time=$date[1];
        $date=explode("-", $date[0]);
        $date=$date[2]."/".$date[1]."/".$date[0];
        return $date." ".$time;
    }
    public static function editImage(Request $request, $file){

        $img = null;
        if($file == null){
            Log::info('Agafem l\'imatge del Request');
            $file = $request->file('foto');
        }else{
            Log::info('Imatge passada per fitxer');
        }
        if($file!=null){
            $x = $request->x;
            $y = $request->y;
            $h = $request->h;
            $w = $request->w;
            $scale = $request->scale;
            $angle = $request->angle;
            Log::info("Escala: " . $scale . " Angle: " . $angle . " X: " . $x . " Y: " . $y . " H: " . $h . " W: " . $w);
            $img = Image::make($file);
            $img->rotate((float)$angle);
            $img->widen((int)($img->width() * (float)$scale));
            Log::info("widen " . $img->width()." * ".(float)$scale);
            // crop image
            $img->crop((int)$w, (int)$h, (int)$x, (int)$y);
            Response::make($img->encode('jpeg'));
        }
        return $img;
    }

}