<section class="content">
	<h3>PERFORMANCE</h3>
	<!-- Default box -->
	<div class="card">
		<div class="card-header">

			<div>
				<label> FROM
					<input type="date" class="form-control" />
				</label>
				<label>
					TO
					<input type="date" class="form-control" />
				</label>
			</div>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>

			</div>
		</div>


		<div class="card-body p-0 table-responsive-sm">
			<div></div>
			<table class="table table-striped projects">
				<thead>
				<tr>
					<th>
						KEY RESPONSIBILITY

					</th>
					<th>
						GAFS
						(Generic
						Assessment
						Factors)
					</th>
					<th>
						PERFORMAN
						CE
						OUTCOME
					</th>
					<th class="text-center">
						WEIGHT
						OF
						OUTCOME (in %)
					</th>
					<th>
						PERFORMANCE MEASUREMENT
					</th>
					<th>
						Timeframes
					</th>
					<th>
						Resources
					</th>
				</tr>
				</thead>
				<tbody>
					<form method="post" action="<?php echo base_url()?>performance/performance_capture">
						<?php
						foreach ($performance as $perf)
						{
							echo '
									<td><input class="form-control" type="text" /></td>
									<td><input class="form-control" type="text" /></td>
									<td><input class="form-control" type="text" /></td>
									<td><input class="form-control" type="text" /></td>
									<td><input class="form-control" type="text" /></td>
									<td><input class="form-control" type="text" /></td>
									<td><input class="form-control" type="text" /></td>
									<td><a class="btn-sm btn-danger">Remove</a></td>
								
								
								';
						}
						echo '
							<td><input class="form-control" type="text" /></td>
							<td><input class="form-control" type="text" /></td>
							<td><input class="form-control" type="text" /></td>
							<td><input class="form-control" type="text" /></td>
							<td><input class="form-control" type="text" /></td>
							<td><input class="form-control" type="text" /></td>
							<td><input class="form-control" type="text" /></td>
							<td><a class="btn-sm btn-primary">Add</a></td>
						
						
						';




						?>
					</form>

				</tbody>

			</table>

		</div>
		<div class="card-footer">
			<input type="submit" class="btn-sm btn-success" />
		</div>
	</div>
</section>
