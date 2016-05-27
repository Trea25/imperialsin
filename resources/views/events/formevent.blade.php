@extends('layouts.app')
@section('head')
    <title>{{trans('messages.Add_event')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form action="/event" method="POST">
        {{ csrf_field() }}
        <label>{{trans('messages.ev_title')}}</label><input onchange="valtitol(this.value)" class="form-control" class="form-control" id="etitol" name="etitol" type="text" />
        <div hidden id="titol"></div>

            <label>{{trans('messages.ev_type')}}</label>
            <select class="form-control" name="tipus_id">
                <option value="0" selected>{{trans('messages.ev_select_type')}}</option>
                @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->tipus}}</option>
                @endforeach
            </select>
        <label>{{trans('messages.date')}} (dd/mm/yyyy)</label>
        <input onchange="valdata(this.value)" class="form-control" type="date" name="data"/>
        <div hidden id="data" class="error">aa</div>
        <label>{{trans('messages.time')}} (hh:mm)</label>
        <input onchange="valhora(this.value)" class="form-control" type="text" name="hora"/>
        <div hidden id="hora">aa</div>
        @if(Auth::id()==1)
            <label>Carrer</label>
            <select class="form-control" name="id_carrer">
                <option value="0" selected>{{trans('messages.ev_select_street')}}</option>
                @foreach($carrers as $carrer)
                    <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                @endforeach
            </select>
        @endif


        <button type="submit" id="afegirnoticia" class="btn btn-success">{{trans('messages.send')}}</button>
        <button href="/administracio" class="btn btn-danger">{{trans('messages.back')}}</button>
    </form>
@endsection