@extends('layouts.app')
@section('head')
    <title>Modificar Tipus</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form method="POST" action="/tipusevent/{{ $tipus_event->id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

        <label>Tipus</label><br>
        <input class="form-control" type="text" name="tipus" value="{{$tipus_event->tipus}}"/><br>

        <button class="btn btn-success">Guardar</button>
    </form>

    @endsection