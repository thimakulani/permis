
<section class="content">
	<hr />
	<div>
		<a class="btn-sm btn-success" href="<?php echo base_url()?>employees/">Back to List</a>
	</div>
	<hr />
	<div class="card">
		<div class="card-body">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>employees/create_user">
				<div>
					<div class="row">
						<div class="text-danger">
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">FIRST NAME</label>
								<input name="name" value="<?php echo set_value('name')?>" class="form-control" />
								<span class="text-danger">
									<?php echo form_error('name') ?>
								</span>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">LAST NAME</label>
								<input name="surname" type="text" value="<?php echo set_value('surname')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('surname') ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">ID NUMBER</label>
								<input name="id_number" type="text" value="<?php echo set_value('id_number')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('id_number') ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">PERSAL</label>
								<input name="persal" value="<?php echo set_value('persal')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('persal') ?></span>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">GENDER</label>
								<select name="gender" class="form-control" >
									<option>Male</option>
									<option>Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">RACE</label>
								<select name="race" class="form-control" >
									<option>African</option>
									<option>White</option>
									<option>Indian</option>
									<option>Coloured</option>
								</select>
							</div>

						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">CONTACT INFO</label>
								<input name="contact" value="<?php echo set_value('contact')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('contact') ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">EMAIL ADDRESS</label>
								<input name="email" type="text" value="<?php echo set_value('email')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('email') ?></span>
							</div>

						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">SUPERVISOR</label>
								<select name="supervisor" class="form-control select2">
									<?php
									$selectedPosition = '';
									foreach ($all_users as $m)
									{
										$selected = '';
										if($_POST['supervisor'] == $m['Id'])
										{
											$selected = 'selected';
											$selectedPosition = $m['Id'];
										}
										$names = $m['Name'] .' '.$m['LastName'];
										echo '<option '.$selected.' value="'.$m['Id'].'">'.$names.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">MANAGER</label>
								<select name="manager" class="form-control select2" >
									<?php
									$selectedPosition = '';
									foreach ($all_users as $m)
									{
										$selected = '';
										if($_POST['manager'] == $m['Id'])
										{
											$selected = 'selected';
											$selectedPosition = $m['Id'];
										}
										$names = $m['Name'] .' '.$m['LastName'];
										echo '<option '.$selected.' value="'.$m['Id'].'">'.$names.'</option>';
									}
									?>
								</select>
							</div>

						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">JOB TITLE</label>
								<select name="position" class="form-control" >
									<?php
										$selectedPosition = '';
										foreach ($position as $p)
										{
											$selected = '';
											if($_POST['position'] == $p['PositionId'])
											{
												$selected = 'selected';
												$selectedPosition = $p['PositionId'];
											}
											echo '<option '.$selected.' value="'.$p['PositionId'].'">'.$p['PositionName'].'</option>';
										}
									?>
								</select>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">ROLE</label>
								<select name="role" class="form-control select2-selection" >
									<?php
										$selectedPosition = '';
										foreach ($roles as $r)
										{
											$selected = '';
											if($_POST['role'] == $r['RoleId'])
											{
												$selected = 'selected';
												$selectedPosition = $r['RoleId'];
											}
											echo '<option '.$selected.' value="'.$r['RoleId'].'">'.$r['RoleName'].'</option>';
										}
									?>
								</select>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">DISTRICT</label>
								<select name="district" class="form-control" >
									<?php
									//DistrictId	DistrictName
									$selectedPosition = '';
									foreach ($districts as $d)
									{
										$selected = '';
										if($_POST['district'] == $d['DistrictId'])
										{
											$selected = 'selected';
											$selectedPosition = $d['DistrictId'];
										}
										echo '<option '.$selected.' value="'.$d['DistrictId'].'">'.$d['DistrictName'].'</option>';
									}
									?>
								</select>
							</div>

						</div>
					</div>

				</div>
				<div class="form-group">
					<input type="submit" value="Create" class="btn-SM btn-primary" />
				</div>
			</form>
		</div>
	</div>
</section>


