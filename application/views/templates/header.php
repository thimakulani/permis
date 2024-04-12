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
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugin/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/blueimp-gallery.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme-celurean.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom-style.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flatpickr.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-editable.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/smart_wizards.css" />
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
	<style>
		a {text-decoration: none; }
	</style>
</head>
<body id="main" class="with-login employees-index text-decoration-none">
<div id="page-wrapper">
	<!-- Show progress bar when ajax upload-->
	<div class="progress ajax-progress-bar">
		<div class="progress-bar"></div>
	</div>
	<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark" style="background-color: grey">
		<div class="container-fluid">
			<a class="navbar-brand text-white">
				<img class="img-responsive " src="<?php echo base_url(); ?>assets/images/logo.jpg" /> e-PERMIS            </a>
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			</button>
			<button type="button" id="sidebarCollapse" class="btn btn-success">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse navbar-responsive-collapse">

			</div>
			<div class="justify-content-right" >
				<a class="nav-link" href="<?php echo base_url();?>performance/submitted_performance">

					<span class="badge badge-warning navbar-badge">
						<?php if(isset($_SESSION['Id']))
						{
							$perm = new PerformanceModel();
							$notification_counter = $perm->to_me_pending($_SESSION['Id']);
							echo sizeof($notification_counter);
						}?>
					</span>
				</a>
			</div>
		</div>
	</div>
	<nav id="sidebar" class="navbar-dark" style="background-color: rgb(52, 173, 0) ">
		<ul class="nav navbar-nav w-100 flex-column align-self-start">
			<li class="menu-profile text-start nav-item">
				<h5 class="user-name"> Hi <?php echo $_SESSION['Names']; ?></h5>
				<div class="dropdown menu-dropdown">
					<button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user"></i>
					</button>
					<ul class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url(); ?>employees/profile"><i class="fa fa-user"></i> My Account</a>
						<a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/logout"><i class="fa fa-sign-out"></i> Logout</a>
					</ul>
				</div>
			</li>
		</ul>

		<ul id="" class="nav navbar-nav w-100 flex-column align-self-start">
			<li class="nav-item">
				<a class="nav-link active" href="<?php echo base_url(); ?>dashboard">
					<i class="fa fa-home  "></i>
					<span class="menu-label">DASHBOARD</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link active" href="<?php echo base_url(); ?>performance">
					<i class="fa fa-tasks "></i>
					<span class="menu-label">PERFORMANCE TOOL</span>
				</a>
			</li>



			<li class="nav-item">
				<a class="nav-link active" href="<?php echo base_url();?>specialrequest">
					<i class="fa fa-calendar-check-o"></i>
					<span class="menu-label">SPECIAL REQUEST</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="<?php echo base_url(); ?>achievements">
					<i class="fa fa-area-chart"></i>
					<span class="menu-label">ACHIEVEMENTS</span>
				</a>
			</li>
			<?php if($_SESSION['Role'] == 3 || $_SESSION['Role'] == 6){?>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url();?>pmd_officials">
						<i class="fa fa-users"></i>
						<span class="menu-label">PMD OFFICIALS</span>
					</a>


				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url();?>pmd_officials/pmd_view">
						<i class="fa fa-eye"></i>
						<span class="menu-label">PMD INSTRUMENTS MODERATION</span>
					</a>
				</li>

			<?php }?>
			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3) { ?>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>semester">
						<i class="fa fa-angellist "></i>
						<span class="menu-label">SEMESTERS</span>
					</a>
				</li>



				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>employees">
						<i class="fa fa-users "></i>
						<span class="menu-label">EMPLOYEES</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>settings">
						<i class="fa fa-wrench  "></i>
						<span class="menu-label">SETTINGS</span>
					</a>
				</li>
			<?php }?>
			<li class="nav-item">
				<a class="nav-link active" href="<?php echo base_url(); ?>manual">
					<i class="fa fa-newspaper-o "></i>
					<span class="menu-label">TRAINING MANUAL</span>
				</a>
			</li>
			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3 || isset($_SESSION['sys_owner'])) { ?>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>library">
						<i class="fa fa-clipboard "></i>
						<span class="menu-label">LIBRARY</span>
					</a>
				</li>
			<?php } ?>

			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3 || isset($_SESSION['sys_owner'])) { ?>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>assessments">
						<i class="fa fa-clipboard "></i>
						<span class="menu-label">ASSESSMENTS</span>
					</a>
				</li>
			<?php } ?>
			<?php if($_SESSION['Role'] == 2 || $_SESSION['Role'] == 3 || $_SESSION['Role'] == 6 ) { ?>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo base_url(); ?>reports">
						<i class="fa fa-clipboard "></i>
						<span class="menu-label">REPORTS</span>
					</a>
				</li>
			<?php } ?>
		</ul>
	</nav>
	<div id="main-content">
		<!-- Page Main Content Start -->
		<div id="page-content">
			<section class="jumbotron" >




