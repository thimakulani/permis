<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance" >BACK</a>
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
<?php for ($i = 1; $i<6;$i++){ ?>

	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $i; ?>
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
				</tr>
				</thead>
				<tbody>

				<?php
				$emp_perf = array();
				foreach ($emp_perf as $perf) {?>

					<tr>
						<th> <input value="<?php echo $perf['activities'];?>" /> </th>
						<th> <input value="<?php echo $perf['target'];?>" /> </th>
						<th> <input value="<?php echo $perf['achievement'];?>" /> </th>
						<th> <input value="<?php echo $perf['sms_rating'];?>" /> </th>
						<th> <input value="<?php echo $perf['supervisor_rating'];?>" /> </th>
						<th> <input value="<?php echo $perf['agreed_rating'];?>" /> </th>
						<th> <input value="<?php echo $perf['evaluated_score'];?>" /> </th>
						<th> </th>

					</tr>

				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<?php } ?>
<br />


<div class="card">
	<div class="card-body">
		<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/sup_update_status/<?php echo $submission_id; ?>">
			<select name="action_option" id="action" onchange="optionChange()" class="form-control">
				<option class="form-control select" value="APPROVED" >APPROVE</option>
				<option value="REJECTED" >REJECT</option>
			</select>
			<input type="submit" class="btn-sm btn-primary m-2" />
			<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
		</form>
	</div>
</div>


<script>
	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVE')
		{
			document.getElementById("comment").style = "display:none";

		}
		if(e.value === 'REJECT')
		{
			document.getElementById("comment").style = "display:block";

		}
	}


</script>
<br>
