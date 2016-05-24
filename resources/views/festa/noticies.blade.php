@extends('layouts.app')

@section('head')
    <title>Noticies</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')


    @foreach ($noticies as $noticia)
        <h3>{{$noticia->ntitol}}</h3>
        {{ $noticia->created_at }}
        <br><br>
        {{ $noticia->ndesc }}

        <br>
        <div class="fb-share-button" data-href="http://google.es" data-layout="button" data-mobile-iframe="true"></div>
        <br>
    @endforeach

    {{$noticies->render()}}

@endsection