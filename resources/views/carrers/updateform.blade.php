@extends('layouts.app')
@section('head')
    <title>{{trans('messages.edit_street')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
    <script src='{{URL::asset("ckeditor/ckeditor.js")}}'></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.edit_street')}}</legend>
                        <form method="POST" action="/carrer/{{ $carrer->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label>{{trans('messages.name')}}</label><br><br>
                            <input class="form-control" onchange="valcnom(this.value)" type="text" name="cnom" value="{{$carrer->cnom}}"/><br>
                            <div class="errorval" hidden id="cnom">{{trans("messages.valnom")}}</div><br>
                            <label>{{trans('messages.desc')}}</label><br><br>
                            <textarea style="width:100%; height:100%;" id="textarea" name="cdescripcio">{{$carrer->cdescripcio}}</textarea><br><br>
                            <label>{{trans('messages.i_year')}}</label><br><br>
                            <input class="form-control" onchange="valany(this.value)" type="text" name="cany_inici" value="{{$carrer->cany_inici}}"/><br>
                            <div class="errorval" hidden id="any">{{trans("messages.valany")}}</div><br>
                            <label>{{trans('messages.fb')}}</label><br><br>
                            <input class="form-control" onchange="valface(this.value)" type="text" name="cfacebook" value="{{$carrer->cfacebook}}"/><br>
                            <div class="errorval" hidden id="face">{{trans("messages.valface")}}</div><br>
                            <label>{{trans('messages.tw')}}</label><br><br>
                            <input class="form-control" onchange="valtwitter(this.value)" type="text" name="ctwitter" value="{{$carrer->ctwitter}}"/><br>
                            <div class="errorval" hidden id="twitter">{{trans("messages.valtwitter")}}</div><br>
                            <label>{{trans('messages.ins')}}</label><br><br>
                            <input class="form-control" onchange="valins(this.value)" type="text" name="cinstagram" value="{{$carrer->cinstagram}}"/><br>
                            <div class="errorval" hidden id="ins">{{trans("messages.valins")}}</div><br>
                            <button class="btn btn-success">{{trans('messages.send')}}</button>
                        </form>
                </fieldset>
            </div>
        </div>
    </div>

 <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'textarea' );
    </script>

@endsection