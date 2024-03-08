
<div class="card">
	<div class="card-header">
		<h3 class="card-title">MY ACHIEVEMENTS</h3>
		<a href="#" data-toggle="modal" data-target="#add_achievement" class="btn-sm btn-primary text-decoration-none" >ADD ACHIEVEMENT</a>
	</div>
	<div class="card-body p-0 table-responsive-sm">
		<table class="table table-striped projects">
			<thead>
			<tr>
				<th>
					Id#
				</th>
				<th>
					DESCRIPTION
				</th>
				<th>
					PERIOD
				</th>
				<th>
					TYPE OF ACHIEVEMENT
				</th>

				<th>

				</th>

			</tr>
			</thead>
			<tbody>
			<?php
			$counter = 0;
			foreach ($achievements as $achieve)
			{
				$counter++;
				?>
				<tr>
					<td>
						<?php echo $counter;?>
					</td>
					<td>
						<?php echo $achieve['description']; ?>
					</td>
					<td>
						<?php echo $achieve['period'] ?>
					</td>
					<td>
						<?php echo $achieve['type'] ?>
					</td>
					<td>
						<a data-toggle="modal" data-target="#edit_achievement_<?php echo $achieve['id']?>" href="#" class="btn-sm btn-info" >
							<i class="text-decoration-none fa fa-edit"></i>
						</a>
						<a href="#" class="btn-sm btn-danger delete-btn_<?php echo $achieve['id'] ?>" >
							<i class="text-decoration-none fa fa-remove"></i>
						</a>
					</td>

				</tr>

				<script>
					$('.delete-btn_<?php echo $achieve['id'] ?>').on('click', function() {
						$.ajax({
							url: '<?php echo base_url() ?>achievements/delete/<?php echo $achieve['id'] ?>',
							type: 'DELETE',
							success: function(response) {
								// remove the row from the table
								location.reload();
							},
							error: function(xhr, status, error) {
								console.log(error);
							}
						});
					});
				</script>




				<div class="modal fade" id="edit_achievement_<?php echo $achieve['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">EDIT ACHIEVEMENT</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="edit_achievements<?php echo $achieve['id']?>" method="post">
								<div class="modal-body">

									<div class="form-group">
										<label class="control-label">DESCRIPTION</label>
										<input class="form-control" required name="description" value="<?php echo $achieve['description'] ?>"/>
										<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
										<span class="text-danger"><?php echo form_error('description') ?></span>
									</div>
									<div class="form-group">
										<label class="control-label">ACHIEVEMENT TYPE</label>
										<select class="form-control" name="type">
											<option <?php if($achieve['type'] == 'MAJOR ACHIEVEMENTS/ACCOMPLISHMENTS') echo 'selected'?> value="MAJOR ACHIEVEMENTS/ACCOMPLISHMENTS">MAJOR ACHIEVEMENTS/ACCOMPLISHMENTS</option>
											<option <?php if($achieve['type'] == 'NOT PART OF PERFORMANCE AGREEMENT') echo 'selected'?> value="NOT PART OF PERFORMANCE AGREEMENT">ACHIEVEMENTS/ACCOMPLISHMENTS NOT PART OF PERFORMANCE AGREEMENT</option>
											<option <?php if($achieve['type'] == 'LESS SUCCESSFUL') echo 'selected'?> value="LESS SUCCESSFUL">LESS SUCCESSFUL IN THE FOLLOWING AREAS, WHICH FORMED PART OF MY PERFORMANCE AGREEMENT</option>
										</select>
									</div>
									<div class="modal-footer">
										<input type="submit" value="SAVE" class="btn btn-primary"/>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function () {
						$('#edit_achievements<?php echo $achieve['id']?>').submit(function (e) {
							e.preventDefault(); // prevent the form from submitting normally
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url() ?>achievements/edit_achievements/<?php echo $achieve['id']?>',
								data: $('#edit_achievements<?php echo $achieve['id']?>').serialize(), // serialize the form data
								success: function (response) {
									location.reload();
									$('#response').html(response); // display the response on the page
								}
							});
						});
					});

				</script>




			<?php }?>

			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="add_achievement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ADD ACHIEVEMENT</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add_achievements" method="post">
				<div class="modal-body">

					<div class="form-group">
						<label class="control-label">DESCRIPTION</label>
						<input class="form-control" required name="description"/>
						<!--<input name="semester_name" value="<?php /*echo set_value('semester_name')*/ ?>" class="form-control" />-->
						<span class="text-danger"><?php echo form_error('description') ?></span>
					</div>
					<div class="form-group">
						<label class="control-label">ACHIEVEMENT TYPE</label>
						<select class="form-control" name="type">
							<option value="MAJOR ACHIEVEMENTS/ACCOMPLISHMENTS">MAJOR ACHIEVEMENTS/ACCOMPLISHMENTS</option>
							<option value="NOT PART OF PERFORMANCE AGREEMENT">ACHIEVEMENTS/ACCOMPLISHMENTS NOT PART OF PERFORMANCE AGREEMENT</option>
							<option value="LESS SUCCESSFUL">LESS SUCCESSFUL IN THE FOLLOWING AREAS, WHICH FORMED PART OF MY PERFORMANCE AGREEMENT</option>
						</select>
					</div>
					<div class="modal-footer">
						<input type="submit" value="SAVE" class="btn btn-primary"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#add_achievements').submit(function (e) {
			e.preventDefault(); // prevent the form from submitting normally
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url() ?>achievements/add_achievements',
				data: $('#add_achievements').serialize(), // serialize the form data
				success: function (response) {
					location.reload();
					$('#response').html(response); // display the response on the page
				}
			});
		});
	});

</script>
