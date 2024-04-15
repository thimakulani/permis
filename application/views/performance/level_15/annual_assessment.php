<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture" >BACK</a>
</div>
<br />
<div class="alert alert-info" style="text-align: center;">
	<h4>
		ANNUAL PERFORMANCE ASSESSMENT TEMPLATE FOR DEPUTY DIRECTOR-GENERAL
	</h4>
</div>
<dl class="row alert alert-info">
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
<div class="alert alert-info">


<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php foreach ($individual_performance as $_kra){ ?>

	<div class="card">
		<h4 class="card-header">
			KRA: <?php echo $_kra['key_results_area']; ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped">
				<thead style="background-color: #fbd4b4">
				<tr>
					<th>ACTIVITIES</th>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
					<th>MODERATED RATING</th>
					<?php if($user_submission === 0) {?>
						<th></th>
					<?php }?>
				</tr>
				</thead>
				<tbody>

				<?php foreach ($work_plan as $work) {
					if ($work['kra_id'] == $_kra['id']) { ?>
						<form id="update_form_data_<?php echo $work['id'] ?>" method="post" action="<?php echo base_url() ?>performance/update_annual/<?php echo $work['id'] ?>" class="work-plan-form">
							<tr>
								<th><?php echo $work['key_activities']; ?></th>
								<th><?php echo $work['indicator_target']; ?></th>
								<th><input class="form-control actual_achievement_ann" name="actual_achievement_ann" value="<?php echo $work['actual_achievement_ann']; ?>" /></th>
								<th><input class="form-control sms_rating_ann" type="number" name="sms_rating_ann" min="1" max="4" value="<?php echo $work['sms_rating_ann']; ?>" /></th>
								<th></th>
								<th></th>
								<th></th>
								<?php if($user_submission === 0) {?>
									<th><input type="submit" class="btn-sm btn-info submit-btn" value="Update" /></th>
								<?php } ?>
							</tr>
						</form>
						<script>
							$(document).ready(function () {
								$('#update_form_data_<?php echo $work['id'] ?>').submit(function (e) {
									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>performance/update_annual',
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


					<?php }
				} ?>
				</tbody>
			</table>
		</div>
	</div>

<?php } ?>

</div>

<br />




<form id="auditorForm" class="card" method="post">
	<h4 class="card-header">AUDITOR GENERAL OPINION AND FINDINGS AND ORGANISATIONAL PERFORMANCE</h4>
	<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
	<div class="row card-body">
		<div class="col table-responsive">
			<input type="hidden" name="period" value="<?php echo $period; ?>" />
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2">
							AUDITORS GENERAL OPINION AND FINDINGS
						</th>
					</tr>

				</thead>
				<tbody>
					<tr>
						<td>AG Weighting <input class="form-control" required type="number" value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->ag_weight ?>" name="ag_weight" ></td>
						<td>AG assessment score (rating 0-3) <input required min="1" max="3" value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->ag_assessment_score ?>" name="ag_assessment_score" class="form-control" type="number"> </td>
					</tr>
					<tr>
						<td>Weighted Score/rating</td>
						<td><input class="form-control" value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->ag_weight/$auditor_general_opinion_and_findings->ag_assessment_score; ?>" type="number"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2">
							ORGANISATIONAL PERFORMANCE (APP TARGET)
						</th>
					</tr>

				</thead>
				<tbody>
					<tr>
						<td>APP Weighting <input required value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->app_weight ?>" name="app_weight" class="form-control" type="number"></td>
						<td>
							Number of Planned Targets <input required value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->num_planned_targets ?>" name="num_planned_targets" class="form-control" type="number">
							Targets Achieved <input required value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->targets_achieved ?>" name="targets_achieved" class="form-control" type="number">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer">
		<?php if(!isset($auditor_general_opinion_and_findings)) { ?>
			<input type="submit" class="btn-sm btn-success" value="Save">
		<?php } ?>
	</div>
</form>

<script>
	$(document).ready(function(){
		// Attach submit event handler to the form
		$('#auditorForm').submit(function(event){
			// Prevent default form submission
			event.preventDefault();

			// Serialize form data
			var formData = $(this).serialize();

			// Send AJAX request
			$.ajax({
				url: '<?php echo base_url() ?>performance/add_auditor_general_opinion_and_findings_annual', // Replace with your endpoint URL
				method: 'POST',
				data: formData,
				success: function(response){
					// Handle success response
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: 'Findings have been successfully submitted!',
						onClose: () => {
							location.reload();
						}
					});
				},
				error: function(xhr, status, error){
					// Handle error
					console.error(xhr.responseText);
				}
			});
		});
	});
</script>



<br />

<form id="performanceForm" method="post">
	<br/>
	<div class="card">
		<div class="card-body">
			<input type="hidden" name="period" class="form-control" value="<?php echo $period; ?>" />
			<div class="form-group">
				<label>
					Comment by the DDG on his/her performance
				</label>
				<textarea class="form-control" name="emp_comment"></textarea>
			</div>
			<br />
			<div class="form-group">
				<label>
					Comment by the Head of Department
				</label>
				<textarea class="form-control" disabled name="sup_comment"></textarea>
			</div>
			<br />
		</div>
		<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
		<div class="card-footer">
			<?php if($user_submission === 0) {?>
				<button type="button" id="submitPerformance" class="btn btn-info">SUBMIT TO SUPERVISOR</button>
			<?php } ?>
		</div>
	</div>
</form>

<script>
	$(document).ready(function() {
		$('#submitPerformance').click(function() {
			// Serialize the form data
			var formData = $('#performanceForm').serialize();

			//alert($('#performanceForm').attr('action'));
			// Perform AJAX request
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url() ?>performance/submit_performance_annual",
				data: formData,
				//dataType: 'json', // Expect JSON response
				success: function(response) {
					// Handle success response

					if(response.error){
						Swal.fire({
							icon: 'error',
							title: 'Error!',
							text: response.message,

						});
					} else {
						Swal.fire({
							icon: 'success',
							title: 'Success!',
							text: response.message,
							onClose: () => {
								location.reload();
							}
						});
					}

				},
				error: function(xhr, status, error) {

					Swal.fire({
						icon: 'success',
						title: 'success!',
						text: 'Successfully Submitted!',
					});
				}
			});
		});
	});
</script>

