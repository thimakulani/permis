<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div style="text-align: center;">PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</div>
<dl class="row">
	<dt class="col-sm-2">
		SMS member's name
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Name . ' ' . $emp->LastName; ?>
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
<?php if (1 == 2) {
	?>

	<div>
		Please identify dates for half-yearly and annual performance assessments
		<table>
			<thead>
			<tr>
				<th>Mid-year performance review & assessment date:</th>
				<th><input class="form-control"/></th>

			</tr>
			<tr>
				<th>Annual Performance assessment date:</th>
				<th><input class="form-control"/></th>

			</tr>
			</thead>
		</table>
	</div>
<?php } ?>
<br/>
<div class="alert alert-info animated shake">

	<?php
	if($submission->status == 'REJECTED')
	{ ?>
		<p>SUPERVISOR COMMENT: <?php echo $submission->sup_comment ?> </p>
	<?php }
	else if($submission->status_final == 'REJECTED')
	{ ?>
		<p>PMD OFFICIALS COMMENT: <?php echo $submission->pmd_comment ?> </p>
	<?php }
	?>

</div>
<br/>
<div>
	<h4>
		Dispute resolution mechanism
	</h4>
	<p>
		Disputes on the signing of PAs will be dealt with in terms of Regulation 72(4)(5)&(6) of the Public Service
		Regulations, 2016. Any disputes about the assessment, shall be mediated by a person agreed to by the SMS member
		and the Supervisor.
	</p>
</div>


