@extends('layouts.app')
@section('head')
 <title>Llistat Tipus</title>
 <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

 <table>
  @foreach($tipus_events as $tipus)
   <tr><td>{{$tipus->tipus}}</td><td><a href="tipusevent/{{$tipus->id}}/edit"><button class="btn btn-warning">Editar</button></a></td></tr>
  @endforeach
 </table>

 {{$tipus_events->render()}}
@endsection