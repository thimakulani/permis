<?php

?>
<div style="margin: 10px">
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance">BACK</a>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">SUBMITTED TO YOU</h3>

		<div class="card-tools">
			<form method="post" action="<?php echo base_url()?>performance/permis_official_submissions" >
				<div class="inline-form">
					<select name="branch" class="select2" >
						<option value="" disabled selected>--SELECT BRANCH--</option>
							<?php
									//DistrictId	DistrictName
								$selectedBranch = '';
								foreach ($branch as $bu)
								{
									$selected = '';
									if($_POST['branch'] == $bu['id'])
									{
										$selected = 'selected';
										$selectedBranch = $bu['id'];
									}
									else if(isset($_SESSION['branch']))
									{
										if($_SESSION['branch'] == $bu['id'])
										{
											$selected = 'selected';
											$selectedBranch = $bu['id'];
										}
									}
										echo '<option '.$selected.' value="'.$bu['id'].'">'.$bu['name'].'</option>';
								}
								?>
					</select>
				
				
				
					
					<input type="submit" name="filter_branch" value="FILTER BRANCH" class="btn-sm btn-info" />
				</div>
			</form>
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
					EMPLOYEE
				</th>
				<th>
					SUPERVISOR
				</th>
				<th>
					DATE CAPTURED
				</th>
				<th>
					TEMPLATE
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
			foreach ($performance as $perf)
			{


				echo '<tr>
									<td>
										'.$perf['id'].'
									</td>
									<td>
										'.$perf['Persal'].'
									</td>
									<td>
										'.$perf['E_Name'].'
									</td>
									<td>
										'.$perf['S_Name'].'
									</td>
									<td>
										'.$perf['date_captured'].'
									</td>
									<td>
										'.$perf['template_name'].'
									</td>
									<td>
										'.$perf['Status_Final'].'
									</td>
									<td>
										<a class="btn-sm btn-primary" href="'.base_url().'performance/permis_view_submission/'.$perf['emp_id'].'/'.$perf['id'].'" ><i class="fas fa-folder"></i>View</a> |
									</td>
								</tr>';
			}

			?>

			</tbody>
		</table>
	</div>
</div>
