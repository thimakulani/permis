<?php $period = $submission_row->period;
?>
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>

<div>

	<h1 style="font-weight: bold" align="center">MID YEAR PERFORMANCE ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period; ?></h4>
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
				$counter = 0;
				foreach ($performance_plan as $m)
				{
					$counter = $counter + $m['outcome_weight'];

					if($counter >= 0)
					{
					 ?>
								<tr>
									<td>
										<?php echo $m['key_responsibility'] ?>
									</td>
									<td>
										<?php echo $m['period'] ?>
									</td>
									<td class="text-center">
										<?php echo $m['outcome_weight'] ?>
									</td>
                                    <td class="text-center">
										<?php echo $m['job_holder_rating'] ?>
									</td>
									<td class="text-center">
										<?php echo $m['supervisor_rating'] ?>
									</td>
									<td>
										<?php echo $m['decision_of_supervisor'] ?>
									</td>
									<td class="text-center">
										<strong> <p><?php echo $m['par_score'] ?></p> </strong>
									</td>
                                    <td>
										<?php echo $m['performance_report'] ?>
									</td>
								</tr>
				<?php } } ?>
				<tr>
					<td>SUB-TOTAL:</td>
					<td></td>
					<td class="text-center"><?php echo $counter; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				</tbody>

			</table>



		</div>
	</div>


</div>

<br/>
<?php if(1 == 2) { ?>
<h1>MID YEAR PERFORMANCE OUTCOME</h1>
<div class="table-responsive">
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
			<td><input type="number" id="val_a" class="form-control"/></td>
			<td><input type="number" id="val_b" class="form-control"/></td>
			<td><input type="number" id="val_total" disabled class="form-control"/></td>
			<td><input class="btn-sm btn-info" type="button" value="TOTAL" onclick="CalTot()"/></td>
		</tr>
		<tr>
			<td colspan="3">
				(C) SCORE
			</td>
			<td><input type="number" id="val_c" class="form-control"/></td>
			<th></th>
		</tr>
		<tr>
			<td colspan="3">
				SCORE IN PERCENTAGE (C / 3 x 100%) <strong>DO NOT ROUND OFF<strong>
			</td>
			<td><input type="number" disabled id="total_c" class="form-control"/></td>
			<th><input class="btn-sm btn-info" type="button" value="TOTAL" onclick="CalTotC()"/></th>
		</tr>
		</tbody>
	</table>

</div>

<?php } ?>

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
