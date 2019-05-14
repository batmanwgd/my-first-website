Skelbimų kategorijos
<ul style="border: 1px dotted #aaa; width:100%; ">
	<?php foreach($grouplist as $group): ?>
	<li>
		<?=$group['row']->title ?>
		<a href="<?=baseUrl() ?>/group/up/<?=$group['row']->id ?>">Aukštyn</a>
		<a href="<?=baseUrl() ?>/group/down/<?=$group['row']->id ?>">Žemyn</a>			
		<a href="<?=baseUrl() ?>/group/edit/<?=$group['row']->id ?>">Redaguoti</a>
		<a href="<?=baseUrl() ?>/group/delete/<?=$group['row']->id ?>">Trinti</a>
		<ul>
		<?php foreach($group['rows'] as $row): ?>
			<li>
				<?=$row->title ?>
				<a href="<?=baseUrl() ?>/group/<?=$row->id ?>/obj/admin/">Keisti skelbimus</a>				
				<a href="<?=baseUrl() ?>/group/<?=$row->id ?>/prop/admin/">Keisti struktūrą</a>				
				<a href="<?=baseUrl() ?>/group/subup/<?=$row->id ?>">Aukštyn</a>
				<a href="<?=baseUrl() ?>/group/subdown/<?=$row->id ?>">Žemyn</a>	
				<a href="<?=baseUrl() ?>/group/edit/<?=$row->id ?>">Redaguoti</a>
				<a href="<?=baseUrl() ?>/group/delete/<?=$row->id ?>">Trinti</a>	
			</li>
		<?php endforeach; ?>
		</ul>
		<form action="<?=baseUrl() ?>/group/add/<?=$group['row']->id ?>" method="post">
			antraraštė:<br/>
			<input type="text" value="" name="title"/><br/>
			<input type="submit" name="" value="Pridėti"/>	
		</form>
	</li>
	<?php endforeach; ?>
</ul>
nauja kategorija
<form action="<?=baseUrl() ?>/group/add/0" method="post">
	antraraštė:<br/>
	<input type="text" value="" name="title"/><br/>
	<input type="submit" name="" value="Pridėti"/>	
</form>