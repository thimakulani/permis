<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/performance_capture" >BACK</a>
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

<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php for ($i = 1; $i < 6; $i++) { ?>

	<div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $i; ?>
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
					<th></th>
				</tr>
				</thead>
				<tbody>

				<?php
				//$emp_perf = array();
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

<!-- UNTIL HERE -->


<div class="card">
	<h4 class="card-header">
		ORGANISATIONAL PERFORMANCE
	</h4>
	<div class="table table-responsive">
		<table class="table table-striped projects">
			<thead style="background-color: #fbd4b4"
			">
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
			$emp_perf = array();
			foreach ($emp_perf as $perf) { ?>

				<tr>
					<th></th>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th></th>
				</tr>

			<?php } ?>
			<form enctype="multipart/form-data" action="<?php // echo base_url();?>" method="post">
				<tr>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="submit" value="ADD" class="btn-sm btn-info"/>
					</td>
				</tr>
			</form>
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
			foreach ($emp_perf as $perf) { ?>

				<tr>
					<th>TARGET</th>
					<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
					<th>SMS RATING</th>
					<th></th>
				</tr>

			<?php } ?>
			<form enctype="multipart/form-data" action="<?php // echo base_url();?>" method="post">
				<tr>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>

					<td>
						<input type="submit" value="ADD" class="btn-sm btn-info"/>
					</td>
				</tr>
			</form>
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
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir_mid_ddg/100">


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
