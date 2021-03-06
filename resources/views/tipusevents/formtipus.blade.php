@extends('layouts.app')
@section('head')
    <title>{{trans('messages.add_type')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.add_type')}}</legend>
                <form action="/tipusevent" method="POST">
                    {{ csrf_field() }}
                    <label>{{trans('messages.ev_name')}}</label><br><br>
                    <input onchange="valtipus(this.value)" class="form-control" name="tipus" type="text"/><br>
                    <div class="errorval" hidden id="tipus">{{trans("messages.valnom")}}</div><br>
                    <button class="btn btn-success" type="submit">{{trans('messages.send')}}</button>
                </form>
                </fieldset>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection
