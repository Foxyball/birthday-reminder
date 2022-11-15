<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <ul class="nav navbar-nav" role="">
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" title="Профил">
                <?php if (isset($_SESSION['admin_logged_in'])) {
                    echo $_SESSION['admin_name'];
                } ?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Профил</a>
                <a class="dropdown-item" href="#">Настройки</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout?logout">Изход</a>
            </div>
        </li>
    </ul>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">НАЧАЛО</li>
                <li class="nav-item">
                    <a href="https://projects.balikgstudio.eu/birthday-reminder/dashboard/" class="nav-link">
                        <i class="fa fa-home nav-icon"></i>
                        <p>Начало</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>