
	<div class="card">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead>
					<tr>
						<th>
							KEY RESULT AREAS

						</th>
						<th>
							KEY ACTIVITIES
						</th>
						<th class="text-center">
							WEIGHT
						</th>
						<th>
							TARGET DATE
						</th>

						<th>
							INDICATOR/TARGET
						</th>
						<th>
							RESOURCE REQUIRED
						</th>
						<th>
							ENABLING CONDITION
						</th>
						<th class="text-center">
							TOTAL WEIGHT FOR KRA
						</th>
					</tr>
					</thead>
					<tbody>
					<!-- To Retrieve Database information -->

					<?php
					foreach ($workplan as $work)
					{
						echo '
								<tr>
								<td><input class="form-control" disabled  type="text" value="'.$work['keyResultArea'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['KeyActivities'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['Weight'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['TargetDate'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['Indicator'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['ResourceReq'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['EnablingCondition'].'" /></td>
								<td><input class="form-control" disabled  type="text" value="'.$work['TotalKra'].'" /></td>

								<td>
										
									<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_workPlan/3/'.$work['WorkplanId'].'">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/3/'.$work['WorkplanId'].'">Edit</a>
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
							<form method="post" action="'.base_url().'performance/workplan/3">
								<tr>
									<td><input class="form-control" name="key_result_area" required  type="text-area" /></td>
									<td><input class="form-control" name="key_activities" type="text" required /></td>
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
										</select>
									</td>
									<td><input class="form-control" name="target_date" required  type="date" /></td>
									<td><input class="form-control" name="indicator" required type="text" /></td>
									<td><input class="form-control" name="resource_required" required type="text" /></td>
									<td><input class="form-control" name="enabling_condition" type="text" required /></td>
									<td><input class="form-control" name="total_kra" required  type="text" /></td>
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
