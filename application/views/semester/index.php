<div style="text-align: center;">
	<h2> SEMESTERS LIST </h2>
</div>

<div>
	<a class="btn-sm btn-info" data-toggle="modal" href="#" data-target="#exampleModal">ADD SEMESTER</a>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>SEMESTER NAME</th>
			<th>GRACE PERIOD</th>
			<th>FINANCIAL YEAR</th>
			<th>START DATE</th>
			<th>END DATE</th>
			<th>ACTION</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$counter = 1;
		foreach ($semesters as $sem) { ?>
			<tr>
				<td><?php echo $counter; ?></td>
				<td><?php echo $sem['semester_name'] ?></td>
				<td><?php echo $sem['grace_period'] ?></td>
				<td><?php echo $sem['financial_year'] ?></td>
				<td><?php echo $sem['start_date'] ?></td>
				<td><?php echo $sem['end_date'] ?></td>
				<td><a class="btn-sm btn-info" href="<?php echo base_url() ?>semester/edit/<?php echo $sem['id'] ?>">Edit</a></td>
			</tr>


			<?php $counter++;
		} ?>
		</tbody>
	</table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ADD SEMESTER</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url() ?>semester/index">
				<div class="modal-body">


					<div class="form-group">
						<label class="control-label">SEMESTER NAME</label>
						<select class="form-control select" name="semester_name">
							<option value="SEMESTER ONE">SEMESTER ONE</option>
							<option value="SEMESTER TWO">SEMESTER TWO</option>
						</select>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
						<span class="text-danger"><?php echo form_error('semester_name') ?></span>
					</div>


					<!--		<div class="form-group">
						<label class="control-label">FINANCIAL YEAR</label>
						<input name="financial_year" type="m" value="<?php /*echo set_value('final_year')*/ ?>" class="form-control" />
						<span class="text-danger"><?php /*echo form_error('final_year') */ ?></span>
					</div>-->

					<label class="control-label">FINANCIAL YEAR</label>
					<select class="form-control select" name="financial_year">
						<?php $years = range(2023, strftime("%Y", time())); ?>
						<option disabled selected>Select Year</option>
						<?php foreach ($years as $year) : ?>
							<option value="<?php $next_year = $year + 1;
							echo $year . '/' . $next_year; ?> "> <?php echo $year . '/' . $next_year; ?></option>
						<?php endforeach; ?>
					</select>

					<div class="form-group">
						<label class="control-label">START DATE</label>
						<input name="start_date" type="date" value="<?php echo set_value('start_date') ?>"
							   class="form-control"/>
						<span class="text-danger"><?php echo form_error('start_date') ?></span>
					</div>
					<div class="form-group">
						<label class="control-label">END DATE</label>
						<input name="end_date" type="date" value="<?php echo set_value('end_date') ?>"
							   class="form-control"/>
						<span class="text-danger"><?php echo form_error('end_date') ?></span>
					</div>
					<div class="form-group">
						<label class="control-label">GRACE PERIOD</label>
						<input name="grace_period" type="date" value="<?php echo set_value('grace_period') ?>"
							   class="form-control"/>
						<span class="text-danger"><?php echo form_error('grace_period') ?></span>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" value="SAVE" name="add" class="btn btn-primary"/>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
				</div>
			</form>
		</div>
	</div>
</div>
