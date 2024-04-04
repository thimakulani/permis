<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions">BACK</a>
</div>
<div style="text-align: center;">
	<h3 style="margin: 20px">CHIEF DIRECTOR AND DIRECTORS ANNUAL PERFORMANCE ASSESSMENT TEMPLATE</h3>
</div>

<?php print_r($submission_row) ?>

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php $count_kra = 1;
foreach ($kra as $_kra)
{
	?>
	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $count_kra; ?>: <?php echo $_kra['name']; ?>
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
					<th>MODERATED RATING</th>

				</tr>
				</thead>
				<tbody>
				<?php

				/*
				id
employee
key_result_areas
key_activities
weight
target_date
indicator_target
resource_required
enabling_condition
template_name
period
kra_id
sms_rating
supervisor_rating
agreed_rating
actual_achievement
target
evaluated_score
moderated_rating
				*/



				foreach ($work_plan as $mid) {?>

					<tr>
						<td> <?php echo $mid['key_activities']?></td>
						<td> <?php echo $mid['indicator_target']?></td>
						<td> <?php echo $mid['actual_achievement']?></td>
						<td> <?php echo $mid['sms_rating']?></td>
						<td> <?php echo $mid['supervisor_rating']?></td>
						<td> <?php echo $mid['agreed_rating']?></td>
						<td> <?php echo $mid['moderated_rating']?></td>

					</tr>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>








<?php } ?>
<div class="card">
	<div class="card-header">
		<h4>COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4">

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
						<td>' . $gmcWork['core_management'] . '</td>
						<td>' . $gmcWork['process_competencies'] . '</td>
						<td>' . $gmcWork['dev_required'] . '</td>
		
						
					</tr>
					';
			}





			?>


			</tbody>

		</table>
	</div>
</div>



<br>
