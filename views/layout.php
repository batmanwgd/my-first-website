<?php 
header("Content-type: text/html; charset=utf-8");
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
//header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache"); // HTTP/1.0 
?>
<html> 
<title> <?php //echo $title_for_layout;?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=baseUrl(); ?>/css/menu.css" />	
<link rel="stylesheet" type="text/css" href="<?=baseUrl(); ?>/css/layout.css" />	
<link rel="stylesheet" type="text/css" href="<?=baseUrl(); ?>/css/layout2.css" />	
<link rel="stylesheet" type="text/css" href="<?=baseUrl(); ?>/css/tabular-table.css" />	
<link rel="stylesheet" type="text/css" href="<?=baseUrl(); ?>/css/style.css" />	

<!--[if IE]>
	<style type="text/css" media="screen">
	#menu ul li {float: left; width: 100%;}
</style>
<![endif]-->
<!--[if lt IE 7]>
	<style type="text/css" media="screen">
	body {
	behavior: url(csshover.htc);
	font-size: 100%;
}
#menu ul li a {height: 1%;} 

	#menu a, #menu h2 {
	font: bold 0.7em/1.4em arial, helvetica, sans-serif;
	}
</style>
<![endif]-->

<?php  //if ($this->params['action']=="index") 
echo '
<style>
.pane{
float: left;
}
</style>
';   ?>

<!-- cia visi css kurie turi absoliutini adresa kur nors ir uztai turi but sugeneruojami is php -->
<style>
#head { 	
_background-image:none;
_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=scale src='css/img/head.png');	
}

#foot { 
	_background-image:none;
	_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=scale src='css/img/foot.png');
}
</style>
<?php //print $javascript->link('prototype') ?>
<?php //print $javascript->link('scriptaculous') ?>
</head>
<body>
	<div id="wraper">
		<table id="content"><tr >
				<td id="left" style="border: 0px solid;">
				<div style="height:100px; ">&nbsp;</div>
				<p class="icontext">Statome individualius gyvenamuosius namus</p>
				<div class="quad"><img src="<?=baseUrl(); ?>/img/namelius.png" class="icon" /></div>
				<p class="icontext">Kokybiškai atliekame statybos ir remonto darbus</p>
				<div class="quad"><img src="<?=baseUrl(); ?>/img/lopeta.png" class="icon" /></div>
				<p class="icontext">Suprojektuojame ir gauname leidimus statybai</p>
				<div class="quad"><img src="<?=baseUrl(); ?>/img/planas.gif" class="icon" /></div>
				<p class="icontext">Prekiaujame nekilnojamu turtu</p>
				<div class="quad"><img src="<?=baseUrl(); ?>/img/nt.png" class="icon" /></div>
				</td>
				<td id="midle" >
					
					<?php 
					
					if (($this->params['controller']!="pros")||($this->params['action']!="show")) {
						echo '<div id="panorama">&nbsp;</div>';
					}
					
					?>
					<div class="blue"><marquee>Firma</marquee></div>
					<div class="blue">
						<?php echo $content_for_layout; ?><?=$content ?>
					</div>
				</td>
				
				<!--<td id="right">
					<?php //if (($this->params['controller']=="pros")&&($this->params['action']=="show")){ ?>
						<div style="width:120px;">
							<div class="blue">
								<?=$sidepros ?>
							</div>
						</div>
				<?php //} ?>
				</td>-->
		</tr></table>	
		<div id="head">
			<div class="bar">
				<? 
					if ($lang == 'ru') {
						echo "ruckii";
					} elseif ($lang == 'en') {
						echo "angliskai";
					} else {
						echo 'UAB "FIRMA" - STATYBA IR PREKYBA NEKILNOJAMU TURTU';
					}
				
					
				?>
			</div>
			<div id="logo">&nbsp;</div>
		</div>	
		
		<div id="langbar">
			<a href="<?=baseUrl() ?>/lang/set/lingo.lt">lt </a>
			<a href="<?=baseUrl() ?>/lang/set/lingo.en">en </a>
			<a href="<?=baseUrl() ?>/lang/set/lingo.ru">ru </a>			
		</div>
	
		<?php
		if ($lang == 'ru') 
		{
			$menu1='firma';
			$menu2='&nbsp;mus';
			$menu3='Nekilnojamas&nbsp;turtas';
			$menu3_1='Parduodame '; $menu3_2='kvartiri'; $menu3_3='doma'; $menu3_4='usadbi'; 
			$menu3_5='Sklypai'; $menu3_6='Nuomojame'; $menu3_7='Patalpos';
			$menu4='Kontaktai';
			$menu5='Projektai';
		} elseif ($lang == 'en') 
		{
			$menu1='firma';
			$menu2='About&nbsp;us';
			$menu3='Real&nbsp;estate';
			$menu3_1='For&nbsp;sale'; $menu3_2='Flats'; $menu3_3='Houses'; $menu3_4='Homesteads'; 
			$menu3_5='Parcels'; $menu3_6='For&nbsp;lease'; $menu3_7='Quarters';
			$menu4='Contacts';
			$menu5='Projects';
		} else 
		{
			$menu1='firma';
			$menu2='Apie&nbsp;mus';
			$menu3='Nekilnojamas&nbsp;turtas';
			$menu3_1='Parduodame '; $menu3_2='Butai'; $menu3_3='Namai'; $menu3_4='Sodybos'; 
			$menu3_5='Sklypai'; $menu3_6='Nuomojame'; $menu3_7='Patalpos';
			$menu4='Kontaktai';
			$menu5='Projektai';
		}
		?>
		<div id="menubar">
				<div id="menu">
					<ul><li><a  style="height:20px;padding-right:20px;" href='<?=baseUrl(); ?>/text/show/1'><?=$menu1 ?></a></li></ul>
					<ul><li><a  style="height:20px;padding-right:20px;" href='<?=baseUrl(); ?>/text/show/2'><?=$menu2 ?></a></li></ul>
					<ul><li>
						<a   style="height:20px;padding-right:20px;"  href='<?=baseUrl(); ?>/text/show/3'><?=$menu3 ?></a>
						<ul style="width:100px;">
							<li><h2 style="background: #bbb; margin: 0px; "><?=$menu3_1 ?></h2></li>
							<li>	<a href="<?=baseUrl(); ?>/group/4/obj/index" style="height:20px;"><?=$menu3_2 ?></a></li>
							<li>	<a href="<?=baseUrl(); ?>/obj/index/5" style="height:20px;"><?=$menu3_3 ?></a></li>
							<li>	<a href="<?=baseUrl(); ?>/obj/index/3" style="height:20px;"><?=$menu3_4 ?></a></li>
							<li>	<a href="<?=baseUrl(); ?>/obj/index/6" style="height:20px;"><?=$menu3_5 ?></a></li>
							<li>	<h2 style="background: #bbb; margin: 0px; "><?=$menu3_6 ?></h2></li>
							<li>	<a href="<?=baseUrl(); ?>/obj/index/7" style="height:20px;"><?=$menu3_7 ?></a></li>
						</ul>	
					</li></ul>	
					<ul><li><a href="<?=baseUrl(); ?>/text/show/4" style="height:20px;padding-right:20px;"><?=$menu4 ?></a></li></ul>
					<ul><li><a href="<?=baseUrl(); ?>/pro/index/" style="height:20px;padding-right:20px;"><?=$menu5 ?></a></li></ul>						
				</div>
		</div>
		<div id="foot">
			&nbsp;
		</div>
	</div>
</body>
</html>
