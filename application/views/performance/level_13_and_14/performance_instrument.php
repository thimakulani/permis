<?php $counter = 0;?>

<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>

<div style="text-align: center;">

	<h4>PERFORMANCE AGREEMENT FOR CHIEF DIRECTOR AND DIRECTOR</h4>

</div>

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
		<?php echo $emp->b_name; ?>
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
<br/>
<?php if (1 == 2) { ?>
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
					<?php if($user_submission >0){ ?>
						<th></th>
					<?php } ?>

				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($individual_performance as $m) {
					$counter = $counter + $m['weight_of_outcome']; ?>

					<tr>
						<td><?php echo $m['key_results_area']; ?>
						</td>
						<td><?php echo $m['batho_pele_principles']?></td>
						<td><?php echo $m['weight_of_outcome']; ?>
						</td>
						<?php if($user_submission >0){ ?>
							<td>

								<button class="btn-sm btn-danger btn-remove-individual_perf<?php echo $m['id'] ?>" >X</button>
							</td>
						<?php } ?>
					</tr>


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
						<?php if($user_submission >0){ ?>
							<td></td>
						<?php } ?>
					</tr>

				<?php }
				$data = '';
				for ($i = 10; $i <= 100; $i = $i + 5) {
					$data .= '<option value="' . $i . '">' . $i . '%</option>';
				}

				?>
				<?php if($user_submission < 1){ ?>
					<?php if($counter !=100) { ?>
						<form id="add_i_p" method="post"
						>
						<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
						<tr>
							<td><input class="form-control" name="key_results_area" required type="text"/></td>
							<td>
								<?php
								$arr = array('Consultation','Service Standards','Access','Courtesy','Information','Openness and Transparency','Redress','Value for money','Encouraging innovation and Rewarding excellence','Leadership and Strategic Director')

								?>
								<select class="form-control select" name="batho_pele_principles">
									<?php foreach ($arr as $a){ ?>
										<option  value="<?php echo $a; ?>" ><?php echo $a; ?></option>
									<?php } ?>
								</select>
							</td>

							<td>
								<select name="weight_of_outcome" id="weight_of_outcome" class="form-control select">
									<?php echo $data ?>
								</select>
							</td>

							<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>

						</tr>
						</form><?php }

				}?>
				</tbody>

			</table>
			<script>

				const selected_weight = document.getElementById("weight_of_outcome");
				function ValidateKRAs()
				{


					/*if(sub_total > 100)
					{
						alert('THE TOTAL WEIGHT IS GREATER THAN 100');
					}
					else{
						//document.getElementById("add_i_p").submit();
					}*/

				}

				$(document).ready(function () {
					$('#add_i_p').submit(function (e) {
						e.preventDefault();
						var tot_weight = 0;
						tot_weight = <?php echo $counter ?> ;
						var sub_total = tot_weight + Number(selected_weight.value);
						if(sub_total <= 100) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_individual_performance/9',
								data: $('#add_i_p').serialize(), // serialize the form data
								success: function (response) {
									location.reload();
									$('#response').html(response); // display the response on the page
								}

							});
						}
						else{
							alert('THE TOTAL WEIGHT IS GREATER THAN 100');
						}
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
					<?php if($user_submission >0){ ?>
						<th></th>
					<?php } ?>
				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($gmc_personal_development_plan as $gmcWork) {
					?>

					<tr>
						<td><?php echo $gmcWork['core_management_competencies'] ?></td>
						<td><?php echo $gmcWork['process_competencies'] ?></td>
						<td><?php echo $gmcWork['dev_required'] ?></td>
						<?php if($user_submission >0){ ?>
							<td>

								<button class="btn-sm btn-danger btn-remove-gmc<?php echo $gmcWork['id'] ?>" >X</button>
							</td>
						<?php }?>


					</tr>
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


				<?php if($user_submission < 1){ ?>

					<form id="add_gmcpdp" method="post" action="<?php echo base_url() ?>performance/add_generic_management_competencies_personal_development_plan/9">
						<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT" />
						<tr>
							<td><input class="form-control" name="core_management_competencies" required  type="text" /></td>
							<td><input class="form-control" name="process_competencies" required  type="text" /></td>
							<td>
								<select name="dev_required" class="form-control select">
									<option value="YES">YES</option>
									<option value="NO">NO</option>
								</select>
							</td>
							<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
						</tr>
					</form>

				<?php  }?>
				<script>
					$(document).ready(function () {
						$('#add_gmcpdp').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url();?>performance/add_generic_management_competencies_personal_development_plan/9',
								data: $('#add_gmcpdp').serialize(), // serialize the form data
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

<br>

<?php if($user_submission >0)
{ ?>
	<!--<div>
		<a class="btn-sm btn-info" data-toggle="modal" href="#" data-target="#exampleModal">ADD KEY RESULT AREA</a>
	</div>-->
<?php } ?>
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
						<?php if($user_submission >0){ ?>
							<th></th>
						<?php }?>

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
								<?php if($user_submission >0){ ?>
									<td><a class="btn-remove-work<?php echo $work['id'] ?> btn-sm btn-danger"
										   href="<?php echo base_url() ?>performance/remove_work_plan/<?php echo $work['id'] ?>">
											X</a></td>
								<?php } ?>
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

							<?php
							$row_counter++;
							//$row_span++;
						}
					}
					?>
					<?php if($user_submission < 1){ ?>
						<form id="add_work<?php echo $_kra['id'] ?>" method="post">
							<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
							<input type="hidden" name="kra_id" value="<?php echo $_kra['id'] ?>"/>
							<tr>
								<?php if($row_counter==0){ ?>
									<td><?php echo $_kra['key_results_area']; ?></td>
								<?php }?>
								<td><input class="form-control" name="key_activities" type="text" required/></td>
								<!--<td>
								<select name="outcome_weight" class="form-control select">
									<?php /*for ($i = 10; $i <= 100; $i = $i + 10) { */?>
										<option value="<?php /*echo $i; */?>"><?php /*echo $i; */?>%</option>
									<?php /*} */?>
								</select>
							</td>-->
								<td><input class="form-control" name="target_date" required type="date"/></td>
								<td><input class="form-control" name="indicator_target" required type="text"/></td>
								<td><input class="form-control" name="resource_required" required type="text"/></td>
								<td><input class="form-control" name="enabling_condition" type="text" required/></td>
								<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
							</tr>
						</form>
					<?php  } ?>

					</tbody>

				</table>

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
					<?php if($user_submission >0){ ?>
						<th class="text-right"></th>

					<?php } ?>
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
						<?php if($user_submission >0){ ?>
							<td>

								<button class="btn-sm btn-danger text-white text-decoration-none btn-remove-pdp<?php echo $work['id'] ?>"
								>X
								</button>
							</td>
						<?php } ?>

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

				<?php } ?>

				<?php if($user_submission < 1){ ?>
					<form id="add_pdp" method="post"
						  action="<?php echo base_url() ?>performance/add_personal_developmental_plan/9">
						<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
						<tr>
							<td><input class="form-control" name="developmental_areas" required type="text"/></td>
							<td><input class="form-control" name="types_of_interventions" type="text" required/></td>
							<td><input class="form-control" name="target_date" required type="date"/></td>
							<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
						</tr>
					</form>
				<?php }?>
				<script>
					$(document).ready(function () {
						$('#add_pdp').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url() ?>performance/add_personal_developmental_plan/9',
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
<br>
<div class="card">

</div>
<br>
<div>

	<form id="initialize_part_1" method="post" action="<?php echo base_url() ?>performance/initialization/6">
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
<br />
<?php if($user_submission < 1){ ?>
	<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir/9">
		<br/>
		<div class="card">
			<div class="card-body">
				<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
			</div>
			<div class="card-footer">
				<input type="submit" <?php if(!isset($initialization) || $counter != 100){ echo 'disabled';} ?> class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>

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
			<form id="add_kra" method="post" action="<?php echo base_url() ?>performance/add_kra_name/9">
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

			<script>
				$(document).ready(function () {
					$('#add_kra').submit(function (e) {
						e.preventDefault(); // prevent the form from submitting normally
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url();?>performance/add_kra_name/9',
							data: $('#add_kra').serialize(), // serialize the form data
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
