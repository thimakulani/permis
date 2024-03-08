<div class="card">
	<div class="card-header">
		SPECIAL REQUESTS APPLICATIONS
	</div>
	<div class="card-body table-responsive">
		<table class="table table-borderless">
			<thead>
			<tr>
				<th>#</th>
				<th>EMPLOYEE</th>
				<th>START DAY</th>
				<th>END DATE</th>
				<th>LEAVE TYPE</th>
				<th>STATUS</th>
				<th>ACTION</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($leaves as $rec) { ?>
				<tr>
					<td><?php echo $rec['id']?></td>
					<td><?php echo $rec['emp']?></td>
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
