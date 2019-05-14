<?php
class Arg {
	var $params=array();
	var $action=null;
	var $nextController=null;
	var $nextArgstr;
	
	function Arg($obj, $argstr){
		$tok = strtok($argstr, '/'); $controllerFound=false;
		while (($tok !== false)&&($controllerFound!=true)) {
			$pieces = explode(".", $tok);
			if (count($pieces)>1) 
				array_push_associative($this->params, array($pieces[0]=>$pieces[1]));
			elseif (is_numeric($tok)) 
				array_push_associative($this->params, array('num_var'=>$tok));
			elseif (method_exists($obj, $tok))  $this->action=$tok;
			else {
				$this->nextController=$tok; 
				$controllerFound=true;
			}
			if (!$controllerFound) $tok = strtok('/');
			else $tok = strtok("\n");
			$this->nextArgstr = $tok;
		}
	}
}
?>
