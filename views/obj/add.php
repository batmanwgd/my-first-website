Kurti naują įrašą<br />
<form action="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/add" method="post">
<?php foreach($props as $prop): ?>
	<?=$prop->title ?><br />
	
	<input type="text" value="" name="titles[<?=$prop->id ?>]"/><br/>
<?php endforeach; ?>	
	<input type="submit" name="" value="Pridėti"/>	
</form>