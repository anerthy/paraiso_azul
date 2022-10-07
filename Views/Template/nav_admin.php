    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombre_usuario']; ?></p>
                <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombre_rol']; ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                    <span class="app-menu__label">Usuarios</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-user"></i> Usuarios</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-gear"></i> Roles</a></li>
                    <!-- <li><a class="treeview-item" href="<?= base_url(); ?>/permisos"><i class="icon fa fa-circle-o"></i> Permisos</a></li> -->
                </ul>
            </li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-bars" aria-hidden="true"></i>
                    <span class="app-menu__label">Servicios</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="app-menu__item" href="<?= base_url(); ?>/alimentacion">

                            <i class="app-menu__icon fas fa-utensils" aria-hidden="true"></i>
                            <span class="app-menu__label">Alimentacion</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="<?= base_url(); ?>/hospedajes">

                            <i class="app-menu__icon fa  fa-campground" aria-hidden="true"></i>
                            <span class="app-menu__label">Hospedaje</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="<?= base_url(); ?>/transportes">

                            <i class="app-menu__icon fa  fa-car-side" aria-hidden="true"></i>
                            <span class="app-menu__label">Transporte</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/grupos">

                    <i class="app-menu__icon fa  fa-building" aria-hidden="true"></i>
                    <span class="app-menu__label">Grupos Organizados</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/comunidades">

                    <i class="app-menu__icon fa  fa-city" aria-hidden="true"></i>
                    <span class="app-menu__label">Comunidades</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                    <span class="app-menu__label">Logout</span>
                </a>
            </li>
        </ul>
    </aside>