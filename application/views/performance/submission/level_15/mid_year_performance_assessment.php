<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance" >BACK</a>
</div>
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
				<input type="text" class="form-control-sm"/>
			</th>
			<th>
				Job title
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
		</tr>
		<tr>
			<th>
				Persal Number
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>
				Performance cycle
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of the Supervisor
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>
				Period under review
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of Department
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>

			</th>
			<th>

			</th>
		</tr>
		<tr>
			<th>
				Province (if applicable)
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>

			</th>
			<th>

			</th>
		</tr>
		</thead>
	</table>
</div>


<!-- COPY FROM HERE -->

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php
$kra_counter = 1;
foreach ($kra as $_kra) { ?>
	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $kra_counter; ?> : <?php echo $_kra['name']?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #C1D59AFF">
				<tr>
					<th>ACTIVITIES</th>
					<th>INDICATOR/TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
					<th></th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				$kra_counter++;
				foreach ($work_plan as $work)
				{
					if($_kra['id'] === $work['kra_id']) {?>
						<form enctype="multipart/form-data"
							  action="<?php echo base_url(); ?>performance/update_sup_work_plan/<?php echo $work['id']; ?>/<?php echo $data->id; ?>/<?php echo $data->emp_id; ?>" method="post">
							<tr>
								<th> <input class="form-control" type="text" disabled value="<?php echo $work['key_activities'] ?>" /> </th>
								<th> <input class="form-control" type="text" disabled value="<?php echo $work['indicator_target'] ?>" /></th>
								<th> <input class="form-control" type="text" disabled name="actual_achievement" value="<?php echo $work['actual_achievement'] ?>" /></th>
								<th> <input class="form-control" type="number" disabled name="sms_rating" min="1" max="4" value="<?php echo $work['sms_rating'] ?>" /></th>
								<th> <input class="form-control" type="number" min="1" max="4" name="supervisor_rating"   value="<?php echo $work['supervisor_rating'] ?>" /></th>
								<th> <input class="form-control" type="number" min="1" max="4" name="agreed_rating"  value="<?php echo $work['agreed_rating'] ?>" /></th>
								<th> <input type="submit" class="btn-sm btn-info" /> </th>
							</tr>
						</form>

					<?php } ?>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>

<?php } ?>

<!-- UNTIL HERE -->


<div class="card">
	<h4 class="card-header">
		ORGANISATIONAL PERFORMANCE
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4">

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
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($organisational_performance as $perf) { ?>
				<tr>
					<th> <input class="form-control" value="<?php echo $perf['targeted_objectives']; ?>" /> </th>
					<th> <input class="form-control" value="<?php echo $perf['performance_measures_target']; ?>" /> </th>
					<th> <input class="form-control" value="<?php echo $perf['progress']; ?>" /> </th>
					<th> <input class="form-control" value="<?php echo $perf['progress_review_comment']; ?>" /> </th>
				</tr>

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

				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php
			$emp_perf = array();
			foreach ($personal_development_plan as $perf) { ?>

				<tr>
					<th><input type="text" value="<?php echo $perf['core_management_competencies'] ?>" class="form-control"></th>
					<th><input type="text" value="<?php echo $perf['process_competencies'] ?>" class="form-control"></th>
					<th><input type="text" value="<?php echo $perf['other_developmental_areas_identified'] ?>" class="form-control"></th>
				</tr>

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
