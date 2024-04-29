<?php $period = $submission_row->period;

?>
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions">BACK</a>
</div>

<div>

	<h1 style="font-weight: bold" align="center">FORMAL ANNUAL ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period; ?></h4>
	<h4 style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</h4>
	<p style="font-weight: bold">(To be completed by the jobholder, prior to the assessment process. If the space
		provided is insufficient, the comments can be included as an attachment)</p>


	<div class="alert alert-info">
		<dl class="row">
			<dt class="col-sm-2">
				SMS MEMBER'S NAME
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



<div class="card">
	<div class="card-header">
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead>
				<tr>
					<th>
						KEY RESULTS

					</th>
					<th>
						GAFS
						(Generic
						Assessment
						Factors)
					</th>

					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						JOBHOLDERS RATING 1 - 4
					</th>
					<th>
						SUPERVISORS RATING 1 - 4
					</th>
					<th>
						AGREED RATE
					</th>
					<th>
						PAR SCORE
					</th>
					<th>
						PERFORMANCE REPORT
					</th>
					<?php if($submission_row->status == 'PENDING'){ ?>
						<th></th>
						<th></th>
					<?php } ?>
				</tr>
				</thead>
				<tbody>

				<?php

				//print_r($submission_row);
				$counter = 0;
				$kraScore = 0;
				$track_update = 0;
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];
					$kraScore += $m['par_score'];
					?>
						<tr>
							<td><?php echo $m['key_responsibility'] ?></td>
							<td><?php echo $m['gafs'] ?></td>

							<td>
								<?php echo $m['outcome_weight'] ?>
							</td>

							<td>
								<?php echo $m['job_holder_rating_ann']?>
							</td>

							<td>
								<?php echo $m['supervisor_rating_ann'] ?>
							</td>
							<td>
								<?php echo $m['decision_of_supervisor_ann'] ?>
							</td>
							<td><?php echo $m['par_score_ann'] ?></td>
							<td> <?php if(isset($m['performance_report_ann'])) echo $m['performance_report_ann'] ?></td>
						</tr>

					<script>
						$(document).ready(function () {
							$('#update_pp<?php echo $m['id']; ?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url() ?>performance/update_sup_performance_ann/<?php echo $m['id']; ?>/<?php echo $data->id; ?>/<?php echo $data->emp_id; ?>',
									data: $('#update_pp<?php echo $m['id']?>').serialize(), // serialize the form data
									success: function (response)
									{
										Swal.fire({
											icon: 'success',
											title: 'Success!',
											text: 'Successfully updated',
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
					$track_update++;
				} ?>



				</tbody>

			</table>
			<?php echo '<h5 style="margin: 5px"> Sub-Total: ' . $counter . '</h5>' ?>


		</div>
	</div>


</div>

<br/>
<!--<h1>MID YEAR PERFORMANCE OUTCOME</h1>
<form class="table-responsive" method="post" action="<?php /*base_url() */?>performance/add_factor/7">
	<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
	<table class="table table-bordered projects">
		<thead>
		<tr>
			<th>
				FACTOR

			</th>
			<th>
				(A) SUB-TOTAL
			</th>

			<th class="text-center">
				(B) % OF ASSESSMENT
			</th>
			<th>
				(A x B) TOTAL SCORE
			</th>
			<th></th>
		</tr>

		</thead>
		<tbody>
		<tr>
			<td>
				SECTION A: KEY RESULTS AREAS ACHIEVED
			</td>
			<td><input disabled type="number" id="val_a" name="sub_total_a" value="<?php /*echo $counter */?>" required class="form-control"/></td>
			<td><input type="number" id="val_b" name="of_assessment" value="<?php /*if (isset($factor->of_assessment)) {
					echo $factor->of_assessment;
				} */?>" required class="form-control"/></td>
			<td><input type="number" id="val_total"
					   value="<?php /*if (isset($factor->of_assessment) && isset($factor->sub_total_a)) {
						   echo $factor->of_assessment * $factor->sub_total_a;
					   } */?>" disabled class="form-control"/></td>

		</tr>

		<tr>
			<td colspan="3">
				SCORE IN PERCENTAGE (C / 3 x 100%) <strong>DO NOT ROUND OFF<strong>
			</td>

			<td><input type="number" disabled id="total_c" value="<?php /*echo ($kraScore / 3) * 100*/?>" class="form-control"/></td>
		</tr>

		<tr>
			<td colspan="3">
				(C) SCORE
			</td>
			<td><input disabled type="number" id="val_c" name="c_score" value="<?php /*echo $kraScore */?>" required class="form-control"/></td>
			<th><input class="btn-sm btn-info" type="submit" value="SAVE"/></th>
		</tr>

		</tbody>
	</table>

</form>-->


<?php if($submission_row->status_final == 'PENDING'){ ?>

	<div class="card">
		<div class="card-body">
			<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/permis_update_status/<?php echo $submission_id ?>">
				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<input type="submit" class="btn-sm btn-primary m-2" />
				<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
			</form>
		</div>
	</div>
<?php } ?>


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

<script>
	$(document).ready(function(){
		$('#submitBtn').click(function(e){
			e.preventDefault(); // Prevent default form submission

			// Serialize form data
			var formData = $('#statusForm').serialize();

			// Send AJAX request
			$.ajax({
				url: $('#statusForm').attr('action'),
				type: 'post',
				data: formData,
				success: function(response){
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: 'Successfully approved',
						onClose: () => {
							location.reload();
						}
					});
				},
				error: function(xhr, status, error){
					// Handle errors
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Something went wrong',

					});
					// You can display an error message or perform other actions here
				}
			});
		});
	});
