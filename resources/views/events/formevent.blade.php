@extends('layouts.app')
@section('head')
    <title>{{trans('messages.Add_event')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.Add_event')}}</legend>
                        <form action="/event" method="POST">
                            {{ csrf_field() }}
                            <label>{{trans('messages.ev_title')}}</label><br><br>
                            <input onchange="valtitol(this.value)" class="form-control" class="form-control" id="etitol" name="etitol" type="text" /><br>
                            <div hidden class="errorval" id="titol">{{trans("messages.valtitol")}}</div><br>

                                <label>{{trans('messages.ev_type')}}</label><br><br>
                                <select class="form-control" name="tipus_id">
                                    <option value="0" selected>{{trans('messages.ev_select_type')}}</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->tipus}}</option>
                                    @endforeach
                                </select><br><br>
                            <label>{{trans('messages.date')}} (dd/mm/yyyy)</label><br><br>
                            <input onchange="valdata(this.value)" class="form-control" type="text" name="data"/><br>
                            <div class="errorval" hidden id="data">{{trans("messages.valdata")}}</div><br>
                            <label>{{trans('messages.time')}} (hh:mm)</label><br><br>
                            <input onchange="valhora(this.value)" class="form-control" type="text" name="hora"/><br>
                            <div class="errorval" hidden id="hora">{{trans("messages.valhora")}}</div><br>
                            @if(Auth::id()==1)
                                <label>Carrer</label><br><br>
                                <select class="form-control" name="id_carrer">
                                    <option value="0" selected>{{trans('messages.ev_select_street')}}</option>
                                    @foreach($carrers as $carrer)
                                        <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                                    @endforeach
                                </select><br><br>
                            @endif


                            <button type="submit" id="afegirnoticia" class="btn btn-success">{{trans('messages.send')}}</button>
                            <button href="/administracio" class="btn btn-danger">{{trans('messages.back')}}</button>
                        </form>
                </fieldset>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection