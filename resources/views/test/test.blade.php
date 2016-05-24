{!! Form::open(array('url' => '/provafoto', 'files' => true)) !!}
{{Form::token()}}
{!!  Form::file('foto')!!}
{!! Form::submit('Click Me!') !!}
{!! Form::close() !!}