</script>

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



	function CalTotC() {
		let val_c = document.getElementById('val_c').value;
		if (val_c.length >= 1) {
			document.getElementById('total_c').value = val_c / 3 * 100;
		} else {
			alert('(C) SCORE IS REQUIRED');
		}
	}


	function CalTot() {
		let val_a = document.getElementById('val_a').value;
		let val_b = document.getElementById('val_b').value;

		if (val_a.length >= 1 && val_b.length >= 1) {
			let tot = val_a * val_b;
			document.getElementById('val_total').value = tot;
		} else {
			alert('PLEASE PROVIDE THE VALUE OF (A) SUB-TOTAL OR (B) % OF ASSESSMENT');
		}

	}

	document.addEventListener('click', function (event) {
		if (event.target.classList.contains('process')){
			let row = event.target.closest('tr');
			let weight = row.querySelector('.weight').value;
			let rate = row.querySelector('.rate').value;
			let parInput = row.querySelector('.par');

			if (weight.length > 0 && rate.length >0)
			{
				let product = weight* rate/100;
				parInput.value = product;
			}
			else{
				alert('Provide all required values')
			}
		}
	})

</script>








<!--<div>
	<a class="btn-sm btn-info" href="<?php /*echo base_url() */?>performance/submitted_performance" >BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">FORMAL ANNUAL ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php /*echo $submission_row->period*/?></h4>
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
<div class="card">
	<div class="card-header">


	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead>
				<tr>
					<th>
						KEY RESULTS
					</th>
					<th>
						GAFS
						(Generic
						Assessment
						Factors)
					</th>

					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						JOBHOLDERS RATING 1 - 4
					</th>
					<th>
						SUPERVISORS RATING 1 - 4
					</th>
					<th>
						DECISION OF SUPERVISOR
					</th>
					<th>
						PAR SCORE
					</th>
					<th>
						PERFORMANCE REPORT
					</th>

				</tr>
				</thead>
				<tbody>

				<?php
/*				$counter = 0;
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];
					*/?>

					<tr>
						<td>
							<?php /*echo  $m['key_responsibility'] */?>
						</td>
						<td>
							<?php /*echo $m['gafs'] */?>
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php /*echo $m['outcome_weight'] */?>" />
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php /*echo $m['job_holder_rating_ann'] */?>" />
						</td>

						<td>
							<input class="form-control"  type="number" value="<?php /*echo $m['supervisor_rating_ann'] */?>" />
						</td>
						<td>
							<input class="form-control"  type="text"  value="<?php /*echo $m['decision_of_supervisor_ann'] */?>" />
						</td>
						<td>
							<input class="form-control" disabled type="text" value="<?php /*echo $m['par_score_ann'] */?>" />
						</td>
						<td>
							<?php /*echo $m['performance_report_ann'] */?>
						</td>

					</tr>


				<?php /*} */?>

				</tbody>

			</table>
			<?php /*echo '<legend> Sub-Total: ' . $counter . '</legend>' */?>
		</div>
	</div>


</div>

<div class="card">
	<div class="card-body">
		<?php /*if($submission_row->status == 'PENDING'){ */?>

			<form class="form-inline"  method="post" action="<?php /*echo base_url()*/?>performance/sup_update_status/<?php /*echo $submission_id */?>">
				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<input type="submit" class="btn-sm btn-primary m-2" />
				<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
			</form>
		<?php /*}*/?>
	</div>
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

-->
