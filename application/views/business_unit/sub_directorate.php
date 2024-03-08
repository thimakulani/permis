<div class="card">
	<div class="card-header">
		<p>
			<a class="btn-sm btn-danger" href="<?php echo base_url()?>settings">Back</a>
			<a class="btn-sm btn-info" href="#" data-target="#add_business_unit" data-toggle="modal">Create New</a>
		</p>
	</div>
	<div div="card-body">
		<div class="table-responsive-sm">
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>
						Id#
					</th>
					<th>
						SUB-DIRECTORY NAME
					</th>
					<th>
						DIRECTORY
					</th>
				</tr>
				</thead>
				<tbody>
				<?php

				foreach ($sub_directorate as $bus)
				{ ?>
					<tr>
						<td>
							<?php echo $bus['id'] ?>
						</td>
						<td>
							<?php echo $bus['name'] ?>
						</td>
						<td>
							<?php echo $bus['dir'] ?>
						</td>
					</tr>
				<?php }
				?>


				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="add_business_unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">CREATE NEW SUB DIRECTORATE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url() ?>businessunit/sub_directorate">
				<div class="modal-body">

					<div class="form-group">
						<label class="control-label">SUB DIRECTORATE NAME</label>
						<input required class="form-control" name="name"/>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
						<span class="text-danger"><?php echo form_error('name') ?></span>
					</div>
					<div class="form-group">
						<label class="control-label">DIRECTORATE</label>
						<select name="directorate" class="select form-control">
							<?php foreach ($directorate as $dir){ ?>
									<option value="<?php echo $dir['id'] ?>">
										<?php echo $dir['name']?>
									</option>
							<?php } ?>
						</select>
					</div>


					<div class="modal-footer">
						<input type="submit" name="add" value="SAVE" class="btn btn-primary"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
			</form>
		</div>
	</div>
</div>

