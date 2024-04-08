

<div class="card">
	<div class="card-header p-2">
		<h3>EMAIL</h3>
	</div><!-- /.card-header -->
	<div class="card-body">
		<div class="tab-content">
			<div>
				<!-- Post -->
				<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo base_url()?>leaves/leave_application">
					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">MESSAGE</label>
						<div class="col-sm-10">
                            <textarea class="form-control" name="message" placeholder="First Name"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">SENT TO</label>
						<div class="col-sm-10">
							<select class="form-control" name="employee_group">
								<option value="sick">SICK LEAVE</option>
								<option value="maternity">MATERNITY</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="offset-sm-2 col-sm-10">
							<input type="submit" name="SEND" class="btn-sm btn-danger" />
						</div>
					</div>
				</form>
				<!-- /.post -->
			</div>
		</div>
		<!-- /.tab-content -->
	</div><!-- /.card-body -->
</div>
<!-- /.card -->
