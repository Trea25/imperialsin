@extends('layouts.app')
@section('head')
    <title>Events Pendents</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <table>
    @foreach($events as $event)
            <tr><td>{{$event->etitol}}</td><td><a href="event/{{$event->id}}/edit"><button class="btn btn-warning">Editar</button></a></td></tr>
    @endforeach
    </table>
@endsection