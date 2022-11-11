
<section class="content">
	<hr />
	<div>
		<a class="btn-sm btn-success" href="<?php echo base_url()?>employees/">Back to List</a>
	</div>
	<hr />
	<div class="card">
		<div class="card-body">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>employees">
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
								<input name="debtor_number" type="number" value="<?php echo set_value('debtor_number')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('debtor_number') ?></span>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">PERSAL</label>
								<input name="debt_description" value="<?php echo set_value('debt_description')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('debt_description') ?></span>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">CONTACT INFO</label>
								<input name="employment_indicator" value="<?php echo set_value('employment_indicator')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('employment_indicator') ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">EMAIL ADDRESS</label>
								<input name="effective_date" type="text" value="<?php echo set_value('effective_date')?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('effective_date') ?></span>
							</div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">BUSINESS LINE</label>
								<input name="date_originated" type="text" value="<?php echo set_value('date_originated')?>" class="form-control" />
								<span  class="text-danger"><?php echo form_error('date_originated') ?></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">SUPERVISOR</label>
								<select name="debt_type_id" class="form-control">
									<option>Thima1</option>
									<option>Thima3</option>
									<option>Thima4</option>
									<option>Thima5</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">MANAGER</label>
								<select name="region_id" class="form-control" >
									<option>Thima1</option>
									<option>Thima3</option>
									<option>Thima4</option>
									<option>Thima5</option>
								</select>
							</div>

						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">JOB TITLE</label>
								<select name="region_id" class="form-control" >
									<option>TITLE</option>
									<option>TTITLE3</option>
									<option>TITLE4</option>
									<option>TITLE5</option>
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
