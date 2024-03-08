
<div class="card">
	<div class="card-header">
		<h3 class="card-title">ASSESSMENT</h3>
	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th>
					Id#
				</th>
				<th>
					PERSAL NO#
				</th>
				<th>
					EMPLOYEE
				</th>
				<th>
					SUPERVISOR
				</th>
				<th>
					DATE CAPTURED
				</th>
				<th>
					TEMPLATE NAME
				</th>
				<th>
					PERIOD
				</th>

				<th>

				</th>

			</tr>
			</thead>
			<tbody>
			<?php
			$counter = 0;
			foreach ($submissions as $perf)
			{
				$counter++;
				?>
				<tr>
					<td>
						<?php echo $counter;?>
					</td>
					<td>
						<?php echo $perf['persal']; ?>
					</td>
					<td>
						<?php echo $perf['E_Name'] ?>
					</td>
					<td>
						<?php echo $perf['s_name'] .' '. $perf['s_last'] ?>
					</td>
					<td>
						<?php echo $perf['date_captured'] ?>
					</td>
					<td>
						<?php echo $perf['template_name'] ?>
					</td>
					<td>
						<?php echo $perf['period'] ?>
					</td>

					<td>
						<a href="<?php echo base_url()?>assessments/edit/<?php echo $perf['id']?>" class="btn-sm btn-info" >
							<i class="text-decoration-none fa fa-edit"></i>
						</a>
					</td>

				</tr>
			<?php }?>

			</tbody>
		</table>
	</div>
</div>
