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
use Lang;

class TipusEventController extends Controller
{

    /**
     * Mètode que ens retorna tots els tipus d'events en format JSon
     * @return mixed
     */
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

    /**
     * Mètode que ens retorna un típus d'event donat un identificador en format JSon
     * @param $lang
     * @param $id
     * @return mixed
     */
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

    /**
     * Mètode que ens permet actualitzar l'informació d'un tipus d'event donat un identificador en concret
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Mètode que ens permet emmagatzemar un tipus d'event en base de dades
     * @param Request $request HTTP Request amb els camps a emmagatzemar
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Mètode que ens permet eliminar un tipus d'event donat un identificador concret
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        $event = TipusEvent::find($id);
        $event->actiu = false;
        $event->save();
        $msg = Lang::get('codes.ev_delete');
        Session::flash('response',$msg);
        return redirect("/".session('lang')."/llistatipus");
    }

    /**
     * Mètode que ens retorna una vista amb un formulari per a poder crear un tipus d'event
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create(Request $request)
    {
        $this->middleware('auth');
        $this->authorize('admin');
        return view('tipusevents.formtipus');
    }

    /**
     * Mètode que ens retorna una vista amb un llistat de tots els tipus d'events
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function llista(){
        $this->authorize('admin');
        return view ('tipusevents.llista_tipus', [
            'tipus_events' => DB::table('tipus_events')->where('actiu','=',true)->orderBy('created_at','desc')->paginate(15)
        ]);
    }

    /**
     * Mètode que ens retorna una vista amb un formulari per a modificar un tipus d'event donat el seu identificador
     * @param $lang
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($lang,$id)
    {
        $this->middleware('auth');
        $tipusevent = TipusEvent::find($id);

        return view ('tipusevents.updateform', [
            'tipus_event' => $tipusevent,
        ]);
    }

}
