@extends('layouts.app')

@section('head')
    <title>Noticies</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')
<div class="container">

    @foreach ($noticies as $noticia)
        <div style="margin-top: 5%" class="row">
            <div style="padding-top: 7%" class="col-sm-4">
            <img class="img img-responsive" src="/foto/{{$noticia->foto_id}}">
                </div>
            <div class="col-sm-8">
            <titol>{{$noticia->ntitol}}</titol><br>
             <date>{{ trans('messages.posted_at') }} {{ $noticia->created_at }}</date>
            <br><br>
            {!! $noticia->ndesc !!}

            <br>
            <div class="fb-share-button" data-href="http://google.es" data-layout="button" data-mobile-iframe="true"></div>
            </div>
        </div>
    @endforeach

    {{$noticies->render()}}

</div>
@endsection