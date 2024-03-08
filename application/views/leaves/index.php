

<div class="card">
	<div class="card-body">
		<div class="row">
			<!--href="<?php /*echo base_url()*/?>leaves/leave_application"-->
			<a href="#"  class="btn-lg bg-info text-decoration-none m-2 text-white" >

					<div>
						<span>APPLY FOR LEAVE</span>
					</div>
					<!-- /.info-box-content -->
				</a>

		</div>
	</div>
</div>
<section class="content">

	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">LEAVE HISTORY</h3>


		</div>


		<div class="card-body p-0 table-responsive-sm">
			<table class="table table-striped projects">
				<thead>
				<tr>
					<th>
						#ID
					</th>
					<th>
						START DATE
					</th>
					<th>
						END DATE
					</th>
					<th>
						LEAVE TYPE
					</th>
					<th>
						DURATION
					</th>
					<th>
						LEAVE STATUS
					</th>
					<th>ATTACHMENT</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($leaves as $leave) { ?>
					<tr>
						<td><?php echo $leave['id'] ?></td>
						<td><?php echo $leave['start_date'] ?></td>
						<td><?php echo $leave['end_date'] ?></td>
						<td><?php echo $leave['leave_type'] ?></td>
						<?php
							$start = new DateTime($leave['start_date']);
							$end = new DateTime($leave['end_date']);
						?>
						<td><?php echo $start->diff($end)->days ?> Day(s)</td>
						<td><?php echo $leave['status'] ?></td>
						<td>
							<?php if(!empty($leave['attachment'])) {
								?>
								<a class="btn-sm btn-info" href="<?php echo base_url()?>leaves/process_download/<?php echo $leave['attachment']?>" > DOWNLOAD</a>
								<?php
							} ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
