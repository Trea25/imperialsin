@extends('layouts.app')
@section('head')
    <title>Afegir Tipus</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <form action="/tipusevent" method="POST">
        {{ csrf_field() }}
        <label>Nom del Event</label><br>
        <input class="form-control" name="tipus" type="text"/><br>
        <button class="btn btn-success" type="submit">Envia</button>
    </form>
@endsection
