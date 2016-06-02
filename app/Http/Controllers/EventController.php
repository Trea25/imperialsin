<?php

namespace App\Http\Controllers;

use App\Carrer;
use App\Event;
use App\Http\Requests;
use App\TipusEvent;
use App\Utils;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Log;
use Session;

class EventController extends Controller
{
    /**
     * Mètode que ens retorna una vista amb tots els events els quals es troben inactius
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function llistapen()
    {
        $this->authorize('admin');
        return view('events.events_pendents', [
            'events' => DB::table('events')->join('carrers','carrers.id','=','events.carrer_id')->select('events.*','carrers.cnom as cnom')->where('eactiu', '=', false)->orderBy('edata_inici', 'desc')->get()
        ]);
    }

    /**
     * Métode que ens retorna una vista  tots els events
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function llista()
    {
        $this->authorize('admin');
        return view('events.llista_events', [
            'events' => DB::table('events')->join('carrers','carrers.id','=','events.carrer_id')->select('events.*','carrers.cnom as cnom')->orderBy('edata_inici', 'desc')->paginate(10)
        ]);
    }

    /**
     * Mètode que ens retorna tots els events existents en format JSon
     * @return mixed
     */
    public function index()
    {
        $events = Event::All();

        if (!$events) {
            $response = Response::json(['errors' => array(['code' => 404, 'message' => Lang::get('codes.ev_404')])], 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array('status' => 'ok', 'data' => $events), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    /**
     * Mètode que ens permet emmagatzemar un event en base de dades
     * @param Request $request HTTP Request amb tots els camps a emmagtzemar
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('events.formevent', [
            'carrers' => Carrer::All(),
            'events' => DB::table('tipus_events')->where('actiu', '=', true)->get(),
            'id_user' => $request->user()->id
        ]);
    }

    /**
     * Mètode que ens retorna un event donat el seu identificador en format JSon
     * @param $lang
     * @param $id identificador de l'event que volem obtindre
     * @return mixed
     */
    public function show($lang, $id)
    {
        $event = Event::find($id);
        if (!$event) {
            $response = Response::json(['errors' => array(['code' => 404, 'message' => Lang::get('codes.ev_404')])], 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("satus" => "ok", "data" => $event), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    /**
     * Mètode que ens permet actualitzar l'informacio d'un event donat el seu identificador
     * @param $id identificador de l'event
     * @param Request $request HTTP Request amb tota l'informació a actualitzar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'etitol' => 'required|max:50|min:2',
            'tipus_id' => 'required',
            'data' => array('required', 'regex:/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/'),
            'hora' => array('required', 'regex:/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/')
        ]);
        $edata_inici = Utils::date_formater($request->data, $request->hora);
        $eactiu = false;
        if (isset($request->eactiu)) {
            $eactiu = true;
        };

        $event = Event::find($id);
        $event->carrer_id = $request->carrer_id;
        $event->eactiu = $eactiu;
        $event->edata_inici = $edata_inici;
        $event->etitol = $request->etitol;
        $event->tipus_id = $request->tipus_id;
        $event->save();
		$msg = 'codes.ev_update';
		Session::flash('response',$msg);
        return redirect("/" . session('lang') . "/llistaevents");
    }

    /**
     * Mètode que ens permet emmagatzemar un event
     * @param Request $request HTTP Request amb tots els camps a emmagatzemar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'etitol' => 'required|max:50|min:2',
            'tipus_id' => 'required',
            'data' => array('required', 'regex:/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/'),
            'hora' => array('required', 'regex:/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/')
        ]);
        $event = new Event();
        if ($request->id_carrer == 0) {
            $event->carrer_id = $request->user()->id;
        } else {
            $event->carrer_id = $request->id_carrer;
        }

        if ($request->user()->id == 1) {
            $event->eactiu = true;

        } else {
            $event->eactiu = false;
        }

        $event->etitol = $request->etitol;
        $event->tipus_id = $request->tipus_id;
        $event->user_id = $request->user()->id;

        $event->edata_inici = Utils::date_formater($request->data, $request->hora);

        $event->save();
		$msg = 'codes.ev_200';
		Session::flash('response',$msg);
        return redirect("/" . session('lang') . "/llistaevents");
    }

    /**
     * Mètode que ens permet eliminar un event donat un identificador
     * @param $id identificador de l'event a eliminar
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        $event = Event::find($id);
        if (!$event) {
            $response = Response::json(['errors' => array(['code' => 404, 'message' => Lang::get('codes.ev_404')])], 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
            $msg = Lang::get('codes.ev_404');
        } else {
            $event->delete();
            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.ev_delete')), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
             $msg = Lang::get('codes.ev_404');
        }
        Session::flash('response',$msg);
    }

    /**
     * Mètode que ens retorna una vista per a actualitzar les dades d'un event donat el seu identificador
     * @param $lang
     * @param $id identificador de l'event a modificar
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($lang, $id)
    {
        $this->middleware('auth');
        $event = Event::find($id);
        $date = explode(" ", Utils::separate_date($event->edata_inici));
        $time = substr($date[1], 0, -3);
        $date = $date[0];

        return view('events.updateform', [
            'event' => $event,
            'tipusevents' => DB::table('tipus_events')->where('actiu','=',true)->get(),
            'carrers' => Carrer::All(),
            'hora' => $time,
            'data' => $date
        ]);
    }

    /**
     * Retorna la vista d'el buscador d'events
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchmap()
    {
        return view('festa.search', [
            'tipusevents' => DB::table('tipus_events')->where('actiu','=',true)->get()
        ]);
    }

    /**
     * Mètode que ens retorna els event's donats els parametres de búsqueda (dies, carrers, i tipus d'event)
     * @param Request $request HTTP Request amb els filtres de búsqueda
     * @return mixed
     */
    public function search(Request $request)
    {

        $event = $request->event;
        $dies = $request->dies;
        $carrers = $request->carrers;
        DB::connection()->enableQueryLog();

        $query = DB::table('events')->join('carrers', 'carrers.id', '=', 'events.carrer_id')->join('tipus_events', 'events.tipus_id', '=', 'tipus_events.id')->select('tipus_events.tipus as tipus', 'events.*', 'carrers.cnom as nom_carrer')
            ->where(function ($query) use ($carrers) {
                if (count($carrers) > 0) {
                    $first = true;
                    Log::info("Montant els carrers de la query");
                    foreach ($carrers as $carrer) {
                        if ($first) {
                            $first = false;
                            $query->where('carrers.id', '=', $carrer);
                        } else {
                            $query->orWhere('carrers.id', '=', $carrer);
                        }
                        Log::info($carrer);
                    }
                }
            })->where(function ($query) use ($dies) {
                if (count($dies) > 1) {
                    $first = true;
                    foreach ($dies as $dia) {
                        if ($first) {
                            if ($dia != "") {
                                $first = false;
                                $query->where('events.edata_inici', 'LIKE', '%' . $dia . '%');
                            }
                        } else {
                            $query->orWhere('events.edata_inici', 'LIKE', '%' . $dia . '%');
                        }
                        Log::info($dia);
                    }
                } else if ($dies != "" && $dies != 0 && count($dies) == 1) {
                    Log::info("Dia: " . $dies);
                    $query->where('events.edata_inici', 'LIKE', '%' . $dies . '%');
                } else {
                    $data = Carbon::today()->toDateString();
                    $query->where('events.edata_inici', '>=', $data);

                }
            });

        if ($event != null && $event != '' && $event != '0') {
            $query->where('events.tipus_id', '=', $event);
        }
        $query->where('carrers.cnom', '!=', 'federacio')->where('events.eactiu', '=',true);
        $resultat = $query->orderBy('carrers.cnom', 'ASC')->orderBy('events.edata_inici', 'ASC')->get();
        Log::info('recompte de resultats: ' . sizeof($resultat));
        Log::info(DB::getQueryLog());
        if (!$resultat) {
            $response = Response::json(['errors' => array(['code' => 404, 'message' => Lang::get('codes.ev_404')])], 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $resultat), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }
}
