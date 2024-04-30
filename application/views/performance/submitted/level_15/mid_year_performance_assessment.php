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
			KRA NO <?php echo $counter; ?> : <?php echo $_kra['key_results_area'] ?>
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
							<th><?php echo $kra_data['key_activities'] ?></th>
							<th><?php echo $kra_data['indicator_target'] ?></th>
							<th><?php echo $kra_data['actual_achievement'] ?></th>
							<th><?php echo $kra_data['sms_rating'] ?></th>
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
<br />
<br />
<br />

<div class="card">
	<div style="text-align: center;">
		<h4>PERSONAL DEVELOPMENTAL PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #fbd4b4">
				<tr>
					<th>
						DEVELOPMENTAL AREAS
					</th>
					<th>
						TYPES OF INTERVENTIONS
					</th>

					<th>
						TARGET DATE
					</th>

				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php

				foreach ($personal_development_plan as $work) { ?>

					<tr>
						<td><?php echo $work['developmental_areas'] ?></td>
						<td><?php echo $work['types_of_interventions'] ?></td>
						<td><?php echo $work['target_date'] ?></td>

						<script>
							$('.btn-remove-pdp<?php echo $work['id'] ?>').on('click', function () {
								//var rowId = $(this).data('id');
								$.ajax({
									url: '<?php echo base_url()?>performance/remove_personal_developmental_plan/200/<?php echo $work['id']?>',
									type: 'DELETE',
									//data: {id: rowId},
									success: function (response) {
										Swal.fire({
											icon: 'success',
											title: 'Success',
											text: 'Successfully Removed',
											onClose: () => {
												location.reload();
											}
										});
									},
									error: function (xhr, status, error) {
										console.log(error);
									}
								});
							});
						</script>

					</tr>
				<?php } ?>

				<script>
					$(document).ready(function () {
						$('#add_pdp').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_personal_developmental_plan',
								data: $('#add_pdp').serialize(), // serialize the form data
								success: function (response) {
									Swal.fire({
										icon: 'success',
										title: 'Success',
										text: 'Successfully Added',
										onClose: () => {
											location.reload();
										}
									});
								}
							});
						});
					});

				</script>
				</tbody>
			</table>
		</div>
	</div>

</div>


<!--<div class="card">
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
/*
			foreach ($organisational_performance as $org) {

				echo '

<tr>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['targeted_objectives'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['performance_measures_target'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['progress'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $org['progress_review_comment'] . '" /></td>


				</tr>
';
				*/?>



			<?php /*} */?>
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
/*
			foreach ($personal_development_plan as $pers) {
				echo '

<tr>
					<td><input class="form-control-sm" disabled  type="text" value="' . $pers['core_management_competencies'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $pers['process_competencies'] . '" /></td>
					<td><input class="form-control-sm" disabled  type="text" value="' . $pers['other_developmental_areas_identified'] . '" /></td>

				</tr>
';


				*/?>


			<?php /*} */?>
			</tbody>
		</table>
	</div>
</div>
-->
<br>
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
					<th><input type="text" value="<?php /*echo $perf['core_management_competencies'] */?>" class="form-control"></th>
					<th><input type="text" value="<?php /*echo $perf['process_competencies'] */?>" class="form-control"></th>
					<th><input type="text" value="<?php /*echo $perf['other_developmental_areas_identified'] */?>" class="form-control"></th>
					<th></th>
				</tr>

			<?php /*} */?>


			<form enctype="multipart/form-data" action="<?php /*echo base_url();*/?>performance/add_competencies_personal_development_plan/100" method="post">
				<input type="hidden" value="MID YEAR ASSESSMENT" name="template_name">
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
			</tbody>
		</table>
	</div>
</div>
<div>-->
