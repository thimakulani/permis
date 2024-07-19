<div class="">
	<h2 class="mb-4">FINAL REPORT</h2>

	<form id="query_form" name="query_form" action="<?php echo base_url() ?>reports/none_compliant" method="post">

		<label>
			FINANCIAL YEAR
			<?php $years = range(2023, strftime("%Y", time())); ?>
			<select class="select form-control-sm form-control" name="financial_year" onchange="SelectedYear()">
				<option disabled selected value="-1">--SELECT A FINANCIAL YEAR--</option>
				<?php foreach ($years as $year) {
					$selected_year = '';
					if (isset($_POST['financial_year'])) {
						if ($_POST['financial_year'] == $year) {
							$selected_year = 'selected';
						}
					}
					?>
					<option
							<?php echo $selected_year; ?> value="<?php $next_year = $year + 1;
					echo $year . '/' . $next_year; ?> "> <?php echo $year . '/' . $next_year; ?>
					</option>
				<?php } ?>
			</select>
		</label>
		<label>
			BRANCH
			<select class="select form-control-sm form-control" name="branch">
				<option value="-1" disabled selected>--SELECT BRANCH--</option>
				<?php foreach ($branch as $br) { ?>
					<option <?php if (isset($_POST['branch'])) if ($_POST['branch'] == $br['id']) {
						echo 'selected';
					} ?> value="<?php echo $br['id'] ?>"> <?php echo $br['name'] ?> </option>
				<?php } ?>
			</select>
		</label>
		<input type="submit" name="filter" value="QUERY" class="btn-sm btn-info text-decoration-none text-white">
	</form>
</div>

	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
		<tr>
			<th>Surname</th>
			<th>Persal Number</th>
			<th>Submitted Date</th>
			<th>Mid Year Evaluation</th>
			<th>End Year Evaluation</th>
			<th>Average Score</th>
			<th>PMDS</th>
			<th>Branch</th>
			<th>Department</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($report as $item)
		{ ?>

			<tr>
				<td><?php echo $item['name']. ' '.$item['lastname'] ?></td>
				<td><?php echo $item['persal'] ?> </td>
				<td><?php echo $item['date_captured'] ?> <a class="btn-sm btn-primary text-white">View</a> </td>
				<td><?php echo $item['mid_status'] ?></td>
				<td><?php echo '' ?></td>
				<td><?php echo '' ?></td>
				<td><?php echo $item['mid_status_final'] ?></td>
				<td><?php echo $item['id'] ?></td>
				<td><?php echo $item['id'] ?></td>

			</tr>
		<?php } ?>
		<!-- Add more rows as needed -->
		</tbody>
	</table>

</div>
