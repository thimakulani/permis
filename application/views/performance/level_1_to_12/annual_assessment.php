<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture" >BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">ANNUAL ASSESSMENT</h1>
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
						AGREED RATE
					</th>
					<th>
						PERFORMANCE REPORT
					</th>
					<th></th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				$counter = 0;
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];


					?>
					<form method="post"
						  action="<?php echo base_url() ?>performance/update_performance_ann/<?php echo $m['id']; ?>/8">
						<tr>
							<td><?php echo $m['key_responsibility'] ?></td>
							<td><?php echo $m['gafs'] ?></td>

							<td><input class="form-control" disabled type="text"
									   value="<?php echo $m['outcome_weight'] ?>"/></td>

							<td><input class="form-control" type="number" min="1" max="4" name="job_holder_rating_ann" value="<?php echo $m['job_holder_rating_ann']?>"/></td>

							<td><input class="form-control" disabled  type="number" name="supervisor_rating_ann" value="<?php echo $m['supervisor_rating_ann'] ?>"/></td>

							<td><input class="form-control" type="number" name="par_score_ann" disabled value="<?php echo $m['par_score_ann'] ?>"/></td>
							<td><input class="form-control" name="performance_report_ann" type="text" value="<?php if(isset($m['performance_report_ann'])) echo $m['performance_report_ann'] ?>" /> </td>
							<td>
								<input type="submit" value="update" class="btn-sm btn-info"/>
							</td>

						</tr>
					</form>
				<?php } ?>
				</tbody>

			</table>
			<?php echo '<Legend> Sub-Total: ' . $counter . '</Legend>' ?>


		</div>
	</div>


</div>

<form method="post" action="<?php echo base_url() ?>performance/submit_performance_ann/8">

	<div class="card">
		<div class="card-header">
			<h4>AGREEMENT ASSESSMENT</h4>
		</div>
		<br>
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
					<label for="not_agree"> DO NOT AGREE WITH ASSESSMENT (If in disagreement please provide and attach
						written reasons) </label><br>
				</td>
				<td>
					<h5>I acknowledge that I have discussed the official’s performance with him / her and that the
						assessment is a true reflection of his / her performance of the period:</h5>
				</td>
			</tr>
			<tr>
				<td><input placeholder="Reason If you Disagree" class="form-control" name="reason" type="text"/></td>
				<td><p>To put the date(period)</p></td>
			</tr>
			<tr>
				<td><p>I acknowledge that my supervisor and I have discussed the performance and I</p></td>
				<td><input placeholder="Comments" class="form-control" name="sup_comment" disabled type="text"/></td>
			</tr>
			</tbody>
		</table>
	</div>


	<br/>
	<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
	<div>
		<input class="btn btn-info" type="submit" value="SUBMIT TO SUPERVISOR"/>
	</div>

</form>
<?php
if (isset($user_sub->status))
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

<br />

