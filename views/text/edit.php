redaguoti tekstą
<form action="<?=baseUrl()?>/text/edit/<?=$text->id ?>" method="post">
	antraraštė:<br/>
	<input type="text" value="<?=$text->title ?>" name="title"/><br/>
	tekstas:<br/>
	<textarea name="text"><?=$text->text ?></textarea><br/>
	<input type="submit" name="" value="Išsaugoti"/>
</form>
<a href="<?=baseUrl() ?>/text/admin">grįžti atgal</a>
