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
						Name
					</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<?php

				foreach ($business_unit as $bus)
				{ ?>
					<tr>
						<td>
							<?php echo $bus['id'] ?>
						</td>
						<td>
							<?php echo $bus['name'] ?>
						</td>
						<td>
							<a class="btn-sm btn-primary" href="#" data-target="#update_business_unit" data-toggle="modal" >Edit</a> |
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
				<h5 class="modal-title">CREATE NEW DIRECTORATE UNIT</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php echo base_url() ?>businessunit/add_business_unit">
				<div class="modal-body">

					<div class="form-group">
						<label class="control-label">DIRECTORATE NAME</label>
						<input class="form-control" name="name"/>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
						<span class="text-danger"><?php echo form_error('name') ?></span>
					</div>

					<div class="modal-footer">
						<input type="submit" value="SAVE" class="btn btn-primary"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
			</form>
		</div>
	</div>
</div>

