<div class="card">
	<div class="card-header">
		<p>
			<a class="btn-sm btn-danger" href="<?php echo base_url()?>settings">Back</a>
			<a class="btn-sm btn-info" href="<?php echo base_url()?>position/create">Create New</a>
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

					foreach ($position as $dt)
					{
						echo '<tr>
									<td>
										'.$dt['PositionId'].'
									</td>
									<td>
										'.$dt['PositionName'].'
									</td>
									<td>
										<a class="btn-sm btn-primary" href="'.base_url().'position/edit/'.$dt['PositionId'].'" >Edit</a> |
					
									</td>
								</tr>';
					}
				?>


				</tbody>
			</table>
		</div>
	</div>
</div>

