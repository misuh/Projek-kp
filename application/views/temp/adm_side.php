   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('adm_home'); ?>">
        <div class="sidebar-brand-icon">
           <i><img src="<?= base_url('aset/img/log.png') ?>"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Kinerja</div>
      </a>


      <div class="sidebar-heading">
        Admin Menu
      </div>
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('adm_home'); ?>">
         <i class="fas fa-home"></i>
          <span>Admin Menu</span></a>
      </li>

      <div class="sidebar-heading">
        User Menu
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home'); ?>">
         <i class="fas fa-sign-in-alt"></i>
          <span>Ke halaman User</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 icon-flipped"></i>
          <span>logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">