<?php
	//include ('include/templates.php');
	//$Performance_Plan = Performance_Plan($performance)
?>


<div class="containr">
<div class="card card-primary card-tabs">
	<div class="card-header p-0 pt-1">
		<ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
			<li class="pt-2 px-3"><h3 class="card-title">PERFORMANCE ASSESSMENTS</h3></li>
			<li class="nav-item">
				<a class="nav-link active" id="performance-plan-tab" data-toggle="pill" href="#performance-plan"
				   role="tab" aria-controls="performance-plan" aria-selected="true">PERFORMANCE PLAN</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="personal-development-tab" data-toggle="pill" href="#personal-development"
				   role="tab" aria-controls="personal-development" aria-selected="false">PERSONAL DEVELOPMENT PLAN</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="work-plan-tab" data-toggle="pill"
				   href="#work-plan" role="tab" aria-controls="work-plan"
				   aria-selected="false">WORK PLAN</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="hod-performance-plan-tab" data-toggle="pill"
				   href="#hod-performance-plan" role="tab" aria-controls="hod-performance-plan"
				   aria-selected="false">HOD PERFORMANCE PLAN</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="gmc-personal-development-plan-tab" data-toggle="pill"
				   href="#gmc-personal-development-plan" role="tab" aria-controls="gmc-personal-development-plan"
				   aria-selected="false">GMC PERSONAL DEVELOPMENT PLAN</a>
			</li>

		</ul>
	</div>
	<div class="card-body">
		<div class="tab-content" id="custom-tabs-two-tabContent">
			<div class="tab-pane fade show active" id="performance-plan" role="tabpanel"
				 aria-labelledby="performance-plan-tab">


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
								foreach ($performance as $perf)
								{
									echo '
								<tr>
									<td><input class="form-control-sm" disabled  type="text" value="'.$perf['Responsibility'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['GAFS'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['PerformanceOutcome'].'" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['OutcomeWeight'].'%" /></td>
									<td><input class="form-control" disabled  type="text" value="'.$perf['PerformanceMeasurement'].'" /></td>
									<td>
										<input class="form-control" disabled  type="text"  value="'.$perf['Timeframes'].'" />
									</td>
									<td><input class="form-control" disabled type="text" value="'.$perf['Resources'].'" /></td>
									<td>
										
										<a class="btn-sm btn-danger" href="'.base_url().'performance/remove/'.$perf['PerformancePlanId'].'">Remove</a>
									</td>
									<td>
										<a class="btn-sm btn-info" href="'.base_url().'performance/edit/'.$perf['PerformancePlanId'].'">Edit</a>
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
							<form method="post" action="'.base_url().'performance/add_performance">
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


								</tbody>

							</table>
						</div>
					</div>

				</div>

			</div>
			<div class="tab-pane fade" id="personal-development" role="tabpanel"
				 aria-labelledby="personal-development-tab">
				<div>
					PERSONAL DEVELOPMENT PLAN
				</div>
			</div>
			<div class="tab-pane fade" id="work-plan" role="tabpanel"
				 aria-labelledby="profile-tab">
				<div >
					WORK PLAN

				</div>
			</div>
			<div class="tab-pane fade" id="hod-performance-plan" role="tabpanel"
				 aria-labelledby="hod-performance-plan-tab">
				<div >
					HOD PERFORMANCE PLAN

				</div>
			</div>
			<div class="tab-pane fade" id="gmc-personal-development-plan" role="tabpanel"
				 aria-labelledby="gmc-personal-development-plan-tab">
				<div >
					GMC PERSONAL DEVELOPMENT PLAN

				</div>
			</div>

		</div>
		<div class="card-footer">
			<form action="<?php echo base_url()?>performance/submit" method="post">
				<div>
					<label> FROM
						<input type="date" required name="start_date" class="form-control" />
					</label>
					<label>
						TO
						<input type="date" required name="end_date" class="form-control" />
					</label>
				</div>
				<input type="submit" class="btn-sm btn-success" value="SUBMIT" />
			</form>
		</div>
	</div>
</div>
































<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
