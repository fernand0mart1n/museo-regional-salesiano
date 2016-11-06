<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Museo Regional Salesiano @yield('titulo')</title>
        <link rel='shortcut icon' type='image/x-icon' href="{{ asset('images/favicon.ico') }}" />
        @yield('head')
    </head>
    <body>
        @yield('content')
    </body>
</html>
