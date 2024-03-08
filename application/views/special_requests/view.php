<dl class="row">
	<dt class="col-sm-2">
		EMPLOYEE
	</dt>
	<dd class="col-sm-10">
		<?php echo $leave->emp ?>
	</dd>

	<dt class="col-sm-2">
		TYPE OF LEAVE
	</dt>
	<dd class="col-sm-10">
		<?php echo $leave->leave_type ?>
	</dd>

	<dt class="col-sm-2">
		START DAY
	</dt>
	<dd class="col-sm-10">
		<?php echo $leave->start_date ?>
	</dd>

	<dt class="col-sm-2">
		END DATE
	</dt>
	<dd class="col-sm-10">
		<?php echo $leave->end_date ?>
	</dd>

	<dt class="col-sm-2">
		STATUS
	</dt>

	<dd class="col-sm-10">
		<?php if($leave->status == null){
			echo 'PENDING';
		}
		else{
			echo $leave->status;
		}
		?>

	</dd>
	<dt class="col-sm-2">
		COMMENT
	</dt>
	<dd class="col-sm-10">
		<?php echo $leave->comment ?>
	</dd>


	<?php if($leave->status != null){ ?>
		<dt class="col-sm-2">
			RECOMMENDED BY
		</dt>
		<dd class="col-sm-10">
			<?php echo $leave->recommended_by ?>
		</dd>
		<?php
			if($leave->status == "APPROVED")
			{ ?>
				<dt class="col-sm-2">
					APPROVED BY
				</dt>
				<dd class="col-sm-10">
					<?php echo $leave->recommended_by ?>
				</dd>
			<?php } ?>

	<?php }


	?>

	<dt class="col-sm-2">
		ATTACHMENT
	</dt>

	<dd class="col-sm-10">
		<?php if(!empty($leave->attachment)) {
			?>
			<a class="btn btn-info" href="<?php echo base_url()?>leaves/process_download/<?php echo $leave->attachment ?>" > DOWNLOAD</a>
		<?php
		} else{ echo 'NO ATTACHMENT';} ?>
	</dd>
</dl>
<div class="text-right">
	<?php if($leave->status == null){
	 ?>
		<a class="btn btn-success" id="recommend"  >RECOMMEND</a>
	<?php } else if($leave->status == "RECOMMENDED")
	{?>
		<a class="btn btn-success" id="approve"  >APPROVE</a>

	<?php } ?>
</div>
<script>
	$('#recommend').on('click', function() {

		$.ajax({
			url: '<?php echo base_url() ?>special/recommend/<?php echo $leave->id ?>',
			type: 'UPDATE',
			data: {id: <?php echo $leave->id ?>},
			success: function(response) {
				location.reload();
			},
			error: function(xhr, status, error) {
				console.log(error);
			}
		});
	});

	$('#approve').on('click', function() {

		$.ajax({
			url: '<?php echo base_url() ?>special/approve/<?php echo $leave->id ?>',
			type: 'UPDATE',
			data: {id: <?php echo $leave->id ?>},
			success: function(response) {
				location.reload();
			},
			error: function(xhr, status, error) {
				console.log(error);
			}
		});
	});


</script>
