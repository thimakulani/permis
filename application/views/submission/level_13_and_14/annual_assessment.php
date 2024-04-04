<h4>EMPLOYEE PERFORMANCE: KEY RESULT AREAS (KRAs)</h4>
<?php for ($i = 1; $i<6;$i++){
	?>   <div class="card">
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
					<th>MODERATED RATING</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php
				$emp_perf = array();
				foreach ($emp_perf as $mid) {?>

					<tr>
						<td> ACTIVITIES</td>
						<td>TARGET</td>
						<td>ACTUAL ACHIEVEMENT/EVIDENCE</td>
						<td>SMS RATING</td>
						<td>SUPERVISOR RATING</td>
						<td>AGREED RATING</td>
						<td>MODERATED RATING</td>
						<td></td>
						<td>ACTION</td>
						<td>
						<a class="btn-sm btn-danger" href="<?php echo base_url()?>performance/remove_dir_mou/9/'.$m['DirectorMouIndividualId'].'">REMOVE</a>
						</td>
						<td>
							<a class="btn-sm btn-info" href="<?php echo base_url()?>performance/edit/9/'.$m['DirectorMouIndividualId'].'">EDIT</a>
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
						<td><input type="text" name="moderated_rating" class="form-control"></td>
						<td><input type="submit" value="ADD" class="btn-sm btn-info" /></td>
					</tr>
				</form>
				</tbody>
			</table>
		</div>
	</div>








<?php } ?>
<div class="card">
	<div class="card-header">
		<h4>COMPETENCIES: PERSONAL DEVELOPMENT PLAN</h4>
	</div>

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
				<th></th>

			</tr>
			</thead>
			<tbody>

			<?php
			echo '
							
							<form method="post" action="' . base_url() . 'performance/gmc_performance_plan/5">
								<tr>
									<td><input class="form-control" name="core_management" required  type="text" /></td>
									<td><input class="form-control" name="process_competencies" required  type="text" /></td>
									<td>
										<select name="devRequired" class="form-control select">
										<option value="YES">YES</option>	
										<option value="NO">NO</option>
										</select>
									</td>
									
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
			?>


			</tbody>

		</table>
</div>
</div>
<?php ?>
<form method="post" action="<?php echo base_url() ?>performance/submit_performance_dir_ann/11">


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
