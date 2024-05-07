<style>

	ol {
		list-style-type: none;
		counter-reset: item;
		margin: 0;
		padding: 0;
	}

	ol > li {
		display: table;
		counter-increment: item;
		margin-bottom: 0.6em;
	}

	ol > li:before {
		content: counters(item, ".") ". ";
		display: table-cell;
		padding-right: 0.6em;
	}

	li ol > li {
		margin: 0;
	}

	li ol > li:before {
		content: counters(item, ".") " ";
	}

	.kbw-signature {
		width: 400px;
		height: 200px;
	}

	#sig canvas {
		width: 100% !important;
		height: auto;
	}
</style>
<?php //$period// = $_SESSION['period'];
?>

<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">FORMAL PERFORMANCE AGREEMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period; ?> </h4>
	<h4 style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</h4>
	<p style="font-weight: bold">(To be completed by the jobholder, prior to the assessment process. If the space
		provided is insufficient, the comments can be included as an attachment)</p>
	<ul>
		<li>During this performance assessment period, my major achievements / accomplishments as they relate to my
			Performance Agreement were:
		</li>
		<li>During this performance assessment period, I have achieved / accomplished the following, which was/were not
			part of my Performance Agreement:
		</li>
		<li>During this performance assessment period, I was less successful in the following areas, which formed part
			of my Performance Agreement, for the reasons stated
		</li>
	</ul>

