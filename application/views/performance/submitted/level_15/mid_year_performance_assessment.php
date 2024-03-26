<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div style="text-align: center;">
	<h2>DDG’s MID-YEAR PERFORMANCE ASSESSMENT TEMPLATE</h2>
</div>
<div class="table-responsive">
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

</div>


<!-- COPY FROM HERE -->

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php
$counter = 1;
foreach ($kra as $_kra) { ?>

	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $counter; ?> : <?php echo $_kra['name'] ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #fbd4b4">
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


				 foreach ($emp_perf as $kra_data) { ?>
					<?php

					if ($_kra['id'] === $kra_data['kra_id']) { ?>
						<tr>
							<th><input type="text" disabled value="<?php echo $kra_data['key_activities'] ?>"/></th>
							<th><input type="text" disabled value="<?php echo $kra_data['indicator_target'] ?>"/></th>
							<th><input type="text" disabled value="<?php echo $kra_data['actual_achievement'] ?>"/></th>
							<th><input type="text" disabled value="<?php echo $kra_data['sms_rating'] ?>"/></th>
							<th><input type="text" disabled value="<?php echo $kra_data['supervisor_rating'] ?>"/></th>
							<th><input type="text" disabled value="<?php echo $kra_data['agreed_rating'] ?>"/></th>

						</tr>

					<?php } ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<?php $counter++; } ?>

<!-- UNTIL HERE -->


<div class="card">
	<h4 class="card-header">
		ORGANISATIONAL PERFORMANCE
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4"
			">
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

			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($organisational_performance as $org) {

				echo '

<tr>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['targeted_objectives'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['performance_measures_target'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['progress'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['progress_review_comment'] . '" /></td>


				</tr>
';
				?>



			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="card">
	<h4 class="card-header">
		COMPETENCIES: PERSONAL DEVELOPMENT PLAN
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4"
			">
			<tr>
				<th>CORE MANAGEMENT COMPETENCIES</th>
				<th>PROCESS COMPETENCIES
				</th>
				<th>OTHER DEVELOPMENTAL AREAS IDENTIFIED
				</th>


			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($personal_development_plan as $pers) {
				echo '

<tr>
					<td><input class="form-control-sm" disabled  type="text" value="' . $pers['core_management_competencies'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $pers['process_competencies'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $pers['other_developmental_areas_identified'] . '" /></td>

				</tr>
';


				?>


			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div>


	<div class="form-group">
		<label for="exampleFormControlTextarea1">Comment by the SMS member on his/her performance</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Comment by the Supervisor</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
</div>
<br/>

<br>
