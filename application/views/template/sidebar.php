 <!-- Sidebar -->
 <ul class="sidebar navbar-nav">


    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>index.php/Home/">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Home</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>index.php/Customers/">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>User Data</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>index.php/Transactions/reports">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Reports</span>
      </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Settings</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <h6 class="dropdown-header">Shopkeepers Management:</h6> -->
            <a class="dropdown-item" href="<?=base_url()?>index.php/Shopkeepers/manage">Manage Shopkeepers</a>
            <!-- <h6 class="dropdown-header">Hospital Management:</h6> -->
            <!-- <a class="dropdown-item" href="< ?=base_url()?>index.php/Room/manage">Rooms</a> -->
        </div>
    </li>
</ul>