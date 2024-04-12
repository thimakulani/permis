<?php $period = $submission_row->period;

?>
<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance">BACK</a>
</div>

<div>

	<h1 style="font-weight: bold" align="center">FORMAL ANNUAL ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php echo $period; ?></h4>
	<h4 style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</h4>
	<p style="font-weight: bold">(To be completed by the jobholder, prior to the assessment process. If the space
		provided is insufficient, the comments can be included as an attachment)</p>

	<ul>
		<li>During this performance assessment period, my major achievements / accomplishments as they relate to my
			Performance Agreement were:
		</li>
		<li>During this performance assessment period, I have achieved / accomplished the following, which was/were not
			part of my Performance Agreement:
		</li>
		<li>During this performance assessment period, I was less successful in the following areas, which formed part
			of my Performance Agreement, for the reasons stated
		</li>
	</ul>


</div>
<div class="card">
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

					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						JOBHOLDERS RATING 1 - 4
					</th>
					<th>
						SUPERVISORS RATING 1 - 4
					</th>
					<th>
						AGREED RATE
					</th>
					<th>
						PAR SCORE
					</th>
					<th>
						PERFORMANCE REPORT
					</th>
					<?php if($submission_row->status == 'PENDING'){ ?>
						<th></th>
						<th></th>
					<?php } ?>
				</tr>
				</thead>
				<tbody>

				<?php

				//print_r($submission_row);
				$counter = 0;
				$kraScore = 0;
				$track_update = 0;
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];
					$kraScore += $m['par_score'];
					?>
					<form id="update_pp<?php echo $m['id']; ?>" method="post">
						<tr>
							<td>
								<?php echo $m['key_responsibility'] ?>
							</td>
							<td>
								<?php echo $m['gafs'] ?>
							</td>

							<td><input class="form-control weight" disabled type="text"
									   value="<?php echo $m['outcome_weight'] ?>"/></td>

							<td><input class="form-control" disabled type="number" name="job_holder_rating_ann" value="<?php echo $m['job_holder_rating_ann']?>"/></td>

							<td><input class="form-control" required type="number" min="1" max="4" name="supervisor_rating_ann" value="<?php echo $m['supervisor_rating_ann'] ?>"/></td>
							<td>
								<input class="form-control rate" required type="text" name="agreed_rating_ann" value="<?php echo $m['agreed_rating_ann'] ?>"/>
							</td>
							<td><input class="form-control par" readonly required name="par_score_ann" value="<?php echo $m['par_score_ann'] ?>"/></td>
							<td>  <?php echo $m['performance_report_ann']  ?></td>

							<?php if($submission_row->status == 'PENDING'){ ?>
								<td><button type="button" class="btn-sm btn-info process">par</button></td>
								<td>
									<input type="submit" value="update" class="btn-sm btn-info"/>
								</td>
							<?php }?>
						</tr>
					</form>

					<script>
						$(document).ready(function () {
							$('#update_pp<?php echo $m['id']; ?>').submit(function (e) {
								e.preventDefault(); // prevent the form from submitting normally
								$.ajax({
									type: 'POST',
									url: '<?php echo base_url() ?>performance/update_sup_performance_ann/<?php echo $m['id']; ?>/<?php echo $data->id; ?>/<?php echo $data->emp_id; ?>',
									data: $('#update_pp<?php echo $m['id']?>').serialize(), // serialize the form data
									success: function (response) 
									{
										Swal.fire({
											icon: 'success',
											title: 'Success!',
											text: 'Successfully updated',
											onClose: () => {
												location.reload();
											}
										});
										
									}
								});
							});
						});

					</script>



					<?php
					$track_update++;
				} ?>



				</tbody>

			</table>
			<?php echo '<h5 style="margin: 5px"> Sub-Total: ' . $counter . '</h5>' ?>


		</div>
	</div>


</div>

<br/>
<!--<h1>MID YEAR PERFORMANCE OUTCOME</h1>
<form class="table-responsive" method="post" action="<?php /*base_url() */?>performance/add_factor/7">
	<input value="MID YEAR ASSESSMENT" type="hidden" name="template_name"/>
	<table class="table table-bordered projects">
		<thead>
		<tr>
			<th>
				FACTOR

			</th>
			<th>
				(A) SUB-TOTAL
			</th>

			<th class="text-center">
				(B) % OF ASSESSMENT
			</th>
			<th>
				(A x B) TOTAL SCORE
			</th>
			<th></th>
		</tr>

		</thead>
		<tbody>
		<tr>
			<td>
				SECTION A: KEY RESULTS AREAS ACHIEVED
			</td>
			<td><input disabled type="number" id="val_a" name="sub_total_a" value="<?php /*echo $counter */?>" required class="form-control"/></td>
			<td><input type="number" id="val_b" name="of_assessment" value="<?php /*if (isset($factor->of_assessment)) {
					echo $factor->of_assessment;
				} */?>" required class="form-control"/></td>
			<td><input type="number" id="val_total"
					   value="<?php /*if (isset($factor->of_assessment) && isset($factor->sub_total_a)) {
						   echo $factor->of_assessment * $factor->sub_total_a;
					   } */?>" disabled class="form-control"/></td>

		</tr>

		<tr>
			<td colspan="3">
				SCORE IN PERCENTAGE (C / 3 x 100%) <strong>DO NOT ROUND OFF<strong>
			</td>

			<td><input type="number" disabled id="total_c" value="<?php /*echo ($kraScore / 3) * 100*/?>" class="form-control"/></td>
		</tr>

		<tr>
			<td colspan="3">
				(C) SCORE
			</td>
			<td><input disabled type="number" id="val_c" name="c_score" value="<?php /*echo $kraScore */?>" required class="form-control"/></td>
			<th><input class="btn-sm btn-info" type="submit" value="SAVE"/></th>
		</tr>

		</tbody>
	</table>

