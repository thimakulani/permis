
	<div class="card">
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-striped projects">
					<thead>
					<tr>
						<th>
							DEVELOPMENT REQUIRE
						</th>
						<th>
							TYPE OF TRAINING
						</th>
						<th>
							REASON
						</th>
						<th>
							IMPROVE PERFORMANCE
						</th>
						<th>
							CAREER DEVELOPMENT
						</th>
						<th class="text-center">
							TIMEFRAME
						</th>
						<th>
							JOBHOLDER COMPETENCY
						</th>
						<th>
							PROGRESS
						</th>
					</tr>
					</thead>
					<tbody>

					<?php

					foreach ($performance_plan as $perf)
					{
						echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="'.$perf['DevelopmentRequired'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['TrainingType'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['reason'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['ImprovePerformance'].'" /></td>
									<td><input class="form-control" disabled  type="text"  value="'.$perf['CareerDev'].'" /></td>
									<td><input class="form-control" disabled type="text" value="'.$perf['Timeframe'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['JobHolderCompetency'].'" /></td>
									<td><input class="form-control" disabled type="text" value="'.$perf['Progress'].'" /></td>


									<td>
										
										<a class="btn-sm btn-danger" href="'.base_url().'performance/remove_plan/2/'.$perf['PersonalDevelopmentPlanId'].'">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/2/'.$perf['PersonalDevelopmentPlanId'].'">Edit</a>
									</td>
								</tr>
								';
					}

					echo '
							
							<form method="post" action="'.base_url().'performance/personal_development_plan/2">
								<tr>
									<td><input class="form-control" name="development_required" required  type="text" /></td>
									<td><input class="form-control" name="type_of_training" required  type="text" /></td>
									<td><input class="form-control" name="reason" type="text" required /></td>
									<td><input class="form-control" name="improve_performance" required  type="text" /></td>
									<td><input class="form-control" name="career_development" required type="text" /></td>
									<td>
									<input type="text" name="timeframe" class="form-control" required  />
									</td>
									<td><input class="form-control" name="jobholder_competency" type="text" required /></td>
									<td><input class="form-control" name="progress" type="text" required /></td>
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




