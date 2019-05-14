Paveikslėlių galerija<br />
<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/admin">Grįžti atgal</a>
<!--/<?=$gal_id ?>-->

<form name="form1" method="post" enctype="multipart/form-data">
	<?php for ($i=0; $i<10; $i++) {?>
		<?php  if (file_exists("obj/".$gal_id."/".$i.".jpg")) {  	echo 'egzistuoja'; ?>
			
			<img src="<?=baseUrl() ?>/obj/<?=$gal_id?>/gal/thumb/<?=$i ?>" />
		<?php } else { ?> 
			<input type="file" name="file<?php echo $i ?>"> 
		<?php }?><br />
	<?php } ?>
	<input type="submit" name="Upload" value="Upload">
</form>