@extends('layouts.app')
@section('head')
    <title>Afegir Event</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form action="/event" method="POST">
        {{ csrf_field() }}
        <label>Titol de Event</label><input class="form-control" class="form-control" id="etitol" name="etitol" type="text" />


            <label>Tipus Event</label>
            <select class="form-control" name="tipus_id">
                <option value="0" selected>Selecciona el tipus</option>
                @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->tipus}}</option>
                @endforeach
            </select>
        <label>Data (dd/mm/yyyy)</label>
        <input class="form-control" type="date" name="data"/>
        <label>Hora (hh:mm)</label>
        <input class="form-control" type="text" name="hora"/>
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