@extends('layouts.app')
@section('head')
    <title>Afegir Event</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form action="/event" method="POST">
        {{ csrf_field() }}
        <label>Titol de Event</label><input onchange="valtitol(this.value)" class="form-control" class="form-control" id="etitol" name="etitol" type="text" />
        <div hidden id="titol"></div>

            <label>Tipus Event</label>
            <select class="form-control" name="tipus_id">
                <option value="0" selected>Selecciona el tipus</option>
                @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->tipus}}</option>
                @endforeach
            </select>
        <label>Data (dd/mm/yyyy)</label>
        <input onchange="valdata(this.value)" class="form-control" type="date" name="data"/>
        <div hidden id="data">aa</div>
        <label>Hora (hh:mm)</label>
        <input onchange="valhora(this.value)" class="form-control" type="text" name="hora"/>
        <div hidden id="hora">aa</div>
        @if(Auth::id()==1)
            <label>Carrer</label>
            <select class="form-control" name="id_carrer">
                <option value="0" selected>Selecciona el carrer</option>
                @foreach($carrers as $carrer)
                    <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                @endforeach
            </select>
        @endif


        <button type="submit" id="afegirnoticia" class="btn btn-success">Enviar</button>
        <button href="/administracio" class="btn btn-danger">Tornar</button>
    </form>
@endsection