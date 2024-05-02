<?php
	$is_valid = true;
?>

<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div style="text-align: center;">

	<h4>CHIEF DIRECTOR AND DIRECTOR PERFORMANCE ANNUAL REVIEW TEMPLATE</h4>

</div>


<div class="alert alert-info">
<dl class="row">
	<dt class="col-sm-2">
		SMS MEMBER'S NAME
	</dt>
	<dd class="col-sm-10">
		<?php
		if(isset($emp->Name) && isset($emp->LastName)){
		echo "{$emp->Name} {$emp->LastName}"; }
		?>
	</dd>

	<dt class="col-sm-2">
		PERSAL NUMBER
	</dt>
	<dd class="col-sm-10">
		<?php if (!empty($emp)) {
			echo $emp->Persal;
		} ?>
	</dd>

	<dt class="col-sm-2">
		SUPERVISOR'S NAME
	</dt>
	<dd class="col-sm-10">
		<?php if (!empty($emp)) {
			echo $emp->S_Name;
		} ?>
	</dd>

	<dt class="col-sm-2">
		BRANCH NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->b_name; ?>
	</dd>

	<dt class="col-sm-2">
		PROVINCE (IF APPLICABLE)
	</dt>
	<dd class="col-sm-10">
		<?php echo '' ?>
	</dd>

	<dt class="col-sm-2">
		JOB TITLE
	</dt>
	<dd class="col-sm-10">
		<?php if (!empty($emp)) {
			echo $emp->JobTitle;
		} ?>
	</dd>
</dl>
<br/>
</div>

<div class="alert alert-info">

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php foreach ($kra as $_kra){

	?>
	<div class="card">
		<h4 class="card-header">
			KRA: <?php echo $_kra['key_results_area']; ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #c1d59a">
				<tr>
					<th>ACTIVITIES</th>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
					
				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($work_plan as $work){ ?>
					<?php if($work['kra_id'] == $_kra['id']) {?>

						<?php
							if (empty($work['sms_rating'])){
								$is_valid = false;
							}

						?>
						<form id="update_wp<?php echo $work['id'] ?>" enctype="multipart/form-data" action="<?php echo base_url();?>performance/update_work_plan/<?php echo $work['id'];?>/10" method="post">
							<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT" />
							<tr>
								<td><?php echo $work['key_activities'] ?></td>
								<td><?php echo $work['target_date'] ?></td>
								<td><?php echo $work['actual_achievement_ann'] ?></td>
								<!--<td><?php /*echo $work['actual_achievement'] */?></td>-->
								<td><?php echo $work['sms_rating_ann'] ?></td>
								<td><?php echo $work['supervisor_rating_ann'] ?></td>
								<td><?php echo $work['agreed_rating_ann'] ?> </td>
								
							</tr>
						</form>
						<script>
							$(document).ready(function () {
								$('#update_wp<?php echo $work['id'] ?>').submit(function (e) {
									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>performance/update_work_plan/<?php echo $work['id'];?>/10',
										data: $('#update_wp<?php echo $work['id'] ?>').serialize(), // serialize the form data
										success: function (response) {
											Swal.fire({
												icon: 'success',
												title: 'Success',
												text: 'Successfully Captured',
												onClose: () => {
													location.reload();
												}
											});
										}
									});
								});
							});

						</script>

					<?php } ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>



	<br>

<?php } ?>

<?php ?>
<div class="card">
	<div class="card-header">
		<h5>COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h5>
	</div>

	<div class="card-body table-responsive">

		<table class="table table-striped projects">
			<thead style="background-color: #c1d59a">
			<tr>
				<th>
					CORE MANAGEMENT COMPETENCIES(CMCs)

				</th>
				<th>
					PROCESS COMPETENCIES(PCs)
				</th>
				<th>
					DEV REQUIRED(CMCs)
				</th>
				<th>
					DEV REQUIRED(PCs)
				</th>
				<!--<th></th>-->

			</tr>
			</thead>
			<tbody>

			<?php foreach ($gmc_personal_development_plan as $gmcWork): ?>
				<tr>
					<td><?= $gmcWork['core_management'] ?></td>
					<td><?= $gmcWork['process_competencies'] ?></td>
					<td><?= $gmcWork['dev_required_cmcs'] ?></td>
					<td><?= $gmcWork['dev_required_pcs'] ?></td>
					<!--<td>
						<a class="btn-sm btn-danger" href="<?php /*= base_url() */?>performance/remove_generic_management_competencies/10/<?php /*= $gmcWork['id'] */?>">X</a>
					</td>-->
				</tr>
			<?php endforeach; ?>
			<script>
				$(document).ready(function () {
					$('#add_gmc').submit(function (e) {
						e.preventDefault(); // prevent the form from submitting normally
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>performance/add_generic_management_competencies/10',
							data: $('#add_gmc').serialize(), // serialize the form data
							success: function (response) {
								location.reload();
								$('#response').html(response); // display the response on the page
							}
						});
					});
				});

			</script>

			</tbody>

		</table>

	</div>
</div>
<br/>
</div>

