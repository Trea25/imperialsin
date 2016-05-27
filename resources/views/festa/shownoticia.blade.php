@extends('layouts.app')

@section('content')

    <div class="container">
        <div style="text-align: center" class="row">
            <titol>{{$noticia->ntitol}}</titol>
            <br />
            <date>{{ trans('messages.posted_at') }} {{ $noticia->created_at }}</date>
        </div>
        <div class="row">
            <div style="margin-top:4%" class="col-md-4">
           @if ($noticia->foto_id != 0)
                <img class="img img-responsive" src="/foto/{{$noticia->foto_id}}" />
            @endif
            </div>
            <div class="col-sm-8">


            <br><br>
            <desc>{{ $noticia->ndesc }}<desc>

                <br><br /><br />
                <div class="fb-share-button" data-href="http://google.es" data-layout="button" data-mobile-iframe="true"></div>

               <a href="https://twitter.com/share" class="twitter-share-button">Compartir</a>
            </div>
        </div>
    </div>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

@endsection