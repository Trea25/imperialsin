@extends('layouts.app')

@section('head')
    <title>{{ trans('messages.Menu_news')}}</title>

    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')
    <div class="container">

        @foreach ($noticies as $noticia)

            <div class="row noticia" style="text-align:center">
                <div class="col-sm-4">
				<a href="/noticia/view/{{$noticia->id}}">
                    <img class="img img-responsive" src="/foto/{{$noticia->foto_id}}">
				</a>
                </div>
                <div class="col-sm-8 text-left">
                    <titol class="text-marro">{{$noticia->ntitol}}</titol>
                    <br>
                    <date class="text-marro">{{ trans('messages.posted_at') }} {{ $noticia->created_at }}</date>
                </div>
                <div class="col-sm-8 body-noticia text-left -align-justify text-marro">
                    {!! $noticia->ndesc !!}
                    <br /><br /><br />
                    <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-2"> <span style="height:25px" class="fb-share-button"
                                                 data-href="{{App::make('url')->to('/'.App::getLocale().'/noticia/view/'.$noticia->id)}}?p[title]=$noticia->ntitol"
                                                 data-layout="button" data-mobile-iframe="true">

                        </span>
                    </div>

                    <div class="col-xs-2 col-sm-1">
                            <span><a style="height:25px"
                                     href="https://twitter.com/share?text={{$noticia->ntitol}}&url={{App::make('url')->to('/'.App::getLocale().'/noticia/view/'.$noticia->id)}}"
                                     class="twitter-share-button"></a>
                        </span>
                    </div>
                    <span class="leer-mas-b pull-right"><a
                                    href="/noticia/view/{{$noticia->id}}">{{trans('messages.moar')}}</a></span>

                </div>
                </div>
                
                <div class="row">
                        
                    
                </div>
            </div>


        @endforeach

        <div class="text-center">{{$noticies->render()}}</div>

    </div>
    <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'twitter-wjs');</script>
@endsection