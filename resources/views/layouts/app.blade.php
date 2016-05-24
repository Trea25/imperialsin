<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{URL::asset('css/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/festa.css')}}" rel="stylesheet">
    
    <!-- icono -->
    <link href="{{URL::asset('img/logo.png')}}" rel="shortcut icon" type="image/x-icon" />

    @yield('head')
</head>

<body>

<div id='cssmenu'>
    <ul>
        <li class='last'><a href='/carrerinfo'><span>Carrers</span></a></li>
        <li><a href='/search'><span>Activitats i programa</span></a></li>
        <li><a href='/noticies'><span>Noticies</span></a></li>
        <li><a href='/'><span>Pàgina Principal</span></a></li>
        <li class='admin'><a href='/administracio'>Administració</a></li>
    </ul>
</div>
<div class="separador"></div>
@include('errors.errors')
@yield('content')



<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/script.js')}}"></script>

<!-- Editor text Nicedit-->
<script src="{{URL::asset('js/nicEdit-latest.js')}}" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() {
        editor= new nicEditor({buttonList : ['fontSize','bold','italic','underline','left','center','right','justify','ol','ul','subscript','superscript','strikethrough','indent','outdent','hr','forecolor','bgcolor','link','unlink','fontSize','fontFamily','fontFormat']}).panelInstance('textarea');
        });
</script>

@yield('mytree')



</body>
</html>