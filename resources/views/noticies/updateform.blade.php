@extends('layouts.app')

@section('head')
    <title>{{trans('messages.news_edit')}}</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, target-densitydpi=device-dpi'>
    <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script src='{{URL::asset("js/guillotine/jquery.guillotine.js")}}'></script>
    <script src='{{URL::asset("js/guillotine/jquery.mousewheel.min.js")}}'></script>
    <link href='{{URL::asset("css/guillotine/jquery.guillotine.css")}}' media='all' rel='stylesheet'>
    <script src='{{URL::asset("js/guillotine/jquery.guillotine_startup.js")}}'></script>
    <script src='{{URL::asset("js/validacioform.js")}}' type="text/javascript"></script>
    <script src='{{URL::asset("ckeditor/ckeditor.js")}}'></script>


@endsection
@section('content')
    <div class="linea"></div>
    <div class="linea"></div>
    <div class="linea"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.news_edit')}}</legend>
                    {!! Form::open(array('url' => '/noticia/'.$noticia->id, 'files' => true)) !!}
                    {{Form::token()}}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div id="theparent" class="col-lg-7">

                            <img style="width:100%" id="thepicture" src='/foto/{{$noticia->foto_id}}'/>
                        </div>
                        <br/>
                    </div>
                    <br>
                    <div id='controls'>
                        <button id='rotate_left' type='button' class="btn btn-primary" title='Rotate left'><i
                                    class="fa fa-rotate-left fa-lg"></i></button>
                        <button id='zoom_out' type='button' class="btn btn-primary" title='Zoom out'><i
                                    class="fa fa-minus fa-lg"></i></button>
                        <button id='fit' type='button' class="btn btn-primary" title='Fit image'><i
                                    class="fa fa-arrows fa-lg"></i></button>
                        <button id='zoom_in' type='button' class="btn btn-primary" title='Zoom in'><i
                                    class="fa fa-plus fa-lg"></i></button>
                        <button id='rotate_right' type='button' class="btn btn-primary" title='Rotate right'><i
                                    class="fa fa-rotate-right fa-lg"></i></button>
                    </div>
                    <br>

                    <input class="inputfile" type="file" name="foto" id="inputImg">
                    <label for="inputImg"><i class="fa fa-cloud-upload"></i> {{trans('messages.add_pic')}}</label>


                    <div id='data'>

                        <input hidden type="text" id='x' name="x"/>
                        <input hidden type="text" id='y' name="y"/>
                        <input hidden type="text" id='w' name="w"/>
                        <input hidden type="text" id='h' name="h"/>
                        <input hidden type="text" id='scale' name="scale"/>
                        <input type="hidden" id='angle' name="angle"/>
                    </div>

                    <label>{{trans('messages.title')}}</label><br><br>
                    <input onchange="valtitol(this.value)" type="text" class="form-control" name="ntitol"
                           value="{{$noticia->ntitol}}"/><br>
                    <div class="errorval" hidden id="titol">{{trans("messages.valtitol")}}</div>
                    <br>

                    <label>{{trans('messages.desc')}}</label><br><br>
                    <textarea id="editor" class="form-control" name="ndesc" cols="80"
                              rows="8">{{$noticia->ndesc}}</textarea><br><br>


                    <label>{{trans('messages.Street')}}</label><br><br>
                    <select class="form-control" name="carrer_id">
                        @foreach($carrers as $carrer)
                            @if($carrer->id==$noticia->carrer_id)
                                <option selected value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                            @else
                                <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                            @endif
                        @endforeach
                    </select><br><br>

                    <label>{{trans('messages.ev_approve')}} <input name="nactiu" type="checkbox"
                                                                   @if ($noticia->nactiu) checked @endif/></label><br>
                    <br><br>
                    <button class="pull-left botoform btn btn-success">{{trans('messages.save')}}</button>
                    </form>
                    <form method="POST" action="/noticia/{{ $noticia->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button onclick="return confirm('{{trans('messages.confirmdel')}}')"
                                class="pull-left btn btn-danger">{{trans('messages.delete')}}</button>
                    </form>
                    {!! Form::close() !!}
                </fieldset>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor');
    </script>
@endsection