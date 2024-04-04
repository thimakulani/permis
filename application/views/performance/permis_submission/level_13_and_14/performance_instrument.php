<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions">BACK</a>
</div>

<div style="text-align: center;">

	<h4>PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</h4>

</div>

<br/>


<br>

<div class="card">
	<div style="text-align: center;">
		<h4 >INDIVIDUAL PERFORMANCE</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #8cb2e1">
				<tr>
					<th>
						KEY RESULTS AREA

					</th>
					<th>
						BATHO PELE PRINCIPLES
					</th>

					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>


				</tr>
				</thead>
				<tbody>

				<?php
				$counter = 0;
				foreach ($individual_performance as $m)
				{
					$counter =  $counter + $m['weight_of_outcome'];
					echo '
								<tr>
									<td>'.$m['key_results_area'].'</td>
									<td>'.$m['batho_pele_principles'].'</td>
									<td>'.$m['weight_of_outcome'].'</td>

									
								</tr>
								';
				}
				if($counter>0){
					echo '
								<tr>
									<td>SUB-TOTAL</td>
									<td></td>
									<td>'.$counter.'</td>
								</tr>
								';
				}


				?>
				</tbody>

			</table>




		</div>
	</div>
</div>

<br>

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
				<thead style="background-color: #8cb2e1">
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

				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($gmc_personal_development_plan as $gmcWork) {
					echo '
								
								<tr>
									<td>' . $gmcWork['core_management'] . '</td>
									<td>' . $gmcWork['process_competencies'] . '</td>
									<td>' . $gmcWork['dev_required'] . '</td>
								
									
									
								</tr>
								';
				}

				?>


				</tbody>

			</table>
		</div>
	</div>
</div>

<br>


<div class="card">
	<div class="card-header">
		<div style="text-align: center;">
			<h4>WORK PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h4>
		</div>

	</div>


	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #8cb2e1">
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
				foreach ($work_plan as $work)
				{
					echo '
								<tr>
									<td>'.$work['key_result_areas'].'</td>
									<td>'.$work['key_activities'].'</td>
									<td><input class="form-control" disabled  type="text" value="'.$work['weight'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$work['target_date'].'" /></td>
									<td>'.$work['indicator_target'].'</td>
									<td>'.$work['resource_required'].'</td>
									<td>'.$work['enabling_condition'].'</td>								
								
								</tr>
								
								';
				}




				?>


				</tbody>

			</table>
		</div>
	</div>

</div>

<br />
<div class="card">

	<div style="text-align: center;">
		<h4>PERSONAL DEVELOPMENTAL PLAN FOR CHIEF DIRECTOR AND DIRECTOR</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #8cb2e1">
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



				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php
				foreach ($devplan as $work)
				{
					echo '
								<tr>
									<td>'.$work['developmental_areas'].'</td>
									<td>'.$work['types_of_interventions'].'</td>
									<td><input class="form-control" disabled  type="text" value="'.$work['target_date'].'" /></td>
								
								';
				}





				?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<br>
<div class="card">

</div>
<br>

<?php if($submission_row->status_final == 'PENDING'){ ?>

	<div class="card">
		<div class="card-body">
			<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/permis_update_status/<?php echo $submission_id ?>">
				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<input type="submit" class="btn-sm btn-primary m-2" />
				<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
			</form>
		</div>
	</div>
<?php } ?>


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



<br>
