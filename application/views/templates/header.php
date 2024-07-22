<?php
if($this->session->userdata('Id') == null)
{
	redirect('/');
}
$this->load->model('PerformanceModel');


?>

<html lang="en">
<head>
	<title>PERMIS</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg" />
	<meta name="theme-color" content="#000000" />
	<meta name="author" content="SITA" />
	<meta name="keyword" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugin/select2/css/select2.min.css">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
     <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
     <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
	
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
	<style>
		a {text-decoration: none; }
	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-gray">
    <!-- Left navbar links -->

<!--    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-white btn-sm btn-danger"  href="<?php /*echo base_url(); */?>dashboard/logout" role="button">Logout</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php /*echo base_url(); */?>dashboard" class="nav-link text-white">Home</a>
      </li>
      
    </ul>-->
	  <ul class="navbar-nav">
		  <li class="nav-item">
			  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars" aria-hidden="true"></i></a>
		  </li>
		  <li class="nav-item d-none d-sm-inline-block">
			  <a href="<?php /*echo base_url(); */?>dashboard" class="nav-link text-white">Home</a>
		  </li>
	  </ul>
    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-gray">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
      <img src="<?php echo base_url()?>assets/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-PERMIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>assets/images/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['Names']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
<!--      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column ml-auto" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-medical"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>-->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>dashboard">
					<i class="fa fa-home"></i>
					<p>DASHBOARD</p>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>performance">
					<i class="fa fa-tasks "></i>
					<p>PERFORMANCE TOOL</p>
				</a>
			</li>



			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>specialrequest">
					<i class="fa fa-calendar-check-o"></i>
					<p>SPECIAL REQUEST</p>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>achievements">
					<i class="fa fa-area-chart"></i>
					<p class="menu-label">ACHIEVEMENTS</p>
				</a>
			</li>
			<?php if($_SESSION['Role'] == 3 || $_SESSION['Role'] == 6){?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>pmd_officials">
						<i class="fa fa-users"></i>
						<p class="menu-label">PMD OFFICIALS</p>
					</a>


				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>pmd_officials/pmd_view">
						<i class="fa fa-eye"></i>
						<p class="menu-label">PMD INSTRUMENTS MODERATION</p>
					</a>
				</li>

			<?php }?>
			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>semester">
						<i class="fa fa-angellist "></i>
						<p class="menu-label">SEMESTERS</p>
					</a>
				</li>



				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>employees">
						<i class="fa fa-users "></i>
						<p class="menu-label">EMPLOYEES</p>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>settings">
						<i class="fa fa-wrench  "></i>
						<p class="menu-label">SETTINGS</p>
					</a>
				</li>
			<?php }?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>manual">
					<i class="fa fa-newspaper-o "></i>
					<p class="menu-label">TRAINING MANUAL</p>
				</a>
			</li>
			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3 || isset($_SESSION['sys_owner'])) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>library">
						<i class="fa fa-clipboard "></i>
						<p class="menu-label">LIBRARY</p>
					</a>
				</li>
			<?php } ?>

			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3 || isset($_SESSION['sys_owner'])) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>assessments">
						<i class="fa fa-clipboard "></i>
						<p class="menu-label">ASSESSMENTS</p>
					</a>
				</li>
			<?php } ?>
			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3 || $_SESSION['Role'] == 6 ) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>reports">
						<i class="fa fa-clipboard "></i>
						<p class="menu-label">REPORTS</p>
					</a>
				</li>
			<?php } ?>
		</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

