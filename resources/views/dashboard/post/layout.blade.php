<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    
    @if (session('status'))
        <h1>{{session('status')}}</h1>
    @endif
    
    <h1>@yield('titlePage')</h1>
    @yield('content')
    
</body>
</html>