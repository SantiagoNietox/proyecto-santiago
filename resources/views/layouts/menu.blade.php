<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('productos.index') }}"
                        class="nav-link {{ Request::is('productos*') ? 'active' : '' }}">
                        <i class="far {{ Request::is('productos*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Producto</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categorias.index') }}"
                        class="nav-link {{ Request::is('categorias*') ? 'active' : '' }}">
                        <i class="far {{ Request::is('categorias*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Categorías</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subcategorias.index') }}"
                        class="nav-link {{ Request::is('subcategorias*') ? 'active' : '' }}">
                        <i class="far {{ Request::is('subcategorias*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                        <p>Subcategorías</p>
                    </a>
                </li>

                @role('admin')
                    <li class="nav-item">
                        <a href="{{ route('usuarios.index') }}" class="nav-link">
                            <i class="far {{ Request::is('roles*') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole

            <li class="nav-item">
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Top Navigation</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
