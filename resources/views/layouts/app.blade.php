@section('navbar')
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <i class="fa fa-fw fa-university"></i> Museo Regional Salesiano        
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            @if (Auth::guest())
            <li>
                <a href="{{ url('/login') }}">Ingresar</a>
            </li>
            <li>
                <a href="{{ url('/login') }}">Registrarse</a>
            </li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-fw fa-user-o"></i> {{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/datos') }}"><i class="fa fa-fw fa-vcard"></i> Editar mis datos</a>
                        <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="fa fa-fw fa-sign-out"></i> Cerrar sesión</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1">
                        <i class="fa fa-fw fa-group"></i>
                        PERSONAS
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-1" class="collapse">
                        <li>
                            <a href="{{ route('personas.index') }}">
                                Ver listado
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('personas.create') }}">
                                Cargar persona
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2">
                        <i class="fa fa-fw fa-circle"></i>
                        FONDOS
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-2" class="collapse">
                        <li>
                            <a href="{{ route('fondos.index') }}">
                                Ver listado
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('fondos.create') }}">
                                Cargar fondo
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3">
                        <i class="fa fa-fw fa-unsorted"></i>
                        CLASIFICACIONES
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-3" class="collapse">
                        <li>
                            <a href="{{ route('clasificaciones.index') }}">
                                Ver listado
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clasificaciones.create') }}">
                                Cargar clasificación
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4">
                        <i class="fa fa-fw fa-tag"></i>
                        PIEZAS
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-4" class="collapse">
                        <li>
                            <a href="{{ route('piezas.index') }}">
                                Ver listado
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('piezas.create') }}">
                                Cargar pieza
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5">
                        <i class="fa fa-fw fa-check-circle"></i>
                        REVISIONES
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-5" class="collapse">
                        <li>
                            <a href="{{ route('revisiones.index') }}">
                                Ver listado
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('revisiones.create') }}">
                                Nueva revisión
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/usuarios') }}">
                        <i class="fa fa-fw fa-user-o"></i>
                        USUARIOS
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse --> </nav>

@endsection
