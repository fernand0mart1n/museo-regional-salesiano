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
        @yield('navbar')

        <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->

            @yield('breadcumbs')

            @yield('content')

            
                    <!-- /.row --> </div>
                <!-- /.container-fluid --> </div>
            <!-- /#page-wrapper -->
        </div>
    </body>
</html>
