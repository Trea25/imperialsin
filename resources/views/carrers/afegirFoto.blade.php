@extends('layouts.app')

@section('content')


    <meta name='viewport' content='width=device-width, initial-scale=1.0, target-densitydpi=device-dpi'>
    <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script src='{{URL::asset('js/guillotine/jquery.guillotine.js')}}'></script>
    <script src='{{URL::asset('js/guillotine/jquery.mousewheel.min.js')}}'></script>

    <link href='{{URL::asset('css/guillotine/jquery.guillotine.css')}}' media='all' rel='stylesheet'>
    <script src='{{URL::asset('js/guillotine/jquery.guillotine_startup.js')}}'></script>


    <div class="linea"></div>
    <div class="linea"></div>
    <div class="linea"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.add_pic')}}</legend>
                    {!! Form::open(array('url' => 'fotoCarrer', 'files' => true)) !!}
                    {{Form::token()}}
                    <div class="row">
                    <div id="theparent" class="col-lg-7">

                        <img style="width:100%" id="thepicture" src='{{URL::asset('img/Fotos/default.png')}}'/>
                    </div>
                        <br/>
                    </div><br>
                    <div id='controls'>
                        <button id='rotate_left' type='button' class="btn btn-primary" title='Rotate left'> <i class="fa fa-rotate-left fa-lg"></i> </button>
                        <button id='zoom_out' type='button' class="btn btn-primary" title='Zoom out'> <i class="fa fa-minus fa-lg"></i></button>
                        <button id='fit' type='button' class="btn btn-primary" title='Fit image'><i class="fa fa-arrows fa-lg"></i></button>
                        <button id='zoom_in' type='button' class="btn btn-primary" title='Zoom in'> <i class="fa fa-plus fa-lg"></i></button>
                        <button id='rotate_right' type='button' class="btn btn-primary" title='Rotate right'> <i class="fa fa-rotate-right fa-lg"></i> </button>
                    </div><br>

                    <input class="inputfile" type="file" name="foto" id="inputImg">
                    <label for="inputImg"><i class="fa fa-cloud-upload"></i> {{trans('messages.add_pic')}}</label>

                    <div id='data'>

                        <input type="hidden" id='x' name="x"/>
                        <input type="hidden" id='y' name="y"/>
                        <input type="hidden" id='w' name="w"/>
                        <input type="hidden" id='h' name="h"/>
                        <input type="hidden" id='scale' name="scale"/>
                        <input type="hidden" id='angle' name="angle"/>
                    </div>
                    @if(Auth::id() == 1)
                        <label>{{trans('messages.Street')}}</label>
                    <br />
                    <br />
                        <select class="form-control" name="id_carrer">
                            <option value="0" selected>Selecciona el carrer</option>
                            @foreach($carrers as $carrer)
                                <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                            @endforeach
                        </select>
                    @endif
                    <br />
                    <button type="submit" id="afegirnoticia" class="btn btn-success">{{trans('messages.send')}}</button>
                    <button href="/administracio" class="btn btn-danger">{{trans('messages.back')}}</button>
                    {!! Form::close() !!}
                </fieldset>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

@endsection
<script src='{{URL::asset('js/guillotine/jquery.init_guillotine.js')}}'></script>
<script>

    function select(img, id) {
        if (!document.getElementById(id).checked) {
            img.src = '/img/' + id + '-Logo.png';
            //alert ("checked");
        }
        else {
            img.src = '/img/' + id + '-Logo-2.png';
            //  alert("unchecked");
        }
    }
</script>