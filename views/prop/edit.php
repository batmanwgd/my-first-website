Keisti įrašą<br />
<form action="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/edit/<?=$prop->id ?>" method="post">
	
	lietuviškai <br />
	<input type="text" value="<?=$prop->title ?>" name="title" /> 
	<hr />
	
	rusiškai <br />
	<input type="text" value="<?=$prop->titleru ?>" name="titleru" /> 
	<hr />
	
	angliškai <br />
	<input type="text" value="<?=$prop->titleen ?>" name="titleen" /> 
	<hr />
	
	platus<br />
	<input type="checkbox" name="type" <? if($prop->type==1): ?>checked="on" <? endif; ?>>
	
	<br/>
	<input type="submit" name="" value="Pakeisti"/>	
</form>
<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/prop/admin ">Grįžti atgal</a>
