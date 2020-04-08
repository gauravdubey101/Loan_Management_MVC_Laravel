<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="index.html">SACHIN APP</a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
</button>

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
</form>

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">
  
  <li class="nav-item dropdown no-arrow">
    <a  href="#">Welcome, <?=$this->session->user_name?> <i class="fas fa-user-circle fa-fw"></i> </a><a href="<?php echo base_url().'index.php/app/logout'?>">LOGOUT</a>
    <div class="col-lg-3 text-right">
     
    </div>
    </div>
  </li>
  
</ul>

</nav>