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

class EventController extends Controller
{

    public function llistapen()
    {
        return view('events.events_pendents', [
            'events' => DB::table('events')->where('eactiu', '=', false)->get()
        ]);
    }

    public function llista()
    {
        return view('events.llista_events', [
            'events' => DB::table('events')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

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

    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('events.formevent', [
            'carrers' => Carrer::All(),
            'events' => TipusEvent::All(),
            'id_user' => $request->user()->id
        ]);
    }

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

    public function destroy($id)
    {
        $this->authorize('admin');
        $event = Event::find($id);
        if (!$event) {
            $response = Response::json(['errors' => array(['code' => 404, 'message' => Lang::get('codes.ev_404')])], 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $event->delete();
            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.ev_delete')), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
    }

    public function edit($lang, $id)
    {
        $this->middleware('auth');
        $event = Event::find($id);
        $date = explode(" ", Utils::separate_date($event->edata_inici));
        $time = substr($date[1], 0, -3);
        $date = $date[0];

        return view('events.updateform', [
            'event' => $event,
            'tipusevents' => TipusEvent::All(),
            'carrers' => Carrer::All(),
            'hora' => $time,
            'data' => $date
        ]);
    }

    public function searchmap(Request $request)
    {
        return view('festa.search', [
            'tipusevents' => TipusEvent::all()
        ]);
    }


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
        $query->where('carrers.cnom', '!=', 'federacio');
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
