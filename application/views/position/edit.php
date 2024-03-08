<div class="row">
	<div class="col-md-4">
		<form method="post" action="<?php echo base_url()?>position/update_position">
			<div class="text-danger"></div>
			<input type="hidden" name="id" value="<?php echo $id?>" />
			<div class="form-group">
				<label  class="control-label">Name</label>
				<input name="name" class="form-control" value="<?php echo $name;?>"/>
				<span class="text-danger"><?php echo form_error('name') ?></span>
			</div>
			<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>

<div>
	<a href="<?php echo base_url()?>position">Back to List</a>
</div>
