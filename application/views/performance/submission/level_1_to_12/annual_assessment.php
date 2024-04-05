<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance" >BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">FORMAL ANNUAL ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $submission_row->period?></h4>
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
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];
					?>

					<tr>
						<td>
							<?php echo  $m['key_responsibility'] ?>
						</td>
						<td>
							<?php echo $m['gafs'] ?>
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php echo $m['outcome_weight'] ?>" />
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php echo $m['job_holder_rating_ann'] ?>" />
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php echo $m['supervisor_rating_ann'] ?>" />
						</td>
						<td>
							<input class="form-control" disabled  type="text"  value="<?php echo $m['decision_of_supervisor_ann'] ?>" />
						</td>
						<td>
							<input class="form-control" disabled type="text" value="<?php echo $m['par_score'] ?>" />
						</td>
						<td>
							<?php echo $m['performance_report'] ?>
						</td>

					</tr>


				<?php } ?>

				</tbody>

			</table>
			<?php echo '<legend> Sub-Total: ' . $counter . '</legend>' ?>
		</div>
	</div>


</div>

<div class="card">
	<div class="card-body">
		<?php if($submission_row->status == 'PENDING'){ ?>

			<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/sup_update_status/<?php echo $submission_id ?>">
				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<input type="submit" class="btn-sm btn-primary m-2" />
				<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
			</form>
		<?php }?>
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

