<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance" >BACK</a>
</div>

<div style="text-align: center;"><h2>HOD MID-CYCLE PERFORMANCE REVIEW TEMPLATE</h2></div>


<div>
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


<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php for ($i = 1; $i < 6; $i++) { ?>

	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $i; ?>
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
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				$emp_perf = array();
				foreach ($emp_perf as $kra_data) { ?>
					<?php
					$kra_no = 'KRA NO '.$i;
					if($kra_no === $kra_data['kra_no']) {?>
						<tr>
							<th> <input type="text" disabled value="<?php echo $kra_data['activities'] ?>" /> </th>
							<th> <input type="text" disabled value="<?php echo $kra_data['target'] ?>" /></th>
							<th> <input type="text" disabled value="<?php echo $kra_data['achievement'] ?>" /></th>
							<th> <input type="text" disabled value="<?php echo $kra_data['sms_rating'] ?>" /></th>
							<th> <input type="text" disabled value="<?php echo $kra_data['supervisor_rating'] ?>" /></th>
							<th> <input type="text" disabled value="<?php echo $kra_data['agree_rating'] ?>" /></th>
							<th> </th>
						</tr>

					<?php } ?>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>

<?php } ?>




	<?php
		$heading = array('Develop and implement an effective and efficient supply chain',
						'Diversity and Transformation',
						'Integrated governance',
						'International and Regional integration',
						'Implementation of the Minimum Information Security Standard (MISS)',
						);
	?>
<?php for ($i = 0; $i < 5; $i++) { ?>
<div class="card">

		<div class="card-header">
			<h4>KEY GOVERNMENT FOCUS AREAS NO <?php echo $i+1; ?>: <?php echo $heading[$i]; ?> </h4>
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
			$kfano = $i+1;
			foreach ($kgfa as $kg)
			{

				if($kg['key_government_focus_areas_no'] == $kfano)
				{
				?>

				<tr>
					<td><input class="form-control" type="text" disabled value="<?php echo $kg['key_focus_area_activities_outputs'] ?>" /></td>
					<td><input class="form-control" type="text" disabled value="<?php echo $kg['indicator_target'] ?>" /></td>
					<td><input class="form-control" type="text" disabled value="<?php echo $kg['progress'] ?>" /></td>
					<td><input class="form-control" type="text" disabled value="<?php echo $kg['progress_review_comment'] ?>" /></td>
				</tr>
			<?php }
			} ?>



		</table>
	</div>
		<br />

</div>
<?php } ?>

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
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach ($cmc as $_cmc) {?>
				<tr>
					<td><input disabled value="<?php echo $_cmc['core_management']?>" class="form-control"/></td>
					<td><input disabled value="<?php echo $_cmc['process_competencies']?>" class="form-control"/></td>
					<td><input disabled value="<?php echo $_cmc['dev_required_pcs']?>" class="form-control"/></td>
					<td><input disabled value="<?php echo $_cmc['dev_required_cmcs']?>" class="form-control"/></td>


					<td></td>
				</tr>

		<?php } ?>


		</tbody>
	</table>

</div>

<br />
<div class="card">
	<div class="card-body">
		<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/sup_update_status/<?php echo $submission_id; ?>">
			<select name="action_option" id="action" onchange="optionChange()" class="form-control">
				<option class="form-control select" value="APPROVED" >APPROVE</option>
				<option value="REJECTED" >REJECT</option>
			</select>
			<input type="submit" class="btn-sm btn-primary m-2" />
			<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
		</form>
	</div>
</div>


<script>
	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVE')
		{
			document.getElementById("comment").style = "display:none";

		}
		if(e.value === 'REJECT')
		{
			document.getElementById("comment").style = "display:block";

		}
	}


</script>
<br>

