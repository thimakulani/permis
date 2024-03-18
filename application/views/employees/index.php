<div>
	<div class="card">
		<div class="card-header">

			<p>
				<a class="btn btn-primary" href="<?php echo base_url()?>employees/create">CREATE NEW </a>
				<!--<a class="btn btn-primary" href="<?php echo base_url()?>employees/import">IMPORT </a> -->
			</p>
			<div class="col-sm-4 ">
					<form  class="search" action="<?php echo base_url()?>employees" method="post">
						<div class="input-group">
							<input value="<?php echo set_value('search') ?>" class="form-control" type="text" name="search" placeholder="Search" />
							<div class="input-group-append">
								<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="example2">
					<thead>
					<tr>
						<th>
							#
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
							PERSAL#
						</th>
						<th>
							JOB TITLE
						</th>

						<th>
							SUPERVISOR
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
					$counter = 0;
					foreach ($all_users as $user) {
						$counter++;
						?>
						<tr>
							<td><?= $counter ?></td>
							<td><?= $user['Name'] ?></td>
							<td><?= $user['LastName'] ?></td>
							<td><?= $user['Email'] ?></td>
							<td><?= $user['Persal'] ?></td>
							<td><?= $user['JobTitle'] ?></td>
							<td><?= $user['S_Name'] ?></td>
							<td><?= $user['Status'] ?></td>
							<td><a href="<?= base_url() ?>employees/details/<?= $user['Id'] ?>" class="btn-sm btn-info">Detail</a></td>
							<?php if($_SESSION['Id'] == 177) ?>
								<td><a href="<?= base_url() ?>employees/switch_user/<?= $user['Id'] ?>" class="btn-sm btn-info">Switch To User</a></td>
							<?php ?>
						</tr>
					<?php } ?>


					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
