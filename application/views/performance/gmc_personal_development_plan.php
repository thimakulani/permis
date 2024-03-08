<div class="card-body p-0">
	<div class="table-responsive">
		<table class="table table-striped projects">
			<thead>
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
			</tr>
			</thead>
			<tbody>

			<?php

			foreach ($gmcWorkplan as $gmcWork) {
				echo '
								<tr>
									<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['CoreManagementCompetencies'] . '" /></td>
									<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['ProcessCompetencies'] . '" /></td>
									<td><input class="form-control-sm" disabled  type="text" value="' . $gmcWork['DevRequired'] . '" /></td>
								
								<td>
										
									<a class="btn-sm btn-danger" href="' . base_url() . 'performance/remove_gmc_Plan/5/' . $gmcWork['GMCPlanId'] . '">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="' . base_url() . 'performance/edit/5/' . $gmcWork['GMCPlanId'] . '">Edit</a>
									</td>
									
								</tr>
								';
			}

			echo '
							
							<form method="post" action="' . base_url() . 'performance/gmc_performance_plan/5">
								<tr>
									<td><input class="form-control" name="core_management_competencies" required  type="text" /></td>
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



