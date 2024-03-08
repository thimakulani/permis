<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php for ($i = 1; $i<6;$i++){
	?>   <div class="card">
		<h4 class="card-header">
			KRA NO <?php echo $i; ?>
		</h4>
		<div class="table table-responsive table-sm">
			<table class="table table-striped projects">
				<thead style="background-color: #c1d59a">
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
				foreach ($emp_perf as $mid) {?>

					<tr>
						<th> ACTIVITIES</th>
						<th>TARGET</th>
						<th>ACTUAL ACHIEVEMENT/EVIDENCE</th>
						<th>SMS RATING</th>
						<th>SUPERVISOR RATING</th>
						<th>AGREED RATING</th>
						<th>ACTION</th>



						<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_dir_mou/10/'.$m['id'].'">REMOVE</a>
						</td>
						<td>
							<a class="btn-sm btn-info" href="'.base_url().'performance/edit/10/'.$m['id'].'">EDIT</a>
						</td>
					</tr>
				<?php } ?>
				<form enctype="multipart/form-data" action="<?php echo base_url();?>performance/add_kra/<?php echo $i;?>" method="post">
					<tr>
						<td><input type="text" name="activities"  class="form-control"></td>
						<td><input type="text" name="target" class="form-control"></td>
						<td><input type="text" name="achievement" class="form-control"></td>
						<td><input type="text" name="sms_rating" class="form-control"></td>
						<td><input type="text" name="supervisor_rating" class="form-control"></td>
						<td><input type="text" name="agreed_rating" class="form-control"></td>
						<td><input type="submit" value="ADD" class="btn-sm btn-info" /></td>
					</tr>
				</form>
				</tbody>
			</table>
		</div>
	</div>



	<br>

<?php } ?>

<?php ?>
<div class="card">
	<div class="card-header">
		<h5>COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h5>
	</div>

<div class="card-body table-responsive">

		<table class="table table-striped projects">
			<thead style="background-color: #c1d59a">
			<tr>
				<th>
					CORE MANAGEMENT COMPETENCIES(CMCs)

				</th>
				<th>
					PROCESS COMPETENCIES(PCs)
				</th>
				<th>
					DEV REQUIRED(CMCs)
				</th>
				<th>
					DEV REQUIRED(PCs)
				</th>
				<th></th>
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($mou as $gmcWork) {
				echo '
							<tr>
								<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['CoreManagement'] . '" /></td>
								<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['ProcessCompetencies'] . '" /></td>
								<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['CmcDevReq'] . '" /></td>
								<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['PcDevReq'] . '" /></td>


							<td>

								<a class="btn-sm btn-danger" href="' . base_url() . 'performance/remove_gmc_Plan/10/' . $gmcWork['DirectorGmcId'] . '">REMOVE</a>
								</td>
								<td>
									<a class="btn-sm btn-info" href="' . base_url() . 'performance/edit/10/' . $gmcWork['DirectorGmcId'] . '">EDIT</a>
								</td>

							</tr>
							';
			}

			echo '
							
							<form method="post" action="' . base_url() . 'performance/gmc_performance_plan/10">
								<tr>
									<td><input class="form-control" name="core_management_competencies" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="CmcdevRequired" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td>
										<select name="PcdevRequired" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									<td><input class="btn-sm btn-info" type="submit" value="ADD"/></td>
								</tr>
							</form>				
						';
			?>


			</tbody>

		</table>

</div>
</div>
<br/>
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir_mid/10">


	<br/>
	<div class="card">


		<div class="card-body">
			<div class="form-group">
				<label>
					Comment by the SMS member  on his/her performance
				</label>
				<textarea class="form-control" ></textarea>

			</div>
			<br />

			<div class="form-group">
				<label>
					Comment by the Supervisor
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
