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
use Lang;
use Session;

class CarrerController extends Controller
{

    /**
     * Mètode que retorna una vista amb el llistat de tots els carrers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function llista()
    {
        $this->authorize('admin');
        return view('carrers.llistat', [
            'carrers' => Carrer::All()
        ]);
    }

    /**
     * Mètode que ens retorna un llistat de tots els carrers en format json
     * @return mixed
     */
    public function index()
    {
        $carrers = Carrer::All();
        if (!$carrers) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.ca_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $carrers), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    /**
     * Mètode que ens retorna l'informacio d'un carrer determinat en format jsopn
     * @param $lang // no te cap funcionalitat, simplement es per les rutes multiidioma
     * @param $id identificador del carrer del qual volem obtindre l'informació
     * @return mixed
     */
    public function show($lang,$id)
    {
        $carrer = Carrer::find($id);
        if (!$carrer) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.ca_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
        } else {
            $response = Response::json(array("status" => "ok", "data" => $carrer), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    /**
     *
     * Mètode que ens retorna una vista amb el formulari per a editar l'informació d'un carrer predeterminat
     * @param $lang // no te cap funcionalitat, simplement es per les rutes multiidioma
     * @param $id identificador del carrer el qual volem modificar
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($lang,$id)
    {
        $this->middleware('auth');
        $this->authorize('admin');
        $carrer = Carrer::find($id);
        return view('carrers.updateform', [
            'carrer' => $carrer
        ]);
    }

    /**
     * Mètode que a partir d'un id actualitza les dades d'un carrer
     * @param $id identificador del carrer que s'actualitzarà
     * @param Request $request request HTTP que ve de la vista amb els valors del formulari
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
        /*
         * Recuperem el carrer que volem modificar de la base de dades
         * */
        $carrer = Carrer::find($id);
        $foto = "";
        //Si no es troba el carrer retornem un Json amb el codi d'error i un missatge, en cas contrari recuperem l'informacio de la request i procedim a grabar a base de dades
        if (!$carrer) {
            $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.ca_404')])), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'messages.update_fail';

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

            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.ca_200')), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'codes.ca_200';
		}
		Session::flash('response',$msg);
        return redirect("/".session('lang')."/llistacarrers");
    }

    /**
     * Mètode que donat un id elimina un carrer
     * @param $id identificador del carrer que es vol eliminar
     * @return mixed7
     */
    public function delete($id)
    {
        $this->authorize('admin');
        $carrer = Carrer::find($id);
        if (!$carrer) {
            $response = Response::json(array("errors" => Lang::get('codes.ca_404')), 404, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'codes.delete_fail';
        } else {
            $carrer->delete();
            $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.ca_delete')), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
			$msg = 'codes.ca_delete';
        }
		Session::flash('response',$msg);
        return $response;
    }

    /**
     * Mètode que ens retorna una vista amb el formulari per a poder afegir fotos per un carrer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function afegirFotoForm()
    {

        $carrers = Carrer::All();

        return view('carrers.afegirFoto', [
            'carrers' => $carrers
        ]);
    }


    /**
     * Métode que ens permet emmagatzemar fotos per a un carrer determinat
     * @param Request $request HTTP Request que porta tota l'informació a emmagatzemar
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function afegirFoto(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request,['foto'=>'required']);
        $msg = null;
        $file = $request->file('foto');
        if ($file != null && $file != "") {
            $foto = new Foto();
            $foto->fnom = $request->foto;
            $foto->fpic = Utils::editImage($request, null);
            if ($request->id_carrer == 0 || $request->id_carrer == null || $request->id_carrer == ""){
                Log::info('Cercant el identificador del usuari loguejat ' . Auth::id());
                $carrer = DB::table('carrers')->where('user_id', '=', Auth::id())->get();
                Log::info(DB::getQueryLog());
                $foto->carrer_id = $carrer[0]->id;
            } else {
                $foto->carrer_id = $request->id_carrer;
            }
            try {
                $foto->save();
				$msg = 'codes.pic_200';
                $response = Response::json(array("status" => "ok", "data" => Lang::get('codes.pic_200')), 200, Utils::$headers, JSON_UNESCAPED_UNICODE);
                Log::info("Noticia afegida correctament");
            } catch (PDOException $ex) {
                //en cas d'error fem rollback i preparem la resposta amb l'error
                Log::error("Hi ha hagut un error al intentar afegir la foto");
				$msg = 'codes.pic_error';
                $response = Response::json(array("errors" => array(['code' => 404, 'message' => Lang::get('codes.pic_error')])), 400, Utils::$headers, JSON_UNESCAPED_UNICODE);
                DB::rollBack();
            }

        }
        if($msg!=null){
            Session::flash('response',$msg);
        }

        return redirect("/".session('lang')."/afegirFoto");
    }

    /**
     * Mètode que ens retorna un array amb els identificadors de les 12 fotos mes recents per a un carrer determinat
     * @param $lang
     * @param $id identificador del carrer el cual volem obtindre les seves fotos
     * @return array|string
     */
    public function carrerfoto($lang,$id)
    {
        $this->middleware('auth');
        //DB::connection()->enableQueryLog();
        $carrer = DB::table('fotos')->where("carrer_id", "=", $id)->orderBy('created_at', "DESC")->select("fotos.id")->take(12)->get();
        //Log::info(DB::getQueryLog());

        for($i=0;$i<12&&$i<sizeof($carrer);$i++){
            $array[]=$carrer[$i]->id;
        }

        $array=json_encode($array);
        return $array;
    }
}
