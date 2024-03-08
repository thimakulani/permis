<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">UPDATE SUPERVISOR ID</h5>
				<a href="<?php echo base_url()?>assessments" class="close" >
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<form action="<?php echo base_url()?>assessments/update" method="post">
				<div class="modal-body">
					<div class="card-body">
						<div class="form-group">
							<input type="hidden" name="assessment_id" value="<?php echo $id; ?>">
							<select name="supervisor" class="form-control select2">
								<?php foreach ($super_visor as  $sup){ ?>
									<option value="<?php echo $sup['id'];?>"> <?php echo $sup['lastname']. ' ' .  $sup['name'];?> </option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="submit" value="SAVE" class="btn btn-primary"/>
				</div>
			</form>
		</div>
</div>
