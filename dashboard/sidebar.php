<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <ul class="nav navbar-nav" role="">
        <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" title="Профил">
                <i class="fa fa-user"></i>
                <?php if (isset($_SESSION['admin_logged_in'])) { ?>
                    <span style="padding-left: 10px;"><?php echo $_SESSION['admin_name']; ?></span>
                <?php } ?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="logout?logout"><i class="fa fa-sign-out-alt"></i> Изход</a>
            </div>
        </li>
    </ul>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">МЕНЮ</li>
                <li class="nav-item">
                    <a href="https://projects.balikgstudio.eu/birthday-reminder/dashboard/" class="nav-link">
                        <i class="fa fa-home nav-icon"></i>
                        <p>Начало</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categories" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Категории</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://projects.balikgstudio.eu/birthday-reminder/dashboard/contacts" data-toggle="modal" data-target="#staticHelp" class="nav-link">
                        <i class="fa fa-bullhorn nav-icon"></i>
                        <p>Какво е новото?</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>