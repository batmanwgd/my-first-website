Objektų sąrašas 
<div class="table">
<table>
	<thead>
		<tr>
			<th>
				&nbsp;
			</th>
		<?php  foreach($props as $prop): ?> 
			<th>
				<?=$prop->title ?> 
			</th>
		<?php endforeach; ?>	
		</tr>
	</thead>
	<tbody> 
		<?php $r=new rot(array('', 'odd')) ?>
		<?php foreach($vals as $row): ?>
		<tr class=" <?=$r->out() ?> "> 
			<td>  
				<?php if(file_exists('obj/'.$row[0]->obj_id.'/0.jpg')){ ?>
				<img src="<?=baseUrl() ?>/obj/<?=$row[0]->obj_id ?>/gal/thumb/0" /> 
				<br /> 
				<?php  } ?>
				<a href="<?=baseUrl() ?>/group/<?=$group->id ?>/obj/show/<?=$row[0]->obj_id ?>">plačiau</a>
			</td> 
			<?php  foreach($row as $cell): ?>
			<td> 
				<?=$cell->title ?>
			</td> 
			<?php endforeach; ?>			
		</tr> 
		<?php endforeach; ?>
	</tbody> 
</table> 
</div> 


	