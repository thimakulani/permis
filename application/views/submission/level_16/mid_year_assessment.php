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
			<th>

			</th>
			<th>

			</th>
		</tr>

		</thead>
	</table>
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
				<form enctype="multipart/form-data"
					  action="<?php echo base_url(); ?>performance/add_kra/<?php echo $i; ?>" method="post">
					<tr>
						<td>
							<input type="text" required name="activities" class="form-control">
						</td>
						<td>
							<input type="text" required name="target" class="form-control">
						</td>
						<td>
							<input type="text" required name="achievement" class="form-control">
						</td>
						<td>
							<input type="number" required name="sms_rating" class="form-control">
						</td>
						<td>
							<input type="number" required name="supervisor_rating" class="form-control">
						</td>
						<td>
							<input type="number" required name="agreed_rating" class="form-control">
						</td>
						<td>
							<input type="submit" required value="ADD" class="btn-sm btn-info"/>
						</td>
					</tr>
				</form>
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
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$kgfa = array();
			foreach ($kgfa as $kg) { ?>

				<tr>
					<td><input type="text" disabled value="<?php //echo $kra_data['activities'] ?>" /></td>
					<td><input type="text" disabled value="<?php //echo $kra_data['activities'] ?>" /></td>
					<td><input type="text" disabled value="<?php //echo $kra_data['activities'] ?>" /></td>
					<td><input type="text" disabled value="<?php //echo $kra_data['activities'] ?>" /></td>
					<td></td>
				</tr>
			<?php } ?>
			<form method="post" action="#">
				<tr>
					<td> <input type="text" class="form-control"  /> </td>
					<td> <input type="text" class="form-control"   /> </td>
					<td> <input type="text" class="form-control"   /> </td>
					<td> <input type="text" class="form-control"  /> </td>
					<td> <input type="submit" required value="ADD" class="btn-sm btn-info" /> </td>
				</tr>
			</form>


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
			$cmc = array();
			foreach ($cmc as $_cmc) {?>
				<tr>
					<td><input type="text" class="form-control"/></td>
					<td><input type="text" class="form-control"/></td>
					<td><input type="text" class="form-control"/></td>
					<td><input type="text" class="form-control"/></td>


					<td></td>
				</tr>

		<?php } ?>
		<form>
			<tr>
				<td><input type="text" class="form-control"/></td>
				<td><input type="text" class="form-control"/></td>
				<td>
					<select class="form-control">
						<option>YES</option>
						<option>NO</option>
					</select>
				</td>
				<td>
					<select class="form-control">
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
				<textarea class="form-control" ></textarea>

			</div>
			<br />
		</div>
		<div class="card-footer">
			<input type="submit" class="btn btn-info" value="SUBMIT TO SUPERVISOR"/>
		</div>

	</div>
</form>
<br>

