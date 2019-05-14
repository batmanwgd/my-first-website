Tekstai
<table style="border: 1px dotted #aaa; width:100%; ">
<?php foreach($textlist as $text): ?>
	<tr>
		<td><?=$text->id ?></td>
		<td><?=$text->title ?></td>
		<td><a href="<?=baseUrl() ?>/text/up/<?=$text->id ?>">Aukštyn</a></td>
		<td><a href="<?=baseUrl() ?>/text/down/<?=$text->id ?>">Žemyn</a></td>		
		<td><a href="<?=baseUrl() ?>/text/edit/<?=$text->id ?>">Redaguoti</a></td>
		<td><a href="<?=baseUrl() ?>/text/delete/<?=$text->id ?>">Trinti</a></td>
	</tr>
<?php endforeach; ?>
</table>
<a href="<?=baseUrl() ?>/text/add">naujas tekstas</a>
