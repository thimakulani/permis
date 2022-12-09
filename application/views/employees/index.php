<div>
	<div class="card">
		<div class="card-header">

			<p>
				<a class="btn btn-primary" href="<?php echo base_url()?>employees/create">Create New </a>
			</p>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="example2">
					<thead>
					<tr>
						<th>
							PERCAL#
						</th>

						<th>
							NAME
						</th>
						<th>
							LASTNAME
						</th>
						<th>
							EMAIL
						</th>
						<th>
							PHONE#
						</th>
						<th>
							JOB TITLE
						</th>

						<th>
							SUPERVISOR
						</th>
						<th>
							MANAGER
						</th>
						<th>
							STATUS
						</th>
						<th>

						</th>
					</tr>
					</thead>
					<tbody>


					<?php
						foreach ($all_users as $user)
						{
							echo
								'
								<tr>
									<td>
										'.$user['Id'].'
									</td>
									<td>'.$user['Name'].'</td>
									<td>'.$user['LastName'].'</td>
									<td>'.$user['Email'].'</td>
									<td>'.$user['Persal'].'</td>
									<td>'.$user['JobTitle'].'</td>
									<td>'.$user['S_Name'].'</td>
									<td>'.$user['M_Name'].'</td>
									<td>'.$user['Status'].'</td>
									<td><a href="'.base_url().'employees/details/'.$user['Id'].'" class="btn-sm btn-info">Detail</a></td>
								</tr>
								
								
								
								';
						}
					?>

					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
