<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance">BACK</a>
</div>
<div style="text-align: center;">
	<h3>
		PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL
	</h3>
</div>
<div class=card>

	<div class="card-body">
		<dl class="row">
			<dt class="col-sm-2">
				Name of Executive Authority
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->Name . ' ' . $emp->LastName; ?>
			</dd>
			<dt class="col-sm-2">
				Name of Head of Department
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->S_Name ?>
			</dd>
			<dt class="col-sm-2">
				Persal number
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->Persal ?>
			</dd>



			<dt class="col-sm-2">
				Branch name
			</dt>
			<dd class="col-sm-10">
				<?php echo '' ?>
			</dd>

			<dt class="col-sm-2">
				Province (if applicable)
			</dt>
			<dd class="col-sm-10">
				<?php echo '' ?>
			</dd>

			<dt class="col-sm-2">
				Job title
			</dt>
			<dd class="col-sm-10">
				<?php echo $emp->JobTitle ?>
			</dd>
		</dl>
	</div>
</div>
<br/>
<!--<div>
	Please identify dates for half-yearly and annual performance assessments
	<table>
		<thead>
		<tr>
			<th>Mid-year performance review & assessment date:</th>
			<th><input class="form-control"/></th>

		</tr>
		<tr>
			<th>Annual Performance assessment date:</th>
			<th><input class="form-control"/></th>

		</tr>
		</thead>
	</table>
</div>-->
<br/>
<div>
	<h3>Dispute resolution mechanism</h3>
	<p>Any disputes about the nature of the HOD’s PA, whether it relates to key responsibilities, priorities, methods of
		assessment in this agreement, shall be mediated by DG in the Presidency or DG in the Office of the premier.

		If, this mediation fails and the dispute remains unresolved at this level, the matter should, thereafter be
		referred to the PSC.</p>

</div>


