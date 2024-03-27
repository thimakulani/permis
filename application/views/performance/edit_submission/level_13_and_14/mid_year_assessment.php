<?php
$is_valid = true;
?>

<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div style="text-align: center;">

	<h4>MID YEAR ASSESSMENT FOR DEPUTY DIRECTOR-GENERAL</h4>

</div>
<?php
if($submission->status == 'REJECTED')
{ ?>
	<h3 style="color: crimson;font-weight: bold">SUPERVISOR COMMENT: <?php echo $submission->sup_comment ?> </h3>
<?php }
else if($submission->status_final == 'REJECTED')
{ ?>
	<p>PMD OFFICIALS COMMENT: <?php echo $submission->pmd_comment ?> </p>
<?php }
?>

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
		<?php echo '' ?>
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
					<?php if($user_submission < 1 || empty($work['sms_rating'])){ ?>
						<th></th>
					<?php } ?>
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
								<td><input type="text" name="actual_achievement" value="<?php echo $work['actual_achievement'] ?>" required class="form-control"></td>
								<!--<td><?php /*echo $work['actual_achievement'] */?></td>-->
								<td><input type="number" min="1" max="4" name="sms_rating" value="<?php echo $work['sms_rating'] ?>" class="form-control"></td>
								<td><input type="number" name="supervisor_rating" disabled value="<?php echo $work['supervisor_rating'] ?>" class="form-control"></td>
								<td><input type="number" name="agreed_rating" disabled value="<?php echo $work['agreed_rating'] ?>" class="form-control"></td>
								<?php if(empty($work['sms_rating'])){ ?>
									<td><input type="submit" value="update" class="btn-sm btn-info" /></td>
								<?php } ?>
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

			<?php foreach ($personal_developmental_plan as $gmcWork): ?>
				<tr>
					<td><?= $gmcWork['core_management_competencies'] ?></td>
					<td><?= $gmcWork['process_competencies'] ?></td>
					<td><?= $gmcWork['dev_required'] ?></td>
					<!--<td><?php /*= $gmcWork['dev_required_pcs'] */?></td>-->
					<!--<td>
						<a class="btn-sm btn-danger" href="<?php /*= base_url() */?>performance/remove_generic_management_competencies/10/<?php /*= $gmcWork['id'] */?>">X</a>
					</td>-->
				</tr>
			<?php endforeach; ?>

			<!--<form id="add_gmc" method="post" action="<?php /*= base_url() */?>performance/add_generic_management_competencies/10">
				<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT" />
				<tr>
					<td><input class="form-control" name="core_management" required type="text" /></td>
					<td><input class="form-control" name="process_competencies" required type="text" /></td>
					<td>
						<select name="dev_required_cmcs" class="form-control select">
							<option value="YES">YES</option>
							<option value="NO">NO</option>
						</select>
					</td>
					<td>
						<select name="dev_required_pcs" class="form-control select">
							<option value="YES">YES</option>
							<option value="NO">NO</option>
						</select>
					</td>
					<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
				</tr>
			</form>-->

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
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir_mid/10">
	<br/>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the SMS member  on his/her performance
				</label>
				<textarea <?php if($user_submission >= 1) echo 'disabled'?> class="form-control" name="emp_comment" ></textarea>

			</div>
			<br />

			<div class="form-group">
				<label>
					Comment by the Supervisor
				</label>
				<textarea disabled class="form-control" ></textarea>

			</div>
			<br />
		</div>
		<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
		<?php if($submission->status == 'REJECTED' || $submission->status_final == 'REJECTED') { ?>
			<form action="<?php echo base_url() ?>performance/resubmit_changes/<?php  echo $submission->id ?>" method="post">
				<br/>
				<div class="card">
					<div class="card-footer">
						<div style="text-align: right;">
							<input type="hidden" name="status" value="<?php echo $submission->status ?>"/>
							<input type="hidden" name="status_final" value="<?php echo $submission->status_final ?>"/>
							<input type="submit" value="SAVE CHANGES" class="btn btn-info text-decoration-none text-white" />
						</div>
					</div>
				</div>
			</form>

		<?php } ?>
	</div>
</form>
<br>

