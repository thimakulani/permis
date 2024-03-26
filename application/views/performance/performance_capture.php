<?php
//include ('include/templates.php');
//$Performance_Plan = Performance_Plan($performance)

?>

<div STYLE="margin: 10px">
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div class="card">
	<div class="card-header">
		<h2>PERFORMANCE AGREEMENT  </h2>
		<h4>JOB LEVEL: <strong><?php if(isset($level)) echo $level; ?></strong> </h4>
		<?php if(isset($semester)) {?>
			<h4>OPEN FOR PERIOD: <span style="color: #2e0b0b"> <?php echo date_format(date_create($semester->start_date), 'd-F-Y') . ' to ' . date_format(date_create($semester->end_date), 'd-F-Y');  ?> </span> </h4>
			<?php
			$_SESSION['period'] = $semester->start_date . ' TO ' . $semester->end_date;

		}?>


	</div>

	<div class="card-body">
		<!--<div>
			<label>
				FINANCIAL YEAR
				<?php /*$years = range(2023, strftime("%Y", time())); */?>
				<select class="select form-control-sm form-control" name="financial_year" id="financial_year" onchange="SelectedYear()">
					<option disabled selected value="-1">--SELECT A FINANCIAL YEAR--</option>
					<?php /*foreach ($years as $year)
					{
						$selected_year = '';
						if(isset($_POST['financial_year']))
						{
							if($_POST['financial_year'] == $year)
							{
								$selected_year = 'selected';
							}
						}
						*/?>
						<option
							<?php /*echo $selected_year; */?> value="<?php /*$next_year = $year + 1;
						echo $year . '/' . $next_year; */?> "> <?php /*echo $year . '/' . $next_year; */?>
						</option>
					<?php /*} */?>
				</select>
			</label>
		</div>-->
		<div class="row">

			<?php
			if($level >= 1 && $level <=12)
			{
				if(isset($semester))
				{
					if($semester->semester_name == 'SEMESTER ONE')
					{

						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="'.base_url().'performance/template/6">PERFORMANCE AGREEMENT</a>';
						if(isset($employee_submission))
						{
							if($employee_submission->status == 'APPROVED')
							{
								echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/7">MID YEAR PERFORMANCE ASSESSMENT</a>';
							}
						}

					}
					if($semester->semester_name == 'SEMESTER TWO')
					{

						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/8">ANNUAL ASSESSMENT</a>';
					}
				}

			}
			else if ($level >= 13 &&  $level <=14)
			{
				if(isset($semester))
				{
					if ($semester->semester_name == 'SEMESTER ONE')
					{
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/9">PERFORMANCE AGREEMENT</a>';
						if(isset($employee_submission))
						{
							if($employee_submission->status == 'APPROVED') {
								echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/10">MID YEAR PERFORMANCE ASSESSMENT</a>';
							}
						}
					}
					else if ($semester->semester_name == 'SEMESTER TWO')
					{
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="'.base_url().'performance/template/11">ANNUAL ASSESSMENT</a>';
					}

				}
			}
			/*work in progress level 15*/
			else if ($level == 15)
			{
				if(isset($semester))
				{
					if ($semester->semester_name == 'SEMESTER ONE')
					{
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/200">PERFORMANCE AGREEMENT</a>';
						if(isset($employee_submission))
						{
							if($employee_submission->status == 'APPROVED') {
								echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/10">MID YEAR PERFORMANCE ASSESSMENT</a>';
							}
						}
					}
					else if ($semester->semester_name == 'SEMESTER TWO')
					{
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="'.base_url().'performance/template/300">ANNUAL ASSESSMENT</a>';
					}

				}
			}
			/*else if($level == 15)
			{
				if(isset($semester))
				{
					if ($semester->semester_name == 'SEMESTER ONE') {
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/200">PERFORMANCE AGREEMENT</a>';
						//echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/100">MID YEAR PERFORMANCE ASSESSMENT</a>';

					}
					else if ($semester->semester_name == 'SEMESTER TWO')
					{
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="'.base_url().'performance/template/300">ANNUAL ASSESSMENT</a>';
					}

				}

			}*/
			else if($level == 16)
			{
				if(isset($semester))
				{
					if ($semester->semester_name == 'SEMESTER ONE') {
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/500">PERFORMANCE AGREEMENT</a>';
						//echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="' . base_url() . 'performance/template/400">MID YEAR PERFORMANCE ASSESSMENT</a>';
					}
					else if ($semester->semester_name == 'SEMESTER TWO')
					{
						echo '<a class="btn-lg btn-info text-decoration-none" style="margin: 5px" href="'.base_url().'performance/template/16">ANNUAL ASSESSMENT</a>';
					}

				}

			}

			?>
		</div>

	</div>


	<div class="card-footer">

	</div>
</div>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
