<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions">BACK</a>
</div>


<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php
$count_kra = 1;
foreach ($kra as $_kra)
{
	?>
	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $count_kra; ?>: <?php echo $_kra['name']; ?>
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
				foreach ($work_plan as $m) {?>

					<tr>
						<td> <?php echo$m['key_activities'] ?></td>
						<td> <?php echo$m['indicator_target'] ?> </td>
						<td> <?php echo$m['actual_achievement'] ?> </td>
						<td> <?php echo$m['sms_rating'] ?> </td>
						<td> <?php echo$m['supervisor_rating'] ?> </td>
						<td> <?php echo$m['agreed_rating'] ?> </td>

					</tr>
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
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($personal_developmental_plan as $gmcWork) {
				echo '
							<tr>
								<td>' . $gmcWork['core_management'] . '</td>
								<td>' . $gmcWork['process_competencies'] . '</td>
								<td>' . $gmcWork['dev_required_cmcs'] . '</td>
								<td>' . $gmcWork['dev_required_pcs'] . '</td>							
							</tr>
							';
			}

			?>


			</tbody>

		</table>

	</div>
</div>
<br/>



<br>
