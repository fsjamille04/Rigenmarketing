<?php  
session_start();

if ( isset( $_SESSION['user'] ) && $_SESSION['user']  == 1 ) { 
  ?>
    
 
<header class="main-header">
<style>
#siteseal img{
   padding-top : 10px !important;  
}
    
</style>
    <!-- Logo -->

    <a href="dashboard.php" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>A</b>LT</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>Rigen</b>Marketing</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <span  id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=ddPxvJl1zqSVcyJXTd9ai1HCThWGrV0FSWMXxhyvqCU6wK2BNzG2tS75pds5"></script></span>
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="logout-btn">
            <a href="logout.php" data-toggle="control-sidebar"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>

    </nav>

  </header>

  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p>Admin</p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>

      <!-- search form -->

      <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

          <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div>

      </form>

<ul class="sidebar-menu" data-widget="tree">

  <li class="header">MAIN NAVIGATION</li>

  <li class=" treeview listmember">

    <a href="#">

      <i class="fa fa-user"></i> <span>Members</span>

    </a> 

  </li>

  <li class=" treeview register">

    <a href="#">

      <i class="fa fa-registered"></i> <span>Register</span>

    </a> 

  </li>

  <!--<li class=" treeview gencode">-->

  <!--  <a href="#">-->

  <!--    <i class="fa fa-plus"></i> <span>Generate Code</span>-->

  <!--  </a> -->

  <!--</li>-->

  <li class=" treeview req_payout">

    <a href="#">

      <i class="fa fa-user-o"></i> <span>Request Payout</span>

    </a> 

  </li>

  <li class=" treeview payout">

    <a href="#">

      <i class="fa fa-money"></i> <span>Payout History</span>

    </a> 

  </li>
  <li class=" treeview used_code">

    <a href="#">

      <i class="fa fa-money"></i> <span>Used Codes</span>

    </a> 

  </li>  
</ul>



 </aside>
 
 <?php 
} else{   header("Location: admin-login.php");

} 
?> 