</form>-->
<br/>


<br/>

<form method="post" action="<?php echo base_url() ?>performance/submit_performance_mid/7">
	<input type="hidden" name="template_name" value="ANNUAL YEAR ASSESSMENT">
	<div>
		<div class="card"><H2>AGREEMENT ASSESSMENT</H2>      <br>
			<table class="table table-bordered">
				<thead style="background: #939ba7">
				<th> JOBHOLDER</th>
				<th> SUPERVISOR</th>
				</thead>
				<tbody>
				<tr>
					<td>
						<h5>I acknowledge that my supervisor and I have discussed the performance and I:</h5>
						<br>
						<input type="radio" checked name="option" value="yes">
						<label for="agree"> AGREE WITH THE ASSESSMENT</label>
						<br> <br>
						<input type="radio" name="option" value="no">
						<label for="not_agree"> DO NOT AGREE WITH ASSESSMENT (If in disagreement please provide and
							attach written reasons) </label><br>
					</td>
					<td>
						<h5>I acknowledge that I have discussed the official’s performance with him / her and that the
							assessment is a true reflection of his / her performance of the period:</h5>
					</td>
				</tr>
				<tr>
					<td><input disabled placeholder="Reason If you Disagree" value="<?php echo $submission_row->reason ?>" class="form-control" name="reason" type="text"/>
					</td>
					<td><p>To put the date(period)</p></td>
				</tr>
				<tr>
					<td><p>I acknowledge that my supervisor and I have discussed the performance and I</p></td>
					<td><input placeholder="Comments" class="form-control" name="sup_comment" disabled type="text"/>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>

	<br/>
</form>


<br/>
<div class="card">
	<?php if($submission_row->status == 'PENDING'){ ?>

		<div class="card-body">
			<form class="form-inline" id="statusForm"  method="post" action="<?php echo base_url()?>performance/sup_update_status/<?php echo $submission_id ?>">
				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<input type="submit" class="btn-sm btn-primary m-2" />
				<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
			</form>
		</div>
	<?php }?>
</div>

<script>
    $(document).ready(function(){
        $('#submitBtn').click(function(e){
            e.preventDefault(); // Prevent default form submission
            
            // Serialize form data
            var formData = $('#statusForm').serialize();
            
            // Send AJAX request
            $.ajax({
                url: $('#statusForm').attr('action'),
                type: 'post',
                data: formData,
                success: function(response){
					Swal.fire({
											icon: 'success',
											title: 'Success!',
											text: 'Successfully approved',
											onClose: () => {
												location.reload();
											}
										});
                },
                error: function(xhr, status, error){
                    // Handle errors
                    Swal.fire({
											icon: 'error',
											title: 'Error!',
											text: 'Something went wrong',
											
										});
                    // You can display an error message or perform other actions here
                }
            });
        });
    });
</script>



<?php
if ($_SESSION['Role'] == 6 ) {
	echo '
		<div class="card-body p-0 table-responsive-sm">
			<table class="table table-hover projects">
				<thead>
				<tr>
					<th>
						STATUS
					</th>
					<th>
						ACCEPT VALIDITY
					</th>
					<th>
						REJECT VALIDITY
					</th>
				</tr>
				</thead>
				<tbody>';

	echo '<tr>
        <td>' . $data->status . '</td>';
	if ($_SESSION['Role'] == 6 || $_SESSION['Role'] == 3) {
		echo '
        <td>
            <a class="btn-sm btn-success form-control" style="text-align: center;font-weight: bold" href="' . base_url() . 'performance/pmds_approve_mid/' . $data->id . '/' . $data->employee . '">Approve Performance Instrument</a>
        </td>
        <td>
            <button style="text-align: center;font-weight: bold" class="btn-sm btn-danger form-control" id="showElements">Correction</button>
        </td>
        <form method="post" action="' . base_url() . 'performance/pmds_reject_mid/' . $data->id . '/' . $data->employee . '">
         <input name="pmds_reason" id="hiddenInput" style="display: none" class="form-control" type="text" placeholder="Reason">
         <button type="submit" style="display: none" id="hiddenButton" class="btn-outline form-control" >Done</button>   
        </form>
        ';
	}
	echo '</tbody>
  </table>
  	</div> 
	';
}
?>



