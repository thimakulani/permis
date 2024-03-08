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
<?php $period = $_SESSION['period'];
?>

<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">FORMAL PERFORMANCE AGREEMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period; ?> </h4>
	<h4 style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</h4>
	<!-- <p style="font-weight: bold">(To be completed by the jobholder, prior to the assessment process. If the space
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
	</ul> -->

</div>
<br/>


<?php
if($emp != null)
{ ?>

<div class="card">

	<div class="card-header">
		<h4>PART 1: POST SUMMARY</h4>
	</div>
	<div class="card-body">

		<p><strong>
			1. The information required in 1.1 and 1.2 should be provided as it is indicated within the approved job
			description of the post or other approved directives that have an impact on the post.</strong>
		</p>
		<p>The purpose of the post:</p>
		<p>The Key Responsibilities of the post:</p>

		<table class="table">
			<?php
			$count_key_rows = 1;
			foreach ($performance_plan as $kr) {
				?>
				<tr>
					<td>1.<?php echo $count_key_rows ?></td>
					<td><?php echo $kr['key_responsibility'] ?></td>
					<?php if($user_submission != 1) { ?>
						<td>
							<button class="btn-sm btn-danger text-decoration-none text-white delete-btn_<?php echo $kr['id'] ?>" data-id="<?php echo $kr['id']?>">Remove</button>
						</td>
					<?php } ?>
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
		<?php if($user_submission != 1) { ?>
			<form id="add_key_resp" action="<?php echo base_url() ?>performance/add_key_responsibility/6" method="post">
				<input type="hidden" value="PERFORMANCE INSTRUMENT" name="template_name">

				<div class="input-group input-group-sm">
					<input type="text" name="description" required class="form-control">
					<span class="input-group-append">
					<input type="submit" class="btn btn-info" value="Add"/>

				</div>
			</form>
		<?php } ?>
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

		<table class="table">
			<?php
			$count_duty_rows = 1;

			foreach ($duties as $kr) {
				?>
				<tr>
					<td>1.<?php echo $count_duty_rows ?></td>
					<td><?php echo $kr['description'] ?></td>
					<?php if($user_submission != 1) { ?>
					<td>
						<button
								class="btn-sm btn-danger text-decoration-none delete-btn_duty<?php echo $kr['id'] ?>" data-id="<?php echo $kr['id'] ?>">Remove</button></td>
					<?php } ?>
				</tr>


				<script>
					$('.delete-btn_duty<?php echo $kr['id'] ?>').on('click', function() {
						var rowId = $(this).data('id');
						$.ajax({
							url: '<?php echo base_url() ?>performance/remove_duties/6/<?php echo $kr['id'] ?>',
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


				<?php $count_duty_rows++;
			} ?>
		</table>

		<?php if($user_submission != 1) { ?>
		<form id="add_duty" action="<?php echo base_url() ?>performance/add_duties/6" method="post">
			<input type="hidden" value="PERFORMANCE INSTRUMENT" name="template_name">
			<div class="input-group input-group-sm">
				<input type="text" name="description" required class="form-control">
				<span class="input-group-append">
				<input type="submit" class="btn btn-info" value="Add"/>
				</span>
			</div>
		</form>
		<?php } ?>

		<script>
			$(document).ready(function () {
				$('#add_duty').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url() ?>performance/add_duties/6',
						data: $('#add_duty').serialize(), // serialize the form data
						success: function (response) {
							location.reload();
							$('#response').html(response); // display the response on the page
						}
					});
				});
			});

		</script>

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

					<?php if($user_submission != 1) { ?>
					<td>
						<button
						   class="btn-sm btn-danger text-decoration-none delete-btn_duty_reason<?php echo $kr['id'] ?>" id="delete-btn_duty_reason<?php echo $kr['id'] ?>" data-id="<?php echo $kr['id'] ?>">Remove</button>

					</td>
					<?php } ?>

					<script>
						$('.delete-btn_duty_reason<?php echo $kr['id'] ?>').on('click', function() {
							var rowId = $(this).data('id');
							$.ajax({
								url: '<?php echo base_url() ?>performance/remove_duty_reason/6/<?php echo $kr['id'] ?>',
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
				</tr>
				<?php $count_duty_reason_rows++;
			} ?>


		</table>
		<?php if($user_submission != 1) { ?>
		<form id="add_duty_reason" action="<?php echo base_url() ?>performance/add_duty_reason/6" method="post">
			<input id="rd" type="hidden" value="PERFORMANCE INSTRUMENT" name="template_name">
			<div class="input-group input-group-sm">
				<input type="text" name="description" required class="form-control">
				<span class="input-group-append">
				<input type="submit" class="btn btn-info" value="Add"/>
				</span>
			</div>
		</form>
		<?php }?>
		<script>
			$(document).ready(function () {
				$('#add_duty_reason').submit(function (e) {
					e.preventDefault(); // prevent the form from submitting normally
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url() ?>performance/add_duty_reason/6',
						data: $('#add_duty_reason').serialize(), // serialize the form data
						success: function (response) {
							location.reload();
							$('#response').html(response); // display the response on the page
						}
					});
				});
			});

		</script>


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

						<?php if($user_submission != 1) { ?>
						<td class="form-inline">
							<a class="btn-sm btn-info" data-toggle="modal" href="#"
							   data-target="#edit_performance<?php echo $m['id']; ?>">EDIT</a>
						</td>
						<?php } ?>
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

				<?php


				?>

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
		<h4>
			PART 3: PERSONAL DEVELOPMENT PLAN (PDP)
		</h4>
	</div>
	<div class="card-body table-responsive">
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
				<?php if ($user_submission != 1){ ?>
				<th></th>
<?php } ?>
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


					<?php if ($user_submission != 1){ ?>
					<td>


						<button class="btn-sm m-2 btn-danger delete-btn_pdt<?php echo $perf['id'] ?>" style="margin: 3px"
						   >Remove</button>
						<a class="btn-sm btn-info" data-toggle="modal" href="#"
						   data-target="#pdp<?php echo $perf['id']; ?>">EDIT</a>

					</td>
					<?php } ?>
				</tr>


				<script>
					$('.delete-btn_pdt<?php echo $perf['id'] ?>').on('click', function() {
						var rowId = $(this).data('id');
						$.ajax({
							url: '<?php echo base_url() ?>performance/remove_personal_developmental_training/6/<?php echo $perf['id'] ?>',
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
									location.reload();
									$('#response').html(response);
								}
							});
						});
					});

				</script>

				<!--END UPDATE-->


			<?php } ?>

			<?php if($user_submission != 1) { ?>
			<form id="add_personal_developmental_training" method="post" action="<?php echo base_url(); ?>performance/add_personal_developmental_training/6">
				<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
				<tr>
					<td><input class="form-control" name="development_required" required type="text"/></td>
					<td><input class="form-control" name="training_type" required type="text"/></td>
					<td><input class="form-control" checked name="reason" required value="IMPROVE PERFORMANCE"
							   type="radio"/></td>
					<td><input class="form-control" name="reason" required type="radio" value="JOBHOLDER COMPETENCY"/>
					</td>
					<td><input class="form-control" name="reason" required type="radio" value="CAREER DEVELOPMENT"/>
					</td>
					<td><input type="date" name="time_frame" class="form-control" required/></td>
					<td><input class="form-control" name="progress" type="text" required/></td>
					<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
				</tr>
			</form>
			<?php } ?>
			<script>
				$(document).ready(function () {
					$('#add_personal_developmental_training').submit(function (e) {
						e.preventDefault(); // prevent the form from submitting normally
						$.ajax({
							type: 'POST',
							url: '<?php echo base_url(); ?>performance/add_personal_developmental_training/6',
							data: $('#add_personal_developmental_training').serialize(), // serialize the form data
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
								   value="<?php echo strtoupper($emp->Name . ' ' . $emp->LastName); ?>"/>
						</div>
					</div>
				</td>


				<td>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" disabled value="<?php echo strtoupper($emp->S_Name . ' ' . $emp->S_Fname); ?>"/>
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


<?php if ($user_submission != 1){ ?>

	<form id="form_submit_mou" action="<?php echo base_url() ?>performance/submit_performance_mou/6" method="post">
		<br/>
		<div class="card">
			<div class="card-body">
				<input value="PERFORMANCE INSTRUMENT" type="hidden" name="template_name"/>
				<input value="<?php echo $counter ?>" type="hidden" name="weight_outcome"/>
				<input value="<?php echo $count_key_rows ?>" type="hidden" name="weight_outcome"/>
			</div>
			<div class="card-footer">
				<div style="text-align: right;">
					<!--<input type="submit" class="btn btn-info" value="SUBMIT MEMORANDUM OF UNDERSTANDING"/>-->
					<a class="btn btn-info text-decoration-none text-white" onclick="Submit_Form()">SUBMIT MEMORANDUM OF
						UNDERSTANDING</a>
				</div>
			</div>
		</div>
	</form>
<?php } ?>

		<?php if(isset($user_sub->status))
		{?>

			<?php if ($user_sub->status == 'REJECTED')
		{?>
			<div class="card">
				<div class="card-body">
					<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/sup_update_status_correction/<?php echo $submission_id; ?>">

						<input type="Correct" class="btn-sm btn-primary m-2" />
					</form>
				</div>
			</div>
		<?php } ?>

		<?php }

	?>


<script>
	$(document).ready(function () {
		$('#form_submit_mou').submit(function (e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url() ?>performance/submit_performance_mou/6',
				data: $('#form_submit_mou').serialize(),
				success: function (response) {
					location.reload();
					$('#response').html(response);
				}
			});
		});
	});
</script>

<script type="text/javascript">

	function Submit_Form() {
		let form = document.getElementById("form_submit_mou");
		let wo = <?php echo $counter?>;
		if (wo < 100) {
			alert("WEIGHT OF OUTCOME MUST NOT BE LESS THAN 100%");
			return;
		}
		form.submit();
	}

	var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
	$('#clear').click(function (e) {
		e.preventDefault();
		sig.signature('clear');
		$("#signature64").val('');
	});
</script>


<?php }
	else{
		?>

			<div class="alert alert-danger animated shake">
				<div style="text-align: center;">PLEASE CONTACT THE SYSTEM ADMINISTRATOR FOR ASSIST, REGARDS TO YOUR PROFILE</div>
			</div>

	<?php
	}
?>
