@extends('layouts.app')

@section('content')

    <table>

    @foreach ($carrers as $carrer)
        <tr><td>{{$carrer->cnom}}</td><td><a href="carrer/{{$carrer->id}}/edit"><button class="btn btn-warning">Editar</button></a></td></tr>
    @endforeach

    </table>
@endsection