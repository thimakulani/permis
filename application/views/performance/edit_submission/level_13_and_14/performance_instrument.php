<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div style="text-align: center;">

	<h4>PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</h4>

</div>
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
		<?php echo '' ?>
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
<?php if (1 == 2) { ?>
	<div>
		PLEASE IDENTIFY DATES FOR HALF-YEARLY AND ANNUAL PERFORMANCE ASSESSMENTS
		<table>
			<thead>
			<tr>
				<th>MID-YEAR PERFORMANCE REVIEW & ASSESSMENT DATE:</th>
				<th><input class="form-control"/></th>

			</tr>
			<tr>
				<th>ANNUAL PERFORMANCE ASSESSMENT DATE:</th>
				<th><input class="form-control"/></th>

			</tr>
			</thead>
		</table>
	</div>
<?php } ?>
<br/>
<div class="card">
	<div style="text-align: center;">
		<h4>INDIVIDUAL PERFORMANCE</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #8cb2e1">
				<tr>
					<th>
						KEY RESULTS AREA

					</th>
					<th>
						BATHO PELE PRINCIPLES
					</th>

					<th>
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						<a class="btn-sm btn-info text-decoration-none" data-toggle="modal" data-target="#add_individual_performance" href="#" >
							ADD
						</a>
					</th>


				</tr>
				</thead>
				<tbody>

				<?php
				$counter = 0;
				foreach ($individual_performance as $m) {
					$counter = $counter + $m['weight_of_outcome']; ?>

					<tr>
						<td><?php echo $m['key_results_area']; ?>
						</td>
						<td><?php echo $m['batho_pele_principles']?></td>
						<td><?php echo $m['weight_of_outcome']; ?></td>
						<td>
							<button data-toggle="modal" data-target="#edit_i_p<?php echo $m['id']; ?>"  class="btn-sm btn-info text-white"><i class="fa fa-edit "></i></button>
							<a data-toggle="modal" data-target="#confirm_delete<?php echo $m['id']; ?>"  class="btn-sm btn-danger text-white"><i class="fa fa-remove "></i></a>
						</td>


					</tr>

					<div class="modal fade" id="confirm_delete<?php echo $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
											<input class="form-control" disabled name="key_results_area" value="<?php echo $m['key_results_area']; ?>"/>
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
													<option <?php if($a == $m['batho_pele_principles']) echo 'selected';?> value="<?php echo $a; ?>" ><?php echo $a; ?></option>
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
													<option <?php if($i == $m['weight_of_outcome']) echo 'selected'?> value="<?php echo $i ?>"><?php echo $i ?>%</option>
												<?php }
												?>
											</select>

										</div>

										<div class="modal-footer">
											<button type="submit"  class="btn btn-primary btn_delete_ip<?php echo $m['id'] ?>">DELETE</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
										</div>
									</div>
								</form>

								<script>
									$('.btn_delete_ip<?php echo $m['id'] ?>').on('click', function() {
										$.ajax({
											url: '<?php echo base_url() ?>performance/remove_ip/<?php echo $m['id'] ?>',
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



					<div class="modal fade" id="edit_i_p<?php echo $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						 aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">UPDATE INDIVIDUAL PERFORMANCE</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="update_individual_performance<?php echo $m['id'] ?>" method="post" >
									<div class="modal-body">

										<div class="form-group">
											<label class="control-label">KEY RESULT AREA</label>
											<input class="form-control" name="key_results_area" value="<?php echo $m['key_results_area']; ?>"/>
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
													<option <?php if($a == $m['batho_pele_principles']) echo 'selected';?> value="<?php echo $a; ?>" ><?php echo $a; ?></option>
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
													<option <?php if($i == $m['weight_of_outcome']) echo 'selected'?> value="<?php echo $i ?>"><?php echo $i ?>%</option>
												<?php }
												 ?>
											</select>

										</div>

										<div class="modal-footer">
											<button type="submit"  class="btn btn-primary btn_update_id<?php echo $m['id'] ?>">SAVE CHANGES</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
										</div>
									</div>
								</form>

								<script>
									$(document).ready(function () {
										$('#update_individual_performance<?php echo $m['id'] ?>').submit(function (e) {
											e.preventDefault(); // prevent the form from submitting normally
											$.ajax({
												type: 'POST',
												url: '<?php echo base_url();?>performance/update_individual_performance/<?php echo $m['id'] ?>',
												data: $('#update_individual_performance<?php echo $m['id'] ?>').serialize(), // serialize the form data
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
						$('.btn-remove-individual_perf<?php echo $m['id'] ?>').on('click', function () {
							//var rowId = $(this).data('id');
							$.ajax({
								url: '<?php echo base_url() ?>performance/remove_individual_performance/9/<?php echo $m['id'] ?>',
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

				<?php if ($counter > 0) { ?>

					<tr>
						<td>SUB-TOTAL</td>
						<td></td>
						<td><?php echo $counter ?></td>
						<td></td>
					</tr>

				<?php }
				$data = '';
				for ($i = 10; $i <= 100; $i = $i + 10) {
					$data .= '<option value="' . $i . '">' . $i . '%</option>';
				}

				?>

				</tbody>

			</table>

			<!-- add individual performance-->
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
							<input class="form-control" type="hidden" name="period" value="<?php echo $period ?>" />
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
			<script>
				$(document).ready(function () {
					$('#add_individual_performance_').submit(function (e) {

						e.preventDefault(); // prevent the form from submitting normally
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url();?>performance/add_individual_performance',
							data: $('#add_individual_performance_').serialize(), // serialize the form data
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

<br>

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
				<thead style="background-color: #8cb2e1">
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

				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($gmc_personal_development_plan as $gmcWork) {
					?>

					<tr>
						<td><?php echo $gmcWork['core_management'] ?></td>
						<td><?php echo $gmcWork['process_competencies'] ?></td>
						<td><?php echo $gmcWork['dev_required'] ?></td>
						<td>
							<button data-toggle="modal" data-target="#edit_gmc<?php echo $gmcWork['id']; ?>" class="btn-sm btn-info text-white"><i class="fa fa-edit "></i></button>
							<a class="btn-sm btn-danger text-white btn-remove-gmc<?php echo $gmcWork['id'] ?>"><i class="fa fa-remove"></i></a>
						</td>

						<div class="modal fade" id="edit_gmc<?php echo $gmcWork['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							 aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">UPDATE GENERIC MANAGEMENT COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="update_gmc<?php echo $gmcWork['id'] ?>" method="post" >
										<div class="modal-body">

											<div class="form-group">
												<label class="control-label">CORE MANAGEMENT COMPETENCIES</label>
												<input class="form-control" required name="core_management" value="<?php echo $gmcWork['core_management_competencies']; ?>"/>


											</div>

											<div class="form-group">
												<label class="control-label">PROCESS COMPETENCIES</label>
												<input class="form-control" required name="process_competencies" value="<?php echo $gmcWork['process_competencies']; ?>"/>
											</div>

											<div class="form-group">
												<label class="control-label">DEV REQUIRED</label>
												<select class="form-control" name="dev_required">
														<option <?php if($gmcWork['dev_required'] == 'YES') echo 'selected';?> value="YES" >YES</option>
														<option <?php if($gmcWork['dev_required'] == 'NO') echo 'selected';?> value="NO" >NO</option>
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


					</tr>
					<script>
						$(document).ready(function () {
							$('#update_gmc<?php echo $gmcWork['id'] ?>').submit(function (e) {

								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>performance/update_gmc/<?php echo $gmcWork['id'] ?>',
									data: $('#update_gmc<?php echo $gmcWork['id'] ?>').serialize(), // serialize the form data
									success: function (response) {
										//alert('ss');
										location.reload();
										$('#response').html(response); // display the response on the page
									}
								});
							});
						});

					</script>
					<script>
						$('.btn-remove-gmc<?php echo $gmcWork['id'] ?>').on('click', function () {
							//var rowId = $(this).data('id');
							$.ajax({
								url: '<?php echo base_url() ?>performance/remove_generic_management_competencies_personal_development_plan/9/<?php echo $gmcWork['id'] ?>',
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





				</tbody>

			</table>
		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-header">
		<h4>WORK PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h4>
	</div>


	<div class="card-body p-0">
		<div class="table-responsive">

			<?php
			foreach ($individual_performance as $_kra) { ?>
				<table class="table table-striped projects">
					<thead style="background-color: #8cb2e1">
					<tr>
						<th>
							KEY RESULT AREAS
						</th>
						<th>
							KEY ACTIVITIES
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
							<a href="#" data-toggle="modal" data-target="#add_work_plan<?php echo $_kra['id']?>" class="btn-sm btn-info">ADD</a>
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
											<input class="form-control" type="hidden" name="period" value="<?php echo $period; ?>"/>
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

						<script>
							$(document).ready(function () {
								$('#add_work<?php echo $_kra['id'] ?>').submit(function (e) {
									e.preventDefault(); // prevent the form from submitting normally
									$.ajax({
										type: 'POST',
										url: '<?php echo base_url() ?>performance/add_work_plan',
										data: $('#add_work<?php echo $_kra['id'] ?>').serialize(), // serialize the form data
										success: function (response) {
											location.reload();
											$('#response').html(response); // display the response on the page
										}
									});
								});
							});

						</script>

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
						if ($_kra['id'] == $work['kra_id']) {
							?>
							<tr>
								<?php if($row_counter == 0) {?>
									<td rowspan="<?php echo $row_span;?>"><?php echo $_kra['key_results_area']; ?></td>
								<?php } ?>
								<td> <?php echo $work['key_activities'] ?> </td>
								<!--<td><?php /*echo $work['weight'] */?></td>-->
								<td><input class="form-control" readonly="readonly" value="<?php echo $work['target_date'] ?>" type="text"/>
								</td>
								<td><?php echo $work['indicator_target'] ?> </td>
								<td><?php echo $work['resource_required'] ?></td>
								<td><?php echo $work['enabling_condition'] ?> </td>
								<td>
									<button class="btn-sm btn-info text-white" data-toggle="modal" href="#" data-target="#edit_work<?php echo $work['id']?>" ><i class="fa fa-edit "></i></button>
									<a class="btn-sm btn-danger text-white btn-remove-work<?php echo $work['id'] ?>" ><i class="fa fa-remove "></i></a>
								</td>
							</tr>

							<script>
								$('.btn-remove-work<?php echo $work['id'] ?>').on('click', function () {
									var rowId = $(this).data('id');
									$.ajax({
										url: '<?php echo base_url() ?>performance/remove_work_plan/<?php echo $work['id'] ?>',
										type: 'DELETE',
										data: {id: rowId},
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

							<div class="modal fade" id="edit_work<?php echo $work['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								 aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">WORK PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form id="update_work_plan<?php echo $work['id']?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label class="control-label">KEY ACTIVITIES</label>
													<input class="form-control" value="<?php echo $work['key_activities'] ?>" name="key_activities"/>
													<span class="text-danger"><?php echo form_error('key_activities') ?></span>
												</div>
												<div class="form-group">
													<label class="control-label">TARGET DATE</label>
													<input class="form-control" type="date" value="<?php echo $work['target_date'] ?>" name="target_date"/>
													<span class="text-danger"><?php echo form_error('target_date') ?></span>
												</div>
												<div class="form-group">
													<label class="control-label">INDICATOR/TARGET</label>
													<input class="form-control" name="indicator_target" value="<?php echo $work['indicator_target'] ?>"/>
													<span class="text-danger"><?php echo form_error('indicator_target') ?></span>
												</div>
												<div class="form-group">
													<label class="control-label">RESOURCE REQUIRED</label>
													<input class="form-control" value="<?php echo $work['resource_required'] ?>" name="resource_required"/>
													<span class="text-danger"><?php echo form_error('resource_required') ?></span>
												</div>
												<div class="form-group">
													<label class="control-label">ENABLING CONDITION</label>
													<input class="form-control" value="<?php echo $work['enabling_condition'] ?>" name="enabling_condition"/>
													<span class="text-danger"><?php echo form_error('enabling_condition') ?></span>
												</div>

												<div class="modal-footer">
													<input type="submit" value="SAVE" class="btn btn-primary"/>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
												</div>
											</div>
										</form>

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
									</div>
								</div>
							</div>


							<?php
							$row_counter++;
							//$row_span++;
						}
					}
					?>

					</tbody>

				</table>


			<?php } ?>


		</div>
	</div>

</div>

<br/>
<div class="card">

	<div style="text-align: center;">
		<h4>PERSONAL DEVELOPMENTAL PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #8cb2e1">
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

				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php
				foreach ($devplan as $work) {
					?>
					<tr>
						<td><?php echo $work['developmental_areas']; ?></td>
						<td><?php echo $work['types_of_interventions'] ?></td>
						<td><?php echo $work['target_date'] ?></td>
						<td>
							<button class="btn-sm btn-info text-white" data-toggle="modal" href="#" data-target="#edit_pdp<?php echo $work['id']?>"><i class="fa fa-edit "></i></button>
							<a class="btn-sm btn-danger text-white btn-remove-pdp<?php echo $work['id'] ?>" ><i class="fa fa-remove "></i></a>
						</td>

					</tr>
					<script>
						$('.btn-remove-pdp<?php echo $work['id'] ?>').on('click', function () {
							//var rowId = $(this).data('id');
							$.ajax({
								url: '<?php echo base_url() ?>performance/remove_personal_developmental_plan/9/<?php echo $work['id'] ?>',
								type: 'DELETE',
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
								<input class="form-control" type="hidden" name="period" value="<?php echo $period; ?>"/>
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



				<?php } ?>



				</tbody>
			</table>
		</div>
	</div>

</div>
<br>
<div class="card">
</div>
<br>
<div>

	<form id="initialize_part_1" method="post" action="<?php echo base_url() ?>performance/initialization/6">
		<input type="hidden" value="PART 1" name="description">
		<input type="hidden" value="PERFORMANCE INSTRUMENT" name="template_name">
		<input class="form-control" type="hidden" name="period" value="<?php echo $period; ?>"/>
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
<br />

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
			<form id="add_gmcpdp" method="post" >
				<div class="modal-body">
					
					<input class="form-control" type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
					<input class="form-control" type="hidden" name="period" value="<?php echo $period; ?>"/>
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
				<h5 class="modal-title">PERSONAL DEVELOPMENTAL PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add_pdp_" method="post">
				<div class="modal-body">
					<input class="form-control" type="hidden" name="period" value="<?php echo $period; ?>"/>
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
		$('#add_pdp_').submit(function (e) {
			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url() ?>performance/add_personal_developmental_plan',
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
		$('#add_gmcpdp').submit(function (e) {
			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url();?>performance/add_generic_management_competencies_personal_development_plan',
				data: $('#add_gmcpdp').serialize(), // serialize the form data
				success: function (response) {
					location.reload();
					$('#response').html(response); // display the response on the page
				}
			});
		});
	});

</script>
