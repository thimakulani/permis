
<div>
	<div class="card">
		<div class="card-header">
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