<div class="card">

		<table class="table table-stripped">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>KEY RESULT AREA</th>
			<th>BATHO PELE PRINCIPLES</th>
			<th>WEIGHTING</th>
			<th><a class="btn-sm btn-info text-decoration-none" data-toggle="modal" data-target="#add_individual_performance" href="#" >
					ADD
				</a></th>
			<?php /*if($user_submission != 1){ */?><!--
			<th></th>
			--><?php /*} */?>
		</tr>

		</thead>
		<tbody>
		<?php
		$weight_sum = 0;
		foreach ($individual_performance as $ip) { ?>
			<tr>
				<td><?php echo $ip['key_results_area']; ?></td>
				<td><?php echo $ip['batho_pele_principles']; ?></td>
				<td><?php echo $ip['weight_of_outcome']; ?></td>
				<td>
					<button data-toggle="modal" data-target="#edit_i_p<?php echo $ip['id']; ?>"  class="btn-sm btn-info text-white"><i class="fa fa-edit "></i></button>
					<a data-toggle="modal" data-target="#confirm_delete<?php echo $ip['id']; ?>"  class="btn-sm btn-danger text-white"><i class="fa fa-remove "></i></a>
				</td>
				<?php /*if($user_submission != 1){ */?><!--
				<td>
					<button class="btn-sm btn-danger btn-remove-ip<?php /*echo $ip['id'] */?>">X</button>
				</td>
				--><?php /*} */?>
			</tr>

			<div class="modal fade" id="confirm_delete<?php echo $ip['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">ARE YOU SURE YOU WANT TO DELETE THE KEY RESULTS</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" >
							<div class="modal-body">

								<div class="form-group">
									<label class="control-label">KEY RESULT AREA</label>
									<input class="form-control" disabled name="key_results_area" value="<?php echo $ip['key_results_area']; ?>"/>
									<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
									<span class="text-danger"><?php echo form_error('kra_name') ?></span>
								</div>
								<?php
								$arr = array('Consultation','Service Standards','Access','Courtesy','Information','Openness and Transparency','Redress','Value for money','Encouraging innovation and Rewarding excellence','Leadership and Strategic Director')

								?>
								<div class="form-group">
									<label class="control-label">BATHO PELE PRINCIPLES</label>
									<select class="form-control" disabled name="batho_pele_principles">
										<?php foreach ($arr as $a){ ?>
											<option <?php if($a == $ip['batho_pele_principles']) echo 'selected';?> value="<?php echo $a; ?>" ><?php echo $a; ?></option>
										<?php } ?>
									</select>
									<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->

								</div>
								<div class="form-group">
									<label class="control-label">WEIGHT OF OUTCOME (in %)</label>
									<select DISABLED class="form-control" name="weight_of_outcome">
										<?php
										for ($i = 10; $i <= 100; $i = $i + 5)
										{ ?>
											<option <?php if($i == $ip['weight_of_outcome']) echo 'selected'?> value="<?php echo $i ?>"><?php echo $i ?>%</option>
										<?php }
										?>
									</select>

								</div>

								<div class="modal-footer">
									<button type="submit"  class="btn btn-primary btn_delete_ip<?php echo $ip['id'] ?>">DELETE</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
								</div>
							</div>
						</form>

						<script>
							$('.btn_delete_ip<?php echo $ip['id'] ?>').on('click', function() {
								$.ajax({
									url: '<?php echo base_url() ?>performance/remove_ip/<?php echo $ip['id'] ?>',
									type: 'DELETE',
									success: function(response) {
										// remove the row from the table
										location.reload();
									},
									error: function(xhr, status, error) {
										console.log(error);
									}
								});
							});
						</script>


					</div>
				</div>
			</div>
			<div class="modal fade" id="edit_i_p<?php echo $ip['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">UPDATE INDIVIDUAL PERFORMANCE</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="update_individual_performance<?php echo $ip['id'] ?>" method="post" >
							<div class="modal-body">

								<div class="form-group">
									<label class="control-label">KEY RESULT AREA</label>
									<input class="form-control" name="key_results_area" value="<?php echo $ip['key_results_area']; ?>"/>
									<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
									<span class="text-danger"><?php echo form_error('key_results_area') ?></span>
								</div>
								<?php
								$arr = array('Consultation','Service Standards','Access','Courtesy','Information','Openness and Transparency','Redress','Value for money','Encouraging innovation and Rewarding excellence','Leadership and Strategic Director')

								?>
								<div class="form-group">
									<label class="control-label">BATHO PELE PRINCIPLES</label>
									<select class="form-control" name="batho_pele_principles">
										<?php foreach ($arr as $a){ ?>
											<option <?php if($a == $ip['batho_pele_principles']) echo 'selected';?> value="<?php echo $a; ?>" ><?php echo $a; ?></option>
										<?php } ?>
									</select>
									<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->

								</div>
								<div class="form-group">
									<label class="control-label">WEIGHT OF OUTCOME (in %)</label>
									<select class="form-control" name="weight_of_outcome">
										<?php
										for ($i = 10; $i <= 100; $i = $i + 5)
										{ ?>
											<option <?php if($i == $ip['weight_of_outcome']) echo 'selected'?> value="<?php echo $i ?>"><?php echo $i ?>%</option>
										<?php }
										?>
									</select>

								</div>

								<div class="modal-footer">
									<button type="submit"  class="btn btn-primary btn_update_id<?php echo $ip['id'] ?>">SAVE CHANGES</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
								</div>
							</div>
						</form>

						<script>
							$(document).ready(function () {
								$('#update_individual_performance<?php echo $ip['id'] ?>').submit(function (e) {
									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url();?>performance/update_individual_performance/<?php echo $ip['id'] ?>',
										data: $('#update_individual_performance<?php echo $ip['id'] ?>').serialize(), // serialize the form data
										success: function (response) {
											location.reload();
											$('#response').html(response); // display the response on the page
										}
									});
								});
							});

						</script>
					</div>
				</div>
			</div>


			<script>
				$('.btn-remove-ip<?php echo $ip['id'] ?>').on('click', function () {
					//var rowId = $(this).data('id');
					$.ajax({
						url: '<?php echo base_url()?>performance/remove_individual_performance/200/<?php echo $ip['id']?>',
						type: 'DELETE',
						//data: {id: rowId},
						success: function (response) {
							// remove the row from the table
							location.reload();
						},
						error: function (xhr, status, error) {
							console.log(error);
						}
					});
				});
			</script>

		<?php } ?>


		<?php
				$data = '';
				for ($i = 10; $i <= 100; $i = $i + 10) {
					$data .= '<option value="' . $i . '">' . $i . '%</option>';
				}

				?>
	<!--	<?php /*if($user_submission != 1){ */?>
		<form id="add_ip" method="post" action="<?php /*echo base_url() */?>performance/add_individual_performance/200">
			<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
			<tr>
				<td><input class="form-control" type="text" name="key_results_area"/></td>
				<td><input class="form-control" type="text" name="batho_pele_principles"/></td>
				<td><select name="weight_of_outcome" class="form-control select">
					<?php /*echo $data */?>
				</select>
				</td>
				<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
			</tr>
		</form>
		--><?php /*} */?>
		<script>
			$(document).ready(function () {
				$('#add_ip').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url();?>performance/add_individual_performance/200',
						data: $('#add_ip').serialize(), // serialize the form data
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
<br/>


<div class="card">

	<div class="card-header">
		<div style="text-align: center;">
			<h4>
				GENERIC MANAGEMENT COMPETENCIES: PERSONAL DEVELOPMENT PLAN
			</h4>
		</div>
	</div>
	<div class="card-body p-0">
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

					<th>
						<a href="#" data-toggle="modal" data-target="#add_gmc" class="btn-sm btn-info">ADD</a>
					</th>
					<?php /*if($user_submission != 1){ */?><!--
						<th>
						</th>
					--><?php /*} */?>
				</tr>
				</thead>
				<tbody>

				<?php


				foreach ($generic_management_competencies as $gmcWork) {
					?>
					<tr>
						<td><?php echo $gmcWork['core_management'] ?></td>
						<td><?php echo $gmcWork['process_competencies'] ?></td>
						<td><?php echo $gmcWork['dev_required'] ?></td>
						<?php /*if($user_submission != 1){ */?><!--
						<td>
							<button class="btn-sm btn-danger btn-remove-gmc<?php /*echo $gmcWork['id'] */?>">X</button>
						</td>
						--><?php /*} */?>
						<td>
							<a data-toggle="modal" data-target="#edit_gmc<?php echo $gmcWork['id']; ?>"  class="btn-sm btn-info text-white"><i class="fa fa-edit "></i></a>
							<a class="btn-sm btn-danger text-white btn-remove-gmc<?php echo $gmcWork['id']; ?>"><i class="fa fa-remove "></i></a>
						</td>
					</tr>


					<div class="modal fade" id="edit_gmc<?php echo $gmcWork['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						 aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">EDIT GENERIC MANAGEMENT COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="edit_gmc_<?php echo $gmcWork['id']; ?>" method="post" >
									<div class="modal-body">
										<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
										<div class="form-group">
											<label class="control-label">CORE MANAGEMENT COMPETENCIES</label>
											<input class="form-control" required name="core_management" value="<?php echo $gmcWork['core_management'] ?>"/>
										</div>

										<div class="form-group">
											<label class="control-label">PROCESS COMPETENCIES</label>
											<input class="form-control" required name="process_competencies" value="<?php echo $gmcWork['process_competencies'] ?>"/>
										</div>

										<div class="form-group">
											<label class="control-label">DEV REQUIRED</label>
											<select class="form-control" name="dev_required">
												<option <?php if($gmcWork['dev_required'] === 'YES') echo 'selected'; ?> value="YES" >YES</option>
												<option <?php if($gmcWork['dev_required'] === 'NO') echo 'selected'; ?>  value="NO" >NO</option>
											</select>
											<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->

										</div>


										<div class="modal-footer">
											<button type="submit"  class="btn btn-primary" >SAVE CHANGES</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
										</div>
									</div>
								</form>


							</div>
						</div>
					</div>

					<script>
						$(document).ready(function () {
							$('#edit_gmc_<?php echo $gmcWork['id']; ?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>performance/update_generic_management_competencies/<?php echo $gmcWork['id']?>',
									data: $('#edit_gmc_<?php echo $gmcWork['id']; ?>').serialize(), // serialize the form data
									success: function (response) {
										location.reload();
										$('#response').html(response); // display the response on the page
									}
								});
							});
						});

					</script>



					<script>
						$('.btn-remove-gmc<?php echo $gmcWork['id'] ?>').on('click', function () {
							$.ajax({
								url: '<?php echo base_url()?>performance/remove_gmc_Plan/<?php echo $gmcWork['id']?>',
								type: 'DELETE',
								success: function (response) {
									location.reload();
								},
								error: function (xhr, status, error) {
									console.log(error);
								}
							});
						});
					</script>

				<?php } ?>



				</tbody>

			</table>
		</div>
	</div>
