@extends('layouts.app')
@section('head')
    <title>Modificar Event</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form method="POST" action="/event/{{ $event->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>Titol</label><br>
        <input onchange="valtitol(this.value)" class="form-control" type="text" name="etitol" value="{{$event->etitol}}"/><br>
        <div hidden id="titol"></div>

        <label>Tipus Event</label><br>
        <select class="form-control" name="tipus_id">
            @foreach($tipusevents as $tipus)
                @if($tipus->id==$event->tipus_id)
                    <option selected value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                @else
                <option value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                @endif
            @endforeach
        </select><br>

        <label>Dia (dd/mm/yyyy)</label><br>
        <input onchange="valdata(this.value)" class="form-control" type="text" name="data" value="{{$data}}"/><br>
        <div hidden id="data">aa</div>

        <label>Hora (hh:mm)</label><br>
        <input onchange="valhora(this.value)" class="form-control" type="text" name="hora" value="{{$hora}}"/><br>
        <div hidden id="hora">aa</div>

        <label>Carrer</label><br>
        <select class="form-control" name="carrer_id">
            @foreach($carrers as $carrer)
                @if($carrer->id==$event->carrer_id)
                    <option selected value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                @else
                <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                @endif
            @endforeach
        </select><br>


        <label>Aprovar <input name="eactiu" type="checkbox" @if ($event->eactiu) checked @endif/></label><br>

        <button class="btn btn-success">Guardar</button>
    </form>
    <form method="POST" action="/event/{{ $event->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger">Eliminar</button>
    </form>
@endsection