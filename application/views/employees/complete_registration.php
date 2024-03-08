<html>
<head>
	<title>PERMIS</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg" />
	<meta name="theme-color" content="#000000" />
	<meta name="author" content="SITA" />
	<meta name="keyword" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugin/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/blueimp-gallery.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme-celurean.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom-style.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flatpickr.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-editable.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/smart_wizards.css" />
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<style>
		a {text-decoration: none; }
	</style>
</head>

<body>

</body>
<section>
	<div class="card">
		<div class="card-header">
			<h4>
				COMPLETE REGISTRATION
			</h4>
		</div>
		<div class="card-body">
			<form class="form-horizontal" method="post"
				  action="<?php echo base_url() ?>employees/update_complete_registration">

				<div>
					<div class="row">
						<div class="text-danger">
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">FIRST NAME</label>
								<input name="name" required value="<?php echo $user->Name ?>"
									   class="form-control"/>
								<span class="text-danger">
														<?php echo form_error('name') ?></span>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">LAST NAME</label>
								<input name="surname" required type="text"
									   value="<?php echo $user->LastName ?>" class="form-control"/>
								<span class="text-danger"><?php echo form_error('surname') ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">ID NUMBER</label>
								<input name="id_number" required type="text"
									   value="<?php echo $user->IdNumber; ?>" class="form-control"/>
								<span class="text-danger"><?php echo form_error('id_number') ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">PERSAL</label>
								<input name="persal" required readonly="readonly" value="<?php echo $user->Persal ?>"
									   class="form-control"/>
								<span class="text-danger"><?php echo form_error('persal') ?></span>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">GENDER</label>
								<select name="gender" required class="form-control">
									<option <?php if ($user->Gender == 'Male') {
										echo 'selected';
									} ?> >Male
									</option>
									<option <?php if ($user->Gender == 'Female') {
										echo 'selected';
									} ?> >Female
									</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">RACE</label>
								<select name="race" required class="form-control">
									<option <?php if ($user->Race == 'African') {
										echo 'selected';
									} ?> >African
									</option>
									<option <?php if ($user->Race == 'White') {
										echo 'selected';
									} ?> >White
									</option>
									<option <?php if ($user->Race == 'Indian') {
										echo 'selected';
									} ?> >Indian
									</option>
									<option <?php if ($user->Race == 'Coloured') {
										echo 'selected';
									} ?> >Coloured
									</option>
								</select>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">DISABILITY</label>
								<select required name="disability" class="form-control">

									<?php
									//check disability
									$selected_no = '';
									$selected_yes = '';
									if (isset($_POST['disability'])) {
										if ($_POST['disability'] == 'Yes') {
											$selected_yes = 'selected';
										} else {
											$selected_no = 'selected';
										}
									} else {
										if ($user->Disability == 'Yes') {
											$selected_yes = 'selected';
										} else {
											$selected_no = 'selected';
										}
									}
									echo '<option ' . $selected_yes . ' value="Yes">Yes</option>';
									echo '<option ' . $selected_no . ' value="No">No</option>';
									?>
								</select>
							</div>


						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">CONTACT INFO</label>
								<input required name="contact" value="<?php echo $user->Contact ?>"
									   class="form-control"/>
								<span class="text-danger"><?php echo form_error('contact') ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">EMAIL ADDRESS</label>
								<input required name="email" type="text" value="<?php echo $user->Email ?>"
									   class="form-control"/>
								<span class="text-danger"><?php echo form_error('email') ?></span>
							</div>

						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">SUPERVISOR</label>
								<select required name="supervisor"  class="form-control select2">
									<option value='-1' selected disabled >--SELECT SUPERVISOR --</option>
									<?php
									$selectedPosition = '';
									foreach ($all_users as $s) {
										$selected = '';
										if ($_POST['supervisor'] == $s['Id']) {
											$selected = 'selected';
										} else {
											if ($user->S_Id == $s['Id']) {
												$selected = 'selected';
												$selectedPosition = $s['Id'];
											}
										}
										echo '<option ' . $selected . ' value="' . $s['Id'] . '">' . strtoupper($s['Name']) . ' ' . strtoupper($s['LastName']) . '</option>';
									}
									?>
								</select>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">JOB TITLE</label>
								<select required name="position" class="form-control select2">
									<?php
									$selectedPosition = '';
									foreach ($position as $p) {
										$selected = '';
										if ($_POST['position'] == $p['PositionId']) {
											$selected = 'selected';
											$selectedPosition = $p['PositionId'];
										}
										echo '<option ' . $selected . ' value="' . $p['PositionId'] . '">' . $p['PositionName'] . '</option>';
									}
									?>
								</select>
							</div>


						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">ROLE</label>
								<select name="role" class="form-control select2">
									<option selected value="1">USER</option>
								</select>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">DISTRICT</label>
								<select required name="district" class="form-control">
									<?php
									//DistrictId	DistrictName
									$selectedPosition = '';
									foreach ($districts as $d) {
										$selected = '';
										if ($_POST['district'] == $d['DistrictId']) {
											$selected = 'selected';
											$selectedPosition = $d['DistrictId'];
										}
										echo '<option ' . $selected . ' value="' . $d['DistrictId'] . '">' . $d['DistrictName'] . '</option>';
									}
									?>
								</select>
							</div>

						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">SALARY LEVEL</label>
								<input required name="salary_level" type="number" min="1" max="16" required
									   value="<?php echo $user->SalaryLevel; ?>"
									   class="form-control"/>
								<span class="text-danger"><?php echo form_error('salary_level') ?></span>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">SALARY LEVEL ENTRY DATE</label>
								<input required name="level_entry_date" type="date"
									   value="<?php echo $user->SalaryLevelEntryDate ?>"
									   class="form-control"/>
								<span class="text-danger"><?php echo form_error('level_entry_date') ?></span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">DATE OF APPOINTMENT</label>
								<input required name="appoint_date" type="date"
									   value="<?php echo $user->AppointmentDate ?>"
									   class="form-control"/>
								<span class="text-danger"><?php echo form_error('appoint_date') ?></span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">DIRECTORATE</label>
								<select  name="directorate" id="directorate" onchange="directorateSelected()"
										class="form-control select2">
									<option value="-1" disabled selected>--SELECT DIRECTORATE--</option>
									<?php
									//DistrictId	DistrictName
									$selectedPosition = '';
									foreach ($directorate as $bu) {
										$selected = '';
										if ($_POST['directorate'] == $bu['id']) {
											$selected = 'selected';
											$selectedPosition = $bu['id'];
										}
										echo '<option ' . $selected . ' value="' . $bu['id'] . '">' . $bu['name'] . '</option>';
									}
									?>
								</select>
							</div>

						</div>
						<?php if($user->SalaryLevel <13)
						{
						 ?>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">SUB-DIRECTORATE</label>
									<select  name="sub_directorate" id="sub_directorate" class="form-control">

									</select>
								</div>

							</div>

						<?php } ?>
						<div class="col-md-6">
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

						</div>


					</div>
					<div class="form-group">
						<input type="submit" value="SAVE CHANGES" class="btn-sm btn-primary"/>
					</div>

			</form>
		</div>
	</div>
</section>
</html>

<script>


	$(document).ready(function () {
		$('#directorate').on('change', function() {
		//$("#directorate").change(function () {
			var selectedValue = $(this).val();
			//alert(selectedValue);
			if (selectedValue != "") {
				$.ajax({
					url: "<?php echo base_url() ?>employees/get_sub_directorates/" + selectedValue,
					type: "POST",
					data: {option: selectedValue},
					success: function (result) {
						const res = JSON.parse(result);
						
						$('#sub_directorate').children().remove();
						$('#sub_directorate').append(`<option value="-1">
                                       --NONE--
                                  </option>`);
						for (val of res) {
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
<script src="<?php echo base_url()?>assets/plugin/select2/js/select2.full.min.js"></script>


<script>
	$(function () {
		$('.select2').select2()
	});
</script>
