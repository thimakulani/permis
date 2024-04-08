<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions" >BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">FORMAL PERFORMANCE ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: 01 October to 31 March</h4>
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
				foreach ($mou as $m) {
					$counter += $m['outcome_weight'];
					?>
					<tr>
						<td><?= $m['key_result_areas'] ?></td>
						<td><?= $m['gafs'] ?></td>
						<td><input class="form-control" disabled type="text" value="<?= $m['outcome_weight_ann'] ?>" /></td>
						<td><input class="form-control" disabled type="text" value="<?= $m['job_holder_rating_ann'] ?>" /></td>
						<td><input class="form-control" disabled type="text" value="<?= $m['supervisor_rating_ann'] ?>" /></td>
						<td><?= $m['decision_of_supervisor'] ?></td>
						<td><input class="form-control" disabled type="text" value="<?= $m['par_score_ann'] ?>" /></td>
						<td><?= $m['performance_report'] ?></td>
					</tr>
					<?php
				}
				?>
				</tbody>


			</table>
			<?php echo '<Legend> Sub-Total: ' . $counter . '</Legend>' ?>


		</div>
	</div>


</div>