</div>

<br/>

<br/>
<div class="card">
	<div class="card-header">
		<div style="text-align: center;">
			<h4>WORK PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
		</div>
	</div>

	<?php
	//print_r( $individual_performance);
	foreach ($individual_performance as $_kra) { ?>
		<div class="card-body table-responsive">

				<table class="table table-striped">
					<thead style="background-color: #fbd4b4">
					<tr>
						<th>
							KEY RESULT AREAS
						</th>
						<th>
							KEY ACTIVITIES
						</th>
						<th class="text-center">
							WEIGHT
						</th>
						<th>
							TARGET DATE
						</th>

						<th>
							INDICATOR/TARGET
						</th>
						<th>
							RESOURCE REQUIRED
						</th>
						<th>
							ENABLING CONDITION
						</th>
						<th>
							<a href="#" data-toggle="modal" data-target="#add_work_plan<?php echo $_kra['id'] ?>" class="btn-sm btn-info">ADD</a>
						</th>

						<div class="modal fade" id="add_work_plan<?php echo $_kra['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							 aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">WORK PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="add_work<?php echo $_kra['id'] ?>" method="post">
										<div class="modal-body">
											<input type="hidden" name="kra_id" value="<?php echo $_kra['id'] ?>"/>
											<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
											<div class="form-group">
												<label class="control-label">KEY RESULT AREAS</label>
												<input class="form-control" disabled value="<?php echo $_kra['key_results_area']?>"/>

											</div>
											<div class="form-group">
												<label class="control-label">KEY ACTIVITIES</label>
												<input class="form-control"  name="key_activities"/>
												<span class="text-danger"><?php echo form_error('key_activities') ?></span>
											</div>
											<div class="form-group">
												<label class="control-label">TARGET DATE</label>
												<input class="form-control" type="date"  name="target_date"/>
												<span class="text-danger"><?php echo form_error('target_date') ?></span>
											</div>
											<div class="form-group">
												<label class="control-label">INDICATOR/TARGET</label>
												<input class="form-control" name="indicator_target" />
												<span class="text-danger"><?php echo form_error('indicator_target') ?></span>
											</div>
											<div class="form-group">
												<label class="control-label">RESOURCE REQUIRED</label>
												<input class="form-control" name="resource_required"/>
												<span class="text-danger"><?php echo form_error('resource_required') ?></span>
											</div>
											<div class="form-group">
												<label class="control-label">ENABLING CONDITION</label>
												<input class="form-control" name="enabling_condition"/>
												<span class="text-danger"><?php echo form_error('enabling_condition') ?></span>
											</div>

											<div class="modal-footer">
												<input type="submit" value="SAVE" class="btn btn-primary"/>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>


					</tr>
					</thead>
					<tbody>
					<!-- To Retrieve Database information -->

					<?php
					$row_counter = 0;
					$row_span = 1;

					foreach ($work_plan as $wp)
					{
						if($_kra['id'] == $wp['kra_id'])
						{
							$row_span++;
						}
					}


					foreach ($work_plan as $work) {
						if ($_kra['id'] == $work['kra_id']) { ?>

							<tr>
								<?php if($row_counter == 0) {?>
									<td rowspan="<?php echo $row_span;?>"><?php echo $_kra['key_results_area']; ?></td>
								<?php } ?>
								<td><?php echo $work['key_activities'] ?></td>
								<td><?php echo $work['weight'] ?></td>
								<td><?php echo $work['target_date'] ?></td>
								<td><?php echo $work['indicator_target'] ?></td>
								<td><?php echo $work['resource_required'] ?></td>
								<td><?php echo $work['enabling_condition'] ?></td>
								<td>
									<a data-toggle="modal" data-target="#edit_wp<?php echo $work['id']; ?>"  class="btn-sm btn-info text-white"><i class="fa fa-edit "></i></a>
									<button class="btn-sm btn-danger btn-remove-wp<?php echo $work['id'] ?>" style="margin: 2px">X</button>
								</td>


								<div class="modal fade" id="edit_wp<?php echo $work['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
									 aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">WORK PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form id="update_work_plan<?php echo $work['id'] ?>" method="post">
												<div class="modal-body">
													<input type="hidden" name="kra_id" value="<?php echo $_kra['id'] ?>"/>
													<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
													<div class="form-group">
														<label class="control-label">KEY RESULT AREAS</label>
														<input class="form-control" disabled value="<?php echo $_kra['key_results_area']?>"/>

													</div>
													<div class="form-group">
														<label class="control-label">KEY ACTIVITIES</label>
														<input class="form-control"  name="key_activities" value="<?php echo $work['key_activities']?>" />
														<span class="text-danger"><?php echo form_error('key_activities') ?></span>
													</div>
													<div class="form-group">
														<label class="control-label">TARGET DATE</label>
														<input class="form-control" type="date"  value="<?php echo $work['target_date']?>" name="target_date"/>
														<span class="text-danger"><?php echo form_error('target_date') ?></span>
													</div>
													<div class="form-group">
														<label class="control-label">INDICATOR/TARGET</label>
														<input class="form-control" name="indicator_target" value="<?php echo $work['indicator_target']?>" />
														<span class="text-danger"><?php echo form_error('indicator_target') ?></span>
													</div>
													<div class="form-group">
														<label class="control-label">RESOURCE REQUIRED</label>
														<input class="form-control" name="resource_required" value="<?php echo $work['resource_required']?>"/>
														<span class="text-danger"><?php echo form_error('resource_required') ?></span>
													</div>
													<div class="form-group">
														<label class="control-label">ENABLING CONDITION</label>
														<input class="form-control" name="enabling_condition" value="<?php echo $work['enabling_condition']?>"/>
														<span class="text-danger"><?php echo form_error('enabling_condition') ?></span>
													</div>

													<div class="modal-footer">
														<input type="submit" value="SAVE" class="btn btn-primary"/>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
													</div>
												</div>
											</form>

										</div>
									</div>
								</div>

								<script>
									$(document).ready(function () {
										$('#update_work_plan<?php echo $work['id']?>').submit(function (e) {
											e.preventDefault(); // prevent the form from submitting normally
											$.ajax({
												type: 'POST',
												url: '<?php echo base_url();?>performance/update_work_plans/<?php echo $work['id']?>',
												data: $('#update_work_plan<?php echo $work['id']?>').serialize(), // serialize the form data
												success: function (response) {
													location.reload();
													alert('Has been successfully updated');
													//$('#response').html(response); // display the response on the page
												}
											});
										});
									});

								</script>


								<script>
									$('.btn-remove-wp<?php echo $work['id'] ?>').on('click', function () {
										$.ajax({
											url: '<?php echo base_url()?>performance/remove_work_plan/<?php echo $work['id']?>',
											type: 'DELETE',
											//data: {id: rowId},
											success: function (response) {
												// remove the row from the table
												location.reload();
											},
											error: function (xhr, status, error) {
												console.log(error);
											}
										});
									});
								</script>



							</tr>

							<?php
							$row_counter++;
						}
					} ?>


					<form id="add_wp<?php echo $_kra['id']?>" method="post" >
						<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
						<input type="hidden" name="kra_id" value="<?php echo $_kra['id']; ?>"/>
						<?php /*if($user_submission != 1){ */?><!--
						<tr>
							<?php /*if($row_counter==0){ */?>
								<td><?php /*echo $_kra['key_results_area']; */?></td>
							<?php /*}*/?>
							<td><input class="form-control" name="key_activities" type="text" required/></td>
							<td>
								<select name="outcome_weight" class="form-control select">
									<?php /*for ($i = 10; $i <= 100; $i = $i + 10) { */?>
										<option value="<?php /*echo $i; */?>"><?php /*echo $i; */?>%</option>
									<?php /*} */?>
								</select>
							</td>
							<td><input class="form-control" name="target_date" required type="date"/></td>
							<td><input class="form-control" name="indicator_target" required type="text"/></td>
							<td><input class="form-control" name="resource_required" required type="text"/></td>
							<td><input class="form-control" name="enabling_condition" type="text" required/></td>

							<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>

						</tr>
						--><?php /*} */?>
					</form>

					<script>
						$(document).ready(function () {
							$('#add_work<?php echo $_kra['id']?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>performance/add_work_plan',
									data: $('#add_work<?php echo $_kra['id']?>').serialize(), // serialize the form data
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

		<?php
	}
	?>


</div>
<br/>

<div class="card">
	<div style="text-align: center;">
		<h4>PERSONAL DEVELOPMENTAL PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #fbd4b4">
				<tr>
					<th>
						DEVELOPMENTAL AREAS
					</th>
					<th>
						TYPES OF INTERVENTIONS
					</th>

					<th>
						TARGET DATE
					</th>
					<th>
						<a href="#" data-toggle="modal" data-target="#add_pdp" class="btn-sm btn-info">ADD</a>
					</th>
					<?php /*if($user_submission != 1){ */?><!--
						<th></th>
					--><?php /*}*/?>
				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php

				foreach ($personal_developmental_plan as $work) { ?>

					<tr>
						<td><?php echo $work['developmental_areas'] ?></td>
						<td><?php echo $work['types_of_interventions'] ?></td>
						<td><?php echo $work['target_date'] ?></td>
						<td>
							<button class="btn-sm btn-info text-white" data-toggle="modal" href="#" data-target="#edit_pdp<?php echo $work['id']?>"><i class="fa fa-edit "></i></button>
							<a class="btn-sm btn-danger text-white btn-remove-pdp<?php echo $work['id'] ?>" ><i class="fa fa-remove "></i></a>
						</td>
						<?php /*if($user_submission != 1){ */?><!--
						<td>

							<button class="btn-sm btn-danger btn-remove-pdp<?php /*echo $work['id'] */?>"
							   href="<?php /*echo base_url() */?>performance/remove_personal_developmental_plan/200/<?php /*echo $work['id']; */?>">X</button>
						</td>
						--><?php /*} */?>

						<div class="modal fade" id="edit_pdp<?php echo $work['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							 aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">PERSONAL DEVELOPMENTAL PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="update_personal_developmental_plan<?php echo $work['id']?>" method="post">
										<div class="modal-body">
											<div class="form-group">
												<label class="control-label">DEVELOPMENTAL AREAS</label>
												<input class="form-control" value="<?php echo $work['developmental_areas'] ?>" name="developmental_areas"/>
												<span class="text-danger"><?php echo form_error('developmental_areas') ?></span>
											</div>
											<div class="form-group">
												<label class="control-label">TYPES OF INTERVENTIONS</label>
												<input class="form-control"  value="<?php echo $work['types_of_interventions'] ?>" name="types_of_interventions"/>
												<span class="text-danger"><?php echo form_error('types_of_interventions') ?></span>
											</div>
											<div class="form-group">
												<label class="control-label">TARGET DATE</label>
												<input class="form-control" type="date" name="target_date" value="<?php echo $work['target_date'] ?>"/>
												<span class="text-danger"><?php echo form_error('target_date') ?></span>
											</div>
											<div class="modal-footer">
												<input type="submit" value="SAVE" class="btn btn-primary"/>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
											</div>
										</div>
									</form>

									<script>
										$(document).ready(function () {
											$('#update_personal_developmental_plan<?php echo $work['id']?>').submit(function (e) {
												e.preventDefault(); // prevent the form from submitting normally
												$.ajax({
													type: 'POST',
													url: '<?php echo base_url();?>performance/update_personal_developmental_plan/<?php echo $work['id']?>',
													data: $('#update_personal_developmental_plan<?php echo $work['id']?>').serialize(), // serialize the form data
													success: function (response) {
														location.reload();
														alert('Has been successfully updated');
														//$('#response').html(response); // display the response on the page
													}
												});
											});
										});

									</script>
								</div>
							</div>
						</div>

						<script>
							$('.btn-remove-pdp<?php echo $work['id'] ?>').on('click', function () {
								//var rowId = $(this).data('id');
								$.ajax({
									url: '<?php echo base_url()?>performance/remove_personal_developmental_plan/200/<?php echo $work['id']?>',
									type: 'DELETE',
									//data: {id: rowId},
									success: function (response) {
										// remove the row from the table
										location.reload();
									},
									error: function (xhr, status, error) {
										console.log(error);
									}
								});
							});
						</script>

					</tr>
				<?php } ?>
				<?php /*if($user_submission != 1){ */?><!--
				<form id="add_pdp" method="post" action="<?php /*echo base_url() */?>performance/add_personal_developmental_plan/200">
					<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
					<tr>
						<td><input class="form-control" name="developmental_areas" required type="text"/></td>
						<td><input class="form-control" name="types_of_interventions" type="text" required/></td>
						<td><input class="form-control" name="target_date" required type="date"/></td>
						<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
					</tr>
				</form>
				--><?php /*} */?>
				<script>
					$(document).ready(function () {
						$('#add_pdp').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_personal_developmental_plan/200',
								data: $('#add_pdp').serialize(), // serialize the form data
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

</div>

<br />
<div class="card">

	<form class="card-body" id="initialize_part_1" method="post" action="<?php echo base_url() ?>performance/initialization/6">
		<input type="hidden" value="PART 1" name="description">
		<input type="hidden" value="PERFORMANCE INSTRUMENT" name="template_name">
		<div style="text-align: right;" class="form-inline justify-content-end">
			<input type="text" name="initials" <?php if(!empty($initialization->initials)){echo 'disabled'; } ?> value="<?php if(!empty($initialization)){echo $initialization->initials;} ?>" class="form-control-sm" placeholder="INITIALIZATION">
			<?php if(empty($initialization)) { ?>
				<input type="submit" class="btn-sm btn-success">
			<?php } ?>
		</div>
	</form>

	<script>
		$(document).ready(function () {
			$('#initialize_part_1').submit(function (e) {
				e.preventDefault(); // prevent the form from submitting normally
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>performance/initialization',
					data: $('#initialize_part_1').serialize(), // serialize the form data
					success: function (response) {
						location.reload();
						$('#response').html(response); // display the response on the page
					}
				});
			});
		});

	</script>
</div>

<?php if($submission->status == 'REJECTED' || $submission->status_final == 'REJECTED') { ?>
	<form action="<?php echo base_url() ?>performance/resubmit_changes/<?php  echo $submission->id ?>" method="post">
		<br/>
		<div class="card">
			<div class="card-footer">
				<div style="text-align: right;">
					<input type="hidden" name="status" value="<?php echo $submission->status ?>"/>
					<input type="hidden" name="status_final" value="<?php echo $submission->status_final ?>"/>
					<input type="submit" value="SAVE CHANGES" class="btn btn-info text-decoration-none text-white" />
				</div>
			</div>
		</div>
	</form>

<?php } ?>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">KEY RESULTS AREA</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add_kra" method="post" action="<?php echo base_url() ?>performance/add_kra_name/200">
				<div class="modal-body">
					<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
					<div class="form-group">
						<label class="control-label">KEY RESULT AREA</label>
						<input class="form-control" name="kra_name"/>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
						<span class="text-danger"><?php echo form_error('kra_name') ?></span>
					</div>

					<div class="modal-footer">
						<input type="submit" value="SAVE" class="btn btn-primary"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="add_individual_performance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ADD INDIVIDUAL PERFORMANCE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add_individual_performance_" method="post" >
				<input class="form-control" type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT" />
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">KEY RESULTS AREA</label>

						<input class="form-control" name="key_results_area" />
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
						<span class="text-danger"><?php echo form_error('key_results_area') ?></span>
					</div>
					<?php
					$arr = array('Consultation','Service Standards','Access','Courtesy','Information','Openness and Transparency','Redress','Value for money','Encouraging innovation and Rewarding excellence','Leadership and Strategic Director')

					?>
					<div class="form-group">
						<label class="control-label">BATHO PELE PRINCIPLES</label>
						<select class="form-control" name="batho_pele_principles">
							<?php foreach ($arr as $a){ ?>
								<option  value="<?php echo $a; ?>" ><?php echo $a; ?></option>
							<?php } ?>
						</select>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->

					</div>
					<div class="form-group">
						<label class="control-label">WEIGHT OF OUTCOME (in %)</label>
						<select class="form-control" name="weight_of_outcome">
							<?php
							for ($i = 10; $i <= 100; $i = $i + 5)
							{ ?>
								<option value="<?php echo $i ?>"><?php echo $i ?>%</option>
							<?php }
							?>
						</select>

					</div>

					<div class="modal-footer">
						<button type="submit"  class="btn btn-primary">SAVE</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</form>


		</div>
	</div>
</div>

<div class="modal fade" id="add_gmc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ADD GENERIC MANAGEMENT COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add_gmc_" method="post" >
				<div class="modal-body">
					<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
					<div class="form-group">
						<label class="control-label">CORE MANAGEMENT COMPETENCIES</label>
						<input class="form-control" required name="core_management"/>
					</div>

					<div class="form-group">
						<label class="control-label">PROCESS COMPETENCIES</label>
						<input class="form-control" required name="process_competencies"/>
					</div>

					<div class="form-group">
						<label class="control-label">DEV REQUIRED</label>
						<select class="form-control" name="dev_required">
							<option value="YES" >YES</option>
							<option  value="NO" >NO</option>
						</select>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->

					</div>


					<div class="modal-footer">
						<button type="submit"  class="btn btn-primary" >SAVE CHANGES</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</form>


		</div>
	</div>
</div>

<div class="modal fade" id="add_pdp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">PERSONAL DEVELOPMENTAL PLAN FOR DEPUTY DIRECTOR-GENERAL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add_pdp_" method="post">
				<div class="modal-body">
					<input class="form-control" type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
					<div class="form-group">
						<label class="control-label">DEVELOPMENTAL AREAS</label>
						<input class="form-control" name="developmental_areas"/>
						<span class="text-danger"><?php echo form_error('developmental_areas') ?></span>
					</div>
					<div class="form-group">
						<label class="control-label">TYPES OF INTERVENTIONS</label>
						<input class="form-control"  name="types_of_interventions"/>
						<span class="text-danger"><?php echo form_error('types_of_interventions') ?></span>
					</div>
					<div class="form-group">
						<label class="control-label">TARGET DATE</label>
						<input class="form-control" type="date" name="target_date" />
						<span class="text-danger"><?php echo form_error('target_date') ?></span>
					</div>
					<div class="modal-footer">
						<input type="submit" value="SAVE" class="btn btn-primary"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>





<script>
	$(document).ready(function () {
		$('#add_individual_performance_').submit(function (e) {

			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url();?>performance/add_individual_performance/9',
				data: $('#add_individual_performance_').serialize(), // serialize the form data
				success: function (response) {
					location.reload();
					$('#response').html(response); // display the response on the page
				}
			});
		});
	});

</script>




<script>
	$(document).ready(function () {
		$('#add_gmc_').submit(function (e) {
			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url();?>performance/add_generic_management_competencies/200',
				data: $('#add_gmc_').serialize(), // serialize the form data
				success: function (response) {
					location.reload();
					$('#response').html(response); // display the response on the page
				}
			});
		});
	});

</script>
<script>
	$(document).ready(function () {
		$('#add_pdp_').submit(function (e) {
			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url() ?>performance/add_personal_developmental_plan/9',
				data: $('#add_pdp_').serialize(), // serialize the form data
				success: function (response) {
					location.reload();
					$('#response').html(response); // display the response on the page
				}
			});
		});
	});

</script>
<script>
	$(document).ready(function () {
		$('#add_kra').submit(function (e) {
			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url();?>performance/add_kra_name/200',
				data: $('#add_kra').serialize(), // serialize the form data
				success: function (response) {
					location.reload();
					$('#response').html(response); // display the response on the page
				}
			});
		});
	});

</script>

