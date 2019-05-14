Objektų sąrašas
<table>
	<tr>
	<?php  foreach($props as $prop): ?>
		<td>
			<?=$prop->title ?>
		</td>
	<?php endforeach; ?>	
		
	</tr>
	<?php foreach($vals as $row): ?>
	<tr>
		<?php  foreach($row as $cell): ?>
		<td>
			<?=$cell->title ?>
		</td>
		<?php endforeach; ?>	
		<td>
			<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/up/<?=$row[0]->obj_id ?>">Aukštyn</a>
			<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/down/<?=$row[0]->obj_id ?>">Žemyn</a>
			<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/gal/admin/<?=$row[0]->obj_id ?>">Iliustracijos</a>
			<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/edit/<?=$row[0]->obj_id ?>">Koreguoti</a>
			<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/delete/<?=$row[0]->obj_id ?>">trinti</a>
		</td>		
	</tr>
	<?php endforeach; ?>	
</table>

<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/add/<?=$row[0]->obj_id ?>">įdėti naują</a><br/>
<a href="<?=baseUrl() ?>/group/admin">Grįžti atgal</a>


	