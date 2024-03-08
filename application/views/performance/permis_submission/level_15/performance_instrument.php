<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions" >BACK</a>
</div>
<div style="text-align: center;"> <h2>
		PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL
	</h2> </div>
<div>
<div>
	<div style="text-align: center;">
		<h5>
			DISPUTE RESOLUTION MECHANISM
		</h5>
	</div>
	<p>
		DISPUTES ON THE SIGNING OF PAS WILL BE DEALT WITH IN TERMS OF REGULATION 72(4)(5)&(6) OF THE PUBLIC SERVICE
		REGULATIONS, 2016. ANY DISPUTES ABOUT THE ASSESSMENT, SHALL BE MEDIATED BY A PERSON AGREED TO BY THE SMS MEMBER
		AND THE SUPERVISOR.
	</p>
</div>


<div class="table-responsive">
	<table class="table table-stripped">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>KEY RESULT AREA</th>
			<th>BATHO PELE PRINCIPLES</th>
			<th>WEIGHTING</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php

		foreach ($individual_performance as $ip) {?>
			<tr>
				<td> <?php echo $ip['key_results_area']; ?></td>
				<td> <?php echo $ip['batho_pele_principles']; ?></td>
				<td> <?php echo $ip['weight_of_outcome']; ?></td>
			</tr>
		<?php }?>

		</tbody>
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

				</tr>
				</thead>
				<tbody>

				<?php

				foreach ($generic_management_competencies as $gmcWork) {
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

<br/>


<div class="card">
	<div class="card-header">
		<div style="text-align: center;">
			<h4>WORK PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
		</div>
	</div>

	<?php
	foreach ($kra as $_kra)
	{ ?>
		<div class="card-body">
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

					</tr>
					</thead>
					<tbody>
					<!-- To Retrieve Database information -->

					<?php
					foreach ($work_plan as $work)
					{
						if($_kra['id'] == $work['kra_id'])
						{ ?>

							<tr>
								<td><input class="form-control" disabled  type="text" value="<?php echo $_kra['name'] ?>"  /></td>
								<td><?php echo $work['key_activities'] ?></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['weight'] ?>" /></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['target_date'] ?>" /></td>
								<td><?php echo $work['indicator_target'] ?></td>
								<td><?php echo $work['resource_required'] ?></td>
								<td><?php echo $work['enabling_condition'] ?></td>
							</tr>

							<?php
						}
					} ?>

					</tbody>

				</table>
			</div>
		</div>

		<?php
	}
	?>


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



				</tr>
				</thead>
				<tbody>
				<!-- To Retrieve Database information -->

				<?php

				foreach ($personal_developmental_plan as $work)
				{
					echo '
								<tr>
								<td>'.$work['developmental_areas'].'</td>
								<td>'.$work['types_of_interventions'].'</td>
								<td><input class="form-control" disabled  type="text" value="'.$work['target_date'].'" /></td>
								
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
