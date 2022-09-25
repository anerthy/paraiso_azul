    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">Usuario</p>
                <p class="app-sidebar__user-designation">Administrador</p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
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
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                    <span class="app-menu__label">Logout</span>
                </a>
            </li>
        </ul>
    </aside>