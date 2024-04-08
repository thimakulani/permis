<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture" >BACK</a>
</div>

<div style="text-align: center;">
	<h4>
		ANNUAL PERFORMANCE ASSESSMENT TEMPLATE FOR DEPUTY DIRECTOR-GENERAL
	</h4>
</div>
<div class="table-responsive">
	<table class="table table-sm">
		<thead style="background-color: #fbd4b4">
		<tr>
			<th>
				NAME OF THE SMS MEMBER
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>
				JOB TITLE
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
		</tr>
		<tr>
			<th>
				PERSAL NUMBER
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>
				PERFORMANCE CYCLE
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
		</tr>
		<tr>
			<th>
				NAME OF THE SUPERVISOR
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>
				PERIOD UNDER REVIEW
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
		</tr>
		<tr>
			<th>
				NAME OF DEPARTMENT
			</th>
			<th>
				<input type="text" class="form-control-sm" />
			</th>
			<th>

			</th>
			<th>

			</th>
		</tr>
		<tr>
			<th>
				PROVINCE (IF APPLICABLE)
			</th>
			<th>
				<input type="text" class="form-control-sm" />
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

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php foreach ($kra as $_kra){ ?>

	<div class="card">
		<h4 class="card-header">
			KRA: <?php echo $_kra['name']; ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #fbd4b4">
				<tr>
					<th>ACTIVITIES</th>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th>SUPERVISOR RATING</th>
					<th>AGREED RATING</th>
					<th>MODERATED  RATING</th>
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				//$emp_perf = array();
				foreach ($work_plan as $work)
				{
					if($work['kra_id'] == $_kra['id'])
					{
					?>

						<form method="post" action="<?php echo base_url() ?>performance/update_annual_moderated_work_plan/<?php echo $work['id'] ?>/300">
							<tr>
								<th> <input class="form-control" disabled value="<?php echo $work['key_activities']; ?>" /> </th>
								<th> <input class="form-control" disabled value="<?php echo $work['indicator_target']; ?>" /> </th>
								<th> <input class="form-control" disabled value="<?php echo $work['actual_achievement']; ?>" /> </th>
								<th> <input class="form-control" disabled value="<?php echo $work['sms_rating']; ?>" /> </th>
								<th> <input class="form-control" disabled value="<?php echo $work['supervisor_rating']; ?>" /> </th>
								<th> <input class="form-control" disabled value="<?php echo $work['agreed_rating']; ?>" /> </th>
								<th> <input class="form-control" type="number" name="moderated_rating" value="<?php echo $work['moderated_rating']; ?>" /> </th>
								<th> <input type="submit" class="btn-sm btn-info" value="Update" /></th>
							</tr>
						</form>

				<?php
					}
				} ?>
				</tbody>
			</table>
		</div>
	</div>

<?php } ?>
<br />

<form class="card" method="post" action="<?php echo base_url() ?>performance/add_auditor_general_opinion_and_findings/300">
	<h4 class="card-header">AUDITOR GENERAL OPINION AND FINDINGS AND ORGANISATIONAL PERFORMANCE</h4>
	<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
	<div class="row card-body">
		<div class="col table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2">
							AUDITORS GENERAL OPINION AND FINDINGS
						</th>
					</tr>

				</thead>
				<tbody>
					<tr>
						<td>AG Weighting <input class="form-control" required type="number" value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->ag_weight ?>" name="ag_weight" ></td>
						<td>AG assessment score (rating 0-3) <input required min="1" max="3" value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->ag_assessment_score ?>" name="ag_assessment_score" class="form-control" type="number"> </td>
					</tr>
					<tr>
						<td>Weighted Score/rating</td>
						<td><input class="form-control" value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->ag_weight/$auditor_general_opinion_and_findings->ag_assessment_score; ?>" type="number"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2">
							ORGANISATIONAL PERFORMANCE (APP TARGET)
						</th>
					</tr>

				</thead>
				<tbody>
					<tr>
						<td>APP Weighting <input required value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->app_weight ?>" name="app_weight" class="form-control" type="number"></td>
						<td>
							Number of Planned Targets <input required value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->num_planned_targets ?>" name="num_planned_targets" class="form-control" type="number">
							Targets Achieved <input required value="<?php if(isset($auditor_general_opinion_and_findings)) echo $auditor_general_opinion_and_findings->targets_achieved ?>" name="targets_achieved" class="form-control" type="number">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer">
		<?php if(!isset($auditor_general_opinion_and_findings)) { ?>
			<input type="submit" class="btn-sm btn-success" value="Save">
		<?php } ?>
	</div>
</form>

<br />
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_ddg_ann/300">
	<br/>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the DDG on his/her performance
				</label>
				<textarea class="form-control" name="emp_comment" ></textarea>

			</div>
			<br />

			<div class="form-group">
				<label>
					Comment by the Head of Department
				</label>
				<textarea class="form-control" name="sup_comment" ></textarea>

			</div>
			<br />
		</div>
		<input type="hidden" name="template_name" value="ANNUAL ASSESSMENT">
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
