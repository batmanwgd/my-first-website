<?php
class controller {
	var $view;
	var $arg;
	var $allowedControllers=array();
	var $allowedActions=array();
	
	function controller($view, $argstr){
		$this->view = new view(); 
		$this->view->vars=$view->vars;
		$this->arg = new Arg($this, $argstr);
		$this->onLoad();
		if (($this->arg->nextController == null)&&($this->arg->action==null))
			$this->onLast();
		if ($this->arg->action!=null) $this->userFunction();
		if ($this->arg->nextController != null){
			$this->onContinue();
			$nextControllerName=$this->arg->nextController.'_controller';
			if (!in_array($this->arg->nextController, $this->allowedControllers)) 
				die('controller - "'.$this->arg->nextController.'" is not allowed here!');
			include 'controllers/'.$nextControllerName.'.php';
			$nextController = new $nextControllerName(
				$this->view, 
				$this->arg->nextArgstr
			);
			$this->view->append($nextController->view);
		} 
		$this->view->render();
	}
	
	function userFunction(){
		$action = $this->arg->action;
		if (in_array($action, $this->allowedActions)) $this->$action();
		else die('action - "'.$action.'" is not allowed here!');
	}
	
	function allowController($child){ $this->allowedControllers[]=$child; }
	
	function allowAction($action){ $this->allowedActions[]=$action;}
	
	function loadController($class, $argstr){
		$class .= '_controller';
		include  'controllers/'.$class.'.php';
		$controller= new $class($this->view, $argstr);
		$this->view->append($controller->view);
	}	
	
	function loadModel($name){
		include 'models/'.$name.'.php';
		$classname= $name.'_model';
		return new $classname();
	}	
}
?>
