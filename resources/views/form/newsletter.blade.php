<!DOCTYPE html>
<html>
<body>
@if( isset( $data[ "dato" ] ) )
    <p><strong>IDIOMA:</strong> {{$data[ "idioma" ]}}</p>
    <p><strong>EMAIL:</strong> {{$data[ "dato" ]}}</p>
@else
{!! $txt !!}
@endif
</body>
</html>