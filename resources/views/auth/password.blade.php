@extends('layouts.app')

@section('content')

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
        Email
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button class="btn btn-warning" type="submit">
            Envia el codi per correu
        </button>
    </div>
</form>

    @endsection