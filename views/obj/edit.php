Keisti įrašą<br />
<form action="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/edit/<?=$obj_id ?>" method="post">
<b>lietuviškai:</b><br>
<?php for($i=0; $i<count($props); $i++): ?>
	<?=$props[$i]->title ?><br />
	<? if($props[$i]->type==1){ ?>
		<textarea  name="titles[<?=$props[$i]->id ?>]" ><?=$vals[$i]->title ?></textarea><br/>
	<? }	else { ?>
		<input type="text" value="<?=$vals[$i]->title ?>" name="titles[<?=$props[$i]->id ?>]"/><br/>
	<? }	 ?>	
<?php endfor; ?>	
<hr>

<b>angliškai:</b><br>
<?php for($i=0; $i<count($props); $i++): ?>
	<?=$props[$i]->title ?><br />
	<? if($props[$i]->type==1){ ?>
		<textarea  name="titlesen[<?=$props[$i]->id ?>]" ><?=$vals[$i]->titleen ?></textarea><br/>
	<? }	else { ?>
		<input type="text" value="<?=$vals[$i]->titleen ?>" name="titlesen[<?=$props[$i]->id ?>]"/><br/>
	<? }	 ?>	
<?php endfor; ?>	
<hr>



<b>rusiškai:</b><br>
<?php for($i=0; $i<count($props); $i++): ?>
	<?=$props[$i]->title ?><br />
	<? if($props[$i]->type==1){ ?>
		<textarea  name="titlesru[<?=$props[$i]->id ?>]" ><?=$vals[$i]->titleru ?></textarea><br/>
	<? }	else { ?>
		<input type="text" value="<?=$vals[$i]->titleru ?>" name="titlesru[<?=$props[$i]->id ?>]"/><br/>
	<? }	 ?>	
<?php endfor; ?>	
<hr>


	<input type="submit" name="" value="Pakeisti"/>	
</form>





