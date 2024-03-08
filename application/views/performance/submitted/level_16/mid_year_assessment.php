<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div style="text-align: center;"><h2>HOD MID-CYCLE PERFORMANCE REVIEW TEMPLATE</h2></div>


<div class="table-responsive">
	<table class="table table-sm">
		<thead style="background-color: #C1D59AFF">
		<tr>
			<th>
				Name of Executive Authority
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>
				Province (if applicable)
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of Head of Department
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>
				Performance cycle
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
		</tr>
		<tr>
			<th>
				Persal Number
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
			<th>
				Mid-Year Review
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of Department
			</th>
			<th>
				<input type="text" class="form-control"/>
			</th>

		</tr>

		</thead>
	</table>
</div>
<br />

<h4 class="text-center">WORK PLAN</h4>
<?php
$counter = 1;
foreach ($kra as $_kra) { ?>

	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $counter; ?> : <?php echo $_kra['name']; ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #C1D59AFF">
				<tr>
					<th>ACTIVITIES</th>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
				</tr>
				</thead>
				<tbody>

				<?php
				foreach ($work_plan as $kra_data) { ?>
					<?php
					if($_kra['id'] == $kra_data['kra_id']) {?>
						<tr>
							<th> <?php echo $kra_data['key_activities'] ?></th>
							<th> <?php echo $kra_data['indicator_target'] ?></th>
							<th> <?php echo $kra_data['actual_achievement'] ?></th>
							<th class="text-center"> <?php echo $kra_data['sms_rating'] ?></th>
							<th class="text-center"> <?php echo $kra_data['supervisor_rating'] ?></th>
							<th class="text-center"> <?php echo $kra_data['agreed_rating'] ?></th>

						</tr>

					<?php } ?>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>

<?php $counter++; } ?>

<br />


<br>
<div class="card">
	<div style="text-align: center;">
		<h4>PERSONAL DEVELOPMENTAL PLAN FOR DEPUTY DIRECTOR-GENERAL</h4>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead style="background-color: #C1D59AFF">
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


<?php
$counter_kgfa = 1;
foreach ($kgfa as $_kgfa) { ?>
<div class="card">
		<div class="card-header">
			<h4>KEY GOVERNMENT FOCUS AREAS NO <?php echo $counter_kgfa; ?>: <?php echo $_kgfa['name']; ?> </h4>
		</div>
		<div class="card-body table-responsive">
		<table class="table table-striped">
			<thead style="background-color: #C1D59AFF">
			<tr>
				<th>KEY FOCUS AREA ACTIVITIES / OUTPUTS</th>
				<th>INDICATOR / TARGET</th>
				<th>PROGRESS(YES/NO)</th>
				<th>PROGRESS REVIEW COMMENT</th>

			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($key_government_focus_areas as $kg) {
				if($kg['kgfa_id'] == $_kgfa['id']){
				?>

				<tr>
					<td><?php echo $kg['key_focus_area_activities_outputs'] ?></td>
					<td><?php echo $kg['indicator_target'] ?></td>
					<td><?php echo $kg['progress'] ?></td>
					<td><?php echo $kg['progress_review_comment'] ?></td>

				</tr>
			<?php } } ?>



		</table>
	</div>
		<br />

</div>
<?php $counter_kgfa++; } ?>

<br />
<div class="card">
	<div class="card-header">
		<div style="text-align: center;"> <h4>COMPETENCIES: PERSONAL DEVELOPMENT PLAN </h4></div>
	</div>
	<table class="table table-striped">
		<thead style="background-color: #C1D59AFF">
			<tr>
				<th>Core Management Competencies (CMCs)</th>
				<th>Process Competencies (PCs)</th>
				<th>Yes/NoPCs</th>
				<th>Yes/No CMCs</th>

			</tr>
		</thead>
		<tbody>
		<?php

			foreach ($cmc as $_cmc) {?>
				<tr>
					<td><?php echo $_cmc['core_management']?></td>
					<td><?php echo $_cmc['process_competencies']?></td>
					<td><?php echo $_cmc['dev_required_pcs']?></td>
					<td><?php echo $_cmc['dev_required_cmcs']?></td>
				</tr>

		<?php } ?>


		</tbody>
	</table>

</div>

<br />

<br>

