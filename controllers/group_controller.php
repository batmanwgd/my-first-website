<?php
class group_controller extends controller {
	function onLoad(){
		$this->allowAction('show');
		if ($_SESSION['user']=='root'){
			$this->allowAction('admin');
			$this->allowAction('add');
			$this->allowAction('edit');
			$this->allowAction('delete');	
			$this->allowAction('up');
			$this->allowAction('down');
			$this->allowAction('subup');
			$this->allowAction('subdown');
		}
	}
	
	function onLast(){
		if ($this->arg->params['num_var']>0) $this->show();
		else $this->index();
	}
	
	function onContinue(){
		$this->allowController('obj');
		$m=$this->loadModel('group');
		$m->getById($this->arg->params['num_var']);
		$this->view->setVar('group', $m);		
		$this->allowController('prop');
		$this->allowController('gal'); 
		if ($_SESSION['user']=='root'){
		}
	}

	function index(){
		$this->view->setViewPort('content', 'text/index');
		$m=$this->loadModel('group');
		$this->view->setVar('grouplist',$m->getAll());
	}
	
	function show(){
		$id= $this->arg->params['num_var'];
		$this->view->setViewPort('content', 'group/show');
		$m=$this->loadModel('group');
		$m->getById($id);
		$this->view->setVar('group',$m);
	}
	
	function admin(){
		$this->view->setViewPort('content', 'group/admin');
		$m=$this->loadModel('group');
		$this->view->setVar('grouplist',$m->getAllNested());		
	}
	
	function add(){
		$group_id= $this->arg->params['num_var'];
		if (isset($_POST['title'])){ 
			$m=$this->loadModel('group');
			$m->group_id=$group_id;
			$m->insert_entry();
			header("Location: ".baseUrl()."/group/admin");
		} else $this->view->setViewPort('content', 'group/add');
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
		$m=$this->loadModel('group');
		$m->delete_entry($id);	
		//header("Location: ".baseUrl()."/group/admin");	
	} 
	
	function subup(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('group');
		$m->subup($id);	
		header("Location: ".baseUrl()."/group/admin");	
	} 	
	
	function subdown(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('group');
		$m->subdown($id);	
		header("Location: ".baseUrl()."/group/admin");	
	} 		
	
	function up(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('group');
		$m->up($id);	
		header("Location: ".baseUrl()."/group/admin");	
	} 	
	
	function down(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('group');
		$m->down($id);	
		header("Location: ".baseUrl()."/group/admin");	
	} 		
} 
?>