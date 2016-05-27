@extends('layouts.app')

@section('head')
    <title>Noticies</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')
<div class="container">

    @foreach ($noticies as $noticia)
        <div class="row" style="text-align:center">
            <titol>{{$noticia->ntitol}}</titol><br>
            <date>{{ trans('messages.posted_at') }} {{ $noticia->created_at }}</date>
        </div>
    <br>
        <div class="row">
            <div  class="col-sm-4">
            <img class="img img-responsive" src="/foto/{{$noticia->foto_id}}">
                </div>
            <div class="col-sm-8">


            {!! $noticia->ndesc !!}

            <br>
            <div class="fb-share-button" data-href="http://google.es" data-layout="button" data-mobile-iframe="true"></div>
            </div>
        </div>
        <br><br>
    @endforeach

    {{$noticies->render()}}

</div>
@endsection