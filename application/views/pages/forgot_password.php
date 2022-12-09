<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<!-- /.login-logo -->
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<a href="#" class="h2"><b>PERMIS</b></a>
		</div>
		<div class="card-body">
			<p class="login-box-msg text-success">You forgot your password? Here you can easily set a new password.</p>

			<form action="<?php echo site_url('Auth/reset_password'); ?>" method="post">

				<span class="text-danger">
					<?php echo $error ?>
				</span>
				<div class="input-group mb-3">
					<input type="text" class="form-control"
						   placeholder="Persal" name="persal" value="<?php echo set_value('persal') ?>" />

					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>

				</div>
				<div>
					<span class="text-danger"> <?php echo form_error('persal') ?> </span>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control"
						   placeholder="New Password" value="<?php echo set_value('password') ?>" name="password" />
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>

				</div>
				<div>
					<span class="text-danger"> <?php echo form_error('password') ?> </span>
				</div>

				<!-- /.col -->
				<div class="">
					<button type="submit" class="btn btn-primary btn-block">Update Password</button>
					<a href="<?php echo base_url()?>" class="btn btn-primary btn-block">Login</a>
				</div>
				<!-- /.col -->

			</form>

		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
