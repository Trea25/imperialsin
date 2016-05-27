<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/festa.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <!-- icono -->
    <link href="{{URL::asset('img/logo.png')}}" rel="shortcut icon" type="image/x-icon"/>

    @yield('head')
</head>

<body>

    @if (Auth::id() != null)
<div id="wrapper">
  <!-- Sidebar -->
        <div id="sidebar-wrapper" >
            <ul class="sidebar-nav accordion" id="leftMenu">
                <li class="sidebar-brand">    
                     <a href='#' class="menu-toggle">   {{ trans('messages.Menu_admin') }}  </a>
                </li>
                <!-- Noticies -->
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_news">
                            {{ trans('messages.Menu_news') }} <span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_news" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/noticia/create"> {{ trans('messages.Add_news') }}</a></li>
                                <li> <a href="/llistanoticies"> {{ trans('messages.Allnews') }}</a></li>
                                <li> <a href="/llistanoticiespen">{{ trans('messages.pending_news') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- Events -->           
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_event">
                           {{ trans('messages.events') }}  <span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_event" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/event/create"> {{ trans('messages.Add_event') }}</a></li>
                                <li> <a href="/llistaevents"> {{ trans('messages.All_event') }}</a></li>
                                <li> <a href="/llistaeventspen">{{ trans('messages.pending_events') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                 <!-- Tipus -->
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_types">
                             {{ trans('messages.event_type') }}<span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_types" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/tipusevent/create"> {{ trans('messages.add_type') }}</a></li>
                                <li> <a href="/llistatipus"> {{ trans('messages.all_types') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>     
                <!-- Other -->
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_other">
                             {{ trans('messages.other') }}<span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_other" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/llistacarrers"> {{ trans('messages.edit_street') }}</a></li>
                                <li> <a href="/afegirFoto"> {{ trans('messages.add_pic') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
        
        
        
        
        
        
  <!-- sidebar end -->
         @else
<div>
         @endif
<div id='cssmenu'>
    <ul>
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <a href="{!! str_replace('/'.App::getLocale(),'/'.$lang,URL::current()) !!}"><img width="40"
                                                                                                  src="{{URL::asset('img/'.$lang.'.png')}}"><span>  </span></img>
                </a>

            @endif
        @endforeach
         @if (Auth::id() != null)
            <li class='admin'><a href='#' class="menu-toggle">{{ trans('messages.Menu_admin') }}</a></li>
        @endif
        <li class='last'><a
                    href='/{{App::getlocale()}}/carrerinfo'><span>{{ trans('messages.Menu_streets') }}</span></a></li>
        <li><a href='/{{App::getlocale()}}/search'><span>{{ trans('messages.Menu_prog') }}</span></a></li>
        <li><a href='/{{App::getlocale()}}/noticies'><span>{{ trans('messages.Menu_news') }}</span></a></li>
        <li><a href='/{{App::getlocale()}}/'><span>{{ trans('messages.Menu_home') }}</span></a></li>
       
    </ul>
</div>
<div class="separador"></div>

 @if (Auth::id() != null)
    <div id="page-content-wrapper">
    <div class="container-fluid">
 @endif
            <div class="row">
                    @include('errors.errors')
                    @yield('content')
            </div>
    @if (Auth::id() != null)
    </div>
    </div> <!-- /#page-content-wrapper -->
    @endif

@include('festa.footer')
</div>     <!-- /#wrapper -->

<!-- Editor text Nicedit-->
<script src="{{URL::asset('js/nicEdit-latest.js')}}" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(function () {
        editor = new nicEditor({buttonList: ['fontSize', 'bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'subscript', 'superscript', 'strikethrough', 'indent', 'outdent', 'hr', 'forecolor', 'bgcolor', 'link', 'unlink', 'fontSize', 'fontFamily', 'fontFormat']}).panelInstance('textarea');
    });
</script>
  @if (Auth::id() != null)
 <!-- Menu Toggle Script -->
    <script>
    $(".menu-toggle").click(function(e) {
       // e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    @endif
    </script>
@yield('mytree')
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/script.js')}}"></script>

</body>
</html>