<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<h2 style="text-align: center;">PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</h2>
<br/>
<!--<div>
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
</div>-->

<br/>



<!--
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
-->
<!--<div>
	<a class="btn-sm btn-info" href="<?php /*echo base_url() */?>performance/performance_capture">BACK</a>
</div>-->
<div style="text-align: center;">PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</div>
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
		DISPUTE RESOLUTION MECHANISM
	</h4>
	<p>
		DISPUTES ON THE SIGNING OF PAS WILL BE DEALT WITH IN TERMS OF REGULATION 72(4)(5)&(6) OF THE PUBLIC SERVICE
		REGULATIONS, 2016. ANY DISPUTES ABOUT THE ASSESSMENT, SHALL BE MEDIATED BY A PERSON AGREED TO BY THE SMS MEMBER
		AND THE SUPERVISOR.
	</p>
</div>


<div class="card">

	<table class="table table-stripped">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>KEY RESULT AREA</th>
			<th>BATHO PELE PRINCIPLES</th>
			<th>WEIGHTING</th>

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
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: 'Successfully Deleted',
								onClose: () => {
									location.reload();
								}
							});
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

		<script>
			$(document).ready(function () {
				$('#add_ip').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url();?>performance/add_individual_performance',
						data: $('#add_ip').serialize(), // serialize the form data
						success: function (response) {
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: 'Successfully Added',
								onClose: () => {
									location.reload();
								}
							});
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

					</tr>

					<script>
						$('.btn-remove-gmc<?php echo $gmcWork['id'] ?>').on('click', function () {
							//var rowId = $(this).data('id');
							$.ajax({
								url: '<?php echo base_url()?>performance/performance/remove_gmc_Plan/200/<?php echo $gmcWork['id']?>',
								type: 'DELETE',
								//data: {id: rowId},
								success: function (response) {
									// remove the row from the table
									Swal.fire({
										icon: 'success',
										title: 'Success',
										text: 'Successfully Removed',
										onClose: () => {
											location.reload();
										}
									});
								},
								error: function (xhr, status, error) {
									console.log(error);
								}
							});
						});
					</script>

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
									Swal.fire({
										icon: 'success',
										title: 'Success',
										text: 'Successfully Added',
										onClose: () => {
											location.reload();
										}
									});
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

							<script>
								$('.btn-remove-wp<?php echo $work['id'] ?>').on('click', function () {
									//var rowId = $(this).data('id');
									$.ajax({
										url: '<?php echo base_url()?>performance/remove_work_plan/<?php echo $work['id']?>',
										type: 'DELETE',
										//data: {id: rowId},
										success: function (response) {
											// remove the row from the table
											Swal.fire({
												icon: 'success',
												title: 'Success',
												text: 'Successfully Removed',
												onClose: () => {
													location.reload();
												}
											});
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



				<script>
					$(document).ready(function () {
						$('#add_wp<?php echo $_kra['id']?>').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_work_plan',
								data: $('#add_wp<?php echo $_kra['id']?>').serialize(), // serialize the form data
								success: function (response) {
									Swal.fire({
										icon: 'success',
										title: 'Success',
										text: 'Successfully Added',
										onClose: () => {
											location.reload();
										}
									});
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

						<script>
							$('.btn-remove-pdp<?php echo $work['id'] ?>').on('click', function () {
								//var rowId = $(this).data('id');
								$.ajax({
									url: '<?php echo base_url()?>performance/remove_personal_developmental_plan/200/<?php echo $work['id']?>',
									type: 'DELETE',
									//data: {id: rowId},
									success: function (response) {
										Swal.fire({
											icon: 'success',
											title: 'Success',
											text: 'Successfully Removed',
											onClose: () => {
												location.reload();
											}
										});
									},
									error: function (xhr, status, error) {
										console.log(error);
									}
								});
							});
						</script>

					</tr>
				<?php } ?>

				<script>
					$(document).ready(function () {
						$('#add_pdp').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_personal_developmental_plan',
								data: $('#add_pdp').serialize(), // serialize the form data
								success: function (response) {
									Swal.fire({
										icon: 'success',
										title: 'Success',
										text: 'Successfully Added',
										onClose: () => {
											location.reload();
										}
									});
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
						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: 'Successfully Initialized',
							onClose: () => {
								location.reload();
							}
						});
					}
				});
			});
		});

	</script>
</div>

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
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Successfully Added',
						onClose: () => {
							location.reload();
						}
					});
				}
			});
		});
	});

</script>



