@extends('layouts.app')

@section('head')
    <title>Carrers</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <link href="{{URL::asset('css/mdp.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/prettify.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/maparea.css')}}" rel="stylesheet">

@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
       <!-- <canvas id='Canvas'></canvas>-->
            <div class="mapa" id="mapcontainer">
                <canvas id='Canvas'></canvas>
                <img src="{{URL::asset('img/mapa/basic.jpg')}}" usemap="#imgmap" id="mapimg"
                     class="img img-responsive">
                <map id="imgmap" name="imgmap">
                    <area shape="poly" id="4" alt="Roses" name="Roses" href="#" class="unselect" title="Roses"
                          coords="592,155,695,216,700,216,704,214,707,210,708,204,705,200,693,192,602,138,592,138,587,142,587,150,588,153,590,154"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="10" alt="Papin" name="Papin" href="#" title="Papin" class="unselect"
                          coords="823,300,784,357,777,359,771,355,767,350,774,337,794,308,808,287,812,285,816,284,821,286,824,289,825,292,824,295"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="8" alt="Galileu" name="Galileu" href="#" title="Galileu" class="unselect"
                          coords="1006,297,890,483,882,486,873,482,871,471,888,445,990,279,999,278,1006,282,1008,286,1008,286"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="16" alt="Vallespir" href="#" name="Vallespir" title="Vallespir" class="unselect"
                          coords="1261,224,1194,374,1187,375,1180,371,1178,365,1178,359,1243,213,1249,210,1253,209,1258,212,1263,217,1263,217"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="2" alt="Alcolea  de Dalt" href="#" name="Alcolea_Dalt" class="unselect"
                          title="Alcolea_Dalt"
                          coords="1067,327,971,477,961,484,953,481,950,476,951,467,1021,360,1049,315,1052,312,1057,310,1061,311,1065,312,1069,319"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="11" alt="Sta. Cecilia" href="#" name="Sta_Cecilia" class="unselect"
                          title="Sta_Cecilia"
                          coords="1016,447,1058,459,1062,464,1064,470,1061,476,1055,480,1034,474,989,461,988,451,992,443,998,441,1014,446"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="13" alt="Robrenyo" href="#" name="Robrenyo" title="Robrenyo" class="unselect"
                          coords="1400,380,1560,456,1564,465,1561,471,1554,474,1548,472,1391,399,1385,393,1385,386,1389,380,1394,378"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="5" alt="Canalejas" href="#" name="Canalejas" title="Canalejas" class="unselect"
                          coords="360,561,444,616,448,621,449,628,444,634,441,635,433,635,349,581,344,577,343,571,344,564,353,561"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="3" alt="Alcolea de Baix" href="#" name="Alcolea" title="Alcolea" class="unselect"
                          coords="921,559,854,665,850,668,844,668,839,664,836,656,903,547,906,544,914,543,919,545,922,549,923,553"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="15" alt="Valladolid" href="#" name="Valladolid" title="Valladolid" class="unselect"
                          coords="939,543,1065,592,1070,596,1071,602,1069,607,1065,610,1059,611,949,568,927,558,924,555,923,549,926,542,933,540,937,541"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="17" alt="Vallespir de Baix" href="#" name="Vallespir_Baix" class="unselect"
                          title="Vallespir_Baix"
                          coords="1128,525,1071,657,1068,662,1062,663,1056,661,1052,656,1052,649,1109,515,1113,511,1116,510,1121,511,1127,513,1129,519,1128,520"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="6" alt="Finlandia" href="#" name="Finlandia" title="Finlandia" class="unselect"
                          coords="607,753,537,862,533,868,527,871,519,870,514,865,513,857,593,734,598,733,603,733,608,735,611,744"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="12" alt="Sagunt" name="Sagunt" href="#" title="Sagunt" class="unselect"
                          coords="252,909,411,881,417,883,421,887,424,894,421,900,415,903,260,930,253,929,248,924,247,917,248,912"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="14" alt="Rossend Arus" href="#" name="Rossend_Arus" class="unselect"
                          title="Rossend_Arus"
                          coords="654,907,623,949,618,953,613,953,609,951,606,947,604,940,637,895,642,894,646,894,651,896,653,901"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="18" alt="Masnou" name="Masnou" href="#" title="Masnou" class="unselect"
                          coords="986,914,1020,953,1020,964,1012,970,1003,969,967,925,968,917,974,911,981,911"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="9" alt="Guadiana" name="Guadiana" href="#" title="Guadiana" class="unselect"
                          coords="869,929,777,1025,772,1028,765,1025,761,1022,761,1013,852,916,857,914,864,914,868,916,870,923,870,923"
                          onclick="showcarrer(this)"/>
                    <area shape="poly" id="7" alt="Plaça de la farga" href="#" name="Placa_farga" class="unselect"
                          title="Placa_farga"
                          coords="582,1010,507,1146,502,1151,496,1152,493,1150,487,1146,486,1140,553,1018,564,997,572,994,577,995,583,1000,584,1005"
                          onclick="showcarrer(this)"/>
                </map>
            </div>
        </div>
        <div class="col-md-6">
            <div id="result"></div>
        </div>
    </div>



<div id="fotos"></div>


<script src="{{URL::asset('js/jquery-ui-1.11.1.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/jquery-ui.multidatespicker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/prettify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/lang-css.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/mapa/image.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/mapa/maparea.js')}}" type="text/javascript"></script>


@endsection