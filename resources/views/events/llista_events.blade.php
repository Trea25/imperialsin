@extends('layouts.app')
@section('head')
    <title>{{trans('messages.ev_list')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <table>
        @foreach($events as $event)
            <tr><td>{{$event->etitol}} - {{$event->created_at}}</td><td><a href="event/{{$event->id}}/edit"><button class="btn btn-warning">{{trans('messages.edit')}}</button></a></td></tr>
        @endforeach
    </table>

    {{$events->render()}}
@endsection