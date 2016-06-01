@extends('layouts.app')

@section('head')
<script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
<title>Login</title>
@endsection
@section('content')

<div class="separador"></div>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Login</legend>

                <form action="/login" method="POST" class="form-horizontal">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <div class="row">
                            <label for="task-name" class="col-sm-3 control-label">Mail</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="email" class="form-control"><br />
                            </div>
                        </div>
                        <div class="row">
                            <label for="task-pwd" class="col-sm-3 control-label">{{trans('messages.password')}}</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Login
                            </button>

                        </div>
                    </div>
                </form>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <a href="/password/email"><button class="btn btn-primary"><i class="fa fa-btn fa-resistance"></i> {{trans('passwords.pass_forgot')}}</button></a>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                </fieldset>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</div>



@endsection

