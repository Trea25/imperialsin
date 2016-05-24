@extends('layouts.app')
@section('head')
    <title>Modificar carrer</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form method="POST" action="/carrer/{{ $carrer->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label>Nom</label><br>
        <input onchange="valcnom(this.value)" type="text" name="cnom" value="{{$carrer->cnom}}"/><br>
        <div hidden id="cnom"></div>
        <label>Descripcio</label><br>
        <textarea cols="120" rows="20" id="textarea" name="cdescripcio">{{$carrer->cdescripcio}}</textarea><br>
        <label>Any inici</label><br>
        <input onchange="valany(this.value)" type="text" name="cany_inici" value="{{$carrer->cany_inici}}"/><br>
        <div hidden id="any"></div>
        <label>Facebook</label><br>
        <input onchange="valface(this.value)" type="text" name="cfacebook" value="{{$carrer->cfacebook}}"/><br>
        <div hidden id="face">aa</div>
        <label>Twitter</label><br>
        <input onchange="valtwitter(this.value)" type="text" name="ctwitter" value="{{$carrer->ctwitter}}"/><br>
        <div hidden id="twitter">aa</div>
        <label>Instagram</label><br>
        <input onchange="valins(this.value)" type="text" name="cinstagram" value="{{$carrer->cinstagram}}"/><br>
        <button class="btn btn-success">Enviar</button>
        <div hidden id="ins">aa</div>
    </form>
@endsection