@extends('layouts.app')

@section('content')

<div class="separador"></div>
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Login
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->


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
                            <label for="task-pwd" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Login
                            </button>

                        </div>
                    </div>
                </form>
                <a href="/password/email"><button class="btn btn-default">{{trans('passwords.pass_forgot')}}</button></a>
            </div>
        </div>


    </div>
</div>

@endsection

