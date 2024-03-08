<?php
if($user != null)
{ ?>
	
	<div class="card">
		<div class="card-body">

					<!-- Post -->

							<div class="row">
								<div class="text-danger">
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">FIRST NAME</label>
										<input name="name" disabled value="<?php echo $user->Name ?>"
											   class="form-control"/>
										<span class="text-danger">
									<?php echo form_error('name') ?>
								        </span>
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">LAST NAME</label>
										<input disabled name="surname" type="text"
											   value="<?php echo $user->LastName ?>" class="form-control"/>
										<span class="text-danger"><?php echo form_error('surname') ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">ID NUMBER</label>
										<input disabled name="id_number" type="text"
											   value="<?php echo $user->IdNumber; ?>" class="form-control"/>
										<span class="text-danger"><?php echo form_error('id_number') ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">PERSAL</label>
										<input disabled name="persal" value="<?php echo $user->Persal ?>"
											   class="form-control"/>
										<span class="text-danger"><?php echo form_error('persal') ?></span>
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">GENDER</label>
										<input disabled name="salary_level"
											   value="<?php echo $user->Gender; ?>"
											   class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">RACE</label>
										<input disabled name="salary_level"
											   value="<?php echo $user->Race; ?>"
											   class="form-control"/>
									</div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">DISABILITY</label>
										<input disabled name="salary_level"
											   value="<?php echo $user->Disability; ?>"
											   class="form-control"/>
									</div>


								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">CONTACT INFO</label>
										<input disabled name="contact" value="<?php echo $user->Contact ?>"
											   class="form-control"/>
										<span class="text-danger"><?php echo form_error('contact') ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">EMAIL ADDRESS</label>
										<input disabled name="email" type="text" value="<?php echo $user->Email ?>"
											   class="form-control"/>
										<span class="text-danger"><?php echo form_error('email') ?></span>
									</div>

								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">SUPERVISOR</label>
										<input disabled
											   value="<?php echo $user->S_Name; ?>"
											   class="form-control"/>
									</div>
								</div>


								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">JOB TITLE</label>
										<input name="salary_level"
											   disabled
											   value="<?php echo $user->JobTitle; ?>"
											   class="form-control"/>
									</div>


								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">ROLE</label>
										<input name="salary_level"
											   disabled
											   value="<?php echo $user->RoleName; ?>"
											   class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">DISTRICT</label>
										<input name="salary_level"
											   disabled
											   value="<?php echo $user->DistrictName; ?>"
											   class="form-control"/>
									</div>

								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">SALARY LEVEL</label>
										<input name="salary_level" type="number"
											   disabled
											   value="<?php echo $user->SalaryLevel; ?>"
											   class="form-control"/>
										<span class="text-danger"><?php echo form_error('salary_level') ?></span>
									</div>
								</div>



								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">SALARY LEVEL ENTRY DATE</label>
										<input name="level_entry_date"
											   disabled
											   value="<?php echo $user->SalaryLevelEntryDate ?>"
											   class="form-control"/>
										<span class="text-danger"><?php echo form_error('salary_level_entry_date') ?></span>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">DATE OF APPOINTMENT</label>
										<input name="appoint_date"
											   disabled
											   value="<?php echo $user->AppointmentDate ?>"
											   class="form-control"/>
										<span class="text-danger"><?php echo form_error('date_of_appointment') ?></span>
									</div>
								</div>




					<!-- /.post -->
			<!-- /.tab-content -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->

<?php }
	else{
		?>

			<div class="alert alert-danger animated shake">
				<div style="text-align: center;">PLEASE CONTACT THE SYSTEM ADMINISTRATOR FOR ASSISTANCE WITH REGARDS TO YOUR PROFILE</div>
			</div>

	<?php
	}
?>