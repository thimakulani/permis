<?php $counter = 0; ?>
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div style="text-align: center;">PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</div>
<div class=card>

	<div class="card-body">
		<dl class="row">
			<dt class="col-sm-2">
				NAME OF EXECUTIVE AUTHORITY
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->Name . ' ' . $emp->LastName; ?>
			</dd>

			<dt class="col-sm-2">
				NAME OF HEAD OF DEPARTMENT
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->S_Name ?>
			</dd>

			<dt class="col-sm-2">
				PERSAL NUMBER
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->Persal ?>
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
	</div>
</div>
<br/>
<div>
	<h3>DISPUTE RESOLUTION MECHANISM</h3>
	<p>ANY DISPUTES ABOUT THE NATURE OF THE HOD’S PA, WHETHER IT RELATES TO KEY RESPONSIBILITIES, PRIORITIES, METHODS OF
		ASSESSMENT IN THIS AGREEMENT, SHALL BE MEDIATED BY DG IN THE PRESIDENCY OR DG IN THE OFFICE OF THE PREMIER.

		IF, THIS MEDIATION FAILS AND THE DISPUTE REMAINS UNRESOLVED AT THIS LEVEL, THE MATTER SHOULD, THEREAFTER BE
		REFERRED TO THE PSC.</p>

</div>


<div class="table-responsive">
	<table class="table table-striped">
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
		foreach ($bp as $ip) {
			$counter = $counter + $ip['weight_of_outcome'];
			?>
			<tr>
				<td><?php echo $ip['key_results_area'] ?></td>
				<td><?php echo $ip['batho_pele_principles'] ?></td>
				<td><?php echo $ip['weight_of_outcome'] ?></td>
				<?php if($user_submission != 1){ ?>
				<td><button class="btn-sm btn-danger btn-remove-bp<?php echo $ip['id'] ?>"
					   >X</button>
					<button class="btn-sm btn-info" data-toggle="modal"
							data-target="#btn-update-individual_perf<?php echo $ip['id'] ?>">Edit
					</button>
				</td>
				<?php }?>
			</tr>

			<div class="modal fade" id="btn-update-individual_perf<?php echo $ip['id']; ?>" tabindex="-1" role="dialog"
				 aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">EDIT INDIVIDUAL PERFORMANCE</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<!--KEY RESULTS AREA	BATHO PELE PRINCIPLES	WEIGHT OF OUTCOME (in %)-->
						<form id="individual_performance_form<?php echo $ip['id'] ?>" method="post"
						>
							<div class="modal-body">
								<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
								<div class="form-group">
									<label class="control-label">KEY RESULTS AREA</label>
									<input class="form-control" name="key_results_area"
										   value="<?php echo $ip['key_results_area'] ?>" required type="text"/>
								</div>

								<div class="form-group">
									<label class="control-label">BATHO PELE PRINCIPLES</label>
									<?php
									$arr = array('Consultation', 'Service Standards', 'Access', 'Courtesy', 'Information', 'Openness and Transparency', 'Redress', 'Value for money', 'Encouraging innovation and Rewarding excellence', 'Leadership and Strategic Director')

									?>
									<select class="form-control select" name="batho_pele_principles">
										<?php foreach ($arr as $a) { ?>
											<option <?php if ($ip['batho_pele_principles'] == $a) echo 'selected' ?>
												value="<?php echo $a; ?>"><?php echo $a; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<?php
									$data = '';
									for ($i = 10; $i <= 100; $i = $i + 5) {
										$selected = '';
										if ($ip['weight_of_outcome'] == $i) {
											$selected = 'selected';
										}
										$data .= '<option "' . $selected . '" value="' . $i . '">' . $i . '%</option>';
									}

									?>
									<label class="control-label">WEIGHT OF OUTCOME (in %)</label>
									<select name="weight_of_outcome" id="weight_of_outcome_update"
											class="form-control select">
										<?php echo $data ?>
									</select>
								</div>

								<div class="modal-footer">
									<input type="submit" value="UPDATE" class="btn btn-primary"/>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>


			<script>
				$(document).ready(function () {
					$('#individual_performance_form<?php echo $ip['id']?>').submit(function (e) {
						e.preventDefault();
						const selected_weight = document.getElementById("weight_of_outcome_update");
						var tot_weight = 0;
						tot_weight = <?php echo $counter ?> ;
						var sub_total = tot_weight + Number(selected_weight.value);
						if (sub_total <= 100) {
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url() ?>performance/update_individual_performance/<?php echo $ip['id'] ?>',
								data: $('#individual_performance_form<?php echo $ip['id']?>').serialize(), // serialize the form data
								success: function (response) {
									location.reload();
									$('#response').html(response); // display the response on the page
								}
							});
						} else {
							alert('THE TOTAL WEIGHT IS GREATER THAN 100');
						}
					});
				});

			</script>

			<script>
				$('.btn-remove-bp<?php echo $b['id'] ?>').on('click', function () {
					//var rowId = $(this).data('id');
					$.ajax({
						url: '<?php echo base_url() ?>performance/remove_individual_performance/500/<?php echo $b['id']; ?>',
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

		<?php if ($counter > 0) { ?>

			<tr>
				<td>SUB-TOTAL</td>
				<td></td>
				<td><?php echo $counter ?></td>
				<?php if ($user_submission != 1) { ?>
					<td></td>
				<?php } ?>
			</tr>

		<?php } ?>



		<?php if($user_submission != 1){ ?>
		<form id="individual_performance" method="post" action="<?php echo base_url() ?>performance/add_individual_performance">
			<input name="template_name" value="PERFORMANCE INSTRUMENT" type="hidden"/>
			<tr>
				<td><input name="key_results_area" class="form-control" type="text"/></td>
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
				<td><input name="weight_of_outcome" value="10" min="10" max="100" step="5" class="form-control"
						   type="number"/></td>
				<td><input class="btn-sm btn-info" type="submit"/></td>
			</tr>
		</form>

		<script>
			$(document).ready(function () {
				$('#individual_performance').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url();?>performance/add_individual_performance',
						data: $('#individual_performance').serialize(), // serialize the form data
						success: function (response) {
							location.reload();
							$('#response').html(response); // display the response on the page
						}
					});
				});
			});

		</script>
<?php }?>

		</tbody>
	</table>


