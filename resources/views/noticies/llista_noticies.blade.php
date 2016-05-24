@extends('layouts.app')

@section('head')
    <title>Llistat Noticies</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')
    <table>
        @foreach($noticies as $noticia)
            <tr><td>{{$noticia->ntitol}}</td><td><a href="noticia/{{$noticia->id}}/edit"><button class="btn btn-warning">Editar</button></a></td></tr>
        @endforeach
    </table>

    {{$noticies->render()}}
@endsection