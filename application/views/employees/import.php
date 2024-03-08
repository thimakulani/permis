<div class="card">
	<div class="card-header">
		<form class="form-inline" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>employees/import">
			<input class="form-control file" name="file" accept=".xls,.xlsx" type="file">
			<input type="submit" name="load_list_of_emp"  class="btn-sm btn-info" value="Upload List of employees per chief directorates + EBAGO BONUS PERMIS + BONUS LIST 2020.2021 (1) ">
		</form>

		<?php
		if(isset($dt))
		{
			print_r($dt);
		}

		?>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<form class="form-inline" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>employees/import">
			<input class="form-control file" name="file" accept=".xls,.xlsx" type="file">
			<input type="submit" name="load_file"  class="btn-sm btn-info" value="Upload">
		</form>

		<?php
		if(isset($dt))
		{
			print_r($dt);
		}

		?>
	</div>
</div>
