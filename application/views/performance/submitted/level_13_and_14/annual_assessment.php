<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php $kra_couter = 1;
foreach ($kra as $_kra){
	?>   <div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $kra_couter; ?> : <?php echo $_kra['name']; ?>
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

				foreach ($work_plan as $work) {
					?>

					<tr>
						<td><?php  echo $work['key_activities'] ?></td>
						<td><?php echo $work['indicator_target'] ?></td>
						<td><?php echo $work['actual_achievement'] ?></td>
						<td class="text-center"><?php echo $work['sms_rating'] ?></td>
						<td class="text-center"><?php echo $work['supervisor_rating'] ?></td>
						<td class="text-center"><?php echo $work['agreed_rating'] ?></td>
						<td class="text-center"><?php echo $work['moderated_rating'] ?></td>
					</tr>


				<?php
				} ?>

				</tbody>
			</table>
		</div>
	</div>








<?php $kra_couter++; } ?>
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
			foreach ($gmc_personal_development_plan as $g) {?>

					<tr>
						<td><input class="form-control-sm" disabled  type="text" value="<?php echo $g['core_management_competencies'];?>" /></td>
						<td><input class="form-control-sm" disabled  type="text" value="<?php echo $g['process_competencies'];?>" /></td>
						<td><input class="form-control-sm" disabled  type="text" value="<?php echo $g['dev_required'];?>" /></td>
						
					</tr>

			<?php }
			?>



			</tbody>

		</table>
</div>
</div>
<?php ?>


<br>
