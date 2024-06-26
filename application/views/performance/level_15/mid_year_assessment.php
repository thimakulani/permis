<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture" >BACK</a>
</div>
<div style="text-align: center;">
	<h2>DDG’s MID-YEAR PERFORMANCE ASSESSMENT TEMPLATE</h2>
</div>
<dl class="row">
	<dt class="col-sm-2">
		SMS MEMBER'S NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Name . ' ' . $emp->LastName; ?>
	</dd>

	<dt class="col-sm-2">
		PERSAL NUMBER
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Persal ?>
	</dd>

	<dt class="col-sm-2">
		SUPERVISOR'S NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->S_Name ?>
	</dd>

	<dt class="col-sm-2">
		BRANCH NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->b_name ?>
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
		<?php echo $emp->JobTitle ?>
	</dd>
</dl>

<!-- COPY FROM HERE -->

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php
$kra_counter = 1;
foreach ($kra as $_kra) { ?>
	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $kra_counter; ?> : <?php echo $_kra['key_results_area']?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #C1D59AFF">
				<tr>
					<th>ACTIVITIES</th>
					<th>INDICATOR/TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				$kra_counter++;
				foreach ($work_plan as $work)
				{
					if($_kra['id'] === $work['kra_id']) {?>
						<form enctype="multipart/form-data" id="update_form_data_<?php echo $work['id'] ?>" method="post">
							<tr>
								<th> <?php echo $work['key_activities'] ?> </th>
								<th> <?php echo $work['indicator_target'] ?></th>
								<th> <input class="form-control" type="text" name="actual_achievement" value="<?php echo $work['actual_achievement'] ?>" /></th>
								<th> <input class="form-control"  type="number" name="sms_rating" min="1" max="4" value="<?php echo $work['sms_rating'] ?>" /></th>
								<th> <input class="form-control" type="text" disabled value="<?php echo $work['supervisor_rating'] ?>" /></th>
								<th> <input class="form-control" type="text" disabled value="<?php echo $work['agreed_rating'] ?>" /></th>
								<th> <input type="submit" class="btn-sm btn-success"  <?php if(isset($work['actual_achievement']) && isset($work['sms_rating'])){echo 'disabled';} ?>  value="Update"> </th>
							</tr>
						</form>

						<script>
							$(document).ready(function () {
								$('#update_form_data_<?php echo $work['id'] ?>').submit(function (e) {
									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>performance/update_work_plan_mid/<?php echo $work['id'] ?>',
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


<?php } ?>
<!-- UNTIL HERE -->

<!--
<div class="card">
	<h4 class="card-header">
		ORGANISATIONAL PERFORMANCE
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #C1D59AFF">

			<tr>
				<th>TARGETED OBJECTIVES/ OUTPUTS</th>
				<th>PERFORMANCE MEASURES
					TARGET
				</th>
				<th>PROGRESS
					YES/
					NO
				</th>
				<th>PROGRESS REVIEW COMMENT</th>
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php
/*
			foreach ($organisational_performance as $perf) { */?>
				<tr>
					<th> <input class="form-control" value="<?php /*echo $perf['targeted_objectives']; */?>" /> </th>
					<th> <input class="form-control" value="<?php /*echo $perf['performance_measures_target']; */?>" /> </th>
					<th> <input class="form-control" value="<?php /*echo $perf['progress']; */?>" /> </th>
					<th> <input class="form-control" value="<?php /*echo $perf['progress_review_comment']; */?>" /> </th>
					<th></th>
				</tr>

			<?php /*} */?>
			<form id="form_op" enctype="multipart/form-data" action="<?php /* echo base_url();*/?>performance/add_organisational_performance/100" method="post">
				<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT">
				<input type="hidden" name="period" value="<?php /*echo $period;*/?>" >
				<tr>
					<td>
						<input type="text" name="targeted_objectives" class="form-control">
					</td>
					<td>
						<input type="text" name="performance_measures_target" class="form-control">
					</td>
					<td>
						<input type="text" name="progress" class="form-control">
					</td>
					<td>
						<input type="text" name="progress_review_comment" class="form-control">
					</td>
					<td>
						<input type="submit" value="ADD" class="btn-sm btn-info"/>
					</td>
				</tr>
			</form>

			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#form_op').submit(function(event) {
			// Prevent default form submission
			event.preventDefault();

			// Serialize the form data
			var formData = $(this).serialize();

			// Send AJAX request
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: formData,
				success: function(response) {
					// Handle success response
					if (response.success) {
						// Update UI or show success message
						alert('Competencies and personal development plan added successfully!');
						// Optionally, you can reset the form or update UI based on the response
						// $('#formCPCD')[0].reset();
						// Update UI or perform other actions
					} else {
						// Show error message if addition failed
						alert('Failed to add competencies and personal development plan.');
					}
				},
				error: function(xhr, status, error) {
					// Handle error response
					location.reload();
				}
			});
		});
	});

