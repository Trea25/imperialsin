@extends('layouts.app')
@section('head')
    <title>Reiniciar Contrasenya</title>
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">{{trans('messages.resetpassword')}}</legend>
                    <form method="POST" action="/password/reset">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div>
                            Mail<br><br>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}"><br><br>
                        </div>

                        <div>
                            {{trans('messages.password')}}<br><br>
                            <input class="form-control" type="password" name="password"><br><br>
                        </div>

                        <div>
                            {{trans('messages.confirmpassword')}}<br><br>
                            <input class="form-control" type="password" name="password_confirmation"><br><br>
                        </div>

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

@endsection