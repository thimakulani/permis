<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance" >BACK</a>
</div>

<div style="text-align: center;">ANNUAL PERFORMANCE ASSESSMENT TEMPLATE FOR DEPUTY DIRECTOR-GENERAL</div>
<div style="text-align: center;">
	<h2>DDG’s MID-YEAR PERFORMANCE ASSESSMENT TEMPLATE</h2>
</div>
<div class="table-responsive">
	<table class="table table-sm">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>
				Name of the SMS member
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>
				Job title
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
		</tr>
		<tr>
			<th>
				Persal Number
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>
				Performance cycle
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
		</tr>
		<tr>
			<th>
				Name of the Supervisor
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>
				Period under review
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
		</tr>
		<tr>
			<th>
				Name of Department
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>

		</tr>
		<tr>
			<th>
				Province (if applicable)
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>

		</tr>
		</thead>
	</table>
</div>



<!-- COPY FROM HERE -->

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

<br>

