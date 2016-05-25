<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/festa.css')}}" rel="stylesheet">

    <!-- icono -->
    <link href="{{URL::asset('img/logo.png')}}" rel="shortcut icon" type="image/x-icon"/>

    @yield('head')
</head>

<body>

<div id='cssmenu'>
    <ul>
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <a href="{!! str_replace('/'.App::getLocale(),'/'.$lang,URL::current()) !!}"><img width="40"
                                                                                                  src="{{URL::asset('img/'.$lang.'.png')}}"><span>  </span></img>
                </a>

            @endif
        @endforeach
        <li class='last'><a
                    href='/{{App::getlocale()}}/carrerinfo'><span>{{ trans('messages.Menu_streets') }}</span></a></li>
        <li><a href='/{{App::getlocale()}}/search'><span>{{ trans('messages.Menu_prog') }}</span></a></li>
        <li><a href='/{{App::getlocale()}}/noticies'><span>{{ trans('messages.Menu_news') }}</span></a></li>
        <li><a href='/{{App::getlocale()}}/'><span>{{ trans('messages.Menu_home') }}</span></a></li>
        @if (Auth::id() != null)
            <li class='admin'><a href='/{{App::getlocale()}}/administracio'>{{ trans('messages.Menu_admin') }}</a></li>
        @endif
    </ul>
</div>

<div class="separador"></div>
@include('errors.errors')
@yield('content')


<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/script.js')}}"></script>

<!-- Editor text Nicedit-->
<script src="{{URL::asset('js/nicEdit-latest.js')}}" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(function () {
        editor = new nicEditor({buttonList: ['fontSize', 'bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'subscript', 'superscript', 'strikethrough', 'indent', 'outdent', 'hr', 'forecolor', 'bgcolor', 'link', 'unlink', 'fontSize', 'fontFamily', 'fontFormat']}).panelInstance('textarea');
    });
</script>

@yield('mytree')

@include('festa.footer')

</body>
</html>