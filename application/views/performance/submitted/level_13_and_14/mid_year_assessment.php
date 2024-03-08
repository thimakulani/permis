<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<h4 style="margin: 10px">EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php $kra_couter = 1;
foreach ($kra as $_kra){
	?>   <div class="card">
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

				</tr>
				</thead>
				<tbody>
				<?php
					foreach ($work_plan as $work)
					{
						if($_kra['id'] == $work['kra_id'])
						{ ?>
							<tr>
								<td><?php  echo $work['key_activities'] ?></td>
								<td><?php echo $work['indicator_target'] ?></td>
								<td><?php echo $work['actual_achievement'] ?></td>
								<td><?php echo $work['sms_rating'] ?></td>
								<td><?php echo $work['supervisor_rating'] ?></td>
								<td><?php echo $work['agreed_rating'] ?></td>
							</tr>


					<?php
						}
					}

				?>

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
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($personal_developmental_plan as $p_dev) {
				echo '
							<tr>
								<td><input class="form-control-sm" disabled  type="text" value="' . $p_dev['core_management'] . '" /></td>
								<td><input class="form-control-sm" disabled  type="text" value="' . $p_dev['process_competencies'] . '" /></td>
								<td><input class="form-control-sm" disabled  type="text" value="' . $p_dev['dev_required_cmcs'] . '" /></td>
								<td><input class="form-control-sm" disabled  type="text" value="' . $p_dev['dev_required_pcs'] . '" /></td>


						

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
