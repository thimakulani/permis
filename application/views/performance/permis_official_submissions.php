<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div style="margin: 10px;">
	<a class="btn-sm btn-info" href="<?= base_url('performance') ?>">BACK</a>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">SUBMITTED TO YOU</h3>
		<div class="card-tools">
			<form method="post" action="<?= base_url('performance/permis_official_submissions') ?>">
				<div class="inline-form">


					<label for="financial_year">FINANCIAL YEAR
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
					</label>
					<label for="contract_type">CONTRACT TYPE
						<select class="select form-control-sm form-control" name="contract_type" id="contract_type" onchange="SelectedContract()">
							<option value="-1" selected disabled>-CONTRACT TYPE-</option>
							<option <?php if(isset($_POST['contract_type']) && $_POST['contract_type'] == 'PERFORMANCE INSTRUMENT') echo 'selected' ?> value="PERFORMANCE INSTRUMENT" >MEMORANDUM OF UNDERSTANDING</option>
							<option <?php if(isset($_POST['contract_type']) && $_POST['contract_type'] == 'MID YEAR ASSESSMENT') echo 'selected' ?> value="MID YEAR ASSESSMENT" >MID YEAR ASSESSMENT</option>
							<option <?php if(isset($_POST['contract_type']) && $_POST['contract_type'] == 'ANNUAL ASSESSMENT') echo 'selected' ?> value="ANNUAL ASSESSMENT" >ANNUAL ASSESSMENT</option>
						</select>
					</label>

					<label>
						<select name="branch" class="select2">
							<option value="" disabled selected>--SELECT BRANCH--</option>
							<?php foreach ($branch as $bu): ?>
								<?php
								$selected = '';
								if (isset($_POST['branch']) && $_POST['branch'] == $bu['id']) {
									$selected = 'selected';
									$selectedBranch = $bu['id'];
								} elseif (isset($_SESSION['branch']) && $_SESSION['branch'] == $bu['id']) {
									$selected = 'selected';
									$selectedBranch = $bu['id'];
								}
								?>
								<option <?= $selected ?> value="<?= $bu['id'] ?>"><?= $bu['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<label for="status">STATUS
						<select class="select form-control-sm form-control" name="status" id="status">
							<option value="-1" selected disabled>-STATUS-</option>
							<option <?php if(isset($_POST['status']) && $_POST['status'] == 'PENDING') echo 'selected' ?> value="PENDING" >PENDING</option>
							<option <?php if(isset($_POST['status']) && $_POST['status'] == 'APPROVED') echo 'selected' ?> value="APPROVED" >APPROVED</option>
						</select>
					</label>
					<input type="submit" name="filter_branch" value="FILTER" class="btn-sm btn-info" />
				</div>
			</form>
		</div>
	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th>Id#</th>
				<th>PERSAL#</th>
				<th>EMPLOYEE</th>
				<th>SUPERVISOR</th>
				<th>DATE CAPTURED</th>
				<th>TEMPLATE</th>
				<th>STATUS</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($performance as $perf): ?>
				<tr>
					<td><?= $perf['id'] ?></td>
					<td><?= $perf['Persal'] ?></td>
					<td><?= $perf['E_Name'] ?></td>
					<td><?= $perf['S_Name'] ?></td>
					<td><?= $perf['date_captured'] ?></td>
					<td><?= $perf['template_name'] ?></td>
					<td><?= $perf['status_final'] ?></td>
					<td>
						<a class="btn-sm btn-primary" href="<?= base_url('performance/permis_view_submission/'.$perf['emp_id'].'/'.$perf['id']) ?>"><i class="fas fa-folder"></i>View</a> |
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
