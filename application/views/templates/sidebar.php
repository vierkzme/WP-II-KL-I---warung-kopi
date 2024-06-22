<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-mug-hot"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Warung Kopi</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Looping Menu -->
    <?php foreach ($menu_sidebar as $menu) : ?>
        <li class="nav-item <?= uri_string() == $menu['url'] ? 'active' : '' ?>">
            <a class="nav-link pb-0" href="<?= base_url($menu['url']); ?>">
                <i class="<?= $menu['icon']; ?>"></i>
                <span><?= $menu['title']; ?></span>
            </a>
        </li>
    <?php endforeach; ?>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->