</div>
<br/>
<div class="card">
	<div class="card-header">
		<h4>GENERIC MANAGEMENT COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h4>
	</div>
	<div class="card-body  ">
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
					DEV REQUIRED(YES/NO)
				</th>
				<?php if($user_submission != 1){ ?>
				<th></th>
				<?php }?>
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($gmc_work_plan as $gmcWork) {
				?>
								<tr>
									<td><input class="form-control" disabled  value="<?php echo $gmcWork['core_management'] ?>" /></td>
									<td><input class="form-control" disabled   value="<?php echo $gmcWork['process_competencies'] ?>" /></td>
									<td><input class="form-control" disabled  value="<?php echo $gmcWork['dev_required'] ?>" /></td>
									<?php if($user_submission != 1){ ?>
									<td>
										<a class="btn-sm btn-danger" href="<?php echo base_url() ?>performance/remove_generic_management_competencies_personal_development_plan/500/<?php echo $gmcWork['id'] ?>">Remove</a>
									</td>
									<?php } ?>
									
								</tr>
			<?php }?>
			<?php if($user_submission != 1){ ?>
							<form method="post" action="<?php echo base_url() ?>performance/add_generic_management_competencies_personal_development_plan">
								<input name="template_name"   value="PERFORMANCE INSTRUMENT" type="hidden" />
								<tr>
									<td><input class="form-control" name="core_management" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="dev_required" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				

			<?php }
			?>


			</tbody>

		</table>
	</div>
