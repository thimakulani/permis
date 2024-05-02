<?php $period = $submission->period;

?>
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance">BACK</a>
</div>

<div>

	<h1 style="font-weight: bold" align="center">ANNUAL PERFORMANCE ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period; ?></h4>
	<h4 style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</h4>


	<?php
	if($submission->status == 'REJECTED')
	{ ?>
		<h3 class="alert alert-info" style="color: crimson;font-weight: bold">SUPERVISOR COMMENT: <?php echo $submission->sup_comment ?> </h3>
	<?php }
	else if($submission->status_final == 'REJECTED')
	{ ?>
		<p class="alert alert-info">PMD OFFICIALS COMMENT: <?php echo $submission->pmd_comment ?> </p>
	<?php }
	?>

	<div class="alert alert-info">
		<dl class="row">
			<dt class="col-sm-2">
				SMS MEMBER'S NAME
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->Name . ' ' . $emp->LastName;
				} ?>
			</dd>

			<dt class="col-sm-2">
				PERSAL NUMBER
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->Persal;
				} ?>
			</dd>

			<dt class="col-sm-2">
				SUPERVISOR'S NAME
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->S_Name;
				} ?>
			</dd>

			<dt class="col-sm-2">
				BRANCH NAME
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->b_name;
				} ?>
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
				<?php if (isset($emp)) {
					echo $emp->JobTitle;
				} ?>
			</dd>
		</dl>
	</div>






	<p style="font-weight: bold">(To be completed by the jobholder, prior to the assessment process. If the space
		provided is insufficient, the comments can be included as an attachment)</p>

	<ul>
		<li>During this performance assessment period, my major achievements / accomplishments as they relate to my
			Performance Agreement were:
		</li>
		<li>During this performance assessment period, I have achieved / accomplished the following, which was/were not
			part of my Performance Agreement:
		</li>
		<li>During this performance assessment period, I was less successful in the following areas, which formed part
			of my Performance Agreement, for the reasons stated
		</li>
	</ul>


</div>


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
					<th>MODERATED  RATING</th>
					<?php /*if($user_submission == 0){ */?>
						<th></th>
					<?php /*} */?>
				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($work_plan as $work)
				{ ?>
					<?php if($work['kra_id'] == $_kra['id']) {?>
					<?php
					if (empty($work['sms_rating_ann'])){
						$is_valid = false;
					}

					?>
					<form id="update_form_data_<?php echo $work['id'] ?>"  method="post">
						<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT" />
						<input type="hidden" name="id" value="<?php echo $work['id']; ?>" />
						<tr>
							<td><?php echo $work['key_activities'] ?></td>
							<td><?php echo $work['target_date'] ?></td>
							<td><input type="text" name="actual_achievement_ann"  value="<?php echo $work['actual_achievement_ann'] ?>" class="form-control"></td>
							<td><input type="number" max="4" min="1" name="sms_rating_ann" value="<?php echo $work['sms_rating_ann'] ?>" class="form-control"></td>
							<td><?php echo $work['supervisor_rating_ann'] ?></td>
							<td><?php echo $work['agreed_rating_ann'] ?></td>
							<td><?php echo $work['moderated_rating_ann'] ?></td>
							<?php /*if($user_submission == 0){ */?>
								<td>  <input type="submit" value="update" class="btn-sm btn-info" /></td>
							<?php /*} */?>
						</tr>
					</form>

					<script>
						$(document).ready(function () {
							$('#update_form_data_<?php echo $work['id'] ?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url() ?>performance/update_work_plan_annual',
									data: $('#update_form_data_<?php echo $work['id'] ?>').serialize(), // serialize the form data
									success: function (response) {
										Swal.fire({
											icon: 'success',
											title: 'Success!',
											text: 'Changes saved successfully!',
											onClose: () => {
												location.reload();
											}
										});
									},
									error: function(xhr, status, error) {
										// Handle error response with SweetAlert2
										Swal.fire({
											icon: 'error',
											title: 'Error!',
											text: `An error occurred. Please try again later. ${error}`,
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
<br />
<!--<div class="card">
	<div class="card-header">
		<h4>COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #c1d59a">
			<tr>
				<th>CORE MANAGEMENT COMPETENCIES</th>
				<th>PROCESS COMPETENCIES</th>
				<th>DEV REQUIRED</th>
			</tr>
			</thead>
			<tbody>
			<?php /*foreach ($gmc_personal_development_plan as $gmcWork): */?>
				<tr>
					<td><?php /*= $gmcWork['core_management'] */?></td>
					<td><?php /*= $gmcWork['process_competencies'] */?></td>
					<td><?php /*= $gmcWork['dev_required'] */?></td>
				</tr>
			<?php /*endforeach; */?>
			</tbody>
		</table>
	</div>-->

	<!--	<div class="card-body">
		<form method="post" action="<?php /*= base_url() */?>performance/add_generic_management_competencies_personal_development_plan">
			<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
			<div class="form-row">
				<div class="col">
					<input class="form-control" name="core_management_competencies" required type="text" placeholder="Core Management Competencies" />
				</div>
				<div class="col">
					<input class="form-control" name="process_competencies" required type="text" placeholder="Process Competencies" />
				</div>
				<div class="col">
					<select name="dev_required" class="form-control select">
						<option value="YES">YES</option>
						<option value="NO">NO</option>
					</select>
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Add Entry</button>
				</div>
			</div>
		</form>
	</div>-->
</div>

<!--<form method="post" action="<?php /*echo base_url() */?>performance/submit_performance_dir_ann/11">
	<br/>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the SMS member  on his/her performance
				</label>
				<textarea class="form-control" ></textarea>

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
		<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<br>
-->

<!--<form id="assessmentForm" method="post" >
	<br/>
	<input type="hidden" value="<?php /*echo $period */?>" name="period" />
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<label>
					COMMENT BY THE SMS MEMBER ON HIS/HER PERFORMANCE
				</label>
				<textarea class="form-control" name="emp_comment"><?php /*echo $submission->emp_comment; */?></textarea>
			</div>
			<br />

			<div class="form-group">
				<label>
					Comment by the Supervisor
				</label>
				<textarea disabled class="form-control"></textarea>
			</div>
			<br />
		</div>
		<input value="ANNUAL ASSESSMENT" type="hidden" name="template_name"/>

			<div class="card-footer">
				<button type="submit" id="submitButton" class="btn btn-info">SUBMIT TO SUPERVISOR</button>
			</div>

	</div>
</form>-->

	<br/>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the SMS member  on his/her performance
				</label>
				<textarea class="form-control" name="emp_comment"><?php echo $submission->emp_comment; ?></textarea>
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
<br>




