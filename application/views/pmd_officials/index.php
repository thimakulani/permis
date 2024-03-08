<div class="card">
	<div class="card-header">
		<h4>
			PMD OFFICIALS
		</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<?php foreach ($users as $user) { ?>
				<div class="col-sm-4">
					<div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><?php echo strtoupper($user['names']) ?></h5>
							<p class="card-text">DIRECTORATE: <?php if ($user['assigned'] == null) {
									echo 'NOT ASSIGNED';
								} else {
									echo $user['dir'];
								} ?> </p>
						</div>
						<div>
							<a href="#" class="btn-sm btn-primary" href="#" data-target="#assign_directorate<?php echo $user['id'] ?>"
							   data-toggle="modal">ASSIGN DIRECTORATE</a>
						</div>
					</div>
				</div>
				<!--DIALOG START-->


				<div class="modal fade" id="assign_directorate<?php echo $user['id'] ?>" tabindex="-1" role="dialog"
					 aria-labelledby="exampleModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">ASSIGN DIRECTORATE TO: <?php echo $user['names'] ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="post" action="<?php echo base_url() ?>pmd_officials/index/<?php echo $user['id'] ?>"">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label">DIRECTORATE</label>
										<select name="directorate" class="select form-control">
											<?php foreach ($directorate as $dir) { ?>
												<option value="<?php echo $dir['id'] ?>">
													<?php echo $dir['name'] ?>
												</option>
											<?php } ?>
										</select>
									</div>

									<div class="modal-footer">
										<input type="submit" name="assign" value="SAVE" class="btn btn-primary"/>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!--DIALOG END-->


			<?php } ?>
		</div>
	</div>
</div>



