<?php

namespace App\Http\Controllers;

use App\Carrer;
use App\Foto;
use App\Http\Requests;
use App\Utils;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Image;

class CarrerController extends Controller
{
    public function llista()
    {
        return view('carrers.llistat', [
            'carrers' => Carrer::All()
        ]);
    }

    public function index()
    {
        $carrers = Carrer::All();
        if (!$carrers) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => "No se ha encontrado ninguna calle"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $carrers), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function show($lang,$id)
    {
        $carrer = Carrer::find($id);
        if (!$carrer) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => "No se ha encontrado ninguna calle con ese código"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $carrer), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function edit($lang,$id)
    {
        $this->middleware('auth');
        $carrer = Carrer::find($id);
        return view('carrers.updateform', [
            'carrer' => $carrer
        ]);
    }

    public function update($id, Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'cnom' => 'required|max:50|min:2',
            'cdescripcio' => 'required|max:2000|min:2',
            'cany_inici' => 'required|max:5000|min:1500|numeric',
            'cfacebook' => 'max:100|min:2',
            'ctwitter' => 'max:100|min:2',
            'cinstagram' => 'max:100|min:2',
        ]);

        $carrer = Carrer::find($id);
        $foto = "";
        if (!$carrer) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => "No se ha encontrado ninguna calle con ese código"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $carrer->cnom = $request->cnom;
            $carrer->cdescripcio = $request->cdescripcio;
            $carrer->cany_inici = $request->cany_inici;
            $carrer->cfacebook = $request->cfacebook;
            $carrer->ctwitter = $request->ctwitter;
            $carrer->cinstagram = $request->cinstagram;


            DB::beginTransaction();
            try {
                $carrer->save();

                DB::commit();
            } catch (PDOException $ex) {
                DB::rollBack();
            }

            $response = Response::json(array("status" => "ok", "data" => "Calle modificada con éxito"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function create()
    {
        $this->authorize('admin');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        //no funcional
    }

    public function delete($id)
    {
        $this->authorize('admin');
        $carrer = Carrer::find($id);
        if (!$carrer) {
            $response = Response::json(array("errors" => "No se ha encontrado ninguna calle con ese código"), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $carrer->delete();
            $response = Response::json(array("status" => "ok", "data" => "Calle eliminada con éxito"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function afegirFotoForm()
    {

        $carrers = Carrer::All();

        return view('carrers.afegirFoto', [
            'carrers' => $carrers
        ]);
    }

    public function afegirFoto(Request $request)
    {
        $this->middleware('auth');
        //Recuperem la foto
        $file = $request->file('foto');
        //En cas de que hagin afegit una foto la preparem per a insertarla a la base de dades
        if ($file != null && $file != "") {
          $guardarfoto = true;
            $foto = new Foto();
            $foto->fnom = $request->foto;
            $foto->fpic = Utils::editImage($request, null);
            if ($request->id_carrer == 0) {
                Log::info('Cercant el identificador del usuari loguejat ' . Auth::id());
                $carrer = DB::table('carrers')->where('user_id', '=', Auth::id())->get();
                Log::info(DB::getQueryLog());
                $foto->carrer_id = $carrer[0]->id;
            } else {
                $foto->carrer_id = $request->id_carrer;
            }
            try {
                $foto->save();
                $response = Response::json(array("status" => "ok", "data" => "Fotografia añadida correctamente"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
                Log::info("Noticia afegida correctament");
            } catch (PDOException $ex) {
                //en cas d'error fem rollback i preparem la resposta amb l'error
                Log::error("Hi ha hagut un error al intentar afegir la foto");
                $response = Response::json(array("errors" => array(['code' => 404, 'message' => "Ha ocurrido un error al intentar almacenar la fotografia"])), 400, Utils::$headers, JSON_UNESCAPED_UNICODE);
                DB::rollBack();
            }

        }
    }

    public function carrerfoto($id)
    {
        $this->middleware('auth');
        //DB::connection()->enableQueryLog();
        $carrer = DB::table('fotos')->where("carrer_id", "=", $id)->orderBy('created_at', "ASC")->select("fotos.id")->get();
        //Log::info(DB::getQueryLog());

        for($i=0;$i<12&&$i<sizeof($carrer);$i++){
            $array[]=$carrer[$i]->id;
        }

        $array=json_encode($carrer);
        return $array;
    }
}
