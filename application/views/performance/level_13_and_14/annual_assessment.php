<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
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
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($work_plan as $work){ ?>
					<?php if($work['kra_id'] == $_kra['id']) {?>
						<form id="update_wp<?php echo $work['id'] ?>" enctype="multipart/form-data"  method="post">
							<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT" />
							<tr>
								<td><input type="text" name="key_activities" disabled value="<?php echo $work['key_activities'] ?>"  class="form-control"></td>
								<td><input type="text" name="target_date" disabled value="<?php echo $work['target_date'] ?>" class="form-control"></td>
								<td><input type="text" name="actual_achievement"  value="<?php echo $work['actual_achievement_ann'] ?>" class="form-control"></td>
								<td><input type="text" name="sms_rating"  value="<?php echo $work['sms_rating_ann'] ?>" class="form-control"></td>
								<td><input type="text" name="supervisor_rating" disabled value="<?php echo $work['supervisor_rating_ann'] ?>" class="form-control"></td>
								<td><input type="text" name="agreed_rating" disabled value="<?php echo $work['agreed_rating_ann'] ?>" class="form-control"></td>
								<td><input type="text" name="moderated_rating" disabled value="<?php echo $work['moderated_rating_ann'] ?>" class="form-control"></td>
								<td><input type="submit" value="update" class="btn-sm btn-info" /></td>
							</tr>
						</form>

						<script>
							$(document).ready(function () {
								$('#update_wp<?php echo $work['id'] ?>').submit(function (e) {
									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>performance/update_work_plan_ann/<?php echo $work['id'];?>/11',
										data: $('#update_wp<?php echo $work['id'] ?>').serialize(), // serialize the form data
										success: function (response) {
											location.reload();
											$('#response').html(response); // display the response on the page
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
<div class="card">
	<div class="card-header">
		<h4>COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #c1d59a">

			<tr>
				<th>
					CORE MANAGEMENT COMPETENCIES

				</th>
				<th>
					PROCESS COMPETENCIES
				</th>
				<th>
					DEV REQUIRED
				</th>


			</tr>
			</thead>
			<tbody>


			<?php

			foreach ($gmc_personal_development_plan as $gmcWork) {
				echo '

					<tr>
						<td><input class="form-control" disabled  type="text" value="' . $gmcWork['core_management_competencies'] . '" /></td>
						<td><input class="form-control" disabled  type="text" value="' . $gmcWork['process_competencies'] . '" /></td>
						<td><input class="form-control" disabled  type="text" value="' . $gmcWork['dev_required'] . '" /></td>
		
						
		
					</tr>
					';
			}




			echo '
							
							<form method="post" action="' . base_url() . 'performance/add_generic_management_competencies_personal_development_plan/11">
								<input type="hidden" name="template_name"  value="ANNUAL ASSESSMENT">
								<tr>
									<td><input class="form-control" name="core_management_competencies" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="dev_required" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									
								</tr>
							</form>				
						';
			?>


			</tbody>

		</table>
	</div>
</div>

<?php ?>
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir_ann/11">


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
