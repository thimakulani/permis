<?php
	$is_valid = true;
?>
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance" >BACK</a>
</div>
<div style="text-align: center;">
	<h2>DDG’s MID-YEAR PERFORMANCE ASSESSMENT TEMPLATE</h2>
</div>
<div>
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
	</dl>
</div>


<!-- COPY FROM HERE-->

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php
$kra_counter = 1;
foreach ($individual_performance as $_kra) { ?>
	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $kra_counter; ?> : <?php echo $_kra['key_results_area']?>
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
				</tr>
				</thead>
				<tbody>

				<?php
				$kra_counter++;
				foreach ($work_plan as $work)
				{

					if($_kra['id'] === $work['kra_id'])
					{
						if(empty($work['supervisor_rating']))
						{
							$is_valid = false;
						}

						?>

						<form id="update_wp<?php echo $work['id'] ?>" enctype="multipart/form-data"
							   method="post">
							<tr>
								<th> <?php echo $work['key_activities'] ?> </th>
								<th> <?php echo $work['indicator_target'] ?></th>
								<th> <?php echo $work['actual_achievement'] ?></th>
								<th> <?php echo $work['sms_rating'] ?></th>
								<th> <input class="form-control" required type="number" min="1" max="4" name="supervisor_rating"   value="<?php echo $work['supervisor_rating'] ?>" /></th>
								<th> <input class="form-control" required type="number" min="1" max="4" name="agreed_rating"  value="<?php echo $work['agreed_rating'] ?>" /></th>
								<th> <input type="submit" class="btn-sm btn-info" /> </th>
							</tr>
						</form>



						<script>
							$(document).ready(function () {
								$('#update_wp<?php echo $work['id'] ?>').submit(function (e) {

									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url(); ?>performance/update_sup_work_plan/<?php echo $work['id']; ?>/<?php echo $data->id; ?>/<?php echo $data->emp_id; ?>',
										data: $('#update_wp<?php echo $work['id'] ?>').serialize(), // serialize the form data
										success: function (response) {
											//$('#response').html(response); // display the response on the page
											Swal.fire({
												icon: 'success',
												title: 'Success',
												text: 'Successfully Updated',
												onClose: () => {
													location.reload();
												}
											});

										}
									});
								});
							});

						</script>

					<?php
					} ?>
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



<br />
<div class="card">
	<?php if($data->status == 'PENDING'){ ?>

		<div class="card-body">
			<form  method="post" action="<?php echo base_url()?>performance/sup_update_status/<?php echo $submission_id ?>">

				<div class="form-group">
					<label>
						Comment by the SMS member  on his/her performance <?php //print_r($data) ?>
					</label>
					<textarea class="form-control" disabled >
					<?php if (!empty($data)) {
						echo $data->emp_comment;
					} ?> </textarea>

				</div>
				<br />

				<div class="form-group">
					<label>
						Comment by the Supervisor
					</label>
					<textarea class="form-control" name="supervisor_comment" ></textarea>

				</div>

				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<br />
				<input type="text" placeholder="REASON..." style="display: none;" id="comment" name="comment" class="form-control w-100">
				<input type="submit" <?php if(!$is_valid) echo 'disable'?> class="btn-sm btn-primary m-2" />

			</form>
		</div>
	<?php }?>
</div>

<script>
	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVED')
		{
			document.getElementById("comment").style = "display:none";
		}
		if(e.value === 'REJECTED')
		{
			document.getElementById("comment").style = "display:block";
		}
	}
</script>




<!--<br />
<div class="card">
	<div class="card-body">
		<form class="form-inline"  method="post" action="<?php /*echo base_url()*/?>performance/sup_update_status/<?php /*echo $submission_id; */?>">
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
-->

