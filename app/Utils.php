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

    /**
     * Funció que rep una data (dd/mm/yyyy) i una hora (dd:mm) i la formateja en formate date apte per la Base de Dades
     * @param $date data en format dd/mm/yyyy
     * @param $time hora en format hh:mm
     * @return string Un string amb la data en format yyyy-mm-dd hh:mm:ss
     */
    public static function date_formater($date, $time)
    {
        $date = explode("/", $date);
        $format = $date[2] . "-" . $date[1] . "-" . $date[0] . " " . $time;
        return $format;
    }

    /**
     * Funció per separar la data de yyyy-mm-dd hh:mm:ss a una data dd/mm/yyyy i una hora hh:mm
     * @param $date Data en format yyyy-mm-dd hh:mm:ss
     * @return string Data en format dd/mm/yyyy hh:mm
     */
    public static function separate_date($date)
    {
        $date = explode(" ", $date);
        $time=$date[1];
        $date=explode("-", $date[0]);
        $date=$date[2]."/".$date[1]."/".$date[0];
        return $date." ".$time;
    }

    /**
     * Metode que donat un fitxer o una imatge provinent d'el request ens l'escala, rota i retalla segons els parametres donats, els quals tambe venen del request
     * @param Request $request HTTP Request amb l'imatge i/o els parametres de configuracio
     * @param $file fitxer amb l'imatge provinent de base de dades la qual tractarem amb l'informacio provinent del request
     * @return null
     */
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