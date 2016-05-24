@extends('layouts.app')

@section('head')
    <title>Festa Major de Sants</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <link href="{{URL::asset('css/twitter.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container-fluid main">
        <div class="row">
            <div class="col-sm-12 nopadding nomargin">
                <img class="img img-responsive" src="{{URL::asset('img/tmp/descarga.jpg')}}"/>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        @foreach ($noticies as $noticia)
                            <div style="background-color:#FFFFFF;">
                        <div class="col-md-2">
                            @if ($noticia->foto_id != null)
                                <img class="img img-responsive" src="/foto/{{$noticia->foto_id}}"/>
                            @endif
                        </div>
                        <div class="col-md-4" style="background:#EEAC3A;border-radius:10px;">
                            <h1>{{$noticia->ntitol}}</h1>
                            <p>{{$noticia->ndesc}}</p>
                        </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="background:#EEAC3A;border-radius:10px;">
                <a class="twitter-timeline" href="https://twitter.com/FMSants" data-widget-id="732986056497324033"
                   data-chrome="nofooter noborders noborder transparent noscroll">Tweets por el @FMSants.</a>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");</script>
            </div>
        </div>
    </div>

    <!--<div class="col-md-9">

            @foreach ($noticies as $noticia)
            <div class="col-md6">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">

            </div>
            <div class="col-md-8">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="col-sm-4 col-md-3 twitter-container" style="background:#EEAC3A;border-radius:10px;">
                <a class="twitter-timeline" href="https://twitter.com/FMSants" data-widget-id="732986056497324033"
                   data-chrome="nofooter noborders noborder transparent noscroll">Tweets por el @FMSants.</a>
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
        </div>
    </div>
    </div>-->




@endsection