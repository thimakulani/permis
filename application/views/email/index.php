

<div class="card">
	<div class="card-header p-2">
		<h3>EMAIL</h3>
	</div><!-- /.card-header -->
	<div class="card-body">
		
			
				<!-- Post -->
				<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo base_url()?>email/send_email">
				<div class="form-group row">
						<label  class="col-sm-2 col-form-label">SENT TO</label>
						<div class="col-sm-10">
							<select class="form-control" name="employee_group">
								<option value="all">ALL EMPLOYEES</option>
								<option value="non-sms">NONE SMS MEMBERS</option>
								<option value="sms">SMS MEMBERS</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">SUBJECT</label>
						<div class="col-sm-10">
                            <input class="form-control" name="subject" placeholder="SUBJECT" />
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">MESSAGE</label>
						<div class="col-sm-10">
                            <textarea class="form-control" name="message" placeholder="MESSAGE"></textarea>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="offset-sm-2 col-sm-10">
							<input type="submit" value="SEND EMAIL" class="btn-sm btn-info" />
						</div>
					</div>
				</form>
				<!-- /.post -->
		<script>
			$(document).ready(function() {
				$('#emailForm').submit(function(e) {
					e.preventDefault(); // Prevent default form submission

					// Serialize form data
					var formData = new FormData($(this)[0]);

					// Perform AJAX request
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url()?>email/send_email',
						data: formData,
						contentType: false,
						processData: false,
						success: function(response) {
							// Handle success response
							console.log(response);
							alert('Email sent successfully!');
							// You can update UI or perform any action here
						},
						error: function(xhr, status, error) {
							// Handle error response
							console.error(xhr.responseText);
							alert('Failed to send email!');
							// You can display error messages or perform any action here
						}
					});
				});
			});
		</script>


		<!-- /.tab-content -->
	</div><!-- /.card-body -->
</div>
<!-- /.card -->