</div>
<div class="alert alert-info">
		<dl class="row">
			<dt class="col-sm-2">
				EMPLOYEE`S NAME
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->Name . ' ' . $emp->LastName;
				} ?>
			</dd>

			<dt class="col-sm-2">
				PERSAL NUMBER
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->Persal;
				} ?>
			</dd>

			<dt class="col-sm-2">
				SUPERVISOR'S NAME
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->S_Name;
				} ?>
			</dd>

			<dt class="col-sm-2">
				BRANCH NAME
			</dt>
			<dd class="col-sm-10">
				<?php if (isset($emp)) {
					echo $emp->b_name;
				} ?>
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
				<?php if (isset($emp)) {
					echo $emp->JobTitle;
				} ?>
			</dd>
		</dl>
	</div>
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
<br />
<div class="card">
	<div class="card-header">
		<h4>PART 1: POST SUMMARY</h4>
	</div>
	<div class="card-body table-responsive">

		<p><strong>
			1. The information required in 1.1 and 1.2 should be provided as it is indicated within the approved job
			description of the post or other approved directives that have an impact on the post.</strong>
		</p>
		<p>The purpose of the post:</p>
		<p>The Key Responsibilities of the post:</p>
		<div style="text-align: right;">
			<button class="btn-sm btn-primary text-decoration-none" data-toggle="modal" data-target="#add_kra">ADD KEY RESPONSIBILITY</button>

		</div>
		<table class="table table-borderless">
			<?php
			$count_key_rows = 1;
			foreach ($performance_plan as $kr) {
				?>
				<tr>
						<td style="width: 50px;">1.<?php echo $count_key_rows ?></td>
						<td style="width: calc(100% - 100px);"><?php echo $kr['key_responsibility'] ?></td>
						<td style="text-align: right;"> <!-- Apply inline CSS for right alignment -->
							
						</td>
					</tr>


				<script>
					$('.delete-btn_<?php echo $kr['id'] ?>').on('click', function() {
						var rowId = $(this).data('id');
						$.ajax({
							url: '<?php echo base_url() ?>performance/remove_key_responsibility/6/<?php echo $kr['id'] ?>',
							type: 'DELETE',
							data: {id: rowId},
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
				<?php $count_key_rows++;
			} ?>




		</table>
		
		<div class="modal fade" id="add_kra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">KEY RESPONSIBILITY</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="add_key_resp" method="post">
						<div class="modal-body">
							<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
							<div class="form-group">
								<label class="control-label">KEY RESPONSIBILITY</label>
								<input class="form-control" name="description"/>
								<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
								<span class="text-danger"><?php echo form_error('description') ?></span>
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
				$('#add_key_resp').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url() ?>performance/add_key_responsibility/6',
						data: $('#add_key_resp').serialize(), // serialize the form data
						success: function (response) {
							location.reload();
							$('#response').html(response); // display the response on the page
						}
					});
				});
			});

		</script>


		<p>
			<strong>


			2. The information required in 2.1 and 2.2 does not form part of the approved job description of the post
			or other approved directives that
			have an impact on the post and is applicable on a temporary basis only.
			</strong>
		</p>
		<p>
			<strong>
			2.1 Additional duties that are expected of the job holder for this performance cycle that is
			not normally expected of the job holder or that is not part of the post:
				</strong>
		</p>

		<table class="table table-borderless">
			<?php
			$count_duty_rows = 1;

			foreach ($duties as $kr) {
				?>
				<tr>
					<td>1.<?php echo $count_duty_rows ?></td>
					<td><?php echo $kr['description'] ?></td>
				</tr>
				<?php $count_duty_rows++;
			} ?>
		</table>

		<p> <strong>
				2.2 The reasons for these duties being expected for this cycle i.e. vacancies, absenteeism,
				acting, etc.
			</strong>
		</p>

		<table class="table">
			<?php
			$count_duty_reason_rows = 1;

			foreach ($duty_reason as $kr) {
				?>
				<tr>
					<td>1.<?php echo $count_duty_reason_rows ?></td>
					<td><?php echo $kr['description'] ?></td>
				</tr>
				<?php $count_duty_reason_rows++;
			} ?>


		</table>

	</div>
	<div class="card-footer">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">NAME OF JOBHOLDER</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" disabled
					   value="<?php echo strtoupper($emp->Name . ' ' . $emp->LastName); ?>"/>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">NAME OF SUPERVISOR</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" disabled value="<?php echo strtoupper($emp->S_Name . ' ' . $emp->S_Fname); ?>"/>
			</div>
		</div>
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
	</div>


</div>

<br/>


<div class="card">
	<div class="card-header">
		<h4>SECTION A: KEY RESULTS AREA (100%)</h4>
	</div>
	<div id="page-report-body" class="table-responsive">
		<table class="table table-hover table-borderless table-striped">
			<table class="table table-striped projects">
				<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th colspan="3">
						EXPECTED OUTPUT
						(specific criteria that must be achieved against the jobholder’s performance
						will be assessed = minimum 5 expected outputs per performance outcome)

					</th>
					<th></th>

				</tr>
				<tr>
					<th>
						KEY
						RESPONSIBILITY

					</th>
					<th>
						GAFS
						(Generic
						Assessment
						Factors)
					</th>

					<th>
						PERFORMANCE OUTCOME

					</th>
					<th>
						WEIGHT OF OUTCOME (in %)
					</th>

					<th>PERFORMANCE MEASUREMENT
						(Specific activities and tasks that stipulate quality and legal requirements)
					</th>
					<th>TIMEFRAMES</th>
					<th>RESOURCES</th>
					<th></th>

				</tr>
				</thead>
				<tbody>
				<?php
				$counter = 0;
				$track_button = 0;
				foreach ($performance_plan as $m) {

					$counter = $counter + $m['outcome_weight'];
					?>
					<?php if (!empty($m['gafs']) || !empty($m['performance_outcome'])
						|| !empty($m['outcome_weight']) || !empty($m['performance_measurement'])
						|| !empty($m['time_frames']) || !empty($m['resources'])) { ?>
					<tr>
						<td class="td-Name">
                                                        <span>
                                                            <?php echo $m['key_responsibility']; ?>
                                                        </span>

							<?php //echo $m['key_responsibility'] ?>
						</td>
						<td><?php echo $m['gafs'] ?></td>

						<td><?php echo $m['performance_outcome'] ?></td>
						<td>
							<input class="form-control" disabled value="<?php echo $m['outcome_weight'] ?>" required
								   type="text"/>
						</td>


						<td><?php echo $m['performance_measurement'] ?></td>

						<td><?php echo $m['time_frames'] ?></td>
						<td>
							<?php echo $m['resources'] ?>
						</td>


						<td class="form-inline">
							<a class="btn-sm btn-info" data-toggle="modal" href="#"
							   data-target="#edit_performance<?php echo $m['id']; ?>">EDIT</a>
							   <a class="btn-sm btn-danger" data-toggle="modal" href="#"
							   data-target="#remove_performance_plan<?php echo $m['id']; ?>">X</a>
						</td>

					</tr>
				<?php }
				else{

				?>
					<form id="update_performance<?php echo $m['id'] ?>" method="post"
						  action="<?php echo base_url() ?>performance/update_performance_plan/6/<?php echo $m['id'] ?>">
						<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
						<tr>
							<td><?php echo $m['key_responsibility']; ?></td>
							<td><input class="form-control" name="gafs" type="text" required/></td>
							<td><input class="form-control" name="performance_outcome" required type="text"/>

							<td>
								<select name="outcome_weight" class="form-control select">
									<?php for ($i = 10; $i <= 100; $i = $i + 10) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
									<?php } ?>
								</select>
							</td>
							<td><input class="form-control" name="performance_measurement" required type="text"/>
							</td>
							<td><input class="form-control" name="time_frames" required type="text"/></td>
							<td>
								<input type="text" name="resources" class="form-control" required/>
							</td>
							<?php if ($track_button == 0) { ?>
								<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
							<?php } ?>
						</tr>
					</form>

					<script>
						$(document).ready(function () {
							$('#update_performance<?php echo $m['id']?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url() ?>performance/update_performance_plan/6/<?php echo $m['id'] ?>',
									data: $('#update_performance<?php echo $m['id']?>').serialize(), // serialize the form data
									success: function (response) {
										location.reload();
										$('#response').html(response); // display the response on the page
									}
								});
							});
						});

					</script>

				<?php
				$track_button++;
				} ?>
					<!--
						Edit dialogue
					-->
					
					
					<div class="modal fade" id="remove_performance_plan<?php echo $m['id']; ?>" tabindex="-1" role="dialog"
						 aria-labelledby="exampleModalLabel"
						 aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-danger">ARE YOU SURE YOU WANT TO DELETE PERFORMANCE PLAN?</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

									<div class="modal-body">
										<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
										<div class="form-group">
											<label class="control-label">KEY RESPONSIBILITY</label>
											<input disabled class="form-control" value="<?php echo $m['key_responsibility'] ?>"
												   name="key_responsibility"/>
											<span class="text-danger"><?php echo form_error('key_responsibility') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">GAFS (Generic Assessment Factors)</label>
											<input disabled class="form-control" value="<?php echo $m['gafs'] ?>" name="gafs"/>
											<span class="text-danger"><?php echo form_error('gafs') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">PERFORMANCE OUTCOME</label>
											<input disabled class="form-control" value="<?php echo $m['performance_outcome'] ?>"
												   name="performance_outcome"/>
											<span class="text-danger"><?php echo form_error('performance_outcome') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">WEIGHT OF OUTCOME (in %)</label>
											<input disabled class="form-control" value="<?php echo $m['outcome_weight'] ?>"
												   name="outcome_weight"/>
											<span class="text-danger"><?php echo form_error('outcome_weight') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">PERFORMANCE MEASUREMENT</label>
											<input disabled class="form-control"
												   value="<?php echo $m['performance_measurement'] ?>"
												   name="performance_measurement"/>
											<span class="text-danger"><?php echo form_error('performance_measurement') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">TIMEFRAMES</label>
											<input disabled class="form-control" value="<?php echo $m['time_frames'] ?>"
												   name="time_frames" type="text"/>
											<span class="text-danger"><?php echo form_error('time_frames') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">RESOURCES</label>
											<input disabled class="form-control" value="<?php echo $m['resources'] ?>"
												   name="resources"/>
											<span class="text-danger"><?php echo form_error('resources') ?></span>
										</div>

										<div class="modal-footer">
											<button class="btn-sm btn-danger text-decoration-none text-white delete-btn_<?php echo $m['id'] ?>">Remove</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE
											</button>
										</div>
									</div>

							</div>
						</div>
					</div>

					<script>
						$('.delete-btn_<?php echo $m['id'] ?>').on('click', function() {

							$.ajax({
								url: '<?php echo base_url() ?>performance/remove_performance_plan/6/<?php echo $m['id'] ?>',
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
					
					
					
					
					

				

					<div class="modal fade" id="edit_performance<?php echo $m['id']; ?>" tabindex="-1" role="dialog"
						 aria-labelledby="exampleModalLabel"
						 aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">EDIT PERFORMANCE PLAN</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form id="update_pp_<?php echo $m['id'] ?>" method="post"
									  action="<?php echo base_url() ?>performance/update_performance_plan/6/<?php echo $m['id'] ?>">
									<div class="modal-body">
										<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
										<div class="form-group">
											<label class="control-label">KEY RESPONSIBILITY</label>
											<input class="form-control" value="<?php echo $m['key_responsibility'] ?>"
												   name="key_responsibility"/>
											<span class="text-danger"><?php echo form_error('key_responsibility') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">GAFS (Generic Assessment Factors)</label>
											<input class="form-control" value="<?php echo $m['gafs'] ?>" name="gafs"/>
											<span class="text-danger"><?php echo form_error('gafs') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">PERFORMANCE OUTCOME</label>
											<input class="form-control" value="<?php echo $m['performance_outcome'] ?>"
												   name="performance_outcome"/>
											<span class="text-danger"><?php echo form_error('performance_outcome') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">WEIGHT OF OUTCOME (in %)</label>
											<input class="form-control" value="<?php echo $m['outcome_weight'] ?>"
												   name="outcome_weight"/>
											<span class="text-danger"><?php echo form_error('outcome_weight') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">PERFORMANCE MEASUREMENT</label>
											<input class="form-control"
												   value="<?php echo $m['performance_measurement'] ?>"
												   name="performance_measurement"/>
											<span class="text-danger"><?php echo form_error('performance_measurement') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">TIMEFRAMES</label>
											<input class="form-control" value="<?php echo $m['time_frames'] ?>"
												   name="time_frames" type="text"/>
											<span class="text-danger"><?php echo form_error('time_frames') ?></span>
										</div>
										<div class="form-group">
											<label class="control-label">RESOURCES</label>
											<input class="form-control" value="<?php echo $m['resources'] ?>"
												   name="resources"/>
											<span class="text-danger"><?php echo form_error('resources') ?></span>
										</div>

										<div class="modal-footer">
											<input type="submit" value="SAVE" class="btn btn-primary"/>
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
							$('#update_pp_<?php echo $m['id'] ?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url() ?>performance/update_performance_plan/6/<?php echo $m['id'] ?>',
									data: $('#update_pp_<?php echo $m['id'] ?>').serialize(), // serialize the form data
									success: function (response) {
										location.reload();
										$('#response').html(response); // display the response on the page
									}
								});
							});
						});

					</script>

				<?php }
				if ($counter > 0) {
					?>
					<tr>
						<td><strong>SUB-TOTAL</strong></td>
						<td></td>
						<td></td>
						<td><?php echo $counter ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>


				<?php }
				?>


				</tbody>


			</table>


	</div>

<div class="card-footer">
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
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: 'Initials have been added',
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
</div>

</div>

<br/>
<div class="card">
	<div class="card-header">
		<h4>
			PART 3: PERSONAL DEVELOPMENT PLAN (PDP)
		</h4>
	</div>
	<div class="card-body table-responsive">
		<div style="text-align: right;">
			<button class="btn-sm btn-primary text-decoration-none" data-toggle="modal" data-target="#add_pdp"  >ADD PERSONAL DEVELOPMENT PLAN</button>
		</div>
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th></th>
				<th></th>
				<th colspan="3">REASON
					(Please mark applicable reason
					with an x)
				</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<th>
					DEVELOPMENT REQUIRE
				</th>
				<th>
					TYPE OF
					TRAINING
					(Name the type
					of training)
				</th>

				<th>
					IMPROVES PERFORMANCE

				</th>
				<th>
					JOBHOLDER COMPETENCY
				</th>
				<th>
					CAREER DEVELOPMENT
				</th>


				<th>
					TIMEFRAME
				</th>
				<th>
					PROGRESS
					(by supervisor in consultation with
					the HRD)
					Indicate whether development needs
					were met. If NOT, provide reasons
					and proposed remedial action
				</th>
				<th></th>
			</tr>
			</thead>
			<tbody>


			<?php
			foreach ($personal_developmental_training as $perf) { ?>
				<tr>
					<td>
						<?php echo $perf['development_required'] ?>
					</td>
					<td>
						<?php echo $perf['training_type'] ?>
					</td>
					<td><input class="form-control" disabled
							   type="radio" <?php if ($perf['reason'] == 'IMPROVE PERFORMANCE') {
							echo 'checked';
						} ?> /></td>
					<td><input class="form-control" disabled
							   type="radio" <?php if ($perf['reason'] == 'JOBHOLDER COMPETENCY') {
							echo 'checked';
						} ?> /></td>
					<td>
						<input class="form-control" disabled
							   type="radio" <?php if ($perf['reason'] == 'CAREER DEVELOPMENT') {
							echo 'checked';
						} ?> /></td>
					<td>
						<?php echo $perf['time_frame'] ?>
					</td>
					<td><?php echo $perf['progress'] ?></td>


					<td>



						<a class="btn-sm btn-info" data-toggle="modal" href="#"
						   data-target="#pdp<?php echo $perf['id']; ?>">EDIT</a>
						   <button class="btn-sm m-2 btn-danger delete-btn_pdp<?php echo $perf['id'] ?>" style="margin: 3px"
						>X</button>

					</td>
				</tr>


				<script>
					$('.delete-btn_pdp<?php echo $perf['id'] ?>').on('click', function() {
						var rowId = $(this).data('id');
						$.ajax({
							url: '<?php echo base_url() ?>performance/remove_personal_developmental_training/6/<?php echo $perf['id'] ?>',
							type: 'DELETE',
							data: {id: rowId},
							success: function(response) {
								Swal.fire({
									icon: 'success',
									title: 'Success',
									text: 'Successfully Updated',
									onClose: () => {
										location.reload();
									}
								});
							},
							error: function(xhr, status, error) {
								Swal.fire({
									icon: 'error',
									title: 'Error',
									text: error,
									onClose: () => {
										location.reload();
									}
								});
							}
						});
					});
				</script>




				<!--UPDATE-->


				<div class="modal fade" id="pdp<?php echo $perf['id']; ?>" tabindex="-1" role="dialog"
					 aria-labelledby="exampleModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">EDIT PERSONAL DEVELOPMENT PLAN</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="update_pdp<?php echo $perf['id'] ?>" method="post"
								  action="<?php echo base_url() ?>performance/edit_pdp/6/<?php echo $perf['id'] ?>">
								<div class="modal-body">

									<div class="form-group">
										<label class="control-label">DEVELOPMENT REQUIRED</label>
										<input class="form-control" value="<?php echo $perf['development_required'] ?>"
											   name="development_required"/>
										<span class="text-danger"><?php echo form_error('development_required') ?></span>
									</div>
									<div class="form-group">
										<label class="control-label">TYPE OF TRAINING</label>
										<input class="form-control" value="<?php echo $perf['training_type'] ?>"
											   name="training_type"/>
										<span class="text-danger"><?php echo form_error('training_type') ?></span>
									</div>
									<div class="form-group">
										<label class="control-label">REASON</label>
										<select name="reason">
											<option <?php if ($perf['reason'] == 'IMPROVE PERFORMANCE') echo 'selected' ?> value="IMPROVE PERFORMANCE" >
												IMPROVE PERFORMANCE
											</option>
											<option <?php if ($perf['reason'] == 'JOBHOLDER COMPETENCY') echo 'selected' ?> value="JOBHOLDER COMPETENCY">
												JOBHOLDER COMPETENCY
											</option>
											<option <?php if ($perf['reason'] == 'CAREER DEVELOPMENT') echo 'selected' ?> value="JOBHOLDER COMPETENCY">
												CAREER DEVELOPMENT
											</option>
										</select>
									</div>

									<div class="form-group">
										<label class="control-label">TIME FRAME</label>
										<input class="form-control" value="<?php echo $perf['time_frame'] ?>"
											   name="time_frame"/>
										<span class="text-danger"><?php echo form_error('time_frame') ?></span>
									</div>

									<div class="form-group">
										<label class="control-label">PROGRESS</label>
										<input class="form-control" value="<?php echo $perf['progress'] ?>"
											   name="progress" type="text"/>
										<span class="text-danger"><?php echo form_error('progress') ?></span>
									</div>


									<div class="modal-footer">
										<input type="submit" value="SAVE" class="btn btn-primary"/>
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
						$('#update_pdp<?php echo $perf['id'] ?>').submit(function (e) {
							e.preventDefault();
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url() ?>performance/edit_pdp/6/<?php echo $perf['id'] ?>',
								data: $('#update_pdp<?php echo $perf['id'] ?>').serialize(),
								success: function (response) {
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

				<!--END UPDATE-->


			<?php } ?>



			</tbody>

		</table>
				<div class="modal fade" id="add_pdp" tabindex="-1" role="dialog"
			 aria-labelledby="exampleModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-success">ADD PERSONAL DEVELOPMENT PLAN</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form id="add_personal_developmental_training" class="modal-body" method="post">

						<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
						<div class="form-group">
							<label class="control-label">DEVELOPMENT REQUIRED</label>
							<input class="form-control"
								   name="development_required"/>
						</div>
						<div class="form-group">
							<label class="control-label">TYPE OF TRAINING</label>
							<input class="form-control"
								   name="training_type"/>
						</div>
						<div class="form-group">
							<label class="control-label">REASON</label>
							<select name="reason" class="form-control">
								<option value="IMPROVE PERFORMANCE">IMPROVE PERFORMANCE</option>
								<option value="JOBHOLDER COMPETENCY">JOBHOLDER COMPETENCY</option>
								<option value="CAREER DEVELOPMENT">CAREER DEVELOPMENT</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">TIME FRAME</label>
							<input class="form-control" type="date"
								   name="time_frame"/>
						</div>
						<div class="form-group">
							<label class="control-label">PROGRESS</label>
							<input class="form-control"
								   name="progress"/>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn-sm btn-danger text-decoration-none text-white">SAVE</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>

		<script>
			$(document).ready(function () {
				$('#add_personal_developmental_training').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally

					$.ajax({
						type: 'POST',
						url: '<?php echo base_url(); ?>performance/add_personal_developmental_training/6',
						data: $('#add_personal_developmental_training').serialize(), // serialize the form data
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
	</div>
	<div class="card-footer">
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
								Swal.fire({
									icon: 'success',
									title: 'Success',
									text: 'Initials added',
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
	</div>

</div>
<br />
<div class="card">
	<div class="card-body">
		<table class="table table-striped table-bordered">
			<tr>
				<td>
					I accept the content of the Performance
					agreement as set out in Part 1, 2 and 3.
					I agree to achieve the expected outcomes
					as concluded herein
				</td>
				<td>
					accept my responsibility to support
					____________________ ( name of
					Jobholder) to achieve the expected
					outcomes as set out in Parts 1, 2 and 3
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" disabled
								   value="<?php echo $emp->Name . ' ' . $emp->LastName; ?>"/>
						</div>
					</div>
				</td>


				<td>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" disabled value="<?php echo $emp->S_Name; ?>"/>
						</div>
					</div>

				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">DATE</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" disabled value="<?php echo date('Y-m-d'); ?>"/>
						</div>
					</div>
				</td>


				<td>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">DATE</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" disabled value="<?php echo date('Y-m-d'); ?>"/>
						</div>
					</div>

				</td>
			</tr>
		</table>
	</div>
	<div class="card-footer">
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
	</div>
</div>

<br/>

<div class="card">
	<div class="card-header">
		<h4>DISPUTE RESOLUTION</h4>
	</div>
	<div class="card-body">
		<p>
			5.1 Any disputes about the nature of the Agreement, whether it relates to key responsibilities, priorities,
			and methods of assessment
			and/or salary increment in this agreement, shall be mediated by an independent person (but not a legal
			representative) as agreed
			upon between the parties.

		</p>
		<p>5.2 A person identified to resolve the disputes will preferably be chosen based on his/her functional
			expertise and the inherent skills
			required.

		</p>
		<p>
			5.3 If this mediation fails, the dispute-resolution procedures will apply.
		</p>
	</div>
	<div class="card-footer">
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
	</div>

</div>
<?php if($submission->status == 'REJECTED' || $submission->status_final == 'REJECTED') { ?>
	<form id="form_submit_mou" action="<?php echo base_url() ?>performance/resubmit_changes/<?php  echo $submission->id ?>" method="post">
		<br/>
		<div class="card">
			<div class="card-footer">
				<div style="text-align: right;">
					<input type="hidden" name="status" value="<?php echo $submission->status ?>"/>
					<input type="hidden" name="status_final" value="<?php echo $submission->status_final ?>"/>

					<a class="btn btn-info text-decoration-none text-white" onclick="Submit_Form()">SAVE CHANGES</a>
				</div>
			</div>
		</div>
	</form>

<?php } ?>


<script type="text/javascript">

	function Submit_Form() {
		let form = document.getElementById("form_submit_mou");
		let wo = <?php echo $counter?>;
		if (wo < 100) {
			//alert("");
			Swal.fire({
				icon: 'warning',
				title: 'Warning',
				text: 'WEIGHT OF OUTCOME MUST NOT BE LESS THAN 100%',
				onClose: () => {
					//location.reload();
					return;
				}
			});

		}
		else	{
			form.submit();
		}

	}

	var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
	$('#clear').click(function (e) {
		e.preventDefault();
		sig.signature('clear');
		$("#signature64").val('');
	});
</script>



