<?php
class prop_controller extends controller {
	function onLoad(){
		if ($_SESSION['user']=='root'){
			$this->allowAction('admin'); 
			$this->allowAction('add'); 
			$this->allowAction('delete'); 		
			$this->allowAction('up'); 					
			$this->allowAction('down'); 		
			$this->allowAction('edit'); 	
		}		
	}

	function onLast(){}
	function onContinue(){}
	
	function admin(){
		$this->view->setViewPort('content', 'prop/admin');
		$m=$this->loadModel('prop');
		$this->view->setVar('proplist',$m->getAllByGroup_id($this->view->vars['group']->id));		
	}
	
	function delete(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('prop');
		$m->delete_entry($id);	
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/prop/admin");	
	} 
	
	function add(){
		$m=$this->loadModel('prop');
		$m->insert_entry($this->view->vars['group']->id);
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/prop/admin");
	}
	function edit(){
	
		if ($_POST['title']){
			$m=$this->loadModel('prop');
			$m->group_id=$this->view->vars['group']->id;
			$m->update_entry($this->arg->params['num_var']);
			//pp($m);
			//
			header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/prop/admin");
		} else{
			$this->view->setViewPort('content', 'prop/edit');
			$m=$this->loadModel('prop');
			$m->getById($this->arg->params['num_var']);
			$this->view->setVar('prop', $m);
		}
	}	
	
	function up(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('prop');
		$m->up($id);	
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/prop/admin");
	} 		
	
	function down(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('prop');
		$m->down($id);	
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/prop/admin");
	} 			
} 
?>