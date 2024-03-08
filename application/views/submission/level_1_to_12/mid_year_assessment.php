<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
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
				foreach ($mou as $m) {
					$counter = $counter + $m['OutcomeWeight'];
					echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="' . $m['Kra'] . '" /></td>
									<td><input class="form-control" disabled  type="text" value="' . $m['Gafs'] . '" /></td>
									
									<td><input class="form-control" disabled  type="text" value="' . $m['OutcomeWeight'] . '" /></td>

                                    <td><input class="form-control" disabled  type="text" value="' . $m['JobHolderRating'] . '" /></td>

									<td><input class="form-control" disabled  type="text" value="' . $m['SupervisorRating'] . '" /></td>
									<td>
										<input class="form-control" disabled  type="text"  value="' . $m['DecisionOfSupervisor'] . '" />
									</td>
									<td><input class="form-control" disabled type="text" value="' . $m['Par'] . '" /></td>
                                    <td><input class="form-control" disabled type="text" value="' . $m['PerformanceReport'] . '" /></td>
									<td>
									<td>
										
										<a class="btn-sm btn-danger" href="' . base_url() . 'performance/remove_op_mid_mou/7/' . $m['OpMidYearId'] . '">REMOVE</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="' . base_url() . 'performance/edit/6/' . $m['OpMidYearId'] . '">EDIT</a>
									</td>
								</tr>
								';
				}
				$data = '';
				for ($i = 10; $i <= 100; $i = $i + 10) {
					$data .= '<option value="' . $i . '">' . $i . '%</option>';
				}

				echo '
							<form method="post" action="' . base_url() . 'performance/op_mid_mou/7">
								<tr>
									<td><input class="form-control" name="kra" required  type="text" /></td>
									<td><input class="form-control" name="gafs" type="text" required /></td>
									
									<td>
										<select name="weight" class="form-control select">
											' . $data . '
										</select>
									</td>
                                    <td><input class="form-control" name="jobholder_rating" required  type="number" /></td>
									<td><input class="form-control" disabled name="supervisor_rating" required type="number" /></td>
									<td>
									<input type="text" name="supervisor_decision" class="form-control" required  />
									</td>
									<td><input class="form-control" name="par" type="text" required /></td>
                                    <td><input class="form-control" name="performance_report" type="text" required /></td>
									<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
								</tr>
							</form>				
						';


				?>
				</tbody>

			</table>
			<?php echo '<Legend> Sub-Total: ' . $counter . '</Legend>' ?>


		</div>
	</div>


</div>

<br/>
<h1>ANNUAL PERFORMANCE OUTCOME</h1>
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


<br/>


<br/>
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_mid/7">
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
					<input type="radio"  name="option" value="no">
					<label for="not_agree"> DO NOT AGREE WITH ASSESSMENT (If in disagreement please provide and attach written reasons) </label><br>
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
</div>

<br/>
<div class="card">


		<div class="card-body">

		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

</div>
</form>
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
