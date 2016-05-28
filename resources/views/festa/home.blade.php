@extends('layouts.app')

@section('head')
    <title>Festa Major de Sants</title>
    <link href="{{URL::asset('css/reset.css')}}" rel="stylesheet" type="text/css">
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <link href="{{URL::asset('css/twitter.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 nopadding nomargin">
                <img class="img img-responsive" src="{{URL::asset('img/tmp/descarga.jpg')}}"/>
            </div>
        </div>
        <div class="linea"></div>
        <div class="col-md-9">
            @foreach ($noticies as $noticia)
                <div class="col-md-6" >
                    <div class="row noticia">
                        <div class="col-sm-5">
                            @if ($noticia->foto_id != null)
                                <a href="/noticia/view/{{$noticia->id}}"><img class="img img-responsive"
                                                                              src="/foto/{{$noticia->foto_id}}"/></a>
                            @endif
                        </div>
                        <div class="col-sm-7">
                            <div class="row" style="min-height:25%">
                                <h3 class="header-noticia text-marro">{{$noticia->ntitol}}</h3>
                                <p class="body-noticia -align-justify text-marro"
                                   style="backgrond:#FFFFFF !important;">{!! $noticia->ndesc !!}...</p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span class="leer-mas pull-right"><a href="/noticia/view/{{$noticia->id}}">Boto!</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            @endforeach
        </div>
        
        <div class="col-md-3">
            <div class="row twitter-container">
                <a class="twitter-timeline"
                   data-widget-id="732986056497324033"
                   href="https://twitter.com/FMSants"
                   data-screen-name="FMSants"
                   data-chrome="nofooter noborders transparent noborder ">
                    Tweets por el @FMSants<br/><center>
                    <img src="/img/loader.gif" width="50" /></center>
                </a>

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
    <script>
    window.setTimeout(function(){
        //Titulo "Tweets"
    $(".twitter-timeline").contents().find(".timeline-Header-title").css("color","#fff");
     //Titulo "by"
    $(".twitter-timeline").contents().find(".timeline-Header-byline").css("color","black");
     //Titulo @FMSants - link
    $(".twitter-timeline").contents().find(".customisable-highlight").css("color","red");
     //Icono Twitter
    //$(".twitter-timeline").contents().find(".timeline-Tweet-retweetCredit").append('<img src="/img/loader.gif" />');
    //$(".twitter-timeline").contents().find(".Icon--twitter").removeClass("Icon--twitter");
    
     // FMSants retweeted
    $(".twitter-timeline").contents().find(".timeline-Tweet-retweetCredit").css("color","white");
    // Autor
    $(".twitter-timeline").contents().find(".TweetAuthor").css("color","blue !important");
        //Autor : screenName @Comercial000
    $(".twitter-timeline").contents().find(".TweetAuthor-screenName").css("color","pink");
        //Texto Tweet
    $(".twitter-timeline").contents().find(".timeline-Tweet-text").css("color","blue");
        //Links
    $(".twitter-timeline").contents().find(".PrettyLink").css("color","green");
        //Hastags
    $(".twitter-timeline").contents().find(".hashtag").css("color","black");
        //Fecha
    $(".twitter-timeline").contents().find(".timeline-Tweet-timestamp").css("color","white");
        //Icon--share
    $(".twitter-timeline").contents().find(".Icon--share").css("color","pink");
         //TweetAction--<3
    $(".twitter-timeline").contents().find(".TweetAction--heart").css("color","pink");   
    
  }, 1000);
  </script>
@endsection

