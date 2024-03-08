
<div class="card">
	<div class="card-header">
		<h3 style="color: black" class="card-title">SUBMISSIONS</h3>


	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-hover projects">
			<thead>
			<tr>
				<th>
					Id#
				</th>
				<th>
					PERSAL#
				</th>
				<th>
					EMPLOYEE
				</th>
				<th>
					DATE CAPTURED
				</th>
				<th>
					INSTRUMENT
				</th>
				<th>
					STATUS
				</th>
				<th>
					ACTION
				</th>

			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($performance as $perf) {
				echo '<tr>
									<td>
										' . $perf['id'] . '
									</td>
									<td>
										' . $perf['Persal'] . '
									</td>
									<td>
										' . $perf['E_Name'] . '
									</td>
									<td>
										' . $perf['date_captured'] . '
									</td>
									<td>
										' . $perf['template_name'] . '
									</td>
									<td>
										' . $perf['status'] . '
									</td>';

				if ($_SESSION['Role'] == 3 || $_SESSION['Role'] == 6) {
					echo '
					                <td>
										<a class="btn-sm btn-primary form-control" style="text-align: center;font-weight: bold" href="' . base_url() . 'performance/view_submission/' . $perf['emp_id'] . '/' . $perf['id'] . '" >OPEN</a>
									</td>
									
					             ';
				}



				echo '</tr > ';} ?>
			</tbody>
		</table>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function showInputPopup() {
		var userInput = prompt("Please enter your input:");
		if (userInput) {
			// Send the user input to a PHP script for further processing
			$.ajax({
				type: 'POST',
				url: 'Performance . php',
				data: {input: userInput},
				success: function (response) {
					console.log(response); // Response from the controller
				},
				error: function () {
					console.log("Error occurred");
				}
			});
			window.location.href = "process.php?input=" + userInput;
		}
	}
</script>
