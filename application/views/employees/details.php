<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>First Name</b> <a class="float-right"><?php echo $user->Name; ?></a>
							</li>
							<li class="list-group-item">
								<b>Last Name</b> <a class="float-right"><?php echo $user->LastName; ?></a>
							</li>


							<li class="list-group-item">
								<b>Gender</b> <a class="float-right"><?php echo $user->Gender; ?></a>
							</li>

							<li class="list-group-item">
								<b>Race</b> <a class="float-right"><?php echo $user->Race; ?></a>
							</li>

							<li class="list-group-item">
								<b>Persal</b> <a class="float-right"><?php echo $user->Persal; ?></a>
							</li>
							<li class="list-group-item">
								<b>Id Number</b> <a class="float-right"><?php echo $user->IdNumber; ?></a>
							</li>

							<li class="list-group-item">
								<b>Phone Number</b> <a class="float-right"><?php echo $user->Contact; ?></a>
							</li>
							<li class="list-group-item">
								<b>Date Created</b> <a class="float-right"><?php echo $user->DateCreated; ?></a>
							</li>
							<li class="list-group-item">
								<b>District</b> <a class="float-right"><?php echo $user->DistrictName; ?></a>
							</li>
							<li class="list-group-item">
								<b>Job Title</b> <a class="float-right"><?php echo $user->JobTitle; ?></a>
							</li>
							<!--<li class="list-group-item">
								<b>Manager</b>  <a class="float-right"><?php /*echo $user->M_Name; */ ?></a>
							</li>-->
							<li class="list-group-item">
								<b>Supervisor</b> <a class="float-right"><?php echo $user->S_Name; ?></a>
							</li>

							<li class="list-group-item">
								<b>PMD Official</b> <a class="float-right"><?php echo $user->Pmd_Name; ?></a>
							</li>


							<li class="list-group-item">
								<b>Disability</b> <a class="float-right"><?php echo $user->Disability; ?></a>
							</li>


						</ul>
						<form method="post" enctype="multipart/form-data"
							  action="<?php echo base_url() ?>employees/update_status/<?php echo $user->Id; ?>">
							<div class="form-inline">
								<label> ACCOUNT STATUS
									<select class="form-control" name="account_status">
										<option <?php if ($user->Status == 'Active') {
											echo 'selected';
										} ?> value="Active"> Active
										</option>
										<option <?php if ($user->Status == 'Inactive') {
											echo 'selected';
										} ?> value="Inactive"> Deactivate
										</option>
									</select>
								</label>

								<input style="margin: 4px" type="submit" class="btn-sm btn-success" value="Update">

							</div>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#PROFILE"
													data-toggle="tab">PROFILE</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="PROFILE">
								<!-- Post -->
								<form class="form-horizontal" method="post"
									  action="<?php echo base_url() ?>employees/update_profile/<?php echo $user->Id; ?>">

									<div>
										<div class="row">
											<div class="text-danger">
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">FIRST NAME</label>
													<input name="name" value="<?php echo $user->Name ?>"
														   class="form-control"/>
													<span class="text-danger">
														<?php echo form_error('name') ?>
								                          </span>
												</div>

											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">LAST NAME</label>
													<input name="surname" type="text"
														   value="<?php echo $user->LastName ?>" class="form-control"/>
													<span class="text-danger"><?php echo form_error('surname') ?></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">ID NUMBER</label>
													<input name="id_number" type="text"
														   value="<?php echo $user->IdNumber; ?>" class="form-control"/>
													<span class="text-danger"><?php echo form_error('id_number') ?></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">PERSAL</label>
													<input name="persal" value="<?php echo $user->Persal ?>"
														   class="form-control"/>
													<span class="text-danger"><?php echo form_error('persal') ?></span>
												</div>

											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">GENDER</label>
													<select name="gender" class="form-control">
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
													<select name="race" class="form-control">
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
													<select name="disability" class="form-control">

														<?php
														//check disability
														$selected_no = '';
														$selected_yes = '';
														if(isset($_POST['disability']))
														{
															if($_POST['disability'] == 'Yes')
															{
																$selected_yes = 'selected';
															}
															else{
																$selected_no = 'selected';
															}
														}
														else{
															if($user->Disability == 'Yes')
															{
																$selected_yes = 'selected';
															}
															else{
																$selected_no = 'selected';
															}
														}
														echo '<option '.$selected_yes.' value="Yes">Yes</option>';
														echo '<option '.$selected_no.' value="No">No</option>';
														?>
													</select>
												</div>


											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">CONTACT INFO</label>
													<input name="contact" value="<?php echo $user->Contact ?>"
														   class="form-control"/>
													<span class="text-danger"><?php echo form_error('contact') ?></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">EMAIL ADDRESS</label>
													<input name="email" type="text" value="<?php echo $user->Email ?>"
														   class="form-control"/>
													<span class="text-danger"><?php echo form_error('email') ?></span>
												</div>

											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">SUPERVISOR</label>
													<select name="supervisor" class="form-control select2">
														<?php
														$selectedPosition = '';
														foreach ($all_users as $s) {
															$selected = '';
															if ($_POST['supervisor'] == $s['Id']) {
																$selected = 'selected';
															}
															else{
																if ($user->S_Id == $s['Id']) {
																	$selected = 'selected';
																	$selectedPosition = $s['Id'];
																}
															}
															echo '<option ' . $selected . ' value="' . $s['Id'] . '">' . $s['Name'] .' '.$s['LastName']. '</option>';
														}
														?>
													</select>
												</div>

											</div>


											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">JOB TITLE</label>
													<select name="position" class="form-control">
														<?php
														$selectedPosition = '';
														foreach ($position as $p)
														{
															$selected = '';
															if ($_POST['position'] == $p['PositionId']) {
																$selected = 'selected';
																$selectedPosition = $p['PositionId'];
															}
															else if($p['PositionId'] == $user->JT)
															{
																$selected = 'selected';
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
														<?php
														foreach ($roles as $r) {
															$selected = '';
															if ($_POST['role'] == $r['RoleId']) {
																$selected = 'selected';
															}
															else{
																if($user->Role == $r['RoleId']){
																	$selected = 'selected';
																}
															}
															echo '<option ' . $selected . ' value="' . $r['RoleId'] . '">' . $r['RoleName'] . '</option>';
														}
														?>
													</select>
												</div>

											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">DISTRICT</label>
													<select name="district" class="form-control">
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
													<input name="salary_level" type="number" required
														   value="<?php echo $user->SalaryLevel; ?>"
														   class="form-control"/>
													<span class="text-danger"><?php echo form_error('salary_level') ?></span>
												</div>
											</div>



											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">SALARY LEVEL ENTRY DATE</label>
													<input name="level_entry_date" type="date"

														   value="<?php echo $user->SalaryLevelEntryDate ?>"
														   class="form-control"/>
													<span class="text-danger"><?php echo form_error('level_entry_date') ?></span>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">DATE OF APPOINTMENT</label>
													<input name="appoint_date" type="date"
														   value="<?php echo $user->AppointmentDate ?>"
														   class="form-control"/>
													<span class="text-danger"><?php echo form_error('appoint_date') ?></span>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">DIRECTORATE</label>
													<select required name="directorate" id="directorate" onchange="directorateSelected()"
															class="form-control select2">
														<option value="" disabled selected>--SELECT DIRECTORATE--</option>
														<?php
														//DistrictId	DistrictName
														$selectedPosition = '';
														foreach ($directorate as $bu) {
															$selected = '';
															if ($user->directorate == $bu['id']) {
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
													<select name="sub_directorate" id="sub_directorate" class="form-control">

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
															else if($bu['id'] == $user->br)
															{
																$selected = 'selected';
															}
															echo '<option '.$selected.' value="'.$bu['id'].'">'.$bu['name'].'</option>';
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<label class="control-label">PMDS OFFICAL</label>
													<select name="pmd" class="form-control select2">
														<?php
														$selectedPosition = '';
														foreach ($pmd as $s) {
															$selected = '';
															if ($_POST['pmd'] == $s['Id']) {
																$selected = 'selected';
															}
															else{
																if ($user->S_Id == $s['Id']) {
																	$selected = 'selected';
																	$selectedPosition = $s['Id'];
																}
															}
															echo '<option ' . $selected . ' value="' . $s['Id'] . '">' . $s['Name'] .' '.$s['LastName']. '</option>';
														}
														?>
													</select>
												</div>
											</div>


											<!--<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">YEARS IN LEVEL</label>
													<?php
/*													$start = new DateTime($user->AppointmentDate);
													$end = new DateTime(date("Y/m/d"));
													*/?>
													<input type="number"
														   disabled
														   value="<?php /*echo $start->diff($end)->days/356 */?>YEARS"
														   class="form-control"/>
													<span class="text-danger"><?php /*echo form_error('year_in_level') */?></span>
												</div>
											</div>-->
										</div>
										<div class="form-group">
											<input type="submit" value="Update" class="btn-sm btn-primary"/>
										</div>

								</form>
								<!-- /.post -->
							</div>
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
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
