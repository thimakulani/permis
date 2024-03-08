<div class="card">
	<div class="card-header">

	</div>
	<div class="card-body table-responsive">
		<table class="table table-borderless">
			<thead>
			<tr>
				<th>#</th>
				<th>EMPLOYEE</th>
				<th>RECOMMENDED BY</th>
				<th>START DAY</th>
				<th>END DAY</th>
				<th>TYPE</th>
				<th>STATUS</th>
				<th>ACTION</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($recommended as $rec) { ?>
					<tr>
						<td><?php echo $rec['id']?></td>
						<td><?php echo $rec['employee']?></td>
						<td><?php echo $rec['recommended_by']?></td>
						<td><?php echo $rec['start_date']?></td>
						<td><?php echo $rec['end_date']?></td>
						<td><?php echo $rec['leave_type']?></td>
						<td><?php echo $rec['status']?></td>
						<td><a href="<?php echo base_url()?>special/view/<?php echo $rec['id'] ?>">View</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>
