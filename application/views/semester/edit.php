<div class="card">
	<div class="card-header">
		<h4>UPDATE SEMESTER</h4>
	</div>
	<form class="card-body" method="post" action="<?php echo base_url() ?>semester/edit/<?php echo $semester->id; ?>">
			<div class="form-group">
				<label class="control-label">SEMESTER NAME</label>
				<select class="form-control select" name="semester_name">
					<option <?php if ($semester->semester_name == 'SEMESTER ONE') {
						echo 'selected';
					} ?> value="SEMESTER ONE">SEMESTER ONE
					</option>
					<option <?php if ($semester->semester_name == 'SEMESTER TWO') {
						echo 'selected';
					} ?> value="SEMESTER TWO">SEMESTER TWO
					</option>
				</select>
				<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
				<span class="text-danger"><?php echo form_error('semester_name') ?></span>
			</div>
			<label class="control-label">FINANCIAL YEAR</label>
			<select class="form-control select" name="financial_year">
				<?php $years = range(2023, strftime("%Y", time())); ?>
				<?php foreach ($years as $year) :
					$next_year = $year + 1;
					$financial_year = $year . '/' . $next_year;
					echo $financial_year;
					?>
					<option <?php if ($semester->financial_year == $financial_year) {
						echo  'selected';} ?> value="<?php
					echo $financial_year; ?> "> <?php echo $financial_year; ?></option>
				<?php endforeach; ?>
			</select>

			<div class="form-group">
				<label class="control-label">START DATE</label>
				<input name="start_date" type="date" value="<?php echo $semester->start_date ?>"
					   class="form-control"/>
				<span class="text-danger"><?php echo form_error('start_date') ?></span>
			</div>
			<div class="form-group">
				<label class="control-label">END DATE</label>
				<input name="end_date" type="date" value="<?php echo $semester->end_date ?>"
					   class="form-control"/>
				<span class="text-danger"><?php echo form_error('end_date') ?></span>
			</div>
			<div class="form-group">
				<label class="control-label">GRACE PERIOD</label>
				<input name="grace_period" type="date" value="<?php echo $semester->grace_period ?>"
					   class="form-control"/>
				<span class="text-danger"><?php echo form_error('grace_period') ?></span>
			</div>
		<div class="modal-footer">
			<input type="submit" value="SAVE" name="edit" class="btn btn-primary"/>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
		</div>
	</form>

