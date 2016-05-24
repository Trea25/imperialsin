@extends('layouts.app')

@section('content')


    <meta name='viewport' content='width=device-width, initial-scale=1.0, target-densitydpi=device-dpi'>
    <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script src='{{URL::asset('js/guillotine/jquery.guillotine.js')}}'></script>
    <script src='{{URL::asset('js/guillotine/jquery.mousewheel.min.js')}}'></script>

    <link href='{{URL::asset('css/guillotine/jquery.guillotine.css')}}' media='all' rel='stylesheet'>
    <script src='{{URL::asset('js/guillotine/jquery.guillotine_startup.js')}}'></script>

    <div class="separador"></div>

    {!! Form::open(array('url' => 'noticia', 'files' => true)) !!}
    {{Form::token()}}
    <div id="theparent" style="width: 30%;">

        <img style="width:100%" id="thepicture" src='{{URL::asset('img/Fotos/default.png')}}'/>
    </div>
    <div id='controls'>
        <button id='rotate_left' type='button' title='Rotate left'> &lt; </button>
        <button id='zoom_out' type='button' title='Zoom out'> -</button>
        <button id='fit' type='button' title='Fit image'> [ ]</button>
        <button id='zoom_in' type='button' title='Zoom in'> +</button>
        <button id='rotate_right' type='button' title='Rotate right'> &gt; </button>
    </div>
    <input type="file" name="foto" id="inputImg">

    <div id='data'>

        <input type="hidden" id='x' name="x"/>
        <input type="hidden" id='y' name="y"/>
        <input type="hidden" id='w' name="w"/>
        <input type="hidden" id='h' name="h"/>
        <input type="hidden" id='scale' name="scale"/>
        <input type="hidden" id='angle' name="angle"/>
    </div>

    <label>Titol de Noticia</label><input class="form-control" class="form-control" id="ntitol" name="ntitol" type="text"/>
    <label>Descripció</label>
    <textarea class="form-control" id="textarea" name="ndesc"></textarea>
    @if(Auth::id()==1)
        <label>Carrer</label>
        <select class="form-control" name="id_carrer">
            <option value="0" selected>Selecciona el carrer</option>
            @foreach($carrers as $carrer)
                <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
            @endforeach
        </select>
    @endif
    <br/>
    <label>Publicar en : </label><br/>
    <!-- Faltará ocultar los checkbox con un style="display:none" -->
    <label><input type="checkbox" class="form-control" name="twitter" id="Twitter" ><img width="50" height="50" src="/img/Twitter-Logo-2.png"  onclick="select(this,'Twitter');"></img></label>
   <br /><br />
    <button type="submit" id="afegirnoticia" class="btn btn-success">Enviar</button>
    <button href="/administracio" class="btn btn-danger">Tornar</button>
    {!! Form::close() !!}

    @endsection
<script src='{{URL::asset('js/guillotine/jquery.init_guillotine.js')}}'></script>
<script>

    function select(img, id) {
        if (!document.getElementById(id).checked) {
            img.src = '/img/' + id + '-Logo.png';
            //alert ("checked");
        }
        else {
            img.src = '/img/' + id + '-Logo-2.png';
            //  alert("unchecked");
        }
    }
</script>