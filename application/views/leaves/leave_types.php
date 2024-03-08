<div class="card">
	<div class="card-header">
		<p>
			<a class="btn-sm btn-danger" href="<?php echo base_url()?>settings">Back</a>
			<a class="btn-sm btn-info" href="<?php echo base_url()?>leaves/create_leave">Create New</a>
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
					<th>
						Days
					</th>
				</tr>
				</thead>
				<tbody>

				<tr>
					<td>
						1
					</td>

					<td>
						SICK LEAVE
					</td>
					<td>
						7
					</td>

				</tr>
				<?php

				//foreach ($roles as $dt)
				//{
				//	echo '<tr>
				//				<td>
				//					'.$dt['Id'].'
				//				</td>
				//				<td>
				//					'.$dt['RoleName'].'
				//				</td>
				//				<td>
				//					<a class="btn-sm btn-primary" href="'.base_url().'settings/edit_role/'.$dt['Id'].'" >Edit</a> |
				//					<a class="btn-sm btn-info" href="'.base_url().'settings/detail_role/'.$dt['Id'].'" >Details</a>
				//
				//				</td>
				//			</tr>';
				//}
				?>


				</tbody>
			</table>
		</div>
	</div>
</div>