<div class="table-responsive">
	<table class="table table-bordered">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>KEY RESULT AREA</th>
			<th>BATHO PELE PRINCIPLES</th>
			<th>WEIGHTING</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($bp as $b) { ?>
			<tr>
				<td><?php echo $b['key_results_area'] ?></td>
				<td><?php echo $b['batho_pele_principles'] ?></td>
				<td><?php echo $b['weight_of_outcome'] ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>


</div>
<br />
<div class="card-body p-0">
	<div class="table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4">
			<tr>
				<th>
					CORE MANAGEMENT COMPETENCIES

				</th>
				<th>
					PROCESS COMPETENCIES
				</th>
				<th>
					DEV REQUIRED(YES/NO)
				</th>
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($gmc_work_plan as $gmcWork) { ?>

				<tr>
					<td><?php echo $gmcWork['core_management_competencies']?></td>
					<td><?php echo $gmcWork['process_competencies']?></td>
					<td><?php echo $gmcWork['dev_required']?></td>
				</tr>

			<?php }
			?>


			</tbody>

		</table>
	</div>
</div>
<br />
<div class="card">
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #fbd4b4">
				<tr>
					<th>
						KEY RESULT AREAS

					</th>
					<th>
						KEY ACTIVITIES
					</th>
					<th class="text-center">
						WEIGHT
					</th>
					<th>
						TARGET DATE
					</th>

					<th>
						INDICATOR/TARGET
					</th>
					<th>
						RESOURCE REQUIRED
					</th>
					<th>
						ENABLING CONDITION
					</th>

				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php

				foreach ($kra as $_kra) {
					foreach ($work_plan as $work) { ?>

						<tr>
							<td><?php echo $_kra['name'] ?></td>
							<td><?php echo $work['key_activities'] ?></td>
							<td><?php echo $work['weight'] ?></td>
							<td><?php echo $work['target_date'] ?></td>
							<td><?php echo $work['indicator_target'] ?></td>
							<td><?php echo $work['resource_required'] ?></td>
							<td><?php echo $work['enabling_condition'] ?></td>


						</tr>

					<?php }
				} ?>
				</tbody>

			</table>
		</div>
	</div>

</div>

<div class="card">
	<div class="card-body">
		<form class="form-inline" method="post"
			  action="<?php echo base_url() ?>performance/sup_update_status/<?php echo $submission_id; ?>">
			<select name="action_option" id="action" onchange="optionChange()" class="form-control">
				<option class="form-control select" value="APPROVED">APPROVE</option>
				<option value="REJECTED">REJECT</option>
			</select>
			<input type="submit" class="btn-sm btn-primary m-2"/>
			<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment"
				   class="form-control w-100">
		</form>
	</div>
</div>


<script>
	const e = document.getElementById("action");

	function optionChange() {
		if (e.value === 'APPROVE') {
			document.getElementById("comment").style = "display:none";

		}
		if (e.value === 'REJECT') {
			document.getElementById("comment").style = "display:block";

		}
	}


</script>
<br>


<!--<div class="card">
	<div class="card-header">

		<p style="font-weight: bold" align="center">FORMAL PERFORMANCE ASSESSMENT</p>
		<p style="font-weight: bold" align="center">PERFORMANCE PERIOD: 01 October 2019 to 31 March 2020</p>
		<p style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</p>
		<p style="font-weight: bold" align="center">(To be completed by the jobholder, prior to the assessment process. If the space provided is insufficient, the comments can be included as an attachment)</p>
		<p style="font-weight: bold" align="center">1.During this performance assessment period, my major achievements / accomplishments as they relate to my Performance  Agreement were:</p>
		<p style="font-weight: bold" align="center">2.During this performance assessment period, I have achieved / accomplished the following, which was/were not part of my Performance Agreement:</p>
		<p style="font-weight: bold" align="center">3.During this performance assessment period, I was less successful in the following areas, which formed part of my Performance Agreement, for the reasons stated:</p>


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
/*					$counter = 0;
					$mou = array();
					foreach ($mou as $m)
					{
						$counter =  $counter + $m['OutcomeWeight'];
						echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="'.$m['Kra'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$m['Gafs'].'" /></td>
									
									<td><input class="form-control" disabled  type="text" value="'.$m['OutcomeWeight'].'" /></td>

                                    <td><input class="form-control" disabled  type="text" value="'.$m['JobHolderRating'].'" /></td>

									<td><input class="form-control" disabled  type="text" value="'.$m['SupervisorRating'].'" /></td>
									<td>
										<input class="form-control" disabled  type="text"  value="'.$m['DecisionOfSupervisor'].'" />
									</td>
									<td><input class="form-control" disabled type="text" value="'.$m['Par'].'" /></td>
                                    <td><input class="form-control" disabled type="text" value="'.$m['PerformanceReport'].'" /></td>
									<td>
									<td>
										
										<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_mou/6/'.$m['OpMouId'].'">REMOVE</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/6/'.$m['OpMouId'].'">EDIT</a>
									</td>
								</tr>
								';
					}
					$data = '';
					for ($i = 10; $i <=100; $i=$i +10)
					{
						$data .='<option value="'.$i.'">'.$i.'%</option>';
					}

					echo '
							<form method="post" action="'.base_url().'performance/op_mou/6">
								<tr>
									<td><input class="form-control" name="kra" required  type="text" /></td>
									<td><input class="form-control" name="gafs" type="text" required /></td>
									
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
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


					*/ ?>
					</tbody>

				</table>
				<?php /*echo '<p style="font-weight: bold"> Sub-Total: '.$counter.'</p>' */ ?>


			</div>
		</div>





</div>
<div class="card">

		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
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
						<th>
							SECTION A: KEY RESULTS AREAS ACHIEVED
						</th>
						<th>
							(C) SCORE
						</th>
						<th>
							SCORE IN PERCENTAGE (C / 3 x 100%) DO NOT ROUND OFF
						</th>

					</tr>
					</thead>
					<tbody>

					<?php
/*					$counter = 0;
					foreach ($mou as $m)
					{
						$counter =  $counter + $m['OutcomeWeight'];
						echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="'.$m['Kra'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$m['Gafs'].'" /></td>
									
									<td><input class="form-control" disabled  type="text" value="'.$m['OutcomeWeight'].'" /></td>

                                    <td><input class="form-control" disabled  type="text" value="'.$m['JobHolderRating'].'" /></td>

									<td><input class="form-control" disabled  type="text" value="'.$m['SupervisorRating'].'" /></td>
									<td>
										<input class="form-control" disabled  type="text"  value="'.$m['DecisionOfSupervisor'].'" />
									</td>
									<td><input class="form-control" disabled type="text" value="'.$m['Par'].'<td>
									<td>
										
										<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_mou/6/'.$m['OpMouId'].'">REMOVE</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/6/'.$m['OpMouId'].'">EDIT</a>
									</td>
								</tr>
								';
					}
					$data = '';
					for ($i = 10; $i <=100; $i=$i +10)
					{
						$data .='<option value="'.$i.'">'.$i.'%</option>';
					}

					echo '
							<form method="post" action="'.base_url().'performance/op_mou/6">
								<tr>
									<td><input class="form-control" name="factor" required  type="text" /></td>
									<td><input class="form-control" name="sub_total" type="text" required /></td>
									<td><input class="form-control" name="percentage" type="text" required /></td>
                                    <td><input class="form-control" name="total_score" required  type="number" /></td>
									<td><input class="form-control" name="kra_achieved" required type="number" /></td>
									<td>
									<input type="text" name="score" class="form-control" required  />
									</td>
									<td><input class="form-control" name="score_in_percentage" type="text" required /></td>
                                    <td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
								</tr>
							</form>				
						';


					*/ ?>
					</tbody>

				</table>



			</div>
		</div>



</div>
<div class="card">

	<div class="card">

		<legend align="center">signature to be put</legend>

	</div>

</div>-->

