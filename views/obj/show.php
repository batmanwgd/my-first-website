<?php for($i=0; $i<10; $i++) if(file_exists('obj/'.$vals[0]->obj_id.'/'.$i.'.jpg')){ ?>
	<img src="<?=baseUrl() ?>/obj/<?=$vals[0]->obj_id ?>/gal/thumb/<?=$i ?>" /> 
<?php  } ?>
	
<br />



<?php for($i=0; $i<count($props); $i++): ?>
	<?=$props[$i]->title ?>
	<?=$vals[$i]->title ?><br />
<?php endfor; ?>	










