<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture">BACK</a>
</div>

<div style="text-align: center;"><h2>HOD MID-CYCLE PERFORMANCE REVIEW TEMPLATE</h2></div>


<div class="alert alert-info">
<dl class="row">
	<dt class="col-sm-2">
		SMS MEMBER'S NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Name . ' ' . $emp->LastName; ?>
	</dd>

	<dt class="col-sm-2">
		PERSAL NUMBER
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->Persal ?>
	</dd>

	<dt class="col-sm-2">
		SUPERVISOR'S NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->S_Name ?>
	</dd>

	<dt class="col-sm-2">
		BRANCH NAME
	</dt>
	<dd class="col-sm-10">
		<?php echo $emp->b_name ?>
	</dd>

	<dt class="col-sm-2">
		PROVINCE (IF APPLICABLE)
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



<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php

	$kra_counter = 1;
	foreach ($kra as $_kra)
	{ ?>
		<div class="card">
			<h4 class="card-header">
				KRA NO <?php echo $kra_counter; ?> : <?php echo $_kra['name']?>
			</h4>
			<div class="table table-responsive table-sm">
				<table class="table table-striped projects">
					<thead style="background-color: #C1D59AFF">
					<tr>
						<th>ACTIVITIES</th>
						<th>INDICATOR/TARGET</th>
						<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
						<th>SMS RATING</th>
						<th>SUPERVISOR RATING</th>
						<th>AGREED RATING</th>
						<th></th>
						<th></th>
					</tr>
					</thead>
					<tbody>

					<?php
					$kra_counter++;
					foreach ($work_plan as $work)
					{
						if($_kra['id'] === $work['kra_id']) {?>
							<form enctype="multipart/form-data"
								  action="<?php echo base_url(); ?>performance/update_work_plan/<?php echo $work['id'];?>/400" method="post">
								<tr>
									<th> <input class="form-control" type="text" disabled value="<?php echo $work['key_activities'] ?>" /> </th>
									<th> <input class="form-control" type="text" disabled value="<?php echo $work['indicator_target'] ?>" /></th>
									<th> <input class="form-control" type="text" name="actual_achievement" value="<?php echo $work['actual_achievement'] ?>" /></th>
									<th> <input class="form-control" type="number" name="sms_rating" min="1" max="4" value="<?php echo $work['sms_rating'] ?>" /></th>
									<th> <input class="form-control" type="text" disabled value="<?php echo $work['supervisor_rating'] ?>" /></th>
									<th> <input class="form-control" type="text" disabled value="<?php echo $work['agreed_rating'] ?>" /></th>
									<th> </th>
									<th> <input type="submit" class="btn-sm btn-success"  <?php if(isset($work['actual_achievement']) && isset($work['sms_rating'])){echo 'disabled';} ?>  value="Update"> </th>
								</tr>
							</form>

						<?php } ?>
					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>

<?php } ?>


<div class="card">
	<div class="card-header">
		Please review and indicate the status or progress on the government priorities to establish if it progress according to plan and whether by the end of the performance cycle it will be achieved by indicating with a "Yes or No".
	</div>
	<?php
	$kgfa_counter = 1;
	foreach ($kgfa as $_kgfa) { ?>
		<div>
			<h5 style="margin: 10px">KEY GOVERNMENT FOCUS AREAS NO <?php echo $kgfa_counter; ?>: <?php echo $_kgfa['name']; ?> </h5>
		</div>
		<div class="table-responsive">
		<table class="table table-striped">
			<thead style="background-color: #C1D59AFF">
			<tr>
				<th>KEY FOCUS AREA ACTIVITIES / OUTPUTS</th>
				<th>INDICATOR / TARGET</th>
				<th>PROGRESS(YES/NO)</th>
				<th>PROGRESS REVIEW COMMENT</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($key_government_focus_areas as $kg) { ?>
				<?php if($kg['kgfa_id'] == $_kgfa['id']) { ?>
					<form method="post" action="<?php echo base_url();?>performance/update_key_government_focus_areas/<?php echo $kg['id']?>/400">
						<input value="MID YEAR ASSESSMENT" name="template_name" type="hidden">
						<tr>
							<td> <input type="text" disabled value="<?php echo $kg['key_focus_area_activities_outputs']?>" class="form-control"  /> </td>
							<td> <input type="text" disabled value="<?php echo $kg['indicator_target']?>" name="indicator_target" class="form-control"   /> </td>
							<td>

								<select name="progress" class="form-control">
									<option <?php if($kg['progress'] == 'YES') { echo 'selected';} ?> value="YES">YES</option>
									<option <?php if($kg['progress'] == 'YES') { echo 'NO';} ?> value="NO">NO</option>
								</select>
							</td>
							<td> <input type="text" value="<?php echo $kg['progress_review_comment']?>" name="progress_review_comment" class="form-control"  /> </td>
							<td>  <input type="submit" required <?php if(isset($kg['progress_review_comment']) && isset($kg['progress'])){echo 'disabled';} ?> value="Update" class="btn-sm btn-info" /> </td>
						</tr>
					</form>
					<?php }?>
			<?php } ?>




		</table>
	</div>
		<br />


<?php } ?>
</div>
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
				<th>Yes/No PCs</th>
				<th>Yes/No CMCs</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php

			foreach ($cmc as $_cmc) {?>
				<tr>
					<td><input value="<?php echo $_cmc['core_management']?>" class="form-control"/></td>
					<td><input value="<?php echo $_cmc['process_competencies']?>" class="form-control"/></td>
					<td><input value="<?php echo $_cmc['dev_required_pcs']?>" class="form-control"/></td>
					<td><input value="<?php echo $_cmc['dev_required_cmcs']?>" class="form-control"/></td>
					<td><a class="btn-sm btn-danger" href="<?php echo base_url();?>performance/remove_generic_management_competencies/400/<?php echo $_cmc['id']?>">REMOVE</a></td>
				</tr>

		<?php } ?>
		<form method="post" action="<?php echo base_url()?>performance/add_generic_management_competencies/400">
			<input value="MID YEAR ASSESSMENT" name="template_name" type="hidden">
			<tr>
				<td><input type="text" name="core_management" class="form-control"/></td>
				<td><input type="text" name="process_competencies" class="form-control"/></td>
				<td>
					<select name="dev_required_pcs" class="form-control">
						<option>YES</option>
						<option>NO</option>
					</select>
				</td>
				<td>
					<select name="dev_required_cmcs" class="form-control">
						<option>YES</option>
						<option>NO</option>
					</select>
				</td>
				<td><input type="submit" required value="ADD" class="btn-sm btn-info" /></td>
			</tr>
		</form>

		</tbody>
	</table>

</div>

<br />
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_mid_hod/400">


	<br/>
	<div class="card">


		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the HOD/DG on his/her performance
				</label>
				<textarea class="form-control" ></textarea>

			</div>
			<br />

			<div class="form-group">
				<label>
					Comment by the Executive Authority
				</label>
				<textarea disabled class="form-control" ></textarea>

			</div>
			<br />
		</div>
		<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<br>
