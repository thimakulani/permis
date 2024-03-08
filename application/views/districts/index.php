<div class="card">
	<div class="card-header">
		<p>
			<a class="btn-sm btn-danger" href="<?php echo base_url()?>settings">Back</a>
			<a class="btn-sm btn-info" href="<?php echo base_url()?>districts/create">Create New</a>
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

					foreach ($districts as $dt)
					{
						echo '<tr>
									<td>
										'.$dt['DistrictId'].'
									</td>
									<td>
										'.$dt['DistrictName'].'
									</td>
									<td>
										<a class="btn-sm btn-primary" href="'.base_url().'districts/edit/'.$dt['DistrictId'].'" >Edit</a> |
					
									</td>
								</tr>';
					}
				?>


				</tbody>
			</table>
		</div>
	</div>
</div>

