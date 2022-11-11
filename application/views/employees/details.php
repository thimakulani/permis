<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle"
								 src="<?php base_url() ?>/"
								 alt="User profile picture">
						</div>
						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>First Name</b> <a class="float-right">Thima</a>
							</li>
							<li class="list-group-item">
								<b>Last Name</b> <a class="float-right">Sigauque</a>
							</li>
							<li class="list-group-item">
								<b>Phone Number</b> <a class="float-right">011111111</a>
							</li>
							<li class="list-group-item">
								<b>Persal</b> <a class="float-right">12345</a>
							</li>
							<li class="list-group-item">
								<b>Address</b> <a class="float-right">8 Litsitlele, Polokwane</a>
							</li>
							<li class="list-group-item">
								<b>Job Tittle</b> <a class="float-right">IT</a>
							</li>
							<li class="list-group-item">
								<b>Business Unit</b> <a class="float-right">IT</a>
							</li>

						</ul>
						<div class="form-inline">
							<label>
								<select class="form-control">
									<option>Active</option>
									<option>Deactivate</option>
								</select>
							</label>

							<input style="margin: 4px" type="submit" class="btn-sm btn-success" value="Update">

						</div>


					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#PROFILE" data-toggle="tab">PROFILE</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="PROFILE">
								<!-- Post -->
								<form class="form-horizontal" method="post" action="#">
									<div class="form-group row">
										<label  class="col-sm-2 col-form-label">First Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value="" name="firstname" placeholder="First Name" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Last Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" value=""  name="lastname" placeholder="Last Name" />
										</div>
									</div>

									<div class="form-group row">
										<label  class="col-sm-2 col-form-label">Phone Number</label>
										<div class="col-sm-10">
											<input class="form-control" name="phone" value=""  placeholder="Phone#" />
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Persal</label>
										<div class="col-sm-10">
											<input class="form-control" name="identification" value=""  placeholder="Identification" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="address" value=""  placeholder="Address" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Job Tittle</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="address" value=""  placeholder="Job Tittle" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Business Unit</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="address" value=""  placeholder="Business Unit" />
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<input type="submit" class="btn-sm btn-danger" />
										</div>
									</div>
								</form>
								<!-- /.post -->
							</div>
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
