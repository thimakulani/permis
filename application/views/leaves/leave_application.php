

<div class="card">
	<div class="card-header p-2">
		<h3>LEAVE APPLICATION</h3>
	</div><!-- /.card-header -->
	<div class="card-body">
		<div class="tab-content">
			<div class="active tab-pane" id="PROFILE">
				<!-- Post -->
				<form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo base_url()?>leaves/leave_application">
					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">START DATE</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" value="" name="start_date" placeholder="First Name" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">END DATE</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" value=""  name="end_date" placeholder="Last Name" />
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">LEAVE ABSENT TYPE</label>
						<div class="col-sm-10">
							<select class="form-control" name="leave_type">
								<option value="sick">SICK LEAVE</option>
								<option value="maternity">MATERNITY</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">COMMENT</label>
						<div class="col-sm-10">
							<input class="form-control" name="comment" value=""  placeholder="COMMENT" />
						</div>
					</div>


						<div class="form-group row">
							<label class="col-sm-2 col-form-label">ATTACHMENT</label>
							<div class="col-sm-10">
								<input class="form-control file-uploads" name="attachment"  type="file" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])"  placeholder="ATTACHMENT" />
							</div>
						</div>
					<div class="form-group row">
						<div class="offset-sm-2 col-sm-10">
							<input type="submit" name="create" class="btn-sm btn-danger" />
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
