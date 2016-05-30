<?php

namespace App\Http\Controllers;


use App;
use App\Carrer;
use App\Foto;
use App\Http\Requests;
use App\Noticia;
use App\Utils;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Image;
use League\Flysystem\Util;
use Log;
use Socialite;
use Twitter;
use Lang;

class NoticiaController extends Controller
{
    

    /**
     * Metode que ens retorna el formulari per a la creació d'una nova notícia
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $this->middleware('auth');

        return view('noticies.formnoticia', [
            'carrers' => Carrer::All(),
            'id_user' => Auth::id()
        ]);

    }

    /**
     * Metode que retorna la llista de noticies pendents
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function llistapen()
    {
        return view('noticies.noticies_pendents', [
            'noticies' => DB::table('noticies')->where('nactiu', '=', false)->get()
        ]);
    }

    /**
     * Metode que retorna el llistat de totes les noticies
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function llista()
    {
        return view('noticies.llista_noticies', [
            'noticies' => DB::table('noticies')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Metode que ens retorna totes les noticies existents a la base de dades
     * @return mixed
     */
    public function index()
    {
        $noticies = Noticia::All();
        if (!$noticies) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.not_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $noticies), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;

    }

    /**
     * Metode que ens retorna una noticia donat un identificador
     * @param $id
     * @return mixed
     */
    public function show($lang, $id)
    {

        $noticia = Noticia::find($id);
        if (!$noticia) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.not_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
		} else {
            $response = Response::json(array("status" => "ok", "data" => $noticia), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
	   }
        return $response;
    }

    /**
     * Metode que ens permet actualitzar una noticia donat el seu identificador
     * @param Request $request request que ve del formulari d'actualitzacio amb tots els atributs de la noticia
     * @return mixed retorna informacio sobre com ha anat el update en format json
     */
    public function update($id, Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'ntitol' => 'required|max:50|min:2',
            'ndesc' => 'required|max:2000|min:2',
            'carrer_id' => 'required|numeric',
        ]);

        $guardarfoto = false;
        $scale = $request->scale;
        $noticia = Noticia::find($id);

        $nactiu = false;
        if (isset($request->nactiu)) {
            $nactiu = true;
        };
        if (!$noticia) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.not_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'codes.not_404';
		} else {
            $noticia->nactiu = $nactiu;
            $noticia->ntitol = $request->ntitol;
            $noticia->ndesc = $request->ndesc;
            $noticia->carrer_id = $request->carrer_id;
            $fotoid = $noticia->foto_id;
            $foto = Foto::find($fotoid);
            $fotopic = Utils::editImage($request, null);
            Log::info("fotopic: " . $fotopic);
            if ($fotopic == null && $scale != 1) {
                Log::info('Recuperant la imatge amb id: ' . $fotoid);
                $file = $foto->fpic;
                $fotopic = Utils::editImage($request, $file);

            }
            Log::info('Actualitzant foto');
            DB::BeginTransaction();
            if ($fotopic != null) {
                $foto->fpic = $fotopic;
                $foto->save();
            }
            $noticia->save();
            DB::Commit();
			$msg = 'codes.not_200';
            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.not_200',['id' => $noticia->id])), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
		Session::flash('response',$msg);
        return redirect("/".session('lang')."/llistanoticies");
    }

    /**
     * Metode que ens permet crear una nova noticia a la base de dades
     * @param Request $request request provinent del formulari d'introduccio de dades per a les noticies
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector (provisional)
     */
    public function store(Request $request)
    {
        DB::connection()->enableQueryLog();
        $this->middleware('auth');
        $carrer_id = "";
        $carrer = "";
        $this->validate($request, [
            'ntitol' => 'required|max:50|min:2',
            'ndesc' => 'required|max:2000|min:2'
        ]);

        $msg = $request->ntitol;

        DB::connection()->enableQueryLog();
        $foto = "";

        $guardarfoto = false;
        Log::info('Preparant per a insertar una Noticia');
        $noticia = new Noticia();
        Log::info($noticia->id);
        $noticia->user_id = Auth::id();
        if (Auth::id() == 1) {
            $noticia->nactiu = true;
        } else {
            $noticia->nactiu = false;
        }

        $noticia->ntitol = $msg;
        $noticia->ndesc = $request->ndesc;

        if ($request->id_carrer == 0) {
            Log::info('Cercant el identificador del usuari loguejat ' . Auth::id());
            $carrer_id = Auth::id();
            $noticia->carrer_id = $carrer_id;
        } else {
            $carrer_id = $noticia->carrer_id = $request->input('id_carrer');

        }
        $fotopic = Utils::editImage($request, null);
        if ($fotopic != null) {
            $guardarfoto = true;
            $foto = new Foto();
            $foto->fnom = $request->foto;
            $foto->fpic = $fotopic;
            $foto->carrer_id = $carrer_id;
        }
        Log::info("Començant la transaccio");
        try {
            DB::beginTransaction();

            if ($guardarfoto) {
                $foto->save();
            }
            if ($guardarfoto && $foto->id != null) {
                $noticia->foto_id = $foto->id;
                Log::info("ID_FOTO: " . $foto->id . " ID_NOTICIA:" . $noticia->id);
            }
            $noticia->save();
            DB::commit();
            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.not_ok')), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
            $msg = 'codes.not_ok';
			Log::info("Noticia afegida correctament");
        } catch (PDOException $ex) {
            //en cas d'error fem rollback i preparem la resposta amb l'error
            Log::error("Hi ha hagut un error al intentar afegir la noticia");
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.not_error')])), 400, Utils::$headers, JSON_UNESCAPED_UNICODE);
            $msg = 'codes.not_error';
			DB::rollBack();
        }
        /*
                if (isset($request->facebook)) {
                    //==============Facebook===========
                    // Directly from the IoC
                    $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
                    Log::info('Publicacio a Facebook');
                    if (!$request->session()->has('fb_user')) { // Get FB Credentials
                        Log::info('Redireccionant al login de FB');
                        return redirect("/redirect");
                    }
                    $Data = [
                        'message' => $msg,
                        'link' => 'http://www.google.es',
                    ];
                    $fb->post('/feed', $Data, session('fb_user')->token);
                    Log::info('Publicado en Facebook.Borrando sesion');
                    // $request->session()->forget('fb_user');
                }*/
        //============Twitter===========
        if (isset($request->twitter)) {
            Log::info('Publicacio a Twitter');
            Twitter::postTweet([
                'status' => $msg .App::make('url')->to('/'.App::getLocale().'/noticia/view/'.$noticia->id)
            ]);
            Log::info('Twitter done');

        }
        //=============================

        /*retornar vista amb  el resultat millor -> $response() a la vista fer un if(isset($response)) i avisar si ha anat be, si ha anat malament es podria redirigir al formulari
        avisant de que hi ha hagut un error i a on*/
        Log::info('noticia afegida correctament');
		Session::flash('response',$msg);
        return redirect("/".session('lang')."/");
    }


    /**
     * Metode que ens permet eliminar una noticia donat un identificador
     * @param $id identificador de la noticia
     * @return mixed json amb informacio sobre com ha anat el delete
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        $noticia = Noticia::find($id);
        if (!$noticia) {
			$msg = 'codes.not_404';
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.not_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $noticia->delete();
			$msg = 'codes.not_delete';
            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.not_delete'), 200, Utils::$headers, JSON_UNESCAPED_UNICODE));
        }
		Session::flash('response',$msg);
        return redirect("/" . App::getLocale() . "/");
    }

    public function edit($lang, $id)
    {
        $this->middleware('auth');
        $noticia = Noticia::find($id);


        return view('noticies.updateform', [
            'noticia' => $noticia,
            'carrers' => Carrer::All(),
        ]);
    }

    /**
     * Metode per obtenir totes les noticies paginades
     * @return les noticies paginades
     */
    public function noticies()
    {

        $noticies = DB::table('noticies')->orderBy('created_at', 'desc')->paginate(10);
        foreach ($noticies as $noticia){
             $ndesc = $noticia->ndesc;
            if (strlen($ndesc) > 750) {
                $ndesc = substr($ndesc, 0, 250);
                $noticia->ndesc = $ndesc;
            }
        
        }
        return view('festa.noticies', [
            'noticies' => $noticies
        ]);

    }

    public function home()
    {
        $noticies = DB::table('noticies')->where('nactiu', '=', true)->orderBy('created_at', 'desc')->take(8)->get();
        foreach ($noticies as $noticia) {
            $ndesc = $noticia->ndesc;
            if (strlen($ndesc) > 250) {
                $ndesc = substr($ndesc, 0, 250);
                $noticia->ndesc = $ndesc;
            }
        }
        return view('festa.home', [
                'noticies' => $noticies
            ]
        );
    }

    public function showNoticia($lang, $id)
    {
        return view('festa.shownoticia', [
            'noticia' => Noticia::find($id),
        ]);
    }
}
