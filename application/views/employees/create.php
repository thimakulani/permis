<div class="card">
	<div class="card-header">
		<a class="btn btn-primary" href="<?php echo base_url()?>employees/index">Back</a>
	</div>

	<form method="post" action="<?php echo site_url('employees/register'); ?>">
		<div class="card-body">

			<span class="text-danger">
				<?php //echo $error; ?>
			</span>
			<div class="row">

				<div class="col-md-6">

					<div class="form-group">
						<label >NAME</label>
						<input type="text" name="firstname" class="form-control" value="<?php echo set_value('firstname'); ?>"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('firstname') ?> </span>
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>LAST-NAME</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('lastname') ?> </span>
					</div>
					<!-- /.form-group -->
				</div>
				<!-- /.col -->
				<div class="col-md-6">
					<div class="form-group">
						<label>PHONE NUMBER</label>
						<input type="number" name="phone_number" value="<?php echo set_value('phone_number'); ?>" class="form-control" style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('phone_number') ?> </span>
					</div>
					<!-- /.form-group -->
					<div class="form-group">
						<label>EMAIL</label>
						<input type="email" name="email_address" value="<?php echo set_value('email_address'); ?>" class="form-control"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('email_address') ?> </span>
					</div>
					<!-- /.form-group -->
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>DEPARTMENT</label>
						<input type="text" name="department" value="<?php echo set_value('department'); ?>" class="form-control"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('department') ?> </span>
					</div>
					<div class="form-group">
						<label >PERCAL</label>
						<input type="number" name="percal" value="<?php echo set_value('percal'); ?>" class="form-control"  style="width: 100%;" />
						<span class="text-danger"> <?php echo form_error('percal') ?> </span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>ROLE</label>
						<select  name="role" class="form-control">
							<?php
							foreach ($roles as $role){
								$selected = '';
								if($_POST['role']==$role['Id'])
								{
									$selected = 'selected';
								}
								echo '<option '.$selected.' value="'.$role['Id'].'">'.$role['RoleName'].'</option>';
							}
							?>
						</select>
						<span class="text-danger"> <?php echo form_error('role') ?> </span>
					</div>
				</div>
				<!-- /.col -->

			</div>
			<div class="card-footer">
				<input type="submit" class="btn btn-primary" value="SUBMIT" />
			</div>
		</div>
	</form>
</div>
