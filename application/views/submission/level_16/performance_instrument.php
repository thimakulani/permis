<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture" >BACK</a>
</div>
<div style="text-align: center;">PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</div>
<div class="table-responsive">

	<table class="table-sm table table-responsive">
		<thead style="background-color: #fbd4b4">
		<tr>
			<td>SMS member's name</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		<tr>
			<td>Persal number</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		<tr>
			<td>Supervisor's name</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		<tr>
			<td>Branch name</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		<tr>
			<td>Province (if applicable)</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		<tr>
			<td>Performance cycle</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		<tr>
			<td>Job title</td>
			<td><input class="form-control-sm"/></td>
		</tr>
		</thead>
	</table>
</div>
<br/>
<div>
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
</div>
<br/>
<div>
	<h3>Dispute resolution mechanism</h3>
	<p>Any disputes about the nature of the HOD’s PA, whether it relates to key responsibilities, priorities, methods of assessment in this agreement, shall be mediated by DG in the Presidency or DG in  the Office of the premier.

	If, this mediation fails and the dispute remains unresolved at this level, the matter should, thereafter be referred to the PSC.</p>

</div>


<div class="table-responsive">
	<table class="table table-bordered">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th colspan="4">Categories</th>
			<th>Key Result Area</th>
			<th>Batho Pele Principles</th>
			<th>Weighting</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
			<?php $bp = array();
				foreach ($bp as $b){ ?>
				<tr>
					<td> <input type="text" class="form-control" /> </td>
					<td> <input type="text" class="form-control" /> </td>
					<td> <input type="text" class="form-control" /> </td>
					<td> <input type="text" class="form-control" /> </td>
					<td> <input type="text" class="form-control" /> </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


</div>
<br/>
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
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php
			$gmcWorkplan = array();
			foreach ($gmcWorkplan as $gmcWork) {
				echo '
								<tr>
									<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['CoreManagementCompetencies'] . '" /></td>
									<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['ProcessCompetencies'] . '" /></td>
									<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['DevRequired'] . '" /></td>
								
								<td>
										
									<a class="btn-sm btn-danger" href="' . base_url() . 'performance/remove_gmc_Plan/5/' . $gmcWork['GMCPlanId'] . '">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="' . base_url() . 'performance/edit/5/' . $gmcWork['GMCPlanId'] . '">Edit</a>
									</td>
									
								</tr>
								';
			}

			echo '
							
							<form method="post" action="' . base_url() . 'performance/gmc_performance_plan/5">
								<tr>
									<td><input class="form-control" name="core_management" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="devRequired" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
			?>


			</tbody>

		</table>
	</div>
</div>
<div class="card">
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead>
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
					<th class="text-center">
						TOTAL WEIGHT FOR KRA
					</th>
				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php
				$workplan = array();
				foreach ($workplan as $work)
				{
					echo '
								<tr>
								<td><input class="form-control" disabled  type="text" value="'.$work['keyResultArea'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['KeyActivities'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['Weight'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['TargetDate'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['Indicator'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['ResourceReq'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['EnablingCondition'].'" /></td>

								<td>
										
									<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_workPlan/3/'.$work['WorkplanId'].'">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/3/'.$work['WorkplanId'].'">Edit</a>
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
							<form method="post" action="'.base_url().'performance/workplan/3">
								<tr>
									<td><input class="form-control" name="key_result_area" required  type="text-area" /></td>
									<td><input class="form-control" name="key_activities" type="text" required /></td>
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
										</select>
									</td>
									<td><input class="form-control" name="target_date" required  type="date" /></td>
									<td><input class="form-control" name="indicator" required type="text" /></td>
									<td><input class="form-control" name="resource_required" required type="text" /></td>
									<td><input class="form-control" name="enabling_condition" type="text" required /></td>
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
				?>


				</tbody>

			</table>
		</div>
	</div>

</div>

<form method="post" action="<?php echo base_url() ?>performance/submit_performance_hod/500">


	<br/>
	<div class="card">


		<div class="card-body">

		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
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


					*/?>
					</tbody>

				</table>
				<?php /*echo '<p style="font-weight: bold"> Sub-Total: '.$counter.'</p>' */?>


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


					*/?>
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

