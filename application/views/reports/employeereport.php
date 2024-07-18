<div class="card">

	<div class="card-header">
		<a class="btn-sm btn-info text-decoration-none" href="<?php echo base_url() ?>reports">BACK</a>
		<div class="fixed">
			<form id="query_form" name="query_form" action="<?php echo base_url() ?>reports/employeerep" method="post">

				<label>
					AGE GROUP
					<select class="select form-control-sm form-control" name="age_group" >
						<option disabled selected value="-1">--SELECT AGE GROUP--</option>
						<option value="A"  <?php if(isset($_POST['age_group'])){if($_POST['age_group'] == 'A'){echo 'selected';}} ?> >25 - 35</option>
						<option value="B"  <?php if(isset($_POST['age_group'])){if($_POST['age_group'] == 'B'){echo 'selected';}} ?>>36 - 45</option>
						<option value="C"  <?php if(isset($_POST['age_group'])){if($_POST['age_group'] == 'C'){echo 'selected';}} ?>>46 - 55</option>
						<option value="D"  <?php if(isset($_POST['age_group'])){if($_POST['age_group'] == 'D'){echo 'selected';}} ?>>56 - 56</option>
					</select>
				</label>

				<input type="submit" name="filter" value="QUERY" class="btn-sm btn-info text-decoration-none text-white">
				<a class="btn-sm btn-info text-decoration-none text-white" onclick="printDiv('employees')">PRINT</a>

			</form>
		</div>


	</div>

	<div class="card-body">
			<div class="table-responsive" id="employees">
				<div style="text-align: center;" class="m-2">
					<img src="<?php echo base_url()?>assets\images\cogstah_img.jpg" style="height: 150px" alt="img" />
				</div>
				<div>
					<strong> TOTAL NUMBER OF EMPLOYEES: <?php echo count($all_users) ?> </strong>
				</div>
				<table class="table-sm table-bordered table-hover">
					<thead>
					<tr>
						<th>
							#
						</th>

						<th>
							NAME
						</th>
						<th>
							SURNAME
						</th>
						<th>
							AGE
						</th>
						<th>
							GENDER
						</th>

						<th>
							RACE
						</th>

						<th>
							DISABILITY
						</th>
						<th>
							PERSAL
						</th>
						<th>
							POSITION
						</th>

						<th>
							SALARY LEVEL
						</th>

						<th>
							APPOINT DATE
						</th>

						<th>
							SUPERVISOR
						</th>

						<th>
							STATUS
						</th>

					</tr>
					</thead>
					<tbody>


					<?php
					$counter = 1;
					foreach ($all_users as $user) {

						echo
								'
								<tr>
									<td>
										' . $counter . '
									</td>
									<td>' . $user['Name'] . '</td>
									<td>' . $user['LastName'] . '</td>
									<td>' . str_replace("-","",$user['Age']) . '</td>
									<td>' . $user['Gender'] . '</td>
									<td>' . $user['Race'] . '</td>
									<td>' . $user['Disability'] . '</td>
									<td>' . $user['Persal'] . '</td>
									<td>' . $user['JobTitle'] . '</td>
									<td>' . $user['SalaryLevel'] . '</td>
									<td>' . $user['AppointmentDate'] . '</td>
									<td>' . $user['S_Name'] . '</td>
									<td>' . $user['Status'] . '</td>
								</tr>
								';
						$counter++;
					}
					?>

					</tbody>
				</table>
			</div>




		<script>
			function printDiv(divName) {
				const printContents = document.getElementById(divName).innerHTML;
				const originalContents = document.body.innerHTML;

				document.body.innerHTML = printContents;

				window.print();

				document.body.innerHTML = originalContents;
			}
		</script>


	</div>
