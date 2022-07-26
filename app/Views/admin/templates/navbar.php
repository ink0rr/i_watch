<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow text-black text-decoration-none" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img class="img rounded-circle" style="width:35px" src="<?= base_url("assets/images/placeholder-user.png") ?>"> <?= session()->get('name') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('/logout') ?>">Logout</a>
                        </li>
                    </ul>
                </div>

            </ul>

        </nav>
        <!-- End of Topbar -->