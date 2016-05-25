@extends('layouts.app')
@section('head')
    <title>{{trans('messages.Add_type')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form action="/tipusevent" method="POST">
        {{ csrf_field() }}
        <label>{{trans('messages.ev_name')}}</label><br>
        <input onchange="valtipus(this.value)" class="form-control" name="tipus" type="text"/><br>
        <div hidden id="tipus"></div>
        <button class="btn btn-success" type="submit">{{trans('messages.send')}}</button>
    </form>
@endsection
