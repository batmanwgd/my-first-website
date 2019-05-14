<?php
class lang_controller extends controller{
	function onLoad(){
		$this->allowAction('set');
		if ($_SESSION['user']=='root'){
			$this->allowAction('admin'); 
			$this->allowAction('add'); 
			$this->allowAction('delete');
		}
	}
	function onLast(){}
	function onContinue(){}
	function set(){
		$l=$this->arg->params['lingo'];
		//pp($this->arg->params);
		$_SESSION['lang']=$l;
		//echo 'ddd';
		header("Location:  ".baseUrl()."/text/1");
	}
	//http://localhost/~user/kaulai/obj/3/gal/thumb/4 C10 H15 N
	
}
?>