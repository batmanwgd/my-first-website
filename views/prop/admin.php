Lentelės <?=$group->id ?><br />
<?php foreach($proplist as $prop): ?>
<?=$prop->title ?>
		<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/up/<?=$prop->id ?>">Aukštyn</a>
		<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/down/<?=$prop->id ?>">Žemyn</a>		
		<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/edit/<?=$prop->id ?>">Redaguoti</a>
		<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/delete/<?=$prop->id ?>">Trinti</a>
<br />

<?php endforeach; ?>
<form action="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/add/" method="post">
	antraštė:<br/>
	<input type="text" value="" name="title"/><br/>
	<input type="submit" name="" value="Pridėti"/>	
</form>
<a href="<?=baseUrl() ?>/group/admin">Grįžti atgal</a>