<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\TipusEvent;
use App\Utils;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class TipusEventController extends Controller
{
    public function index()
    {
        $tipusevent=TipusEvent::All();
        if (!$tipusevent) {
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"No se ha encontrado ningun tipo de evento"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $tipusevent), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function show($id)
    {
        $tipusevent = TipusEvent::find($id);
        if (!$tipusevent) {
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"No se ha encontrado un tipo de evento con ese código"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $tipusevent), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function update($id, Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'tipus' => 'required|max:50|min:2'
        ]);

        $tipusevent = TipusEvent::find($id);
        if (!$tipusevent) {
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"No se ha encontrado ningun tipo de evento con ese código"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $tipusevent->tipus = $request->tipus;
            $tipusevent->save();
            $response = Response::json(array("status" => "ok", "data" => "Tipo de evento actualizado correctamente"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'tipus' => 'required|max:50|min:2'
        ]);

        $event = new TipusEvent();
        try {
            $event->tipus = $request->tipus;
            $event->save();
            $response = Response::json(array("status" => "ok", "data" => "Tipo de evento añadido con exito"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } catch (PDOException $ex) {
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"Ha habido un problema al insertar el tipo de evento"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;

    }

    public function delete($id)
    {
        $this->authorize('admin');
        $event = TipusEvent::find($id);
        if (!$event) {
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"No se ha encontrado ningun tipo de evento con ese código"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $event->delete();
            $response = Response::json(array("status" => "ok", "data" => "Tipo de evento eliminado con éxito"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
    }

    public function create(Request $request)
    {
        $this->middleware('auth');

        return view('tipusevents.formtipus');
    }

    public function llista(){
        return view ('tipusevents.llista_tipus', [
            'tipus_events' => DB::table('tipus_events')->orderBy('created_at','desc')->paginate(15)
        ]);
    }

    public function edit($id)
    {
        $this->middleware('auth');
        $tipusevent = TipusEvent::find($id);

        return view ('tipusevents.updateform', [
            'tipus_event' => $tipusevent,
        ]);
    }

}
