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

            <br><div>
            <div class="fb-share-button" data-href="{{App::make('url')->to('/'.App::getLocale().'/noticia/view/'.$noticia->id)}}?p[title]=$noticia->ntitol" data-layout="button" data-mobile-iframe="true"></div>
            <div><a href="https://twitter.com/share?text={{$noticia->ntitol}}&url={{App::make('url')->to('/'.App::getLocale().'/noticia/view/'.$noticia->id)}}" class="twitter-share-button">Compartir en Twitter</a></div>
            </div>
            </div>
        </div>
        <br><br>
    @endforeach

    {{$noticies->render()}}

</div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
@endsection