<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar_user"><img class="app-sidebar_user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">Usuario</p>
                <p class="app-sidebar__user-designation">Rol</p>
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
                    <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                    <!-- <li><a class="treeview-item" href="<?= base_url(); ?>/permisos"><i class="icon fa fa-circle-o"></i> Permisos</a></li> -->
                </ul>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/grupos">

                    <i class="app-menu__icon fa  fa-city" aria-hidden="true"></i>
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
                <a class="app-menu__item" href="<?= base_url(); ?>/transportes">

                    <i class="app-menu__icon fa  fa-city" aria-hidden="true"></i>
                    <span class="app-menu__label">Transportes</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/hospedajes">

                    <i class="app-menu__icon fa  fa-city" aria-hidden="true"></i>
                    <span class="app-menu__label">Hospedajes</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/voluntarios">

                    <i class="app-menu__icon fa  fa-city" aria-hidden="true"></i>
                    <span class="app-menu__label">Voluntarios</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/tours">

                    <i class="app-menu__icon fa fa-map-o" aria-hidden="true"></i>
                    <span class="app-menu__label">Tours</span>
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