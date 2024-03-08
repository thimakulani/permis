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
			<?php if($user_submission != 1){ ?>
			<th></th>
			<?php } ?>
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
				<?php if($user_submission != 1){ ?>
				<td>
					<button class="btn-sm btn-danger btn-remove-ip<?php echo $ip['id'] ?>">X</button>
				</td>
				<?php } ?>
			</tr>

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
		<?php if($user_submission != 1){ ?>
		<form id="add_ip" method="post" action="<?php echo base_url() ?>performance/add_individual_performance/200">
			<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
			<tr>
				<td><input class="form-control" type="text" name="key_results_area"/></td>
				<td><input class="form-control" type="text" name="batho_pele_principles"/></td>
				<!--<td><input class="form-control" type="number" name="weight_of_outcome"/></td>-->
				<td><select name="weight_of_outcome" class="form-control select">
					<?php echo $data ?>
				</select>
				</td>
				<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
			</tr>
		</form>
		<?php } ?>
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

					<?php if($user_submission != 1){ ?>
						<th>
						</th>
					<?php } ?>
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
						<?php if($user_submission != 1){ ?>
						<td>
							<button class="btn-sm btn-danger btn-remove-gmc<?php echo $gmcWork['id'] ?>">X</button>
						</td>
						<?php } ?>
					</tr>

					<script>
						$('.btn-remove-gmc<?php echo $gmcWork['id'] ?>').on('click', function () {
							//var rowId = $(this).data('id');
							$.ajax({
								url: '<?php echo base_url()?>performance/remove_gmc_Plan/200/<?php echo $gmcWork['id']?>',
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
				<?php if($user_submission != 1){ ?>

				<form id="add_gmc" method="post">
					<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
					<tr>
						<td><input class="form-control" name="core_management" required type="text"/></td>
						<td><input class="form-control" name="process_competencies" required type="text"/></td>
						<td>
							<select name="dev_required" class="form-control select">
								<option value="YES">YES</option>
								<option value="NO">NO</option>
							</select>
						</td>

						<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>

					</tr>
				</form>
				<?php } ?>
				<script>
					$(document).ready(function () {
						$('#add_gmc').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_generic_management_competencies/200',
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
						<?php if($user_submission != 1){ ?>
						<th></th>
						<?php } ?>
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
							<?php if($user_submission != 1){ ?>
								<td>
									<button class="btn-sm btn-danger btn-remove-wp<?php echo $work['id'] ?>" style="margin: 2px"
									   >X</button>
								</td>
								<?php }?>
								<script>
									$('.btn-remove-wp<?php echo $work['id'] ?>').on('click', function () {
										//var rowId = $(this).data('id');
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
						<?php if($user_submission != 1){ ?>
						<tr>
							<?php if($row_counter==0){ ?>
								<td><?php echo $_kra['key_results_area']; ?></td>
							<?php }?>
							<td><input class="form-control" name="key_activities" type="text" required/></td>
							<td>
								<select name="outcome_weight" class="form-control select">
									<?php for ($i = 10; $i <= 100; $i = $i + 10) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
									<?php } ?>
								</select>
							</td>
							<td><input class="form-control" name="target_date" required type="date"/></td>
							<td><input class="form-control" name="indicator_target" required type="text"/></td>
							<td><input class="form-control" name="resource_required" required type="text"/></td>
							<td><input class="form-control" name="enabling_condition" type="text" required/></td>

							<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>

						</tr>
						<?php } ?>
					</form>

					<script>
						$(document).ready(function () {
							$('#add_wp<?php echo $_kra['id']?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>performance/add_work_plan',
									data: $('#add_wp<?php echo $_kra['id']?>').serialize(), // serialize the form data
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
					<?php if($user_submission != 1){ ?>
						<th></th>
					<?php }?>
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
						<?php if($user_submission != 1){ ?>
						<td>

							<button class="btn-sm btn-danger btn-remove-pdp<?php echo $work['id'] ?>"
							   href="<?php echo base_url() ?>performance/remove_personal_developmental_plan/200/<?php echo $work['id']; ?>">X</button>
						</td>
						<?php } ?>
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
				<?php if($user_submission != 1){ ?>
				<form id="add_pdp" method="post" action="<?php echo base_url() ?>performance/add_personal_developmental_plan/200">
					<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
					<tr>
						<td><input class="form-control" name="developmental_areas" required type="text"/></td>
						<td><input class="form-control" name="types_of_interventions" type="text" required/></td>
						<td><input class="form-control" name="target_date" required type="date"/></td>
						<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
					</tr>
				</form>
				<?php } ?>
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

<?php if($user_submission != 1){ ?>
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_ddg/200">
	<br/>
	<div class="card">


		<div class="card-body">
			<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
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