</script>
-->


<!--<div class="card">
	<h4 class="card-header">
		COMPETENCIES: PERSONAL DEVELOPMENT PLAN
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #C1D59AFF"
			">
			<tr>
				<th>CORE MANAGEMENT COMPETENCIES</th>
				<th>PROCESS COMPETENCIES
				</th>
				<th>OTHER DEVELOPMENTAL AREAS IDENTIFIED
				</th>

				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php
/*			$emp_perf = array();
			foreach ($personal_development_plan as $perf) { */?>

				<tr>
					<th><input type="text" value="<?php /*echo $perf['competencies'] */?>" class="form-control"></th>
					<th><input type="text" value="<?php /*echo $perf['process_competencies'] */?>" class="form-control"></th>
					<th><input type="text" value="<?php /*echo $perf['other_developmental_areas_identified'] */?>" class="form-control"></th>
					<th></th>
				</tr>

			<?php /*} */?>


			<form id="form_pdp" enctype="multipart/form-data" action="<?php /*echo base_url();*/?>performance/add_competencies_personal_development_plan/100" method="post">
				<input type="hidden" value="MID YEAR ASSESSMENT" name="template_name">
				<input type="hidden" name="period" value="<?php /*echo $period;*/?>" >
				<tr>
					<td>
						<input type="text" name="core_management_competencies" class="form-control">
					</td>
					<td>
						<input type="text" name="process_competencies" class="form-control">
					</td>
					<td>
						<input type="text" name="other_developmental_areas_identified" class="form-control">
					</td>

					<td>
						<input type="submit" value="ADD" class="btn-sm btn-info"/>
					</td>
				</tr>
			</form>

			<script>
				$(document).ready(function() {
					$('#form_pdp').submit(function(event) {
						// Prevent default form submission
						event.preventDefault();

						// Serialize the form data
						var formData = $(this).serialize();

						// Send AJAX request
						$.ajax({
							type: 'POST',
							url: $(this).attr('action'),
							data: formData,
							dataType: 'json', // Expect JSON response
							success: function(response) {
								// Handle success response
								if (response.success) {
									// Update UI or show success message
									alert('Competencies and personal development plan added successfully!');
									// Optionally, you can reset the form or update UI based on the response
									// $('#formCPCD')[0].reset();
									// Update UI or perform other actions
								} else {
									// Show error message if addition failed
									alert('Failed to add competencies and personal development plan.');
								}
							},
							error: function(xhr, status, error) {
								// Handle error response
								location.reload();
							}
						});
					});
				});

			</script>


			</tbody>
		</table>
	</div>
</div>
<div>-->


	<div class="form-group">
		<label for="exampleFormControlTextarea1">Comment by the SMS member on his/her performance</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Comment by the Supervisor</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
</div>
<br />
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir_mid_ddg/100">
	<br/>
	<div class="card">
		<div class="card-body">
			<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<br>







