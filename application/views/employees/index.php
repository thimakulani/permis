<div>
	<div class="card">
		<div class="card-header">

			<p>
				<a class="btn btn-primary" href="<?php echo base_url()?>employees/create">Create New </a>
			</p>
		</div>
		<div class="card-body">
			<div class="table-responsive-sm">
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
							BUSINESS LINE
						</th>
						<th>
							REPORT TO
						</th>
						<th>
							STATUS
						</th>
						<th>

						</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								1234
							</td>
							<td>Thima</td>
							<td>Sigauque</td>
							<td>Email</td>
							<td>Phone</td>
							<td>JR DEV</td>
							<td>IT</td>
							<td>MR BLUE</td>
							<td>ACTIVE</td>
							<td><a href="<?php echo base_url()?>employees/details" class="btn-sm btn-info">Detail</a></td>
						</tr>

					<?php
					function status($s){
						if ($s == 'Active')
						{
							return 'class="bg-info"';
						}
						else{
							return 'class="bg-danger"';
						}
					}
					?>

					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
