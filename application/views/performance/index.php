<?php
	if(!isset($_SESSION['Id']))
	{
		redirect('/');
	}
?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="m-3">
				<a href="<?php echo base_url()?>performance/performance_capture" class="btn-lg btn-success text-decoration-none">
					CAPTURE PERFORMANCE
					<!-- /.info-box-content -->
				</a>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<?php if($num_rows > 0){ ?>
			<div class="m-3">
				<a href="<?php echo base_url()?>performance/submitted_performance" class="btn-lg btn-success text-decoration-none">

					PERFORMANCE SUBMITTED TO YOU
					<!-- /.info-box-content -->
				</a>
				<!-- /.info-box -->
			</div>
			<?php } ?>

			<?php if($_SESSION['Role']==3){ ?>
				<div class="m-3">
				<a href="<?php echo base_url()?>performance/permis_official_submissions" class="btn-lg btn-info text-decoration-none">

					SUBMISSIONS
					<!-- /.info-box-content -->
				</a>
				<!-- /.info-box -->
			</div>
			<?php }?>
			<!-- /.col -->
			<!-- /.col -->
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h3 class="card-title">YOUR SUBMISSION</h3>


	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th>
					Id#
				</th>
				<th>
					SUPERVISOR
				</th>
				<th>
					DATE CAPTURED
				</th>
				<th>
					TEMPLATE NAME
				</th>
				<th>
					PERIOD
				</th>
				<th>
					STATUS(SUPERVISOR)
				</th>
				<th>
					STATUS(PMDS)
				</th>
				<th>

				</th>

			</tr>
			</thead>
			<tbody>
			<?php
				foreach ($submissions as $perf)
				{
					?>
					<tr>
										<td>
											<?php echo $perf['id'];?>
										</td>
										<td>
											<?php echo $perf['S_Name']; ?>
										</td>
										<td>
											<?php echo $perf['date_captured'] ?>
										</td>
										<td>
											<?php echo $perf['template_name'] ?>
										</td>
										<td>
											<?php echo $perf['period'] ?>
										</td>
										<td>
											<?php echo $perf['status'] ?>
										</td>
										<td>
											<?php echo $perf['status_final'] ?>
										</td>
										<td>
											<a href="<?php echo base_url() ?>performance/view_submitted/<?php echo $perf['id']?>" class="btn-sm btn-info" >
												<i class="fa fa-folder-open "></i>
													View
											</a>
											<?php
												if($perf['template_name'] == 'PERFORMANCE INSTRUMENT' && $perf['status'] == 'REJECTED' || $perf['status_final'] == 'REJECTED' ){ ?>
													| <a href="<?php echo base_url() ?>performance/edit_submission/<?php echo +$perf['id'] ?>" class="btn-sm btn-danger" >
														<i class="fas fa-edit"></i>
														Edit
													</a>
											<?php }


											else if($perf['template_name'] == 'MID YEAR ASSESSMENT' && $perf['status'] == 'REJECTED' || $perf['status_final'] == 'REJECTED'){ ?>
												| <a href="<?php echo base_url() ?>performance/edit_submission_mid/<?php echo +$perf['id'] ?>" class="btn-sm btn-danger" >
													<i class="fas fa-edit"></i>
													Edit
												</a>
											<?php }


											else if($perf['template_name'] == 'ANNUAL ASSESSMENT' && $perf['status'] == 'REJECTED' || $perf['status_final'] == 'REJECTED'){ ?>
												| <a href="<?php echo base_url() ?>performance/edit_submission_ann/<?php echo +$perf['id'] ?>" class="btn-sm btn-danger" >
													<i class="fas fa-edit"></i>
													Edit
												</a>
											<?php }

												?>
										</td>
										
									</tr>

					<?php }?>

			</tbody>
		</table>
	</div>
</div>
