@php
$route = Route::current()->getName();
@endphp

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link  {{ $route == 'dashboard' ? '' : 'collapsed' }}" href="{{route('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Acciones</li>

        <li class="nav-item">
            <a class="nav-link {{ $route == 'buscador.index' ? '' : 'collapsed' }}" href="{{ route('buscador.index') }}">
                <i class="bi bi-search"></i>
                <span>Buscador</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $route == 'peticiones.index' ? '' : 'collapsed' }}" href="{{ route('peticiones.index') }}">
                <i class="bi bi-inbox"></i>
                <span>Peticiones</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link {{ $route == 'estados.index' ? '' : 'collapsed' }}"
                href="{{ route('estados.index') }}">
                <i class="bi bi-map"></i>
                <span>Estados</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'roles.index' ? '' : 'collapsed' }}" href="{{ route('roles.index') }}">
                <i class="bi bi-map"></i>
                <span>Roles</span>
            </a>
        </li><!-- End Blank Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ $route == 'users.index' ? '' : 'collapsed' }}" href="{{route('users.index')}}">
                <i class="bi bi-people"></i>
                <span>Usuarios</span>
            </a>
        </li><!-- End Blank Page Nav -->


        <li class="nav-item">
            <a class="nav-link {{ $route == 'actores.index' ? '' : 'collapsed' }}" href="{{ route('actores.index') }}">
                <i class="bi bi-people"></i>
                <span>Actores</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'cuentas.index' ? '' : 'collapsed' }}" href="{{ route('cuentas.index') }}">
                <i class="bi bi-bank"></i>
                <span>Cuentas</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'dependencias.index' ? '' : 'collapsed' }}" href="{{ route('dependencias.index') }}">
                <i class="bi bi-building"></i>
                <span>Dependencias</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'estatus.index' ? '' : 'collapsed' }}" href="{{ route('estatus.index') }}">
                <i class="bi bi-clipboard-data"></i>
                <span>Estatus</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'expedientes.index' ? '' : 'collapsed' }}" href="{{ route('expedientes.index') }}">
                <i class="bi bi-briefcase"></i>
                <span>Expedientes</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'festivos.index' ? '' : 'collapsed' }}" href="{{ route('festivos.index') }}">
                <i class="bi bi-pin-angle"></i>
                <span>Festivos</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'municipios.index' ? '' : 'collapsed' }}" href="{{ route('municipios.index') }}">
                <i class="bi bi-pin-map"></i>
                <span>Municipios</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'notificaciones.index' ? '' : 'collapsed' }}" href="{{ route('notificaciones.index') }}">
                <i class="bi bi-bell"></i>
                <span>Notificaciones</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'cobranza.index' ? '' : 'collapsed' }}" href="{{ route('cobranza.index') }}">
                <i class="bi bi-coin"></i>
                <span>Cobranza</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'paises.index' ? '' : 'collapsed' }}" href="{{ route('paises.index') }}">
                <i class="bi bi-geo-alt"></i>
                <span>Paises</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ $route == 'proceso.index' ? '' : 'collapsed' }}" href="{{ route('proceso.index') }}">
                <i class="bi bi-hourglass"></i>
                <span>Proceso</span>
            </a>
        </li><!-- End Blank Page Nav -->


        <li class="nav-item">
            <a class="nav-link {{ $route == 'regiones.index' ? '' : 'collapsed' }}" href="{{ route('regiones.index') }}">
                <i class="bi bi-compass"></i>
                <span>Regiones</span>
            </a>
        </li><!-- End Blank Page Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link {{ $route == 'situaciones.index' ? '' : 'collapsed' }}" href="{{ route('situaciones.index') }}">
                <i class="bi bi-brush"></i>
                <span>Situaciones</span>
            </a>
        </li><!-- End Blank Page Nav --> --}}


        <li class="nav-item">
            <a class="nav-link {{ $route == 'tramites.index' ? '' : 'collapsed' }}" href="{{ route('tramites.index') }}">
                <i class="bi bi-clipboard"></i>
                <span>Tramites</span>
            </a>
        </li><!-- End Blank Page Nav -->



    </ul>

</aside>
