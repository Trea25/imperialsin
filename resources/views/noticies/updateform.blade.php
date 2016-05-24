@extends('layouts.app')

@section('head')
    <title>Modificar Noticia</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, target-densitydpi=device-dpi'>
    <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script src='{{URL::asset('js/guillotine/jquery.guillotine.js')}}'></script>
    <script src='{{URL::asset('js/guillotine/jquery.mousewheel.min.js')}}'></script>
    <link href='{{URL::asset('css/guillotine/jquery.guillotine.css')}}' media='all' rel='stylesheet'>
    <script src='{{URL::asset('js/guillotine/jquery.guillotine_startup.js')}}'></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>


@endsection
@section('content')
    {!! Form::open(array('url' => '/noticia/'.$noticia->id, 'files' => true)) !!}
    {{Form::token()}}
    {{ method_field('PUT') }}
    <div id="theparent" style="width: 30%;">
        <img style="width:100%" id="thepicture" src='/foto/{{$noticia->foto_id}}'/>
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

        <input type="text" id='x' name="x"/>
        <input type="text" id='y' name="y"/>
        <input type="text" id='w' name="w"/>
        <input type="text" id='h' name="h"/>
        <input type="text" id='scale' name="scale"/>
        <input type="hidden" id='angle' name="angle"/>
    </div>


    <label>Titol</label><br>
    <input onchange="valtitol(this.value)" type="text" class="form-control" name="ntitol" value="{{$noticia->ntitol}}"/><br>
    <div hidden id="titol">aa</div>

    <label>Descripcio</label><br>
    <textarea id="textarea" class="form-control" name="ndesc" cols="80" rows="8">{{$noticia->ndesc}}</textarea>


    <label>Carrer</label><br>
    <select class="form-control" name="carrer_id">
        @foreach($carrers as $carrer)
            @if($carrer->id==$noticia->carrer_id)
                <option selected value="{{$carrer->id}}">{{$carrer->cnom}}</option>
            @else
                <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
            @endif
        @endforeach
    </select><br>

    <label>Aprovar <input name="nactiu" type="checkbox" @if ($noticia->nactiu) checked @endif/></label><br>

    <button class="btn btn-success">Guardar</button>
    </form>
    <form method="POST" action="/noticia/{{ $noticia->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger">Eliminar</button>
    </form>
@endsection