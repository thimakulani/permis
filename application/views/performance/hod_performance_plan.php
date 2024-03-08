
	<div class="card">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead>
					<th>EMPLOYEE PERFORMANCE</th>
					<tr>
						<th>
							KEY RESULT AREA

						</th>

						<th>
							WEIGHT
						</th>
						<th>
							TOTAL WEIGHT
							OF
							KRA
						</th>
						<th></th>

					</tr>
					</thead>
					<tbody>

					<?php
					foreach ($empWorkplan as $empWork)
					{
						echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="'.$empWork['EmpKeyResultArea'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$empWork['EmpWeight'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$empWork['EmpTotalKRA'].'" /></td>
									
									<td>
											
										<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_employee_Plan/4/'.$empWork['EmpPlanId'].'">Remove</a>
										
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/4/'.$empWork['EmpPlanId'].'">Edit</a>
									</td>
								</tr>
								';
					}
					$data = '';
					for ($i = 10; $i <=100; $i=$i +10)
					{
						$data .='<option value="'.$i.'">'.$i.'%</option>';
					}

					echo '
							<form method="post" action="'.base_url().'performance/employee_performance_plan/4">
								<tr>
									<td><input class="form-control" name="key_result_area" required  type="text" /></td>
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
										</select>
									</td>
									<td><input class="form-control" name="total_hod_kra" required type="text" /></td>
									
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
					?>


					</tbody>

				</table>
			</div>
		</div>
	</div>
	<!-- /.box-body -->
	<br>
	<div class="card">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead>
					<th>KEY GOVERNMENT FOCUS AREAS</th>
					<tr>
						<th>
							KEY RESULT AREA

						</th>

						<th>
							WEIGHT
						</th>
						<th>
							TOTAL WEIGHT
							OF
							KRA
						</th>
						<th></th>

					</tr>
					</thead>
					<tbody>

					<?php
					foreach ($govWorkplan as $govWork)
					{
						echo '
								   <tr>
									   <td><input class="form-control" disabled  type="text" value="'.$govWork['GovKeyResultArea'].'" /></td>
									   <td><input class="form-control" disabled  type="text" value="'.$govWork['GovWeight'].'" /></td>
									   <td><input class="form-control" disabled  type="text" value="'.$govWork['GovTotalKRA'].'" /></td>
									   
									   <td>
										   <a class="btn-sm btn-danger" href="'.base_url().'performance/remove_government_Plan/4/'.$govWork['GovPlanId'].'">Remove</a>
										   <a class="btn-sm btn-info" href="'.base_url().'performance/edit/4/'.$govWork['GovPlanId'].'">Edit</a>
									   </td>
								  </tr>
								  ';
					}
					$data = '';
					for ($i = 10; $i <=100; $i=$i +10)
					{
						$data .='<option value="'.$i.'">'.$i.'%</option>';
					}

					echo '
							<form method="post" action="'.base_url().'performance/government_performance_plan/4">
								    <tr>
										<td><input class="form-control" name="key_result_area" required  type="text" /></td>
										<td>
											<select name="weight" class="form-control select">
												'.$data.'
											</select>
										</td>
										<td><input class="form-control" name="total_hod_kra" required type="text" /></td>
									
										<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								    </tr>
							</form>				
						           ';
					?>


					</tbody>

				</table>
			</div>
		</div>
	</div>


	<!-- /.box-body -->


	<div class="card">
		<div class="card-body p-0">

			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead>
					<th>AUDITOR GENERAL</th>
					<tr>
						<th>
							KEY RESULT AREA

						</th>

						<th class="text-center">
							WEIGHT
						</th>
						<th class="text-center">
							TOTAL WEIGHT
							OF
							KRA
						</th>
						<th></th>
					</tr>
					</thead>
					<tbody>

					<?php
					foreach ($audWorkplan as $audWork)
					{
						echo '
								<tr>

								<td><input class="form-control" disabled  type="text" value="'.$audWork['AudKeyResultArea'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$audWork['AudWeight'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$audWork['AudTotalKRA'].'" /></td>
								
								<td>
										
									<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_auditor_Plan/4/'.$audWork['AudGenPlanId'].'">Remove</a>
									
									<a class="btn-sm btn-info" href="'.base_url().'performance/edit/4/'.$audWork['AudGenPlanId'].'">Edit</a>
								</td>
									
								</tr>
								';
					}
					$data = '';
					for ($i = 10; $i <=100; $i=$i +10)
					{
						$data .='<option value="'.$i.'">'.$i.'%</option>';
					}

					echo '
							<form method="post" action="'.base_url().'performance/auditor_performance_plan/4">
								<tr>
									<td><input class="form-control" name="key_result_area" required  type="text" /></td>
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
										</select>
									</td>
									<td><input class="form-control" name="total_hod_kra" required type="text" /></td>
									
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
					?>


					</tbody>

				</table>
			</div>
		</div>
	</div>


	<!-- /.box-body -->


	<div class="card">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead>
					<th>ORGANIZATIONAL PERFORMANCE</th>
					<tr>
						<th>
							KEY RESULT AREA

						</th>

						<th class="text-center">
							WEIGHT
						</th>
						<th class="text-center">
							TOTAL WEIGHT
							OF
							KRA
						</th>
						<th></th>
					</tr>

					</thead>
					<tbody>

					<?php
					foreach ($orgWorkplan as $orgWork)
					{
						echo '
								<tr>

								<td><input class="form-control" disabled  type="text" value="'.$orgWork['OrgKeyResultArea'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$orgWork['OrgWeight'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$orgWork['OrgTotalKRA'].'" /></td>
								
								<td>
										
									<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_organization_Plan/4/'.$orgWork['OrgPlanId'].'">Remove</a>
									<a class="btn-sm btn-info" href="'.base_url().'performance/edit/4/'.$orgWork['OrgPlanId'].'">Edit</a>
									</td>
									
									
								</tr>
								';
					}
					$data = '';
					for ($i = 10; $i <=100; $i=$i +10)
					{
						$data .='<option value="'.$i.'">'.$i.'%</option>';
					}

					echo '
							<form method="post" action="'.base_url().'performance/organization_performance_plan/4">
								<tr>
									<td><input class="form-control" name="key_result_area" required  type="text" /></td>
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
										</select>
									</td>
									<td><input class="form-control" name="total_hod_kra" required type="text" /></td>
									
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
					?>


					</tbody>

				</table>
			</div>
		</div>
	</div>

