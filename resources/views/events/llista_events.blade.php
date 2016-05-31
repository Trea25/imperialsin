@extends('layouts.app')
@section('head')
    <title>{{trans('messages.ev_list')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="linea"></div>
        <div class="linea"></div>
        <div class="linea"></div>
        <div class="linea"></div>
    <div class="row">

        <div class="col-md-12">
            <table class="table table-striped"><thead><tr><th>{{trans('messages.name')}}</th><th>{{trans('messages.date')}}</th><th>{{trans('messages.Street')}}</th><th>{{trans('messages.edit')}}</th></tr></thead>
            @foreach($events as $event)
                <tr><td>{{$event->etitol}}</td><td>{{$event->edata_inici}}</td><td>{{$event->cnom}}</td><td><a href="event/{{$event->id}}/edit"><button class="btn btn-primary"><i class="fa fa-edit fa-lg"/></button></a></td></tr>
            @endforeach
            </table>
        </div>

    </div>
    </div>

    {{$events->render()}}
@endsection