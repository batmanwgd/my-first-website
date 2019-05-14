<?php
class index_controller extends controller {
	function onLoad(){
		session_start(); 								// start the session 
		header("Cache-control: private"); 	//IE 6 Fix 
		$this->allowController('text');		
		$this->allowController('group');
		$this->allowController('obj');
		$this->allowController('lang');
		$this->allowAction('login');
		$this->view->setVar('lang', $_SESSION['lang']);
		$this->view->setView('layout');
		if ($_SESSION['user']=='root'){ 
			$this->allowAction('admin');
			$this->allowAction('logout');
			$this->view->setView('admin_layout');
		}
	}
	
	function onLast(){
		 $this-> loadController('text', 'show/1');
	}
	
	function onContinue(){}

	function login(){
		
		$this->view->setViewPort('content', 'login');
		global $password;
		if (isset($_POST['pass'])) 
			if ($password==$_POST['pass']) $_SESSION['user'] = 'root';
		else $this->view->setVar('klaida', 'klaidingas slaptažodis!');
		if ($_SESSION['user']=='root') 
			header("Location: ".baseUrl()."");
		$this->view->setViewPort('content', 'login');
	}
	
	function logout(){
		$_SESSION['user'] = FALSE; 
		header("Location: ".baseUrl()."");
		//session_destroy();  i can use this instead of that ;)
	}	
	
	function 	admin(){
	}
} 
?>