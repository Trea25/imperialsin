@extends('layouts.app')
@section('head')
    <title>{{trans('messages.edit_street')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form method="POST" action="/carrer/{{ $carrer->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label>{{trans('messages.name')}}</label><br>
        <input onchange="valcnom(this.value)" type="text" name="cnom" value="{{$carrer->cnom}}"/><br>
        <div class="errorval" hidden id="cnom">{{trans("messages.valnom")}}</div>
        <label>{{trans('messages.desc')}}</label><br>
        <textarea cols="120" rows="20" id="textarea" name="cdescripcio">{{$carrer->cdescripcio}}</textarea><br>
        <label>{{trans('messages.i_year')}}</label><br>
        <input onchange="valany(this.value)" type="text" name="cany_inici" value="{{$carrer->cany_inici}}"/><br>
        <div class="errorval" hidden id="any">{{trans("messages.valany")}}</div>
        <label>{{trans('messages.fb')}}</label><br>
        <input onchange="valface(this.value)" type="text" name="cfacebook" value="{{$carrer->cfacebook}}"/><br>
        <div class="errorval" hidden id="face">{{trans("messages.valface")}}</div>
        <label>{{trans('messages.tw')}}</label><br>
        <input onchange="valtwitter(this.value)" type="text" name="ctwitter" value="{{$carrer->ctwitter}}"/><br>
        <div class="errorval" hidden id="twitter">{{trans("messages.valtwitter")}}</div>
        <label>{{trans('messages.ins')}}</label><br>
        <input onchange="valins(this.value)" type="text" name="cinstagram" value="{{$carrer->cinstagram}}"/><br>
        <div class="errorval" hidden id="ins">{{trans("messages.valins")}}</div>
        <button class="btn btn-success">{{trans('messages.send')}}</button>
    </form>
@endsection