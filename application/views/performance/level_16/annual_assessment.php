<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div style="text-align: center;">
	<h4>HOD/DGs ANNUAL PERFORMANCE ASSESSMENTS TEMPLATE</h4>
</div>


<div class="table-responsive">
	<table class="table table-sm">
		<thead style="background-color: #8CB2E1FF">
		<tr>
			<th>
				Name of Executive Authority
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>
				Province (if applicable)
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of Head of Department
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>
				Performance cycle
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
		</tr>
		<tr>
			<th>
				Persal Number
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>
				Mid-Year Review
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of Department
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>

			</th>
			<th>

			</th>
		</tr>

		</thead>
	</table>
</div>

<br />
<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS</h4>
<?php foreach ($kra as $_kra){ ?>

	<div class="card">
		<h4 class="card-header">
			KRA NO :<?php echo $_kra['name']; ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #8cb2e1">
				<tr>
					<th>ACTIVITIES</th>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
					<th>EVALUATED SCORE (PRESIDENCY / OTP OR PSC)</th>
					<th></th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($work_plan as $work)
				{?>
					<?php
						//$kra_no = 'KRA NO '.$i;
						if($_kra['id'] ==  $work['kra_id']) {?>
							<form method="post" action="<?php echo base_url() ?>performance/update_annual_work_plan/<?php echo $work['id'] ?>/600">

								<tr>
									<th> <input class="form-control" disabled value="<?php echo $work['key_activities'] ?>"> </th>
									<th> <input class="form-control" disabled value="<?php echo $work['indicator_target'] ?>"> </th>
									<th> <input class="form-control" disabled value="<?php echo $work['actual_achievement'] ?>"> </th>
									<th> <input class="form-control" disabled value="<?php echo $work['sms_rating'] ?>"> </th>
									<th> <input class="form-control" disabled value="<?php echo $work['supervisor_rating'] ?>"> </th>
									<th> <input class="form-control" disabled value="<?php echo $work['agreed_rating'] ?>"> </th>
									<th> <input class="form-control" name="evaluated_score" type="number" value="<?php echo $work['evaluated_score'] ?>"> </th>
									<th><input type="submit" value="Update" class="btn-sm btn-info"  /></th>
								</tr>
							</form>

						<?php } ?>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>

<?php } ?>
<br />


<form method="post" action="<?php echo base_url() ?>performance/submit_performance_hod_ann/600">


	<br/>
	<div class="card">


		<div class="card-body">
			<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<br>
