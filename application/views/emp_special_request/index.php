

<div class="card">
	<div class="card-body">
		<div class="row">
			<!--href="<?php /*echo base_url()*/?>leaves/leave_application"-->
			<a href="#" data-toggle="modal" data-target="#specialRequestModal" class="btn-lg bg-info text-decoration-none m-2 text-white" >

					<div>
						<span>APPLY FOR SPECIAL REQUEST</span>
					</div>
					<!-- /.info-box-content -->
				</a>

		</div>
	</div>
</div>
<section class="content">

	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h2>SPECIAL REQUESTS</h2>
		</div>


		<div class="card-body p-0 table-responsive-sm">

				<table class="table table-bordered">
					<thead>
					<tr>
						<th>ID</th>
						<th>REQUEST TYPE</th>
						<th>PERIOD</th>
						<th>STATUS</th>
						<th>ATTACHMENT</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($special_request as $request): ?>
						<tr>
							<td><?php echo $request['id']; ?></td>
							<td><?php echo $request['request_type']; ?></td>
							<td><?php echo $request['period']; ?></td>
							<td><?php echo $request['status']; ?></td>
							<td><?php echo $request['attachment']; ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="specialRequestModal" tabindex="-1" aria-labelledby="specialRequestModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="specialRequestModalLabel">Special Request Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="specialRequestForm" enctype="multipart/form-data">

					<div class="form-group">
						<label for="request_type">REQUEST TYPE</label>
						<input type="text" class="form-control" id="request_type" name="request_type">
					</div>
					<div class="form-group">
						<label for="financial_year">FINANCIAL YEAR</label>
						<?php
						$years = range(2023, date("Y"));
						$selectedYear = isset($_POST['financial_year']) ? $_POST['financial_year'] : date("Y");
						?>
						<select class="select form-control form-control" name="period" id="period">
							<option disabled selected value="-1">--SELECT A FINANCIAL YEAR--</option>
							<?php foreach ($years as $year) : ?>
								<option <?= $selectedYear == $year ? 'selected' : '' ?> value="<?php echo $year . '/' . ($year + 1); ?>"><?php echo $year . '/' . ($year + 1); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="comment">REASON FOR THE REQUEST</label>
						<textarea class="form-control" id="comment" name="comment"></textarea>
					</div>
					<div class="form-group">
						<label for="attachment">ATTACHMENT(optional)</label>
						<input class="form-control file-uploads" name="attachment"  type="file" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])"  placeholder="ATTACHMENT" />
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Ajax script -->
<script>
	$(document).ready(function(){
		$('#specialRequestForm').submit(function(e){
			e.preventDefault();

			// Create FormData object to store form data and files
			var formData = new FormData($(this)[0]);

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("SpecialRequest/submit_request"); ?>',
				data: formData,
				contentType: false, // Set content type to false for FormData
				processData: false, // Prevent jQuery from automatically processing data
				success: function(response){
					// Handle the response here (e.g., display a success message)
					console.log(response);
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						text: 'Special request has been submitted successfully',
						onClose: function() {
							location.reload();
						}
					});
				},
				error: function(xhr, status, error){
					// Handle errors here
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Something went wrong ' + error,
					});
				}
			});
		});
	});
</script>


