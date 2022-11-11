<hr />
<div class="row">
	<div class="col-md-4">
		<form method="post" action="<?php echo base_url()?>leaves/create_leave">
			<div class="text-danger"><?php //echo $error; ?></div>
			<div class="form-group">
				<label class="control-label">Name</label>
				<input name="name" value="<?php echo set_value('name')?>" class="form-control" />
				<span class="text-danger"><?php echo form_error('name') ?></span>
			</div>
			<div class="form-group">
				<label class="control-label">Number of days</label>
				<input name="name" value="<?php echo set_value('name')?>" class="form-control" />
				<span class="text-danger"><?php echo form_error('name') ?></span>
			</div>
			<div class="form-group">
				<input type="submit" value="Create" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>

<div>
	<a class="btn-sm btn-success" href="<?php echo base_url()?>leaves/leave_types">Back</a>
</div>
