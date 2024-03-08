<div class="card">
	<div class="card-header">


	</div>


	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table table-striped projects">
				<thead>
				<tr>
					<th>
						KEY RESULTS

					</th>
					<th>
						GAFS
						(Generic
						Assessment
						Factors)
					</th>
					<th>
						PERFORMAN
						CE
						OUTCOME
					</th>
					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						PERFORMANCE MEASUREMENT
					</th>
					<th>
						TIME FRAMES
					</th>
					<th>
						RESOURCES
					</th>
				</tr>
				</thead>
				<tbody>

				<?php
				$counter = 0;
				foreach ($performance as $perf)
				{
					$counter =  $counter + $perf['OutcomeWeight'];
					echo '
								<tr>
									<td><input class="form-control" disabled  type="text" value="'.$perf['Responsibility'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['GAFS'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['PerformanceOutcome'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['OutcomeWeight'].'%" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['PerformanceMeasurement'].'" /></td>
									<td>
										<input class="form-control" disabled  type="text"  value="'.$perf['Timeframes'].'" />
									</td>
									<td><input class="form-control" disabled type="text" value="'.$perf['Resources'].'" /></td>
									<td>
										
										<a class="btn-sm btn-danger" href="'.base_url().'performance/remove/1/'.$perf['PerformancePlanId'].'">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/1/'.$perf['PerformancePlanId'].'">Edit</a>
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
							<form method="post" action="'.base_url().'performance/add_performance/1">
								<tr>
									<td><input class="form-control" name="key_responsibility" required  type="text" /></td>
									<td><input class="form-control" name="gafs" type="text" required /></td>
									<td><input class="form-control" name="performance_outcome" required  type="text" /></td>
									<td>
										<select name="weight" class="form-control select">
											'.$data.'
										</select>
									</td>
									<td><input class="form-control" name="performance_measure" required type="text" /></td>
									<td>
									<input type="text" name="timeframe" class="form-control" required  />
									</td>
									<td><input class="form-control" name="resources" type="text" required /></td>
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';


				?>

					<?php echo '<p> Total: '.$counter.'</p>' ?>
				</tbody>

			</table>
		</div>
	</div>

</div>

