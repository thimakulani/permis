
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
											<input autocomplete="off" placeholder="PERSAL NUMBER" name="persal"  required="required" class="form-control" type="text"  />
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
										<div class="input-group form-group">
											<select name="login_type" class="form-control select">
												<option  value="ldap" <?php if(isset($_POST['ldap'])) echo 'selected'?> >LDAP</option>
												<option  value="local" <?php if(isset($_POST['local'])) echo 'selected'?> >LOCAL</option>
											</select>
										</div>
										<div class="row clearfix mt-3 mb-3">

											<div class="col-6">
												<a href="<?php echo base_url()?>auth/reset_password" class="text-danger"> Reset Local Password?</a>
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
