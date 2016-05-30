@extends('layouts.app')
@section('head')
 <title>{{trans('messages.type_list')}}</title>
 <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
 <div class="container">
  <div class="row">
   <div class="col-md-5"></div>
   <div class="col-md-2">
      <table class="table table-striped"><thead><th>Nom</th><th>Editar</th></thead>
       @foreach($tipus_events as $tipus)
        <tr><td>{{$tipus->tipus}}</td><td><a href="tipusevent/{{$tipus->id}}/edit"><button class="btn btn-primary">{{trans('messages.edit')}}</button></a></td></tr>
       @endforeach
      </table>
    </div>
   <div class="col-sm-5"></div>
   </div>
  </div>

 {{$tipus_events->render()}}
@endsection