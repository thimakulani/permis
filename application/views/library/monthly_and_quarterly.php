
<div class="card">
	<div class="card-header">
		<h3 class="card-title">MONTHLY AND QUARTERLY</h3>
		<a href="<?php echo base_url()?>library/add_monthly_and_quarterly" class="btn-sm btn-info text-decoration-none" >ADD</a>
	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th>
					Id#
				</th>
				<th>
					FILE NAME
				</th>
				<th>
					DESCRIPTION
				</th>
				<th>
					ACTION
				</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$counter = 0;
			foreach ($monthly_and_quarterly as $m_s){
				$counter++;
				?>
				<tr>
					<td><?php echo $counter; ?></td>
					<td><?php echo $m_s['name']; ?></td>
					<td><?php echo $m_s['description']; ?></td>
					<td><a class="btn-sm btn-info" href="<?php echo base_url()?>library/process_download/<?php echo $m_s['id']?>">DOWNLOAD</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
