<div class="card">
	<div class="card-header">
		<h3>
			QUICK LINKS
		</h3>
	</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box bg-success">
					<span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">EMPLOYEES </span>
						<span class="info-box-number"></span>
						<div class="progress">
							<div class="progress-bar" style="width: 100%"></div>
						</div>
						<span class="progress-description">
							<?php echo $emp_count ?>
                        </span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box bg-success">
					<span class="info-box-icon"><i class="far fa-suitcase"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">#####</span>
						<span class="info-box-number"></span>

						<div class="progress">
							<div class="progress-bar" style="width: 100%"></div>
						</div>
						<span class="progress-description">
							<?php echo date('Y-m-d'); ?>
                        </span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>

		</div>
	</div>
</div>
<section class="content">

	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">CONTRACTS SUBMITTED TO YOU</h3>

			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					<i class="fas fa-times"></i>
				</button>
			</div>
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
						NAMES
					</th>
					<th class="text-center">
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
										'.$perf['Id'].'
									</td>
									<td>
										'.$perf['Employee'].'
									</td>
									<td>
										'.$perf['Employee'].'
									</td>
									<td>
										'.$perf['Status'].'
									</td>
									<td>
										<a class="btn-sm btn-primary" href="#" ><i class="fas fa-folder"></i>View</a> |
									</td>
								</tr>';
						}

					?>

				</tbody>
			</table>
		</div>
	</div>
</section>



