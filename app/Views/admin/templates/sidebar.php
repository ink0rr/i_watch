<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#4C3575;">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/logo_icon.png') ?>" style="height:30px; margin-bottom:1px;" alt="OO">
        </div>
        <div class="sidebar-brand-text">IOO Watch</div>
    </a>

    <hr class="sidebar-divider text-white my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider text-white">

    <div class="sidebar-heading">
        Navigation
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/admin/movies') ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-film text-gray-300"></i>
            <span>Manage Movies</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/admin/screenings') ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-eye text-gray-300"></i>
            <span>Manage Screenings</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('/admin/studios') ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-dungeon text-gray-300"></i>
            <span>Manage Studios</span>
        </a>
    </li>


    <hr class="sidebar-divider text-white d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>