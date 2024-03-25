<div class="card">
	<div class="card-header">
		<a class="btn-sm btn-info" href="<?= base_url() ?>reports">BACK</a>
		<div class="fixed">
			<form id="query_form" name="query_form" action="<?= base_url() ?>reports/compliant" method="post">
				<div class="row">
					<div class="col-md-6">
						<label for="financial_year">FINANCIAL YEAR</label>
						<?php
						$years = range(2023, date("Y"));
						$selectedYear = isset($_POST['financial_year']) ? $_POST['financial_year'] : date("Y");
						?>
						<select class="select form-control-sm form-control" name="financial_year" id="financial_year" onchange="SelectedYear()">
							<option disabled selected value="-1">--SELECT A FINANCIAL YEAR--</option>
							<?php foreach ($years as $year) : ?>
								<option <?= $selectedYear == $year ? 'selected' : '' ?> value="<?php echo $year . '/' . ($year + 1); ?>"><?php echo $year . '/' . ($year + 1); ?></option>
							<?php endforeach; ?>
						</select>

						<label for="contract_type">CONTRACT TYPE</label>
						<select class="select form-control-sm form-control" name="contract_type" id="contract_type" onchange="SelectedContract()">
							<option value="-1" selected disabled>-CONTRACT TYPE-</option>
							<option <?php if(isset($_POST['contract_type']) && $_POST['contract_type'] == 'PERFORMANCE INSTRUMENT') echo 'selected' ?> value="PERFORMANCE INSTRUMENT" >MEMORANDUM OF UNDERSTANDING</option>
							<option <?php if(isset($_POST['contract_type']) && $_POST['contract_type'] == 'MID YEAR ASSESSMENT') echo 'selected' ?> value="MID YEAR ASSESSMENT" >MID YEAR ASSESSMENT</option>
							<option <?php if(isset($_POST['contract_type']) && $_POST['contract_type'] == 'ANNUAL ASSESSMENT') echo 'selected' ?> value="ANNUAL ASSESSMENT" >ANNUAL ASSESSMENT</option>
						</select>

						<label for="branch">BRANCH</label>
						<select class="select form-control-sm form-control" name="branch" id="branch">
							<option value="-1" disabled selected>--SELECT BRANCH--</option>
							<?php foreach ($branch as $br) : ?>
								<option <?= (isset($_POST['branch']) && $_POST['branch'] == $br['id']) ? 'selected' : '' ?> value="<?= $br['id'] ?>"><?= $br['name'] ?></option>
							<?php endforeach; ?>
						</select>

						<label for="directorate">DIRECTORATE</label>
						<select class="select form-control-sm form-control" name="directorate" id="directorate">
							<option disabled selected value="-1">--SELECT DIRECTORATE--</option>
							<?php foreach ($directorates as $directorate) : ?>
								<option <?= (isset($_POST['directorate']) && $_POST['directorate'] == $directorate['id']) ? 'selected' : '' ?> value="<?= $directorate['id'] ?>"><?= $directorate['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-md-6">
						<label for="sub_directorate">SUB-DIRECTORATE</label>
						<select class="select form-control-sm form-control" name="sub_directorate" id="sub_directorate">
							<option selected disabled value="-1">--SELECT SUB-DIRECTORATE--</option>
						</select>

						<label for="status">STATUS</label>
						<select class="select form-control-sm form-control" name="status" id="status">
							<option selected disabled value="-1">--SELECT STATUS--</option>
							<option value="A" <?php if(isset($_POST['status']) && $_POST['status'] == 'A') echo 'selected' ?>>APPROVED BY SUPERVISORS</option>
							<option value="B" <?php if(isset($_POST['status']) && $_POST['status'] == 'B') echo 'selected' ?>>AWAITING PMDS APPROVAL</option>
							<option value="C" <?php if(isset($_POST['status']) && $_POST['status'] == 'C') echo 'selected' ?>>APPROVED BY PMDS</option>
						</select>

						<label for="salary_level">SALARY LEVEL</label>
						<select class="select form-control-sm form-control" name="salary_level" id="salary_level">
							<option selected disabled value="-1">--SELECT SALARY LEVEL--</option>
							<option value="A" <?php if(isset($_POST['salary_level']) && $_POST['salary_level'] == 'A') echo 'selected' ?>>LEVEL 1 TO 12</option>
							<option value="B" <?php if(isset($_POST['salary_level']) && $_POST['salary_level'] == 'B') echo 'selected' ?>>LEVEL 13 TO 16</option>
						</select>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-md-12">
						<input type="submit" name="filter" value="QUERY" class="btn-sm btn-info text-decoration-none text-white">
						<a class="btn-sm btn-info text-decoration-none text-white" onclick="printDiv('employees')">PRINT</a>
					</div>
				</div>
			</form>

		</div>
	</div>

	<section class="table-responsive-sm" id="employees">
		<div style="margin:auto">
			<div style="text-align: center;">
				<p class="m-2"><strong>CO-OPERATIVE GOVERNANCE, HUMAN SETTLEMENTS AND TRADITIONAL AFFAIRS:LIMPOPO</strong></p>
				<p class="m-2"><strong>CONTRACT TYPE: <label id="lbl_contract_type"></label> FINANCIAL YEAR: <label id="lbl_financial_year"><?= isset($_POST['financial_year']) ? $_POST['financial_year'] : '' ?></label> </strong></p>
				<p class="m-2"><strong>VALID PERIOD: COMPLIANCE</strong></p>
			</div>
		</div>
		<div>
			<div style="text-align: center;" class="m-2">
				<img src="<?= base_url() ?>assets/images/cogstah_img.jpg" style="height: 150px" alt="img" />
			</div>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="example2">
					<thead>
					<tr>
						<th>#</th>
						<th>PERSAL NO</th>
						<th>SURNAME</th>
						<th>NAME</th>
						<th>POSITION</th>
						<th>BRANCH</th>
						<th>FINANCIAL YEAR</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($all_users as $index => $user): ?>
						<tr>
							<td><?= $index + 1 ?></td>
							<td><?= $user['Persal'] ?></td>
							<td><?= $user['LastName'] ?></td>
							<td><?= $user['Name'] ?></td>
							<td><?= $user['JobTitle'] ?></td>
							<td><?= $user['br_name'] ?></td>
							<td>SUBMITTED</td>
						</tr>
					<?php endforeach; ?>

					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

<script>
	function SelectedContract() {
		var lbl = document.getElementById('lbl_contract_type');
		lbl.innerText = document.getElementById('contract_type').value;
		if('PERFORMANCE INSTRUMENT' === document.getElementById('contract_type').value) {
			lbl.innerText = 'MEMORANDUM OF UNDERSTANDING';
		}
	}

	function SelectedYear() {
		var lbl = document.getElementById('lbl_financial_year');
		lbl.innerText = document.getElementById('financial_year').value;
	}

	$(document).ready(function() {
		$('#directorate').on('change', function() {
			var selectedValue = $(this).val();
			if (selectedValue != "") {
				$.ajax({
					url: "<?= base_url() ?>employees/get_sub_directorates/" + selectedValue,
					type: "POST",
					data: { option: selectedValue },
					success: function(result) {
						const res = JSON.parse(result);
						$('#sub_directorate').html(`<option selected disabled value="-1">--SELECT SUB-DIRECTORATE--</option>`);
						for (val of res) {
							$('#sub_directorate').append(`<option value="${val.id}">${val.name}</option>`);
						}
					}
				});
			}
		});
	});

	function printDiv(divName) {
		const printContents = document.getElementById(divName).innerHTML;
		const originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>
