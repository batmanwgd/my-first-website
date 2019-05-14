<?php
class text_controller extends controller {
	function onLoad(){
		$this->allowAction('show');
		if ($_SESSION['user']=='root'){ 
			$this->allowAction('admin');
			$this->allowAction('add');
			$this->allowAction('edit');			
			$this->allowAction('delete');	
			$this->allowAction('up');	
			$this->allowAction('down');		
		}
	}
	
	function onLast(){
		if ($this->arg->params['num_var']>0) $this->show();
		else $this->index();
	}
	
	function onContinue(){}

	function index(){
		$this->view->setViewPort('content', 'text/index');
		$m=$this->loadModel('text');
		$this->view->setVar('textlist',$m->getAll());
	}
	
	function show(){
		$id= $this->arg->params['num_var'];
		$this->view->setViewPort('content', 'text/show');
		$m=$this->loadModel('text');
		$m->getById($id);
		
		$this->view->setVar('text',$m);
	}
	
	function admin(){
		$this->view->setViewPort('content', 'text/admin');
		$m=$this->loadModel('text');
		$this->view->setVar('textlist',$m->getAll());		
	}
	
	function add(){
		if ((isset($_POST['title'])) &&(isset($_POST['text']))){ 
			$m=$this->loadModel('text');
			$m->insert_entry();
			header("Location: ".baseUrl()."/text/admin");
		} else $this->view->setViewPort('content', 'text/add');
	}
	
	function edit(){
		$id= $this->arg->params['num_var'];
		if ((isset($_POST['title'])) &&(isset($_POST['text'])) ){ 
			$m=$this->loadModel('text');
			$m->update_entry($id);
			header("Location: ".baseUrl()."/text/admin");			
		} else {
			$m=$this->loadModel('text');
			$m->getById($id);
			$this->view->setVar('text',$m);
			$this->view->setViewPort('content', 'text/edit');
		}
	}
	
	function delete(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('text');
		$m->delete_entry($id);	
		header("Location: ".baseUrl()."/text/admin");	
	} 
	
	function up(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('text');
		$m->up($id);	
		header("Location: ".baseUrl()."/text/admin");	
	} 	
	
	function down(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('text');
		$m->down($id);	
		header("Location: ".baseUrl()."/text/admin");	
	} 	
	
} 
?>