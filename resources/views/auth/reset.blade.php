@extends('layouts.app')
@section('head')
    <title>Reiniciar Contrasenya</title>
@endsection
@section('content')

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
        Email
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input class="form-control" type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input class="form-control" type="password" name="password_confirmation">
    </div>

    <div>
        <button class="btn btn-success" type="submit">
            Reset Password
        </button>
    </div>
</form>

@endsection