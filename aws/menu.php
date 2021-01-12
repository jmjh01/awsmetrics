
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fab fa-amazon"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Amazon</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php  if($_SESSION["isadmin"]==1) 
      { ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item" id="dashboard">
        <a class="nav-link" href="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
     
      <li class="nav-item" id="entryview">
        <a class="nav-link" href="entryview">
          <i class="fas fa-fw fa-table"></i>
          <span>Tracker View</span></a>
      </li>
      <li class="nav-item" id="adduser">
        <a class="nav-link" href="adduser">
          <i class="fas fa-fw fa-user"></i>
          <span>Add Users</span></a>
      </li>
      <li class="nav-item" id="viewusers">
        <a class="nav-link" href="viewusers">
          <i class="fas fa-fw fa-clone"></i>
          <span>View Users</span></a>
      </li>

      <li class="nav-item" id="filetype">
        <a class="nav-link" href="filetype">
          <i class="fas fa-fw fa-signal"></i>
          <span>File Type Bifurcation</span></a>
      </li>
      <?php 
     }?>
      

      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->