<?php  header("Content-type: text/html; charset=utf-8"); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>Firma</title>
	
<style>	
.spacer{
	border: 1px solid #444;
	width:200px;
}	
</style>

</head>
<body>

Administracinis skydelis<br />
<a href="<?=baseUrl() ?>/logout">logout</a> | 
<a href="<?=baseUrl() ?>/text/admin">tekstai</a> | 
<a href="<?=baseUrl() ?>/group/admin">skelbimai</a> | 

<div style="border: 5px solid #f44; ">
<?=$content ?>
</div>



</body>
</html>