<script>

	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVED')
		{
			document.getElementById("comment").style = "display:none";

		}
		if(e.value === 'REJECTED')
		{
			document.getElementById("comment").style = "display:block";

		}
	}



	function CalTotC() {
		let val_c = document.getElementById('val_c').value;
		if (val_c.length >= 1) {
			document.getElementById('total_c').value = val_c / 3 * 100;
		} else {
			alert('(C) SCORE IS REQUIRED');
		}
	}


	function CalTot() {
		let val_a = document.getElementById('val_a').value;
		let val_b = document.getElementById('val_b').value;

		if (val_a.length >= 1 && val_b.length >= 1) {
			let tot = val_a * val_b;
			document.getElementById('val_total').value = tot;
		} else {
			alert('PLEASE PROVIDE THE VALUE OF (A) SUB-TOTAL OR (B) % OF ASSESSMENT');
		}

	}

	document.addEventListener('click', function (event) {
		if (event.target.classList.contains('process')){
			let row = event.target.closest('tr');
			let weight = row.querySelector('.weight').value;
			let rate = row.querySelector('.rate').value;
			let parInput = row.querySelector('.par');

			if (weight.length > 0 && rate.length >0)
			{
				let product = weight* rate/100;
				parInput.value = product;
			}
			else{
				alert('Provide all required values')
			}
		}
	})

</script>








<!--<div>
	<a class="btn-sm btn-info" href="<?php /*echo base_url() */?>performance/submitted_performance" >BACK</a>
</div>
<div>

	<h1 style="font-weight: bold" align="center">FORMAL ANNUAL ASSESSMENT</h1>
	<h4 style="font-weight: bold" align="center">PERFORMANCE PERIOD: <?php /*echo $submission_row->period*/?></h4>
	<h4 style="font-weight: bold" align="center">COMMENTS BY JOBHOLDER</h4>
	<p style="font-weight: bold">(To be completed by the jobholder, prior to the assessment process. If the space
		provided is insufficient, the comments can be included as an attachment)</p>

	<ul>
		<li>During this performance assessment period, my major achievements / accomplishments as they relate to my
			Performance Agreement were:
		</li>
		<li>During this performance assessment period, I have achieved / accomplished the following, which was/were not
			part of my Performance Agreement:
		</li>
		<li>During this performance assessment period, I was less successful in the following areas, which formed part
			of my Performance Agreement, for the reasons stated
		</li>
	</ul>


</div>
<div class="card">
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

					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						JOBHOLDERS RATING 1 - 4
					</th>
					<th>
						SUPERVISORS RATING 1 - 4
					</th>
					<th>
						DECISION OF SUPERVISOR
					</th>
					<th>
						PAR SCORE
					</th>
					<th>
						PERFORMANCE REPORT
					</th>

				</tr>
				</thead>
				<tbody>

				<?php
/*				$counter = 0;
				foreach ($performance_plan as $m) {
					$counter = $counter + $m['outcome_weight'];
					*/?>

					<tr>
						<td>
							<?php /*echo  $m['key_responsibility'] */?>
						</td>
						<td>
							<?php /*echo $m['gafs'] */?>
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php /*echo $m['outcome_weight'] */?>" />
						</td>

						<td>
							<input class="form-control" disabled  type="text" value="<?php /*echo $m['job_holder_rating_ann'] */?>" />
						</td>

						<td>
							<input class="form-control"  type="number" value="<?php /*echo $m['supervisor_rating_ann'] */?>" />
						</td>
						<td>
							<input class="form-control"  type="text"  value="<?php /*echo $m['decision_of_supervisor_ann'] */?>" />
						</td>
						<td>
							<input class="form-control" disabled type="text" value="<?php /*echo $m['par_score_ann'] */?>" />
						</td>
						<td>
							<?php /*echo $m['performance_report_ann'] */?>
						</td>

					</tr>


				<?php /*} */?>

				</tbody>

			</table>
			<?php /*echo '<legend> Sub-Total: ' . $counter . '</legend>' */?>
		</div>
	</div>


</div>

<div class="card">
	<div class="card-body">
		<?php /*if($submission_row->status == 'PENDING'){ */?>

			<form class="form-inline"  method="post" action="<?php /*echo base_url()*/?>performance/sup_update_status/<?php /*echo $submission_id */?>">
				<select name="action_option" id="action" onchange="optionChange()" class="form-control">
					<option class="form-control select" value="APPROVED" >APPROVE</option>
					<option value="REJECTED" >REJECT</option>
				</select>
				<input type="submit" class="btn-sm btn-primary m-2" />
				<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
			</form>
		<?php /*}*/?>
	</div>
</div>


<script>
	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVED')
		{
			document.getElementById("comment").style = "display:none";

		}
		if(e.value === 'REJECTED')
		{
			document.getElementById("comment").style = "display:block";

		}
	}


</script>

-->
