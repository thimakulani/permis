<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>

<?php $period = $submission_row->period;
?>

<div>

	<h1 style="font-weight: bold" align="center">FORMAL ANNUAL ASSESSMENT</h1>
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
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				$counter = 0;
				foreach ($performance_plan as $m)
				{
					$counter = $counter + $m['outcome_weight'];
					?>
					<tr>
						<td>
							<?php echo $m['key_responsibility'] ?>
						</td>
						<td>
							<?php echo $m['gafs'] ?>
						</td>
						<td class="text-center">
							<?php echo $m['outcome_weight'] ?>
						</td>
						<td class="text-center">
							<?php echo $m['job_holder_rating_ann'] ?>
						</td>
						<td class="text-center">
							<?php echo $m['supervisor_rating_ann'] ?>
						</td>
						<td>
							<?php echo $m['decision_of_supervisor_ann'] ?>
						</td>
						<td class="text-center">
							<strong> <p><?php echo $m['par_score'] ?></p> </strong>
						</td>
						<td>
							<?php echo $m['performance_report'] ?>
						</td>
					</tr>
				<?php } ?>
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





