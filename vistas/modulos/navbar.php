<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="index.html"><?= COMPANY; ?></a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown" id="menu"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> &nbsp;<?=$_SESSION['usuario']->usuario_nombre?></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
               <!--  <li><a class="dropdown-item" href=""><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i> Profile</a></li> -->
                <li><a class="dropdown-item" href="<?= BASE_URL; ?>procesos/Login.php?action=logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar w-25" src="<?= BASE_URL; ?>assets/images/avatar_default.png" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?=$_SESSION['usuario']->usuario_nombre?></p>
            <p class="app-sidebar__user-designation"><?=$_SESSION['usuario']->usuario_email?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= BASE_URL; ?>vistas/inicio/"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label"> Inicio</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-book-open"></i><span class="app-menu__label"> Módulo Libros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/areas/"><i class="icon fa fa-circle-o"></i> Áreas</a></li>
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/autores/"><i class="icon fa fa-circle-o"></i> Autores</a></li>
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/editoriales/"><i class="icon fa fa-circle-o"></i> Editoriales</a></li>
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/libros/"><i class="icon fa fa-circle-o"></i> Libros</a></li>
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/paises/"><i class="icon fa fa-circle-o"></i> Países</a></li>
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/tipos/"><i class="icon fa fa-circle-o"></i> Tipo de Libros</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label"> Módulo Usuários</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/usuarios/form.php"><i class="icon fa fa-circle-o"></i> Nuevo usuário</a></li>
                <li><a class="treeview-item" href="<?= BASE_URL ?>vistas/usuarios/"><i class="icon fa fa-circle-o"></i> Listar usuários</a></li>
            </ul>
        </li>

        <li><a class="app-menu__item" href="<?= BASE_URL ?>"><i class="app-menu__icon fas fa-eye"></i><span class="app-menu__label">Ver mi web</span></a></li>
    </ul>
</aside>