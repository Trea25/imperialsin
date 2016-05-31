@extends('layouts.app')
@section('head')
    <title>{{trans('messages.list_street')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="linea"></div>
        <div class="linea"></div>
        <div class="linea"></div>
        <div class="linea"></div>


        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <table class="table table-striped"><thead><tr><th>{{trans('messages.name')}}</th><th>{{trans('messages.edit')}}</th></tr></thead>

                @foreach ($carrers as $carrer)
                    <tr><td>{{$carrer->cnom}}</td><td><a href="carrer/{{$carrer->id}}/edit"><button class="btn btn-primary"><i class="fa fa-edit fa-lg"/></button></a></td></tr>
                @endforeach

                </table>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection