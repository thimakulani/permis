<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions">BACK</a>
</div>
<div style="text-align: center;">PERFORMANCE AGREEMENT FOR DEPUTY DIRECTOR-GENERAL</div>
<div class="card">
	<dl class="card-body row">
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
			<?php echo $emp->b_name; ?>
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
			<th>Key Result Area</th>
			<th>Batho Pele Principles</th>
			<th>Weighting</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($bp as $bp) { ?>
			<tr>
				<td><?php echo $bp['key_results_area']; ?></td>
				<td><?php echo $bp['batho_pele_principles']; ?></td>
				<td><?php echo $bp['weight_of_outcome']; ?></td>
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

			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($gmc_work_plan as $work) {
				?>
				<tr>
					<td><?php echo $work['core_management_competencies'] ?></td>
					<td><?php echo $work['process_competencies'] ?></td>
					<td><?php echo $work['dev_required'] ?></td>
				</tr>

			<?php } ?>

			<!--<form method="post" action="<?php /*echo base_url() */ ?> performance/gmc_performance_plan/5">
								<tr>
									<td><input class="form-control" name="core_management_competencies" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="devRequired" class="form-control select">
										<option value="YES">YES</option>
										<option value="NO">NO</option>
										</select>
									</td>

								</tr>
							</form>	-->


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


					foreach ($work_plan as $work) {
						if ($_kra['id'] == $work['kra_id']) { ?>

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
					}
				}
				?>
				</tbody>

			</table>
		</div>
	</div>

</div>

<br>
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
						TYPES OF INTERVENTIONS (MENTORING/COURSE/WORKSHOP/SEMINARS)
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
				{ ?>

					<tr>
						<td><?php echo $work['developmental_areas'] ?></td>
						<td><?php echo $work['types_of_interventions'] ?></td>
						<td><?php echo $work['target_date'] ?></td>


					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>



<br />


<div class="card">
	<h3 class="m-2">
		KEY GOVERNMENT FOCUS AREAS
	</h3>
	<?php foreach ($kgfa as $_kgfa)
	{
		?>
		<h4> KEY GOVERNMENT FOCUS AREAS: <?php echo $_kgfa['name'] ?></h4>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead style="background-color: #fbd4b4">
					<tr>
						<th>
							KEY FOCUS AREA ACTIVITIES / OUTPUTS

						</th>
						<th>
							TARGET DATE
						</th>
						<th class="text-center">
							INDICATOR / TARGET
						</th>
						<th>
							BASELINE DATA
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

					foreach ($key_government_focus_areas as $work)
					{
						if($_kgfa['id'] == $work['kgfa_id'])
						{
							//$total_weight_outcome = $work['weight']  + $total_weight_outcome;
							?>
							<tr>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['key_focus_area_activities_outputs'] ?>" /></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['target_date'] ?>" /></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['indicator_target'] ?>" /></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['baseline_data'] ?>" /></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['resource_required'] ?>" /></td>
								<td><input class="form-control" disabled  type="text" value="<?php echo $work['enabling_condition'] ?>" /></td>



							</tr>



						<?php } } ?>





					</tbody>

				</table>
			</div>
		</div>
	<?php }

	?>
</div>
<br />
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
<br />
