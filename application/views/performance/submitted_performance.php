<div style="margin: 10px">
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">SUBMITTED TO YOU</h3>
	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th>
					Id#
				</th>
				<th>
					PERSAL#
				</th>
				<th>
					EMPLOYEE
				</th>
				<th>
					DATE CAPTURED
				</th>
				<th>
					TEMPLATE
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
			foreach ($performance as $perf)
			{
				echo '<tr>
									<td>
										'.$perf['id'].'
									</td>
									<td>
										'.$perf['Persal'].'
									</td>
									<td>
										'.$perf['E_Name'].'
									</td>
									<td>
										'.$perf['date_captured'].'
									</td>
									<td>
										'.$perf['template_name'].'
									</td>
									<td>
										'.$perf['status'].'
									</td>
									<td>
										<a class="btn-sm btn-primary" href="'.base_url().'performance/view_submission/'.$perf['emp_id'].'/'.$perf['id'].'" ><i class="fas fa-folder"></i>View</a> |
									</td>
								</tr>';
			}

			?>

			</tbody>
		</table>
	</div>
</div>
