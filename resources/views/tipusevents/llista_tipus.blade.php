@extends('layouts.app')
@section('head')
 <title>{{trans('messages.type_list')}}</title>
 <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
 <div class="container">
  <div class="linea"></div>
  <div class="linea"></div>
  <div class="linea"></div>
  <div class="linea"></div>


  <div class="row">
   <div class="col-md-4"></div>
    <div class="col-md-4">
      <table class="table table-striped"><thead><tr><th>{{trans('messages.name')}}</th><th>{{trans('messages.edit')}}</th></tr></thead>
       @foreach($tipus_events as $tipus)
        <tr><td>{{$tipus->tipus}}</td><td><a href="tipusevent/{{$tipus->id}}/edit"><button class="btn btn-primary"><i class="fa fa-edit fa-lg"/></button></a></td></tr>
       @endforeach
      </table>
    </div>
   <div class="col-sm-4"></div>
   </div>
  </div>

 {{$tipus_events->render()}}
@endsection