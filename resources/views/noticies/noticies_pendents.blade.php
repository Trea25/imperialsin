@extends('layouts.app')
@section('head')
    <title>{{trans('messages.pending_news')}}</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <table>
        @foreach($noticies as $noticia)
            <tr><td>{{$noticia->ntitol}}</td><td><a href="noticia/{{$noticia->id}}/edit"><button class="btn btn-warning">{{trans('messages.edit')}}</button></a></td></tr>
        @endforeach
    </table>
@endsection