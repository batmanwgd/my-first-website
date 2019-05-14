Šitas failas skirtas tekstų sąrašui išvesti
<ul>
<?php foreach($textlist as $text): ?>
	<li><?=$text->title ?></li>
<?php endforeach; ?>
</ul>