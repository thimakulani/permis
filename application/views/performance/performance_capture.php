<?php
//include ('include/templates.php');
//$Performance_Plan = Performance_Plan($performance)

?>

<div STYLE="margin: 10px">
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>

<div class="card">
	<div class="card-header">
		<h2>PERFORMANCE AGREEMENT</h2>
		<h4>JOB LEVEL: <strong><?php echo isset($level) ? $level : ''; ?></strong></h4>
		<?php if(isset($semester)): ?>
			<h4>OPEN FOR PERIOD: <span style="color: #2e0b0b">
                <?php echo date_format(date_create($semester->start_date), 'd-F-Y') . ' to ' . date_format(date_create($semester->end_date), 'd-F-Y'); ?>
            </span></h4>
			<?php $_SESSION['period'] = $semester->start_date . ' TO ' . $semester->end_date; ?>
		<?php endif; ?>
	</div>

	<div class="card-body">
		<div style="margin: 20px">
			<label>
				FINANCIAL YEAR
				<?php
				$years = range(2023, strftime("%Y", time())); // Generate range of years from 2023 to current year
				?>
				<select class="select form-control-sm form-control" name="financial_year" id="financial_year" onchange="toggleRowVisibility()">
					<option disabled selected value="-1">--SELECT A FINANCIAL YEAR--</option>
					<?php foreach ($years as $year): ?>
						<?php
						$selected_year = (isset($_POST['financial_year']) && $_POST['financial_year'] == $year) ? 'selected' : ''; // Check if year is selected
						$next_year = $year + 1; // Calculate next year
						?>
						<option value="<?php echo $year . '-' . $next_year; ?>" <?php echo $selected_year; ?>>
							<?php echo $year . '/' . $next_year; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</label>
		</div>
	</div>
	<div class="card-footer">
		<div class="row" id="additional_info" style="display: none;">
			<a class="btn-lg btn-info text-decoration-none" id="memorandum_of_understanding" style="margin: 5px" >MEMORANDUM OF UNDERSTANDING</a>
			<a class="btn-lg btn-info text-decoration-none" disabled="true" id="mid_year_assessment" style="margin: 5px" >MID YEAR ASSESSMENT</a>
			<a class="btn-lg btn-info text-decoration-none" disabled="true" id="annual_assessment" style="margin: 5px" >ANNUAL ASSESSMENT</a>
		</div>
	</div>
</div>

<script>
	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}
</script>
<script>
	function toggleRowVisibility() {
		var financialYearSelect = document.getElementById("financial_year");
		var additionalInfoDiv = document.getElementById("additional_info");
		if (financialYearSelect.value === "2024-2025") {
			additionalInfoDiv.style.display = "block";
			// Get the selected value
			var selectedYear = financialYearSelect.value;
			// Update the href attribute of the link
			//var link = document.querySelector("#additional_info a");
			document.querySelector("#memorandum_of_understanding").href = "<?php echo base_url(); ?>performance/load_template/1/" + selectedYear;
			document.querySelector("#mid_year_assessment").href = "<?php echo base_url(); ?>performance/load_template/2/" + selectedYear;
			document.querySelector("#annual_assessment").href = "<?php echo base_url(); ?>performance/load_template/3/" + selectedYear;
		}
		else if(financialYearSelect.value === "2023-2024")
		{
			additionalInfoDiv.style.display = "block";
			// Get the selected value
			var selectedYear = financialYearSelect.value;
			// Update the href attribute of the link
			//var link = document.querySelector("#additional_info a");
			document.querySelector("#memorandum_of_understanding").href = "<?php echo base_url(); ?>performance/load_template/1/" + selectedYear;
			document.querySelector("#mid_year_assessment").href = "<?php echo base_url(); ?>performance/load_template/2/" + selectedYear;
			document.querySelector("#annual_assessment").href = "<?php echo base_url(); ?>performance/load_template/3/" + selectedYear;
			//document.querySelector("#memorandum_of_understanding").style.display = "none";
			document.querySelector("#mid_year_assessment").style.display = "none";
		}
		else {
			additionalInfoDiv.style.display = "none";
		}
	}
</script>



<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
