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
                     <a href='#' class="menu-toggle"> <i class="fa fa-laptop" aria-hidden="true"></i> 
                     {{ trans('messages.Menu_admin') }} 
                     <i class="fa fa-arrow-right" aria-hidden="true"></i>
                     </a>
                </li>
                <!-- Noticies -->
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_news">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>  {{ trans('messages.Menu_news') }} <span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_news" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/noticia/create"> <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('messages.Add_news') }}</a></li>
                                <li> <a href="/llistanoticies"> <i class="fa fa-list" aria-hidden="true"></i> {{ trans('messages.Allnews') }}</a></li>
                                <li> <a href="/llistanoticiespen"> <i class="fa fa-question "></i> {{ trans('messages.pending_news') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- Events -->           
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_event">
                          <i class="fa fa-calendar" aria-hidden="true"></i> {{ trans('messages.events') }}  <span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_event" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/event/create"> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>  {{ trans('messages.Add_event') }}</a></li>
                                <li> <a href="/llistaevents"> <i class="fa fa-list" aria-hidden="true"></i> {{ trans('messages.All_event') }}</a></li>
                                <li> <a href="/llistaeventspen"> <i class="fa fa-check-square-o "></i> {{ trans('messages.pending_events') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                 <!-- Tipus -->
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_types">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('messages.event_type') }}<span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_types" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/tipusevent/create"> <i class="fa fa-plus-square-o" aria-hidden="true"></i> {{ trans('messages.add_type') }}</a></li>
                                <li> <a href="/llistatipus"> <i class="fa fa-list" aria-hidden="true"></i> {{ trans('messages.all_types') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>     
                <!-- Other -->
                <li class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#Menu_other">
                            <i class="fa fa-cog" aria-hidden="true"></i> {{ trans('messages.other') }}<span class="caret"></span>
                        </a>
                    </div>
                    <div id="Menu_other" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                            <ul>
                                <li> <a href="/llistacarrers"><i class="fa fa-map" aria-hidden="true"></i> {{ trans('messages.edit_street') }}</a></li>
                                <li> <a href="/afegirFoto"> <i class="fa fa-picture-o" aria-hidden="true"></i> {{ trans('messages.add_pic') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="separador"></div>
            <div><a href="/{{App::getLocale()}}/logout"><span><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> </span></a></div>
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
         @if (Auth::id() != null)
        <a href="/{{App::getLocale()}}/logout"><span><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></span></a>   
        @endif
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/script.js')}}"></script>

</body>
</html>