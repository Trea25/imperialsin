<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\TipusEvent;
use App\Utils;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Session;

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

    public function show($lang,$id)
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
        return redirect()->back();
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
            $event->actiu = true;
            $event->save();
            $response = Response::json(array("status" => "ok", "data" => "Tipo de evento añadido con exito"), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'messages.insert_ok';
		} catch (PDOException $ex) {
            $response = Response::json(array("errors" => array(['code'=>404,'message'=>"Ha habido un problema al insertar el tipo de evento"])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'messages.insert_fail';
		}
		Session::flash('response',$msg);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $event = TipusEvent::find($id);
        $event->actiu = false;
        $event->save();
        return redirect("/".session('lang')."/llistatipus");
    }

    public function create(Request $request)
    {
        $this->middleware('auth');

        return view('tipusevents.formtipus');
    }

    public function llista(){
        return view ('tipusevents.llista_tipus', [
            'tipus_events' => DB::table('tipus_events')->where('actiu','=',true)->orderBy('created_at','desc')->paginate(15)
        ]);
    }

    public function edit($lang,$id)
    {
        $this->middleware('auth');
        $tipusevent = TipusEvent::find($id);

        return view ('tipusevents.updateform', [
            'tipus_event' => $tipusevent,
        ]);
    }

}
