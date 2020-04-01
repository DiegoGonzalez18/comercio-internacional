<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i>Slider Principal</a>
                <ul class="nav-dropdown-items">
                    <li  @click="menu=1" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Slider</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-wallet"></i>Usuarios</a>
                <ul class="nav-dropdown-items">
                    <li  @click="menu=2" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-wallet"></i> Usuarios</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-basket"></i> Eventos</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=5" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-basket-loaded"></i> Eventos</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i>Novedad</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=7" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i> Novedad</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i>Contenidos</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=50" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i> Contenido</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i>Semilleros</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=500" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Registrar Semillero</a>
                    </li>
                    <li @click="menu=501" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Actualizar Semillero</a>
                    </li>
                    <li @click="menu=502" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Registrar Proyecto</a>
                    </li>
                    <li @click="menu=503" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Actualizar Proyecto</a>
                    </li>
                    <li @click="menu=504" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Asignar Archivo a Proyecto</a>
                    </li>


                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Trámites</a>
                <ul class="nav-dropdown-items">
                        <li @click="menu=20" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-chart"></i>Trámites</a>
                            </li>
                    <li @click="menu=9" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-chart"></i>Categoría</a>
                    </li>
                    <li @click="menu=10" class="nav-item">
                            <a class="nav-link" href="#"><i class="icon-chart"></i>Archivo</a>
                        </li>
                        <li @click="menu=21" class="nav-item">
                            <a class="nav-link" href="#"><i class="icon-chart"></i>Asignar Archivos</a>
                        </li>

                </ul>
            </li>
            <li @click="menu=11" class="nav-item">
                <a class="nav-link" href="#"><i class="icon-book-open"></i> Mensajes <span class="badge badge-danger">
                        {{session('mensajes')}}</span></a>
            </li>
            <li @click="menu=30" class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-book-open"></i> Mensajes Respondidos</a>
                </li>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
