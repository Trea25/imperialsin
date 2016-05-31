@extends('layouts.app')
@section('head')
<script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@section('content')

    <table>

    @foreach ($carrers as $carrer)
        <tr><td>{{$carrer->cnom}}</td><td><a href="carrer/{{$carrer->id}}/edit"><button class="btn btn-warning">{{trans('messages.edit')}}</button></a></td></tr>
    @endforeach

    </table>
@endsection