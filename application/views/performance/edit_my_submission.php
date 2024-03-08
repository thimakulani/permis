<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>

<div class="card">
	<div class="card-header">

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
					foreach ($performance as $perf) { ?>
							<form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>performance/update_pp/<?php echo $perfm->id ?>/<?php echo $perf['PerformancePlanId'] ?>">
								<tr>
									<td><input class="form-control" required name="key_responsibility"  type="text" value="<?php echo $perf['Responsibility'] ?>" /></td>
									<td><input class="form-control" required name="gafs" type="text" value="<?php echo $perf['GAFS'] ?>" /></td>
									<td><input class="form-control" required name="performance_outcome" type="text" value="<?php echo $perf['PerformanceOutcome'] ?>" /></td>
									<td><input class="form-control" required name="weight" type="number" value="<?php echo $perf['OutcomeWeight'] ?>" /></td>
									<td><input class="form-control" required name="performance_measure" type="text" value="<?php echo $perf['PerformanceMeasurement'] ?>" /></td>
									<td>
										<input class="form-control" required name="timeframe" type="text"  value="<?php echo $perf['Timeframes'] ?>" />
									</td>
									<td><input class="form-control" required name="resources" type="text" value="<?php echo $perf['Resources'] ?>" /></td>
									<td>

										<a class="btn-sm btn-danger" href="<?php echo base_url() ?>performance/remove_submission_pp/<?php echo $perfm->id ?>/<?php echo $perf['PerformancePlanId'] ?>">Remove</a>
									</td>
									<td>
										<input type="submit" class="btn-sm btn-info" value="Update" />
										<!--<a class="btn-sm btn-info" href="<?php /*echo base_url() */?>performance/update_pp/<?php /*echo $perfm->id */?>/<?php /*echo $perf['PerformancePlanId'] */?>">Update</a>
									-->
									</td>
								</tr>
							</form>
					<?php } ?>
					<!--$data = '';
					for ($i = 10; $i <= 100; $i = $i + 10) {
						$data .= '<option value="' . $i . '">' . $i . '%</option>';
					}-->
					<form method="post" action="<?php echo base_url() ?>performance/update_performance/1">
								<tr>
									<td><input class="form-control" name="key_responsibility" required  type="text" /></td>
									<td><input class="form-control" name="gafs" type="text" required /></td>
									<td><input class="form-control" name="performance_outcome" required  type="text" /></td>
									<td>
										<select name="weight" class="form-control select">
											<?php
											$data = '';
												for ($i = 10; $i <= 100; $i = $i + 10) {
													$data .= '<option value="' . $i . '">' . $i . '%</option>';
												}
												echo $data;
											?>
										</select>
									</td>
									<td><input class="form-control" name="performance_measure" required type="text" /></td>
									<td>
									<input type="text" name="timeframe" class="form-control" required  />
									</td>
									<td><input class="form-control" name="resources" type="text" required /></td>
									<td><input class="btn-sm btn-info" type="submit" value="add"/></td>
									<td></td>
								</tr>
							</form>




					</tbody>

				</table>
			</div>
		</div>



