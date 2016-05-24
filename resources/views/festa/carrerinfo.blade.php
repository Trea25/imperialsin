@extends('layouts.app')

@section('head')
    <title>Carrers</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <link href="{{URL::asset('css/mdp.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/prettify.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/maparea.css')}}" rel="stylesheet">

@endsection

@section('content')


<div class="container">
    <div class="flex">
        <canvas id='Canvas'></canvas>
        <img src="./img/mapa.png" usemap="#imgmap" id="mapimg" >
        <map id="imgmap" name="imgmap">
            <area shape="poly" id="4" alt="Roses" name="Roses"  href="#" title="Roses" coords="128,7,182,36,182,41,178,42,124,11,126,8" onclick="showcarrer(this)" />
            <area shape="poly" id="10" alt="Papin" name="Papin"  href="#" title="Papin" coords="206,87,220,66,224,67,224,73,213,90,209,90" onclick="showcarrer(this)" />
            <area shape="poly" id="8" alt="Galileu" name="Galileu"  href="#"  title="Galileu" coords="257,137,297,55,299,55,302,59,262,141,258,141" onclick="showcarrer(this)"/>
            <area shape="poly" id="16" alt="Vallespir"  href="#" name="Vallespir" title="Vallespir" coords="380,78,399,28,402,27,404,32,386,81,382,83" onclick="showcarrer(this)" />
            <area shape="poly" id="2" alt="Alcolea  de Dalt" href="#"  name="Alcolea_Dalt" title="Alcolea_Dalt" coords="320,67,287,134,290,138,294,135,327,70,324,65,324,66"    onclick="showcarrer(this)" />
            <area shape="poly" id="11" alt="Sta. Cecilia"  href="#" name="Sta_Cecilia" title="Sta_Cecilia" coords="330,128,302,120,299,126,328,134,332,132" onclick="showcarrer(this)" />
            <area shape="poly" id="13" alt="Robrenyo"  href="#" name="Robrenyo" title="Robrenyo" coords="464,85,530,108,530,112,527,114,460,91,461,87"  onclick="showcarrer(this)" />
            <area shape="poly" id="5" alt="Canalejas"  href="#" name="Canalejas" title="Canalejas" coords="50,177,54,177,87,199,86,203,83,204,49,181,50,178" onclick="showcarrer(this)" />
            <area shape="poly" id="3" alt="Alcolea de Baix"  href="#" name="Alcolea" title="Alcolea" coords="269,164,247,212,250,214,255,213,273,171,274,165" onclick="showcarrer(this)" />
            <area shape="poly" id="15" alt="Valladolid"  href="#" name="Valladolid"  title="Valladolid" coords="341,184,274,166,273,172,339,190" onclick="showcarrer(this)" />
            <area shape="poly" id="17" alt="Vallespir de Baix" href="#"  name="Vallespir_Baix" title="Vallespir_Baix" coords="335,201,353,153,357,151,359,155,342,202,337,204" onclick="showcarrer(this)" />
            <area shape="poly" id="6" alt="Finlandia"  href="#" name="Finlandia" title="Finlandia" coords="146,244,115,309,119,310,123,309,153,246,150,241" onclick="showcarrer(this)" />
            <area shape="poly" id="12" alt="Sagunt" name="Sagunt" href="#"  title="Sagunt" coords="20,338,77,323,76,327,76,329,23,345,19,342" onclick="showcarrer(this)" />
            <area shape="poly" id="14" alt="Rossend Arus" href="#"  name="Rossend_Arus" title="Rossend_Arus" coords="173,311,158,336,162,337,166,337,179,313,177,309" onclick="showcarrer(this)" />
            <area shape="poly" id="18" alt="Masnou" name="Masnou"  href="#" title="Masnou" coords="309,325,321,337,324,337,325,334,313,319,307,320" onclick="showcarrer(this)"/>
            <area shape="poly" id="9" alt="Guadiana" name="Guadiana" href="#"  title="Guadiana" coords="225,368,260,320,265,321,264,327,230,372,225,373" onclick="showcarrer(this)"/>
            <area shape="poly" id="7" alt="Plaça de la farga"  href="#" name="Placa_farga" title="Placa_farga" coords="143,362,111,432,114,435,118,434,149,366,147,362" onclick="showcarrer(this)"/>
        </map>
    </div>

</div>
<div id="result"></div>

<script src="{{URL::asset('js/jquery-ui-1.11.1.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/jquery-ui.multidatespicker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/prettify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/lang-css.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/mapa/image.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/mapa/maparea.js')}}" type="text/javascript"></script>


@endsection