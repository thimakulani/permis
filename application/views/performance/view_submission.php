<div>
	<a class="btn-sm btn-info" href="<?php echo base_url() ?>performance/submitted_performance">BACK</a>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
		<tr>
			<th>NAMES</th>
			<th>PERSAL</th>

		</tr>
		</thead>
		<tbody>
		<tr>
			<td>
				<input disabled class="form-control" value="<?php echo $emp->Name . ' ' . $emp->LastName; ?>"/>
			</td>
			<td>
				<input disabled class="form-control" value="<?php echo $emp->Name; ?>"/>
			</td>
		</tr>
		</tbody>
	</table>

</div>



<div class="card">
	<div class="card-body">
		<form class="form-inline"  method="post" action="<?php echo base_url()?>performance/sup_update_status/<?php echo $submission_id ?>">
			<select name="action_option" id="action" onchange="optionChange()" class="form-control">
				<option class="form-control select" value="APPROVED" >APPROVE</option>
				<option value="REJECTED" >REJECT</option>
			</select>
			<input type="submit" class="btn-sm btn-primary m-2" />
			<input type="text" placeholder="REASON..." style="display: none" id="comment" name="comment" class="form-control w-100">
		</form>
	</div>
</div>


<script>
	const e = document.getElementById("action");
	function optionChange() {
		if(e.value === 'APPROVE')
		{
			document.getElementById("comment").style = "display:none";

		}
		if(e.value === 'REJECT')
		{
			document.getElementById("comment").style = "display:block";

		}
	}


</script>
