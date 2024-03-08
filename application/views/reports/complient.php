<div class="card">

	<div class="card-header">
		<a class="btn-sm btn-info" href="<?php echo base_url() ?>reports">BACK</a>
		<div class="fixed">
			<form id="query_form" name="query_form" action="<?php echo base_url() ?>reports/compliant" method="post">
				<label>
					FINANCIAL YEAR
					<?php $years = range(2020, strftime("%Y", time())); ?>
					<select class="select form-control-sm form-control" name="financial_year" id="financial_year" onchange="SelectedYear()">
						<option disabled selected value="-1">--SELECT A FINANCIAL YEAR--</option>
						<?php foreach ($years as $year)
						{
							$selected_year = '';
							if(isset($_POST['financial_year']))
							{
								if($_POST['financial_year'] == $year)
								{
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
					CONTRACT TYPE
					<select class="select form-control-sm form-control" name="contract_type" id="contract_type" onchange="SelectedContract()" >
						<option value="-1" selected disabled>-CONTRACT TYPE-</option>
						<option <?php if(isset($_POST['contract_type'])) if($_POST['contract_type'] == 'PERFORMANCE INSTRUMENT') echo 'selected' ?> value="PERFORMANCE INSTRUMENT" >MEMORANDUM OF UNDERSTANDING</option>
						<option <?php if(isset($_POST['contract_type'])) if($_POST['contract_type'] == 'MID YEAR ASSESSMENT') echo 'selected' ?> value="MID YEAR ASSESSMENT" >MID YEAR ASSESSMENT</option>
						<option <?php if(isset($_POST['contract_type'])) if($_POST['contract_type'] == 'ANNUAL ASSESSMENT') echo 'selected' ?> value="ANNUAL ASSESSMENT" >ANNUAL ASSESSMENT</option>

					</select>
				</label>
				<label>
					BRANCH
					<select class="select form-control-sm form-control" name="branch" >
						<option value="-1" disabled selected >--SELECT BRANCH--</option>
						<?php foreach ($branch as $br) {?>
							<option <?php if(isset($_POST['branch'])) if($_POST['branch'] == $br['id']) { echo 'selected';} ?> value="<?php echo $br['id'] ?>" > <?php echo $br['name'] ?> </option>
						<?php } ?>
					</select>
				</label>
				<label>
					DIRECTORATE
					<select class="select form-control-sm form-control" name="directorate" id="directorate" >
						<option disabled selected value="-1" > --SELECT DIRECTORATE-- </option>
						<?php foreach ($directorates as $directorate) {?>
							<option <?php if(isset($_POST['directorate'])) if($_POST['directorate'] == $directorate['id']) { echo 'selected';} ?> value="<?php echo $directorate['id'] ?>" > <?php echo $directorate['name'] ?> </option>
						<?php } ?>
					</select>
				</label>
				<label>
					SUB-DIRECTORATE
					<select class="select form-control-sm form-control" name="sub_directorate" id="sub_directorate"  >
						<option selected disabled value="-1" >--SELECT SUB-DIRECTORATE--</option>
					</select>
				</label>

				<label>
					STATUS
					<select class="select form-control-sm form-control" name="status"  >
						<option selected disabled value="-1" >--SELECT STATUS--</option>
						<option  value="A" <?php if(isset($_POST['status'])){ if($_POST['status'] =='A'){ echo 'selected';}} ?> >APPROVED BY SUPERVISORS</option>
						<option  value="B" <?php if(isset($_POST['status'])){ if($_POST['status'] =='B'){ echo 'selected';}} ?> >AWAITING PMDS APPROVAL</option>
						<option  value="C" <?php if(isset($_POST['status'])){ if($_POST['status'] =='C'){ echo 'selected';}} ?> >APPROVED BY PMDS</option>
						</select>
				</label>

				<label>
					SALARY LEVEL
					<select class="select form-control-sm form-control" name="salary_level"  >
						<option selected disabled value="-1" >--SELECT SALARY LEVEL--</option>
						<option  value="A" <?php if(isset($_POST['salary_level'])){ if($_POST['salary_level'] =='A'){ echo 'selected';}} ?> >LEVEL 1 TO 12</option>
						<option  value="B" <?php if(isset($_POST['salary_level'])){ if($_POST['salary_level'] =='B'){ echo 'selected';}} ?> >LEVEL 13 TO 16</option>

					</select>
				</label>


				<input type="submit" name="filter" value="QUERY" class="btn-sm btn-info text-decoration-none text-white">
				<a class="btn-sm btn-info text-decoration-none text-white" onclick="printDiv('employees')">PRINT</a>

			</form>
		</div>

	</div>



<section class="table-responsive-sm" id="employees">
	<div style="margin:auto">
		<div style="text-align: center;">
			<p class="m-2"><strong>CO-OPERATIVE GOVERNANCE, HUMAN SETTLEMENTS AND TRADITIONAL AFFAIRS:LIMPOPO</strong>
			</p>
			<p class="m-2"><strong>CONTRACT TYPE: <label id="lbl_contract_type"></label> FINANCIAL YEAR: <label id="lbl_financial_year"> <?php set_value('financial_year') ?></label> </strong></p>
			<p class="m-2"><strong>VALID PERIOD: COMPLIANCE</strong></p>
		</div>
	</div>
	<div>
		<div style="text-align: center;" class="m-2">
			<img src="<?php echo base_url()?>assets\images\cogstah_img.jpg" style="height: 150px" alt="img" />
		</div>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="example2">
				<thead>
				<tr>
					<th>
						#
					</th>

					<th>
						PERSAL NO
					</th>

					<th>
						SURNAME
					</th>

					<th>
						NAME
					</th>

					<th>
						POSITION
					</th>

					<th>
						BRANCH
					</th>

					<th>
						FINANCIAL YEAR
					</th>


				</tr>
				</thead>
				<tbody>


				<?php
				$counter = 0;
				foreach ($all_users as $user) {
					$counter++;
					echo
							'
                        <tr>
                            <td>
                                ' . $counter . '
                            </td>
                            <td>' . $user['Persal'] . '</td>
                            <td>' . $user['LastName'] . '</td>
                            <td>' . $user['Name'] . '</td>
                            <td>' . $user['JobTitle'] . '</td>	
                            <td>' . $user['br_name'] . '</td>	
                            <td>SUBMITTED</td>	
                        </tr>
                            
                        ';
				}
				?>

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
		if('PERFORMANCE INSTRUMENT' === document.getElementById('contract_type').value)
		{
			lbl.innerText = 'MEMORANDUM OF UNDERSTANDING';
		}
	}

	function SelectedYear()
	{
		var lbl = document.getElementById('lbl_financial_year');
		lbl.innerText = document.getElementById('financial_year').value;
	}

	function queryReport()
	{
		/*
		const error = document.getElementsByName('error');

		const year = document.getElementsByName('financial_year');
		const business_unit = document.getElementsByName('business_unit');



		alert(year.value);

		if(year.value == 'SELECT YEAR')
		{
			error.innerHTML = "SELECT A FINANCIAL YEAR";
			return;
		}
		if(business_unit == 'BUSINESS UNIT'.trim())
		{
			error.innerHTML = "SELECT A BUSINESS UNIT";
			return;
		}*/
		document.getElementById("query_form").submit();
	}

	function printDiv(divName) {
		const printContents = document.getElementById(divName).innerHTML;
		const originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}



</script>


<script>


	$(document).ready(function ()
	{
		$('#directorate').on('change', function() {
			//alert('xxx');
			var selectedValue = $(this).val();
			//alert(selectedValue);
			if (selectedValue != "") {
				$.ajax({
					url: "<?php echo base_url() ?>employees/get_sub_directorates/" + selectedValue,
					type: "POST",
					data: {option: selectedValue},
					success: function (result) {
						const res = JSON.parse(result);
						$('#sub_directorate').children().remove();

						$('#sub_directorate').append(`<option selected disabled value="-1">
                                      --SELECT SUB-DIRECTORATE--
                                  </option>`);
						for (val of res) {
							$('#sub_directorate').append(`<option value="${val.id}">
                                       ${val.name}
                                  </option>`);
						}

					}


				});
			}
		});
	});
</script>


