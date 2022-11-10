<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CoGHSTA PERMIS</title>


	<meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(); ?>/assets/#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<form method="post" action="#">
					<input class="btn-sm btn-info" type="submit" name="logout" value="Logout" />
				</form>
			</li>
		</ul>
        <!-- Right navbar links -->

	
		
		

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url(); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?php echo base_url(); ?>account" class="d-block">
						
					</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>dashboard" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								DASHBOARD
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>performance" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								PERFORMANCE TOOL
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>leaves" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								LEAVE APPLICATION
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo base_url(); ?>contracts" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								CONTRACTS
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>employees" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								EMPLOYEES
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>settings" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								SETTINGS
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>settings" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								TRAINING MANUAL
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>reports" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
								REPORTS
								<span class="right badge badge-danger"></span>
							</p>
						</a>
					</li>

                </ul>
            </nav>

        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                     <!--   <h1 class="m-0"><?php echo $title?></h1>-->
                    </div><!-- /.col -->
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">


