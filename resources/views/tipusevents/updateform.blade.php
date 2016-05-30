@extends('layouts.app')
@section('head')
    <title>{{trans('messages.edit_type')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Afegir Tipus</legend>
            <form method="POST" action="/tipusevent/{{ $tipus_event->id }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <label>{{trans('messages.type')}}</label><br><br>
                <input onchange="valtipus(this.value)" class="form-control" type="text" name="tipus"
                       value="{{$tipus_event->tipus}}"/><br>
                <div hidden id="tipus"></div>
                <div class="form-group">
                    <button class="botoform btn btn-success pull-left">{{trans('messages.save')}}</button>
            </form>

            <form method="POST" action="/tipusevent/{{ $tipus_event->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger pull-left">{{trans('messages.delete')}}</button>

            </form>
    </fieldset>
                </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection