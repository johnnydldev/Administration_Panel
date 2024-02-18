<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-home"></i><span>Inicio</span>
    </a>

    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dasboard</span>
    </a>

    <a class="nav-link" href="/roles">
        <i class=" fas fa-address-card"></i><span>Permisos</span>
    </a>

    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>

    <a class="nav-link" href="{{ route('all.section') }}">
        <i class=" fas fa-list"></i><span>Secciones</span>
    </a>

    <a class="nav-link" href="{{ route('all.files') }}">
        <i class=" fas fa-paperclip"></i><span>Archivos</span>
    </a>

</li>
