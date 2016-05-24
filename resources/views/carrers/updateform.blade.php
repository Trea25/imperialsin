@extends('layouts.app')

@section('content')

    <form method="POST" action="/carrer/{{ $carrer->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label>Nom</label><br>
        <input type="text" name="cnom" value="{{$carrer->cnom}}"/><br>
        <label>Descripcio</label><br>
        <textarea cols="120" rows="20" id="textarea" name="cdescripcio">{{$carrer->cdescripcio}}</textarea><br>
        <label>Any inici</label><br>
        <input type="text" name="cany_inici" value="{{$carrer->cany_inici}}"/><br>
        <label>Facebook</label><br>
        <input type="text" name="cfacebook" value="{{$carrer->cfacebook}}"/><br>
        <label>Twitter</label><br>
        <input type="text" name="ctwitter" value="{{$carrer->ctwitter}}"/><br>
        <label>Instagram</label><br>
        <input type="text" name="cinstagram" value="{{$carrer->cinstagram}}"/><br>
        <button class="btn btn-success">Enviar</button>
    </form>
@endsection