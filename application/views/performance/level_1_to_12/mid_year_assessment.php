
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>

<div>

	<h1 style="font-weight: bold" align="center">MID YEAR PERFORMANCE ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period ?></h4>
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
						AGREED RATE
					</th>
					<th>
						PERFORMANCE REPORT
					</th>
				</tr>
				</thead>
				<tbody>

				<?php
				$counter = 0;
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];


					?>

					<form id="update_pp<?php echo $m['id']; ?>" method="post">
						<tr>
							<td><input class="form-control" disabled type="text"
									   value="<?php echo $m['key_responsibility'] ?>"/></td>
							<td><input class="form-control" disabled type="text" value="<?php echo $m['gafs'] ?>"/></td>

							<td><input class="form-control" disabled type="text"
									   value="<?php echo $m['outcome_weight'] ?>"/></td>

							<td><input class="form-control" type="number" min="1" max="4" name="job_holder_rating" value="<?php echo $m['job_holder_rating']?>"/></td>

							<td><input class="form-control" disabled  type="number" name="supervisor_rating" value="<?php echo $m['supervisor_rating'] ?>"/></td>

							<td><input class="form-control" type="number" name="par_score" disabled value="<?php echo $m['par_score'] ?>"/></td>
							<td><input class="form-control" name="performance_report" type="text" value="<?php if(isset($m['performance_report'])) echo $m['performance_report'] ?>" /> </td>

							<td>
								<input type="submit" value="update" class="btn-sm btn-info"/>
							</td>

						</tr>
					</form>
					<script>
						$(document).ready(function () {
							$('#update_pp<?php echo $m['id']; ?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url() ?>performance/update_performance/<?php echo $m['id']; ?>/7',
									data: $('#update_pp<?php echo $m['id']?>').serialize(), // serialize the form data
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
			<?php echo '<h5 style="margin: 5px"> Sub-Total: ' . $counter . '</h5>' ?>


		</div>
	</div>


</div>

<!--<br/>
<h1>MID YEAR PERFORMANCE OUTCOME</h1>
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
			<td><input type="number" id="val_a" name="sub_total_a" value="<?php /*if (isset($factor->sub_total_a)) {
					echo $factor->sub_total_a;
				} */?>" required class="form-control"/></td>
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
				(C) SCORE
			</td>
			<td><input type="number" id="val_c" name="c_score" value="<?php /*if (isset($factor->c_score)) {
					echo $factor->c_score;
				} */?>" required class="form-control"/></td>

		</tr>
		<tr>
			<td colspan="3">
				SCORE IN PERCENTAGE (C / 3 x 100%) <strong>DO NOT ROUND OFF<strong>
			</td>

			<td><input type="number" disabled id="total_c" value="<?php /*if (isset($factor->c_score)) {
					$tot = ($factor->c_score * 3) / 100;
					echo $tot;
				} */?>" class="form-control"/></td>
			<th><input class="btn-sm btn-info" type="submit" value="SAVE" onclick="CalTotC()"/></th>
		</tr>
		</tbody>
	</table>

</form>
<br/>
-->

<br/>

<form method="post" action="<?php echo base_url() ?>performance/submit_performance_mid/7">
	<input type="hidden" name="template_name" value="MID YEAR ASSESSMENT">
	<div>
		<div class="card"><H2>AGREEMENT ASSESSMENT</H2>      <br>
			<table class="table table-bordered">
				<thead style="background: #939ba7">
				<th> JOBHOLDER</th>
				<th> SUPERVISOR</th>
				</thead>
				<tbody>
				<tr>
					<td>
						<h5>I acknowledge that my supervisor and I have discussed the performance and I:</h5>
						<br>
						<input type="radio" checked name="option" value="yes">
						<label for="agree"> AGREE WITH THE ASSESSMENT</label>
						<br> <br>
						<input type="radio" name="option" value="no">
						<label for="not_agree"> DO NOT AGREE WITH ASSESSMENT (If in disagreement please provide and
							attach written reasons) </label><br>
					</td>
					<td>
						<h5>I acknowledge that I have discussed the official’s performance with him / her and that the
							assessment is a true reflection of his / her performance of the period:</h5>
					</td>
				</tr>
				<tr>
					<td><input placeholder="Reason If you Disagree" class="form-control" name="reason" type="text"/>
					</td>
					<td><p>To put the date(period)</p></td>
				</tr>
				<tr>
					<td><p>I acknowledge that my supervisor and I have discussed the performance and I</p></td>
					<td><input placeholder="Comments" class="form-control" name="sup_comment" disabled type="text"/>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>

	<br/>
	<div class="card">


		<div class="card-body">
			<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<?php
if(isset($user_sub->status))
{
if ($user_sub->status == 'REJECTED')
{?>
	<div class="card">
		<div class="card-body">
			<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/sup_update_status_correction/<?php echo $submission_id; ?>">

				<input type="submit" value="Correct" class="btn-sm btn-primary m-2" />
			</form>
		</div>
	</div>
<?php }
}
?>
<br/>
<script>


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


</script>
