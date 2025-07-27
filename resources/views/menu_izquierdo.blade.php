<nav class="navbar navbar-expand-lg navbar-light">
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        
        @if(Auth::user()->hasPermission('FuncAdmin'))
            <li class="nav-item">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Gestión Admin</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               
                    @if(Auth::user()->hasPermission('FuncPermisosyRoles'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user-has-roles.index') }}">Roles de Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('role-has-permissions.index') }}">Permisos del Rol</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('permissions.index') }}">Permisos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('estrellas.index') }}">Estrellas</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('zonas.index') }}">Zonas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('facilidades-y-servicios-generals.index') }}">Facilidades y Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipo-habitacion-generals.index') }}">Habitaciones Generales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('regimens.index') }}">Regimen Hoteles</a>
                    </li>
                    
                   
                    
                </ul>
            </li>
        @endif
        </ul>
        <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hotels.index') }}">Hoteles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresa-traslado-tipo-movilidades.index') }}">Transfers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tours.index') }}">Tours</a>
                    </li>
        </ul>   
    </div>
</nav>
