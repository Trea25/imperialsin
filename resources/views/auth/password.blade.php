@extends('layouts.app')
@section('head')
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
    <title>{{trans('messages.resetpassword')}}</title>
@endsection
@section('content')

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">{{trans('messages.resetpassword')}}</legend>

                        <form method="POST" action="/password/email">
                            {!! csrf_field() !!}

                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div>
                                Mail<br><br>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div><br>

                            <div>
                                <button class="btn btn-primary" type="submit">
                                    {{trans('messages.send')}}
                                </button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>

    </div>


@endsection