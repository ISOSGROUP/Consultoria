<li class="nav-item nav-dropdown  {{ Request::is('categories*') ? 'active' : '' }}" >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Gestión de Acceso</a>
  <ul class="nav-dropdown-items">

        @can('Gestión-usuarios')
            <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="nav-icon fa fa-user-circle"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        @endcan

        @can('Gestión-roles')
            <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <i class="nav-icon fa fa-tag"></i>
                    <span>Roles</span>
                </a>
            </li> 
        @endcan
            
    
  </ul>
</li>
 
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('filemanager.index') }}">
                    <i class="nav-icon fa fa-folder-o"></i>
                    <span>shared files</span>
                </a>
</li>

<li class="nav-item nav-dropdown " >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Contexto</a>
  <ul class="nav-dropdown-items">

            <li class="nav-item {{ Request::is('foda*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('foda.index') }}">
                                <i class="nav-icon fa fa-bookmark"></i>
                                <span>foda</span>
                            </a>
            </li>

            

            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Matriz de partes interesadas</span>
                </a>
            </li> 
  </ul>
</li>

<li class="nav-item nav-dropdown " >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Procesos</a>
  <ul class="nav-dropdown-items">
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Ficha de procesos</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Mapa de procesos</span>
                </a>
            </li> 
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Matriz de objetivos</span>
                </a>
            </li> 
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Politicas</span>
                </a>
            </li> 
  </ul>
</li>


<li class="nav-item nav-dropdown  " >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Riesgos</a>
  <ul class="nav-dropdown-items">
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Matriz de Riesgos</span>
                </a>
            </li>
  </ul>
</li>

<li class="nav-item nav-dropdown  " >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Gestion Documentaria</a>
  <ul class="nav-dropdown-items">
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Lista Maestra</span>
                </a>
            </li>
  </ul>
</li>

<li class="nav-item nav-dropdown  " >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Gestion NC y AC</a>
  <ul class="nav-dropdown-items">
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Reguistro </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Matriz de comunicaciones </span>
                </a>
            </li>
  </ul>
</li>
<li class="nav-item nav-dropdown  " >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bars"></i>Gestion de Revision</a>
  <ul class="nav-dropdown-items">
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Revision por la direccion  </span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon"></i>
                    <span>Matriz de comunicaciones </span>
                </a>
            </li>
  </ul>
</li>

 



