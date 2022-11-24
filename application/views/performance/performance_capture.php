<div class="containr">
	<div class="card">
		<div class="card-header">

			<div>
				<label> FROM
					<input type="date" class="form-control" />
				</label>
				<label>
					TO
					<input type="date" class="form-control" />
				</label>
			</div>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>

			</div>
		</div>


		<div class="card-body p-0 table-responsive-sm">
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
						foreach ($performance as $perf)
						{
							echo '
								<tr>
									<td><input class="form-control-sm" disabled  type="text" value="'.$perf['Responsibility'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['GAFS'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['PerformanceOutcome'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['OutcomeWeight'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['PerformanceMeasurement'].'" /></td>
									<td>
										<input class="form-control" disabled  type="text"  value="'.$perf['Timeframes'].'" />
									</td>
									<td><input class="form-control" disabled type="text" value="'.$perf['Resources'].'" /></td>
									<td><a class="btn-sm btn-danger" href="'.base_url().'performance/remove/'.$perf['PerformancePlanId'].'">Remove</a></td>
								</tr>
								';
						}

						echo '
							<form method="post" action="'.base_url().'performance/add_performance">
								<tr>
									<td><input class="form-control" name="key_responsibility" required value="'.set_value('key_responsibility').'" type="text" /></td>
									<td><input class="form-control" name="gafs" type="text" required value="'.set_value('gafs').'" /></td>
									<td><input class="form-control" name="performance_outcome" required value="'.set_value('performance_outcome').'" type="text" /></td>
									<td><input class="form-control" name="weight" type="text" required value="'.set_value('weight').'" /></td>
									<td><input class="form-control" name="performance_measure" required value="'.set_value('performance_measure').'" type="text" /></td>
									<td>
									<input type="date" name="timeframe" class="form-control" required value="'.set_value('timeframe').'" />
									</td>
									<td><input class="form-control" name="resources" type="text" required value="'.set_value('resources').'" /></td>
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
								</tr>
							</form>				
						';
						?>


				</tbody>

			</table>

		</div>
		<div class="card-footer">
			<input type="submit" class="btn-sm btn-success" />
		</div>
	</div>
</div>
