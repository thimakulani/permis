<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/permis_official_submissions" >BACK</a>
</div>
<div style="text-align: center;">
	<h2>DDG’s MID-YEAR PERFORMANCE ASSESSMENT TEMPLATE</h2>
</div>
<div class="table-responsive">
	<table class="table table-sm">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>
				Name of the SMS member
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>
				Job title
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
		</tr>
		<tr>
			<th>
				Persal Number
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>
				Performance cycle
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of the Supervisor
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>
				Period under review
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
		</tr>
		<tr>
			<th>
				Name of Department
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>

			</th>
			<th>

			</th>
		</tr>
		<tr>
			<th>
				Province (if applicable)
			</th>
			<th>
				<input type="text" class="form-control-sm"/>
			</th>
			<th>

			</th>
			<th>

			</th>
		</tr>
		</thead>
	</table>
</div>


<!-- COPY FROM HERE -->
<br />
<div class="h">
	<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
</div>
<?php
$kra_counter = 1;
foreach ($kra as $_kra) { ?>
	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $kra_counter; ?> : <?php echo $_kra['name']?>
		</h4>
		<div class="table table-responsive table-sm card-body">
			<table class="table table-striped projects">
				<thead style="background-color: #C1D59AFF">
				<tr>
					<th>ACTIVITIES</th>
					<th>INDICATOR/TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
				</tr>
				</thead>
				<tbody>

				<?php
				$kra_counter++;
				foreach ($work_plan as $work)
				{
					if($_kra['id'] === $work['kra_id']) {?>
						<!--<form enctype="multipart/form-data"
							  action="<?php /*echo base_url(); */?>performance/update_sup_work_plan/<?php /*echo $work['id']; */?>/<?php /*echo $data->id; */?>/<?php /*echo $data->emp_id; */?>" method="post">-->
						<tr>
							<th> <?php echo $work['key_activities'] ?></th>
							<th> <?php echo $work['indicator_target'] ?></th>
							<th> <?php echo $work['actual_achievement'] ?></th>
							<th><input class="form-control" type="number" disabled name="sms_rating" min="1" max="4"
									   value="<?php echo $work['sms_rating'] ?>"/></th>
							<th><input disabled class="form-control" type="number" min="1" max="4" name="supervisor_rating"
									   value="<?php echo $work['supervisor_rating'] ?>"/></th>
							<th><input disabled class="form-control" type="number" min="1" max="4" name="agreed_rating"
									   value="<?php echo $work['agreed_rating'] ?>"/></th>

						</tr>
						<!--</form>-->

					<?php } ?>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>

<?php } ?>

<!-- UNTIL HERE -->


<div class="card">
	<h4 class="card-header">
		ORGANISATIONAL PERFORMANCE
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4">

			<tr>
				<th>TARGETED OBJECTIVES/ OUTPUTS</th>
				<th>PERFORMANCE MEASURES
					TARGET
				</th>
				<th>PROGRESS
					YES/
					NO
				</th>
				<th>PROGRESS REVIEW COMMENT</th>
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($organisational_performance as $perf) { ?>
				<tr>
					<th> <?php echo $perf['targeted_objectives']; ?> </th>
					<th> <?php echo $perf['performance_measures_target']; ?></th>
					<th> <?php echo $perf['progress']; ?></th>
					<th> <<?php echo $perf['progress_review_comment']; ?></th>
				</tr>

			<?php } ?>

			</tbody>
		</table>
	</div>
</div>
<div class="card">
	<h4 class="card-header">
		COMPETENCIES: PERSONAL DEVELOPMENT PLAN
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4"
			">
			<tr>
				<th>CORE MANAGEMENT COMPETENCIES</th>
				<th>PROCESS COMPETENCIES
				</th>
				<th>OTHER DEVELOPMENTAL AREAS IDENTIFIED
				</th>

				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php
			$emp_perf = array();
			foreach ($personal_development_plan as $perf) { ?>

				<tr>
					<th><?php echo $perf['core_management_competencies'] ?></th>
					<th><?php echo $perf['process_competencies'] ?></th>
					<th><?php echo $perf['other_developmental_areas_identified'] ?></th>
				</tr>

			<?php } ?>


			</tbody>
		</table>
	</div>
</div>
<div>


	<div class="form-group">
		<label for="exampleFormControlTextarea1">Comment by the SMS member on his/her performance</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Comment by the Supervisor</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
</div>
<br />


<br>
