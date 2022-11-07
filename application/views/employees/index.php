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
							ROLE
						</th>
						<th>
							STATUS
						</th>
					</tr>
					</thead>
					<tbody>

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
