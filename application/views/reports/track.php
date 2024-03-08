<div class="card-tools">
			<form method="post" action="<?php echo base_url()?>reports/track" >
				<div class="inline-form">
					
						<select name="branch" class="select2" >
							<option value="" disabled selected>--SELECT BRANCH--</option>
								<?php
										//DistrictId	DistrictName
									$selectedBranch = '';
									foreach ($branch as $bu)
									{
										$selected = '';
										if($_POST['branch'] == $bu['id'])
										{
											$selected = 'selected';
											$selectedBranch = $bu['id'];
										}
										else if(isset($_SESSION['branch']))
										{
											if($_SESSION['branch'] == $bu['id'])
											{
												$selected = 'selected';
												$selectedBranch = $bu['id'];
											}
										}
											echo '<option '.$selected.' value="'.$bu['id'].'">'.$bu['name'].'</option>';
									}
									?>
						</select>
					
				 
				
				
					
					<input type="submit" name="filter_branch" value="FILTER BRANCH" class="btn-sm btn-info" />
					<a class="btn-sm btn-info text-decoration-none text-white" onclick="printDiv('employees')">PRINT</a>
				</div>
			</form>
		</div>
<div class="table-responsive-sm" id="employees">
	<div style="margin:auto">
		<div style="text-align: center;">
			<p class="m-2"><strong>CO-OPERATIVE GOVERNANCE, HUMAN SETTLEMENTS AND TRADITIONAL AFFAIRS:LIMPOPO</strong>
			</p>
			<p class="m-2"><strong>CONTRACT TYPE: MEMORANDUM OF UNDERSTANDING FINANCIAL YEAR: <label id="financial_year"></label> </strong></p>
			<p class="m-2"><strong>VALID PERIOD: COMPLIANCE</strong></p>
		</div>
	</div>

	<div class="card-header">
	</div>
	<div class="card-body">
		<div class="card-header">
			
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="example2">
				<thead>
				<tr>
					<th>
						NUMBER
					</th>

					<th>
						PERSAL NUMBER
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
						SUBMITTED TO
					</th>


				</tr>
				</thead>
				<tbody>


				<?php
				$counter = 1;
				foreach ($all_users as $user) {
					$status = '';
					if($user['status'] == 'PENDING' )
					{
						$status = 'SUBMITTED TO SUPERVISOR';
					}
					if($user['status_final'] == 'PENDING' && $user['status'] == 'APPROVED')
					{
						$status = '<span style="color:blue">SUBMITTED TO PMDS</span>';
					}
					if($user['status_final'] == 'APPROVED')
					{
						$status = 'APPROVED BY PMD';
					}
					if($user['status'] == 'REJECTED')
					{
						$status = '<span style="color:red">REJECTED BY SUPERVISOR<span>';
					}
					if($user['status_final'] == 'REJECTED')
					{
						$status = '<span style="color:red">REJECTED BY PMD<span>';
					}
					
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
                            <td>' .$status.'</td>	
                        </tr>
                            
                        ';
						$counter++;
				}
				?>

				</tbody>
			</table>
		</div>
	</div>


</div>

<script>
	function SelectedContract() {

	}

	function SelectedYear()
	{

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


