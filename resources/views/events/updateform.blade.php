@extends('layouts.app')
@section('head')
    <title>{{trans('messages.ev_edit')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/validacioform.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.ev_edit')}}</legend>
                        <form method="POST" action="/event/{{ $event->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <label>{{trans('messages.title')}}</label><br><br>
                            <input onchange="valtitol(this.value)" class="form-control" type="text" name="etitol" value="{{$event->etitol}}"/><br>
                            <div hidden class="errorval" id="titol">{{trans("messages.valtitol")}}</div><br>

                            <label>{{trans('messages.ev_type')}}</label><br><br>
                            <select class="form-control" name="tipus_id">
                                @foreach($tipusevents as $tipus)
                                    @if($tipus->id==$event->tipus_id)
                                        <option selected value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                                    @else
                                    <option value="{{$tipus->id}}">{{$tipus->tipus}}</option>
                                    @endif
                                @endforeach
                            </select><br><br>

                            <label>{{trans('messages.day')}}  (dd/mm/yyyy)</label><br><br>
                            <input onchange="valdata(this.value)" class="form-control" type="text" name="data" value="{{$data}}"/><br>
                            <div class="errorval" hidden id="data">{{trans("messages.valdata")}}</div><br>

                           <label>{{trans('messages.time')}}  (hh:mm)</label><br><br>
                            <input onchange="valhora(this.value)" class="form-control" type="text" name="hora" value="{{$hora}}"/><br>
                            <div class="errorval" hidden id="hora">{{trans("messages.valhora")}}</div><br>

                             <label>{{trans('messages.Street')}}</label><br><br>
                            <select class="form-control" name="carrer_id">
                                @foreach($carrers as $carrer)
                                    @if($carrer->id==$event->carrer_id)
                                        <option selected value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                                    @else
                                    <option value="{{$carrer->id}}">{{$carrer->cnom}}</option>
                                    @endif
                                @endforeach
                            </select><br><br>


                            <label>{{trans('messages.ev_approve')}} <input name="eactiu" type="checkbox" @if ($event->eactiu) checked @endif/></label><br><br><br>

                            <button class="botoform pull-left btn btn-success">{{trans('messages.save')}}</button>
                        </form>
                        <form method="POST" action="/event/{{ $event->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('{{trans('messages.confirmdel')}}')" class="pull-left btn btn-danger">{{trans('messages.delete')}}</button>
                        </form>
                </fieldset>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection