<div class="modal-dialog" role="document">

	<div class="modal-content">
		<div class="modal-header">

			<h5 class="modal-title">ATTENDANCE REGISTER</h5>
			<a href="<?php echo base_url()?>library/attendance_register" class="close" >
				<span aria-hidden="true">&times;</span>
			</a>
		</div>
		<form enctype="multipart/form-data" action="<?php echo base_url()?>library/create" method="post">
			<div class="modal-body">
				<div class="card-body">
					<input type="hidden" name="file_type" value="ATTENDANCE REGISTER">
					<input type="hidden" name="navigation" value="attendance_register">
					<div class="form-group">
						<label> FILE NAME</label>
						<input type="text" class="form-control"  name="name" placeholder="FILE NAME" value="<?php set_value('name') ?>">
						<span class="text-danger"><?php echo form_error('name') ?></span>

					</div>
					<div class="form-group">
						<label> FILE DESCRIPTION</label>
						<input type="text" placeholder="FILE DESCRIPTION" class="form-control" name="description" value="<?php set_value('description') ?>">
						<span class="text-danger"><?php echo form_error('description') ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 col-form-label">ATTACHMENT</label>
					<div class="col-sm-10">
						<input class="form-control file-uploads" name="attachment"  type="file" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])"  placeholder="ATTACHMENT" />
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<input type="submit" value="SAVE" class="btn btn-primary"/>
			</div>
		</form>
	</div>
</div>
