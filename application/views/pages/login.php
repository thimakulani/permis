
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" href="<?php echo base_url()?>assets//images/logo.jpg" />
	<meta name="theme-color" content="#000000" />
	<meta name="author" content="" />
	<meta name="keyword" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/blueimp-gallery.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme-celurean.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom-style.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flatpickr.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-editable.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/smart_wizards.css" />
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
</head>
<body id="index" class="with-login index-index" style="background-color: rgb(52, 173, 0) ">
<div id="page-wrapper">
	<!-- Show progress bar when ajax upload-->
	<div class="progress ajax-progress-bar">
		<div class="progress-bar"></div>
	</div>
	<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark" >
		<div class="container-fluid" style="background: grey">
			<a class="navbar-brand" href="<?php echo base_url()?>Home">
				<img class="img-responsive" src="<?php echo base_url()?>assets/images/logo.jpg" /> PERMIS            </a>
		</div>
	</div>
	<div id="main-content">
		<!-- Page Main Content Start -->
		<div id="page-content">
			<div  class=" py-5">
				<div class="container">
					<div class="row justify-content-center">

						<div class="col-md-4 comp-grid">

							<div  class="bg-light p-3 animated fadeIn page-content">
								<div>
									<h4><i class="fa fa-key"></i> User Login</h4>
									<hr />
									<?php if(isset($error)){ ?>
										<div class="alert alert-danger animated shake">
											<?php echo $error ?>
										</div>
									<?php } ?>
									<form name="loginForm" autocomplete="off" action="<?php echo base_url()?>auth/login_user" class="needs-validation form page-form" method="post">
										<div class="input-group form-group">
											<input autocomplete="off" placeholder="PERSAL NUMBER"  name="persal"  required="required" class="form-control" type="number"  />
											<div class="input-group-append">
												<span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
											</div>
										</div>
										<div class="input-group form-group">
											<input autocomplete="off" placeholder="Password" required="required" name="password" class="form-control " type="password" />
											<div class="input-group-append">
												<span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
											</div>
										</div>

										<div class="form-group text-center">
											<button class="btn btn-primary btn-block btn-md" type="submit">
												<i class="load-indicator">
													<clip-loader :loading="loading" color="#fff" size="20px"></clip-loader>
												</i>
												Login <i class="fa fa-key"></i>
											</button>
										</div>
										<hr />

									</form>
								</div>
							</div>
						</div>

						<div class="col-md-4 comp-grid">

							<div  class="bg-dark p-3 animated fadeIn page-content">
								<div>
									<h4><i class="fa fa-key"></i> User Local Login</h4>
									<hr />
									<?php if(isset($error)){ ?>
										<div class="alert alert-danger animated shake">
											<?php echo $error ?>
										</div>
									<?php } ?>
									<form name="loginForm" autocomplete="off" action="<?php echo base_url()?>auth/login_user_local" class="needs-validation form page-form" method="post">
										<div class="input-group form-group">
											<input autocomplete="off" placeholder="PERSAL NUMBER"  name="persal"  required="required" class="form-control" type="number"  />
											<div class="input-group-append">
												<span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
											</div>
										</div>
										<div class="input-group form-group">
											<input autocomplete="off" placeholder="Password" required="required" name="password" class="form-control " type="password" />
											<div class="input-group-append">
												<span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
											</div>
										</div>

										<div class="form-group text-center">
											<button class="btn btn-primary btn-block btn-md" type="submit">
												<i class="load-indicator">
													<clip-loader :loading="loading" color="#fff" size="20px"></clip-loader>
												</i>
												Login <i class="fa fa-key"></i>
											</button>
										</div>
										<hr />

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page Main Content [End] -->
		<!-- Page Footer Start -->
		<!-- Page Footer Ends -->
		<div class="flash-msg-container"></div>
		<!-- Modal page for displaying ajax page -->
		<div id="main-page-modal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body p-0 reset-grids inline-page">
					</div>
					<div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal page for displaying record delete prompt -->
		<div class="modal fade" id="delete-record-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="delete-record-modal-confirm" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Delete record</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div id="delete-record-modal-msg" class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<a href="" id="delete-record-modal-btn" class="btn btn-primary">Delete</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Image Preview Component [Start] -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
			<div class="slides"></div>
			<h3 class="title"></h3>
			<a class="prev">‹</a>
			<a class="next">›</a>
			<a class="close">×</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
		</div>
		<!-- Image Preview Component [End] -->
		<template id="page-loading-indicator">
			<div class="p-2 text-center m-2 text-muted m-auto">
				<div class="ajax-loader"></div>
				<h4 class="p-3 mt-2 font-weight-light">Loading...</h4>
			</div>
		</template>
		<template id="page-saving-indicator">
			<div class="p-2 text-center m-2 text-muted">
				<div class="lds-dual-ring"></div>
				<h4 class="p-3 mt-2 font-weight-light">Saving...</h4>
			</div>
		</template>
		<template id="inline-loading-indicator">
			<div class="p-2 text-center d-flex justify-content-center">
				<span class="loader mr-3"></span>
				<span class="font-weight-bold">Loading...</span>
			</div>
		</template>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/flatpickr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-editable.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.smartwizard.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins-init.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/page-scripts.js"></script>
</body>
</html>
