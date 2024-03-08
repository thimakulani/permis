
<section class="content">

	<hr />
	<div>
		<a class="btn-sm btn-success" href="<?php echo base_url()?>employees/">Back to List</a>
	</div>
	<hr />
	<div class="card">
		<div class="card-body">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>employees/create_user">
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
									<option <?php if(isset($_POST['gender'])){ if($_POST['gender'] == 'Male'){echo 'selected';}} ?> value="Male">Male</option>
									<option <?php if(isset($_POST['gender'])){ if($_POST['gender'] == 'Female'){echo 'selected';}} ?> value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">RACE</label>
								<select name="race" class="form-control" >

									<option <?php if(isset($_POST['race'])){ if($_POST['race'] == 'African'){echo 'selected';}} ?> value="African">African</option>
									<option <?php if(isset($_POST['race'])){ if($_POST['race'] == 'White'){echo 'selected';}} ?> value="White">White</option>
									<option <?php if(isset($_POST['race'])){ if($_POST['race'] == 'Indian'){echo 'selected';}} ?> value="Indian">Indian</option>
									<option <?php if(isset($_POST['race'])){ if($_POST['race'] == 'Coloured'){echo 'selected';}} ?> value="Coloured">Coloured</option>
								</select>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">DISABILITY</label>
								<select name="disability" class="form-control" >
									<option <?php if(isset($_POST['disability'])){ if($_POST['disability'] == 'No'){echo 'selected';}} ?> value="No">No</option>
									<option <?php if(isset($_POST['disability'])){ if($_POST['disability'] == 'Yes'){echo 'selected';}} ?> value="Yes">Yes</option>

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
								<label class="control-label">SALARY LEVEL</label>
								<select name="salary_level" id="salary_level" class="form-control" >
									<?php

									for ($i = 1; $i <= 16; $i++)
									{
										$selected_level = '';
										if($_POST['salary_level'] == $i)
										{
											$selected_level = 'selected';
										}
										echo '<option  '.$selected_level.' value="'.$i.'">'.$i.'</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('salary_level') ?></span>
							</div>
						</div>



						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">SALARY LEVEL ENTRY DATE</label>
								<input name="salary_level_entry_date" type="date" onchange="salaryHandler(event);" value="<?php echo set_value('salary_level_entry_date')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('salary_level_entry_date') ?></span>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">DATE OF APPOINTMENT</label>
								<input name="date_of_appointment" type="date" value="<?php echo set_value('date_of_appointment')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('date_of_appointment') ?></span>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">JOB TITLE</label>
								<select name="position" class="form-control select2" >
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
										$names = $m['LastName'] .' '.$m['Name'];
										echo '<option '.$selected.' value="'.$m['Id'].'">'.$names.'</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">ROLE</label>
								<select name="role" class="form-control" >
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
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">DIRECTORATE</label>
								<select name="directorate" id="directorate" onchange="directorateSelected()" class="form-control select2" >
									<option value="" disabled selected>--SELECT DIRECTORATE--</option>
									<?php
									//DistrictId	DistrictName
									$selectedPosition = '';
									foreach ($directorate as $bu)
									{
										$selected = '';
										if($_POST['directorate'] == $bu['id'])
										{
											$selected = 'selected';
											$selectedPosition = $bu['id'];
										}
										echo '<option '.$selected.' value="'.$bu['id'].'">'.$bu['name'].'</option>';
									}
									?>
								</select>
							</div>






						</div>


						<div class="col-md-4">



							<div class="form-group">
								<label class="control-label">SUB-DIRECTORATE</label>
								<select name="sub_directorate" id="sub_directorate" class="form-control" >

								</select>
							</div>



						</div>

						<div class="col-md-4">


							<div class="form-group">
								<label class="control-label">BRANCH</label>
								<select name="branch" class="form-control" >
									<option value="" disabled selected>--SELECT BRANCH--</option>
									<?php
									//DistrictId	DistrictName
									$selectedBranch = '';
									foreach ($branch as $bu)
									{
										$selected = '';
										if($_POST['branch'] == $bu['id'])
										{
											$selected = 'selected';
											$selectedBranch = $bu['id'];
										}
										echo '<option '.$selected.' value="'.$bu['id'].'">'.$bu['name'].'</option>';
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label  class="control-label">PMDS OFFICIAL</label>
								<select name="pmd" class="form-control select2">
									<?php
									$selectedPosition = '';
									foreach ($pmd as $m)
									{
										$selected = '';
										if($_POST['pmd'] == $m['Id'])
										{
											$selected = 'selected';
											$selectedPosition = $m['Id'];
										}
										$names = $m['LastName'] .' '.$m['Name'];
										echo '<option '.$selected.' value="'.$m['Id'].'">'.$names.'</option>';
									}
									?>
								</select>
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
<script>


	$(document).ready(function() {
		$("#directorate").change(function() {
			var selectedValue = $(this).val();
			//alert(selectedValue);
			if(selectedValue != "") {
				$.ajax({
					url: "<?php echo base_url() ?>employees/get_sub_directorates/"+selectedValue,
					type: "POST",
					data: { option: selectedValue },
					success: function(result) {
						const res = JSON.parse(result);
						//$('#sub_directorate').empty());
						$('#sub_directorate').children().remove();
						for (val of res)
						{
							$('#sub_directorate').append(`<option value="${val.id}">
                                       ${val.name}
                                  </option>`);
						}

					}


				});
			}
		});
	});
</script>
