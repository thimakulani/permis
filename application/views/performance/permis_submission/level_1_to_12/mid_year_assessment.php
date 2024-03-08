<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions">BACK</a>
</div>

<div>

	<h1 style="font-weight: bold" align="center">FORMAL PERFORMANCE ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: 01 April 2019 to 30 September 2020</h4>
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
					<form method="post"
						  action="<?php echo base_url() ?>performance/update_sup_performance/<?php echo $m['id']; ?>/<?php echo $data->id; ?>/<?php echo $data->emp_id; ?>">
						<tr>
							<td><?php echo $m['key_responsibility'] ?></td>
							<td><?php echo $m['gafs'] ?></td>

							<td><input class="form-control" disabled type="text"
									   value="<?php echo $m['outcome_weight'] ?>"/></td>

							<td><input class="form-control" disabled type="number" name="job_holder_rating" value="<?php echo $m['job_holder_rating']?>"/></td>

							<td><input class="form-control"  disabled type="number" min="1" max="4" name="supervisor_rating" value="<?php echo $m['supervisor_rating'] ?>"/></td>
							<td>
								<input class="form-control"  disabled type="text" name="decision_of_supervisor" value="<?php echo $m['decision_of_supervisor'] ?>"/>
							</td>
							<td><input class="form-control" disabled type="number" name="par_score" value="<?php echo $m['par_score'] ?>"/></td>
							<td> <?php if(isset($m['performance_report'])) echo $m['performance_report'] ?></td>



						</tr>
					</form>
				<?php } ?>



				</tbody>

			</table>
			<?php echo '<h5 style="margin: 5px"> Sub-Total: ' . $counter . '</h5>' ?>


		</div>
	</div>


</div>

<br/>
<h1>MID YEAR PERFORMANCE OUTCOME</h1>
<form class="table-responsive" method="post" action="<?php base_url() ?>performance/add_factor/7">
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
			<td><input type="number" id="val_a" name="sub_total_a" value="<?php if (isset($factor->sub_total_a)) {
					echo $factor->sub_total_a;
				} ?>" required class="form-control"/></td>
			<td><input type="number" id="val_b" name="of_assessment" value="<?php if (isset($factor->of_assessment)) {
					echo $factor->of_assessment;
				} ?>" required class="form-control"/></td>
			<td><input type="number" id="val_total"
					   value="<?php if (isset($factor->of_assessment) && isset($factor->sub_total_a)) {
						   echo $factor->of_assessment * $factor->sub_total_a;
					   } ?>" disabled class="form-control"/></td>

		</tr>
		<tr>
			<td colspan="3">
				(C) SCORE
			</td>
			<td><input type="number" id="val_c" name="c_score" value="<?php if (isset($factor->c_score)) {
					echo $factor->c_score;
				} ?>" required class="form-control"/></td>

		</tr>
		<tr>
			<td colspan="3">
				SCORE IN PERCENTAGE (C / 3 x 100%) <strong>DO NOT ROUND OFF<strong>
			</td>

			<td><input type="number" disabled id="total_c" value="<?php if (isset($factor->c_score)) {
					$tot = ($factor->c_score * 3) / 100;
					echo $tot;
				} ?>" class="form-control"/></td>
		</tr>
		</tbody>
	</table>

</form>
<br/>


<br/>




<br/>
