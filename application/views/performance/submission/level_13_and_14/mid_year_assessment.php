<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div style="text-align: center;">

	<h4>MID YEAR ASSESSMENT FOR DEPUTY DIRECTOR-GENERAL </h4>

</div>
<?php $is_valid = false; ?>

<dl class="row">
	<dt class="col-sm-2">
		SMS member's name
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Name.' '. $emp->LastName; ?>
	</dd>

	<dt class="col-sm-2">
		Persal number
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Persal ?>
	</dd>

	<dt class="col-sm-2">
		Supervisor's name
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->S_Name ?>
	</dd>

	<dt class="col-sm-2">
		Branch name
	</dt>
	<dd class="col-sm-10">
		<?php echo '' ?>
	</dd>

	<dt class="col-sm-2">
		Province (if applicable)
	</dt>
	<dd class="col-sm-10">
		<?php echo '' ?>
	</dd>

	<dt class="col-sm-2">
		Job title
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->JobTitle ?>
	</dd>
</dl>
<br/>



<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php foreach ($kra as $_kra){
	?>
	<div class="card">
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
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($work_plan as $work){ ?>
					<?php if($work['kra_id'] == $_kra['id'])
					{
						if(!isset($work['supervisor_rating']))
						{
							$is_valid = false;
						}
						?>

						<form id="update_wp<?php echo $work['id'] ?>" enctype="multipart/form-data" action="<?php echo base_url();?>performance/sup_update_work_plan/<?php echo $work['id'];?>/<?php echo $data->id;?>/<?php echo $data->emp_id;?>" method="post">
							<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT" />
							<tr>
								<td><?php echo $work['key_activities'] ?></td>
								<td><?php echo $work['target_date'] ?></td>
								<td><input type="text" name="actual_achievement" disabled value="<?php echo $work['actual_achievement'] ?>" class="form-control"></td>
								<td><input type="number" min="1" max="4" name="sms_rating" disabled value="<?php echo $work['sms_rating'] ?>" class="form-control"></td>
								<td><input type="number" min="1" max="4" name="supervisor_rating" required value="<?php echo $work['supervisor_rating'] ?>" class="form-control"></td>
								<td><input type="number" min="1" max="4" name="agreed_rating" required value="<?php echo $work['agreed_rating'] ?>" class="form-control"></td>
								<td><input type="submit" value="update" class="btn-sm btn-info" /></td>
							</tr>
						</form>

						<script>
							$(document).ready(function () {
								$('#update_wp<?php echo $work['id'] ?>').submit(function (e) {

									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>performance/sup_update_work_plan/<?php echo $work['id'];?>/<?php echo $emp->id;?>/<?php echo $data->supervisor ?>',
										//url: '<?php echo base_url() ?>performance/sup_update_work_plan/<?php echo $work['id'];?>/10   $id, $s_id, $emp_id',
										//$id, $s_id, $emp_id
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

					<?php } ?>
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


								<td>
									<a class="btn-sm btn-danger" href="' . base_url() . 'performance/remove_generic_management_competencies/10/' . $gmcWork['id'] . '">X</a>
								</td>
								

							</tr>
							';
			}


/*			echo '
							
							<form id="add_gmc" method="post" action="' . base_url() . 'performance/add_generic_management_competencies/10">
								<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT" />
								<tr>
									<td><input class="form-control" name="core_management" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="dev_required_cmcs" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td>
										<select name="dev_required_pcs" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
								</tr>
							</form>				
						';
			*/
			?>
			<script>
				$(document).ready(function () {
					$('#add_gmc').submit(function (e) {
						e.preventDefault(); // prevent the form from submitting normally
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url() ?>performance/add_generic_management_competencies/10',
							data: $('#add_gmc').serialize(), // serialize the form data
							success: function (response) {
								location.reload();
								$('#response').html(response); // display the response on the page
							}
						});
					});
				});

			</script>

			</tbody>

		</table>

	</div>
</div>
<br/>
<!--<form method="post" action="<?php /*echo base_url() */?>performance/submit_performance_dir_mid/10">
	<br/>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the SMS member  on his/her performance <?php /*//print_r($data) */?>
				</label>
				<textarea class="form-control" disabled >
					<?php /*if (!empty($data)) {
						echo $data->emp_comment;
					} */?> </textarea>

			</div>
			<br />

			<div class="form-group">
				<label>
					Comment by the Supervisor
				</label>
				<textarea disabled class="form-control" name="supervisor_comment" ></textarea>

			</div>
			<br />
		</div>
		<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO PMD"/>
		</div>

	</div>
</form>-->
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
