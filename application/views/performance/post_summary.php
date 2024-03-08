<?php
$text ='1. The information required in 1.1 and 1.2 should be provided as it is indicated within the approved job description of the post or other 
approved directives that have an impact on the post.
1.1The purpose of the post:
1.2 The Key Responsibilities of the post:
1.2.1
1.2.2.
1.2.3
2. The information required in 2.1 and 2.2 does not form part of the approved job description of the post or other approved directives that 
have an impact on the post and is applicable on a temporary basis only.
2.1 Additional duties that are expected of the job holder for this performance cycle that is not normally expected of the job holder or that 
is not part of the post:
37
a)
b)
2.2 The reasons for these duties being expected for this cycle i.e. vacancies, absenteeism, acting, etc.
a)
b)
c)
d)
e)
3. The information as listed in sections 1 and 2 above has been discussed and agreed upon
	
	';
?>


<div>
	<form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>performance/add_post_summary">
		<input type="submit" value="SUBMIT"  class="btn-sm btn-success m-2">

		<label>
<textarea name="summary"  class="form-control" rows="20">
	<?php
	if(isset($summary->Summary))
	{
		echo $summary->Summary;
	}
	else{
		echo $text;
	}
	?>
	</textarea>
		</label>
	</form>
</div>