</div>
<br/>
<div class="card">
	<h3 class="m-2">
		WORK PLAN
	</h3>
	<?php foreach ($bp as $_kra) {
		?>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
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
						<th>
						</th>
						<?php  } ?>
					</tr>
					</thead>
					<tbody>

					<!-- To Retrieve Database information -->
					<?php

					$row_counter = 0;
					$row_span = 3;

					foreach ($work_plan as $wp)
					{
						if($_kra['id'] == $wp['kra_id'])
						{
							$row_span++;
						}
					}
					$total_weight_outcome = 0;
					foreach ($work_plan as $work) {
						if ($_kra['id'] == $work['kra_id']) {
							$total_weight_outcome = $work['weight'] + $total_weight_outcome;
							?>

							<tr>
								<?php if($row_counter == 0) {?>
									<td rowspan="<?php echo $row_span;?>"><?php echo $_kra['key_results_area']; ?></td>
								<?php } ?>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['key_activities'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['weight'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['target_date'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['indicator_target'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['resource_required'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['enabling_condition'] ?>"/></td>
							<?php if($user_submission != 1){ ?>
								<td>
									<button class="btn-sm btn-danger btn-remove-wp<?php echo $work['id'] ?>" >X</button>
									<button style="margin: 3px" data-toggle="modal" data-target="#dlg-update-work-plan<?php echo $work['id'] ?>" class="btn-sm btn-info" >
										Edit</button>
								</td>

							</tr>




							<div class="modal fade" id="dlg-update-work-plan<?php echo $work['id']; ?>" tabindex="-1" role="dialog"
								 aria-labelledby="exampleModalLabel"
								 aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">EDIT WORK PLAN</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<!--	TARGET DATE			-->
										<form id="work_plan_form_<?php echo $work['id'] ?>" >
											<div class="modal-body">
												<h2>KEY RESULT AREAS: <?php echo $_kra['key_results_area'] ?></h2>
												<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>

												<div class="form-group">
													<label class="control-label">KEY ACTIVITIES</label>
													<input class="form-control" name="key_activities" type="text" value="<?php echo $work['key_activities']?>" required/>
												</div>
												<div class="form-group">
													<label class="control-label">WEIGHT</label>

													<select name="weight" class="form-control select">
														<?php for ($i = 10; $i <= 100; $i = $i + 10) { ?>
															<option <?php if($work['weight'] == $i) echo 'selected'?> value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
														<?php } ?>
													</select>


												</div>

												<div class="form-group">
													<label class="control-label">TARGET DATE</label>
													<input class="form-control" name="target_date" value="<?php echo $work['target_date']?>" required type="date"/>
												</div>
												<div class="form-group">
													<label class="control-label">INDICATOR/TARGET</label>
													<input class="form-control" name="indicator_target" value="<?php echo $work['indicator_target']?>" required type="text"/>
												</div>
												<div class="form-group">
													<label class="control-label">RESOURCE REQUIRED</label>
													<input class="form-control" name="resource_required" value="<?php echo $work['resource_required']?>" required type="text"/>
												</div>

												<div class="form-group">
													<label class="control-label">ENABLING CONDITION</label>
													<input class="form-control" name="enabling_condition" value="<?php echo $work['enabling_condition']?>" required type="text"/>
												</div>

												<div class="modal-footer">
													<input type="submit" value="UPDATE" class="btn btn-primary"/>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<script>
								$(document).ready(function () {
									$('#work_plan_form_<?php echo $work['id']?>').submit(function (e) {
										e.preventDefault();

										// prevent the form from submitting normally
										$.ajax({
											type: 'POST',
											url: '<?php echo base_url() ?>performance/update_work_plans/<?php echo $work['id'] ?>',
											data: $('#work_plan_form_<?php echo $work['id']?>').serialize(), // serialize the form data
											success: function (response) {
												location.reload();
												$('#response').html(response); // display the response on the page
											},
											error: function(xhr, status, error) {
												// Handle error
												console.error("AJAX Error: " + xhr.responseText);
												alert("An error occurred while processing your request. Please try again later.");
											} // <- This parenthesis was missing
										});
									});
								});


							</script>





							<script>
									$('.btn-remove-wp<?php echo $work['id'] ?>').on('click', function () {
										//var rowId = $(this).data('id');
										$.ajax({
											url: '<?php echo base_url() ?>performance/remove_work_plan/<?php echo $work['id']; ?>',
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
							<?php }?>


						<?php
							$row_counter++;
						}
					} ?>

					<?php
					if (!empty($total_weight_outcome)) {
						if ($total_weight_outcome > 0) {
							?>
							<tr>
								<td><strong>TOTAL WEIGHT FOR THE KRA </strong></td>
								<td><strong><?php echo $total_weight_outcome ?></strong></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							<?php if($user_submission != 1){ ?>
								<td></td>
								<?php } ?>
							</tr>
						<?php }
					}
					?>

					<?php if($user_submission != 1){ ?>

						<form id="add_wp<?php echo $_kra['id'] ?>" method="post">
							<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT"/>
							<input type="hidden" name="kra_id" value="<?php echo $_kra['id']; ?>"/>
							<?php if ($user_submission != 1) { ?>
								<tr>
									<?php if ($row_counter == 0) { ?>
										<td><?php echo $_kra['key_results_area']; ?></td>
									<?php } ?>
									<td><input class="form-control" name="key_activities" type="text" required/></td>
									<td>
										<select name="weight" class="form-control select">
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
										success: function (response)
										{
											location.reload();
											$('#response').html(response); // display the response on the page
										}
									});
								});
							});

						</script>
					<?php } ?>
					</tbody>

				</table>
			</div>
		</div>
	<?php }

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
						TYPES OF INTERVENTIONS (MENTORING/COURSE/WORKSHOP/SEMINARS)
					</th>

					<th>
						TARGET DATE
					</th>
					<?php if($user_submission != 1){ ?>
					<th></th>
					<?php } ?>
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
							<button class="btn-sm btn-danger btn-remove-pdp<?php echo $work['id'] ?>">x</button>
							<button class="btn-sm btn-info text-white text-decoration-none" data-toggle="modal" data-target="#dlg-dev-plan<?php echo $work['id'] ?>"
							>Edit
							</button>
						</td>


							<div class="modal fade" id="dlg-dev-plan<?php echo $work['id']; ?>" tabindex="-1" role="dialog"
								 aria-labelledby="exampleModalLabel"
								 aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">EDIT PERSONAL DEVELOPMENTAL PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<!--KEY RESULTS AREA	BATHO PELE PRINCIPLES	WEIGHT OF OUTCOME (in %)-->
										<form id="dev_plan_form<?php echo $work['id'] ?>" >
											<div class="modal-body">
												<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
												<div class="form-group">
													<label class="control-label">DEVELOPMENTAL AREAS</label>
													<input class="form-control" name="developmental_areas" value="<?php echo $work['developmental_areas']?>" required type="text"/>
												</div>
												<div class="form-group">
													<label class="control-label">PROCESS COMPETENCIES</label>
													<input class="form-control" name="types_of_interventions" value="<?php echo $work['types_of_interventions']?>" required type="text"/>
												</div>
												<div class="form-group">
													<label class="control-label">TARGET DATE</label>
													<input class="form-control" name="target_date" value="<?php echo $work['target_date']?>" required type="date"/>
												</div>

												<div class="modal-footer">
													<input type="submit" value="UPDATE" class="btn btn-primary"/>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>



							<script>
								$(document).ready(function () {
									$('#dev_plan_form<?php echo $work['id']?>').submit(function (e) {
										e.preventDefault();

										// prevent the form from submitting normally
										$.ajax({
											type: 'POST',
											url: '<?php echo base_url() ?>performance/update_personal_developmental_plan/<?php echo $work['id'] ?>',
											data: $('#dev_plan_form<?php echo $work['id']?>').serialize(), // serialize the form data
											success: function (response) {
												location.reload();
												$('#response').html(response); // display the response on the page
											},
											error: function(xhr, status, error) {
												// Handle error
												console.error("AJAX Error: " + xhr.responseText);
												alert("An error occurred while processing your request. Please try again later.");
											} // <- This parenthesis was missing
										});
									});
								});


							</script>


						<script>
							$('.btn-remove-pdp<?php echo $work['id'] ?>').on('click', function () {
								//var rowId = $(this).data('id');
								$.ajax({
									url: '<?php echo base_url() ?>performance/remove_personal_developmental_plan/500/<?php echo $work['id']; ?>',
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

					</tr>
				<?php } ?>
				<?php if($user_submission != 1){ ?>
				<form id="add_pdp" method="post" action="<?php echo base_url() ?>performance/add_personal_developmental_plan">
					<input type="hidden" name="template_name" value="PERFORMANCE INSTRUMENT">
					<tr>
						<td><input class="form-control" name="developmental_areas" required type="text-area"/></td>
						<td><input class="form-control" name="types_of_interventions" type="text" required/></td>
						<td><input class="form-control" name="target_date" required type="date"/></td>
						<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
					</tr>

					<script>
						$(document).ready(function () {
							$('#add_pdp').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>performance/add_personal_developmental_plan',
									data: $('#add_pdp').serialize(), // serialize the form data
									success: function (response) {
										location.reload();
										$('#response').html(response); // display the response on the page
									}
								});
							});
						});

					</script>

				</form>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<br/>
<div class="card">
	<div style="text-align: center;">
		<h3>
			KEY GOVERNMENT FOCUS AREAS
		</h3>
	</div>
	<div>
		<?php if($user_submission != 1){ ?>
		<a class="btn-sm btn-info" data-toggle="modal" href="#" data-target="#add_kgfa">KEY GOVERNMENT FOCUS AREAS</a>
		<?php } ?>
	</div>
	<?php foreach ($kgfa as $_kgfa) {
		?>
		<h4> KEY GOVERNMENT FOCUS AREAS: <?php echo $_kgfa['name'] ?></h4>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead style="background-color: #fbd4b4">
					<tr>
						<th>
							KEY FOCUS AREA ACTIVITIES / OUTPUTS

						</th>
						<th>
							TARGET DATE
						</th>
						<th class="text-center">
							INDICATOR / TARGET
						</th>
						<th>
							BASELINE DATA
						</th>

						<th>
							RESOURCE REQUIRED
						</th>
						<th>
							ENABLING CONDITION
						</th>
						<?php if($user_submission != 1){ ?>
						<th>
							<a class="btn-sm btn-danger"
							   href="<?php echo base_url() ?>performance/delete_kgfa/500/<?php echo $_kgfa['id'] ?>">X</a>
						</th>
						<?php } ?>
					</tr>
					</thead>
					<tbody>
					<!-- To Retrieve Database information -->
					<?php

					foreach ($key_government_focus_areas as $work) {
						if ($_kgfa['id'] == $work['kgfa_id']) {
							//$total_weight_outcome = $work['weight']  + $total_weight_outcome;
							?>
							<tr>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['key_focus_area_activities_outputs'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['target_date'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['indicator_target'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['baseline_data'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['resource_required'] ?>"/></td>
								<td><input class="form-control" disabled type="text"
										   value="<?php echo $work['enabling_condition'] ?>"/></td>
								<?php if($user_submission != 1){ ?>
								<td>
									<button class="btn-sm btn-danger btn-remove-kgfr<?php echo $work['id'] ?>">x</button>
								</td>
								<?php } ?>
							</tr>


							<script>
								$('.btn-remove-kgfr<?php echo $work['id'] ?>').on('click', function () {
									//var rowId = $(this).data('id');
									$.ajax({
										url: '<?php echo base_url() ?>performance/remove_key_government_focus_areas/500/<?php echo $work['id']; ?>',
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





						<?php }
					} ?>
					<?php if($user_submission != 1){ ?>
					<form id="add_pkgfs<?php echo $_kgfa['id']?>" method="post">
						<input name="template_name" value="PERFORMANCE INSTRUMENT" type="hidden"/>
						<input name="kgfa_id" value="<?php echo $_kgfa['id'] ?>" type="hidden"/>
						<tr>
							<td><input class="form-control" type="text" name="key_focus_area_activities_outputs"/></td>
							<td><input class="form-control" type="date" name="target_date"/></td>
							<td><input class="form-control" type="text" name="indicator_target"/></td>
							<td><input class="form-control" type="text" name="baseline_data"/></td>
							<td><input class="form-control" type="text" name="resource_required"/></td>
							<td><input class="form-control" type="text" name="enabling_condition"/></td>

							<td>
								<input class="btn-sm btn-primary" type="submit" value="Add"/>
							</td>

						</tr>
					</form>

					<script>
						$(document).ready(function () {
							$('#add_pkgfs<?php echo $_kgfa['id']?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>performance/add_performance_key_government_focus_areas/500',
									data: $('#add_pkgfs<?php echo $_kgfa['id']?>').serialize(), // serialize the form data
									success: function (response) {
										location.reload();
										$('#response').html(response); // display the response on the page
									}
								});
							});
						});

					</script>
					<?php } ?>


					</tbody>

				</table>
			</div>
		</div>
	<?php }

	?>
</div>
<br/>

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

<?php if ($user_submission != 1){ ?>
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_hod">
	<br/>
	<div class="card">


		<div class="card-body">
			<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
			<input value="<?php echo $period ?>" type="hidden" name="period"/>
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<br>
<?php } ?>

<div class="modal fade" id="add_kra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">KEY RESULTS AREA</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url() ?>performance/add_kra_name/500">
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

<div class="modal fade" id="add_kgfa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">KEY GOVERNMENT FOCUS AREAS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="kgfa" method="post">
				<div class="modal-body">
					<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
					<div class="form-group">
						<label class="control-label">KEY GOVERNMENT FOCUS AREAS</label>
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
					$('#kgfa').submit(function (e) {
						e.preventDefault(); // prevent the form from submitting normally
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url();?>performance/add_kgfa_name/500',
							data: $('#kgfa').serialize(), // serialize the form data
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
