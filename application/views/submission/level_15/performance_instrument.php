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
	<h4>
		Dispute resolution mechanism
	</h4>
	<p>
		Disputes on the signing of PAs will be dealt with in terms of Regulation 72(4)(5)&(6) of the Public Service
		Regulations, 2016. Any disputes about the assessment, shall be mediated by a person agreed to by the SMS member
		and the Supervisor.
	</p>
</div>


<div class="table-responsive">
	<table class="table table-bordered">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th colspan="4">Categories</th>
			<th>Key Result Area</th>
			<th>Batho Pele Principles</th>
			<th>Weighting</th>
		</tr>
		</thead>
	</table>
</div>
<br />


<div class="card">

	<div class="card-header">
		<div style="text-align: center;">
			<h4>
				GENERIC MANAGEMENT COMPETENCIES: PERSONAL DEVELOPMENT PLAN
			</h4>
		</div>
	</div>
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
						DEV REQUIRED
					</th>
					<th></th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				$gmcWorkplan = array();
				foreach ($gmcWorkplan as $gmcWork) {
					echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="' . $gmcWork['CoreManagementCompetencies'] . '" /></td>
									<td><input class="form-control" disabled  type="text" value="' . $gmcWork['ProcessCompetencies'] . '" /></td>
									<td><input class="form-control" disabled  type="text" value="' . $gmcWork['DevRequired'] . '" /></td>
								
									<td>
										
										<a class="btn-sm btn-danger" href="' . base_url() . 'performance/remove_gmc_Plan/9/' . $gmcWork['GMCPlanId'] . '">REMOVE</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="' . base_url() . 'performance/edit/9/' . $gmcWork['GMCPlanId'] . '">EDIT</a>
									</td>
									
								</tr>
								';
				}

				echo '
							
							<form method="post" action="' . base_url() . 'performance/gmc_performance_plan/9">
								<tr>
									<td><input class="form-control" name="core_management" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="devRequired" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
								</tr>
							</form>				
						';
				?>


				</tbody>

			</table>
		</div>
	</div>
</div>

<br/>

<div>
	<h3>Generic Management Competencies: Personal Development Plan</h3>
</div>

<div class="card">
	<div class="card-header">
		<div style="text-align: center;">
			<h4>WORK PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
		</div>

	</div>


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
					<th></th>
					<th></th>
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
										<a class="btn-sm btn-danger" style="margin: 2" href="'.base_url().'performance/remove_workPlan/3/'.$work['WorkplanId'].'">REMOVE</a>
									</td>
									<td>
										<a class="btn-sm btn-info" style="margin: 2" href="'.base_url().'performance/edit/3/'.$work['WorkplanId'].'">EDIT</a>
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
									<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
									<td></td>
								</tr>
							</form>				
						';
				?>


				</tbody>

			</table>
		</div>
	</div>

</div>
<br />

<div class="card">

	<div style="text-align: center;">
		<h4>PERSONAL DEVELOPMENTAL PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #fbd4b4">
				<tr>
					<th>
						DEVELOPMENTAL AREAS
					</th>
					<th>
						TYPES OF INTERVENTIONS
					</th>

					<th>
						TARGET DATE
					</th>
					<th></th>
					<th></th>


				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php
				$devplan = array();
				foreach ($devplan as $work)
				{
					echo '
								<tr>
								<td><input class="form-control" disabled  type="text" value="'.$work['DevAreas'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['InterventionType'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['TargetDate'].'" /></td>
								<td>
										
									<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_workPlan/9/'.$work['DirctorPlanId'].'">REMOVE</a>
								</td>
								<td>
									<a class="btn-sm btn-info" href="'.base_url().'performance/edit/9/'.$work['DirctorPlanId'].'">EDIT</a>
								</td>
								</tr>
								
								';
				}




				echo '
							<form method="post" action="'.base_url().'performance/add_dir_dev_plan/9">
								<tr>
									<td><input class="form-control" name="dev_areas" required  type="text-area" /></td>
									<td><input class="form-control" name="intervention_type" type="text" required /></td>
									<td><input class="form-control" name="target_date" required  type="date" /></td>
									<td></td>
									<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
								</tr>
							</form>				
						';
				?>
				</tbody>
			</table>
		</div>
	</div>

</div>



<form method="post" action="<?php echo base_url() ?>performance/submit_performance_ddg/200">


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
