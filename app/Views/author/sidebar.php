<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>/author/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php if (in_groups('admin')) {
                                                    echo "Super Admin";
                                                } else if (in_groups('author')) {
                                                    echo "Author";
                                                } else {
                                                    echo "User";
                                                } ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/author/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <?php if (in_groups('admin')) : ?>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-cog"></i>
                <span>Management Setting</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Setting:</h6>
                    <a class="collapse-item" href="<?= base_url('/admin/manage_susunan_redaksi') ?>">Susunan Redaksi</a>
                    <a class="collapse-item" href="<?= base_url('/admin/manage_users') ?>">Manage User</a>
                    <a class="collapse-item" href="<?= base_url('/admin/manage_kategori') ?>">Manage Kategori</a>
                    <a class="collapse-item" href="<?= base_url('/admin/manage_iklan') ?>">Manage Iklan</a>
                    <a class="collapse-item" href="<?= base_url('/admin/manage_artikel') ?>">Manage Artikel</a>
                    <a class="collapse-item" href="<?= base_url('/admin/manage_komen') ?>">Manage Komen</a>

                </div>
            </div>
    </li>
<?php endif; ?>
<li class="nav-item">
    <?php if (in_groups('author')) : ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Management Artikel</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengaturan Artikel:</h6>
                <a class="collapse-item" href="<?= base_url('/author/create_artikel') ?>">Buat Artikel</a>
                <a class="collapse-item" href="<?= base_url('/author/manage_artikel') ?>">Manage Artikel</a>
            </div>
        </div>
    <?php endif; ?>
</li>

<!-- Heading -->
<!-- <div class="sidebar-heading">
        Interface
    </div> -->
<!-- Nav Item - Tables -->
<!-- <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/author/manageArtikel') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Profile</span></a>
    </li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->