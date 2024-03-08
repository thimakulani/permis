
<section class="content">
<div class="card">
	<div class="card-header">
		<h5>QUICK LINKS</h5>
	</div>
	<div class="row card-body">
		<a class="btn-lg btn-success" style="margin: 5px" href="<?php echo base_url() ?>employees/profile">PROFILE</a>
		<a class="btn-lg btn-info" style="margin: 5px" href="<?php echo base_url() ?>performance/performance_capture">PERFORMANCE
			CAPTURE</a>
		<!--<a class="btn-lg btn-info" style="margin: 5px" href="<?php /*echo base_url()*/ ?>performance/template/200">PERFORMANCE AGREEMENT</a>
		<a class="btn-lg btn-info" style="margin: 5px" href="<?php /*echo base_url()*/ ?>performance/template/300">ANNUAL ASSESSMENT</a>-->
	</div>
</div>



	<?php if ($_SESSION['Role'] == 3) { ?>

		<div class="card">
			<div class="card-header">
				SPECIAL REQUESTS
			</div>
			<div class="card-body row">
					<!-- /.col -->
					<a href="<?php echo base_url()?>special"  style="margin: 5px"  class="btn-lg btn-primary " >SPECIAL REQUESTS APPLICATIONS(<?php echo $leaves_counter; ?>)</a>
					<a href="<?php echo base_url()?>special/recommended" style="margin: 5px"  class="btn-lg btn-primary" >RECOMMENDED SPECIAL REQUESTS(<?php echo $recommended_counter;?>)</a>
					<!-- /.info-box -->
			</div>
		</div>

	<?php } ?>
</section>



