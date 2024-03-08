<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
		<tr>
			<th>NAMES</th>
			<th>PERSAL</th>

		</tr>
		</thead>
		<tbody>
		<tr>
			<td>
				<input disabled class="form-control" value="<?php echo $emp->Name . ' ' . $emp->LastName; ?>"/>
			</td>
			<td>
				<input disabled class="form-control" value="<?php echo $emp->Name; ?>"/>
			</td>
		</tr>
		</tbody>
	</table>

</div>
<?php
$perf = new PerformanceModel();

if ($emp->JobLevel >= 1 && $emp->JobLevel <= 12) {
	$performance = $perf->get_user_performance($emp->Id);
	echo '<div class="card">
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
				<tbody>';

	//<?php
	foreach ($performance as $perf) {
		echo '
								<tr>
									<td ><input class="form-control" disabled  type = "text" value = "' . $perf['Responsibility'] . '" /></td >
									<td ><input class="form-control" disabled  type = "text" value = "' . $perf['GAFS'] . '" /></td >
									<td ><input class="form-control" disabled  type = "text" value = "' . $perf['PerformanceOutcome'] . '" /></td >
									<td ><input class="form-control" disabled  type = "text" value = "' . $perf['OutcomeWeight'] . '%" /></td >
									<td ><input class="form-control" disabled  type = "text" value = "' . $perf['PerformanceMeasurement'] . '" /></td >
									<td >
										<input class="form-control" disabled  type = "text"  value = "' . $perf['Timeframes'] . '" />
									</td >
									<td ><input class="form-control" disabled type = "text" value = "' . $perf['Resources'] . '" /></td >
								</tr>
								';


	}
	echo '</tbody>

			</table>
		</div>
	</div>

</div>';
}
?>


<div class="card">
	<div class="card-body">
		<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/permis_update_status/<?php echo $submission_id ?>">
			<select name="action_option" id="action" onchange="optionChange()" class="form-control">
				<option class="form-control select" value="APPROVED" >APPROVE</option>
				<option value="REJECTED" >REJECT</option>
			</select>
			<input type="submit" class="btn-sm btn-primary m-2" />
			<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
		</form>
	</div>
</div>


<script>
	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVE')
		{
			document.getElementById("comment").style = "display:none";

		}
		if(e.value === 'REJECT')
		{
			document.getElementById("comment").style = "display:block";

		}
	}


</script>
