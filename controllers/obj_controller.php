<?php
class obj_controller extends controller {
	function onLoad(){
		$this->allowAction('index');
		$this->allowAction('show');
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
	function onContinue(){
		$this->allowController('gal');
		$this->view->setVar('obj_id',$this->arg->params['num_var']);
	}
	
	function admin(){
		$this->view->setViewPort('content', 'obj/admin');
		$m=$this->loadModel('obj');
		$a = $m->getValsByGroup_id($this->view->vars['group']->id);
		$m=$this->loadModel('prop');
		$props = $m->getAllByGroup_id($this->view->vars['group']->id);
		$i=0;
		$vals=array();
		$z=0;
		while($i<count($a)){
			for($j=0; $j<count($props); $j++){
				$row[]=$a[$z];
				$z++;$i++;
			}
			$vals[]=$row;
			$row=array();
		}
		$this->view->setVar('props',$props);
		$this->view->setVar('vals',$vals);
	}
	
	
	function index(){
		$this->view->setViewPort('content', 'obj/index');
		$m=$this->loadModel('obj');
		$a = $m->getValsByGroup_id($this->view->vars['group']->id);
		//pp($a); echo $this->view->vars['group']->id;
		$m=$this->loadModel('prop');
		$props = $m->getAllByGroup_id($this->view->vars['group']->id);
		$i=0;
		$vals=array();
		$z=0;
		while($i<count($a)){
			for($j=0; $j<count($props); $j++){
				$row[]=$a[$z];
				$z++;$i++;
			}
			$vals[]=$row;
			$row=array();
		}
		$this->view->setVar('props',$props);
		$this->view->setVar('vals',$vals);
	}
	
	
	
	function up(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('obj');
		$m->up($id);	
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/obj/admin");	
	} 	
	
	function down(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('obj');
		$m->down($id);	
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/obj/admin");	
	} 		
	
	function delete(){
		$id= $this->arg->params['num_var'];
		$m=$this->loadModel('obj');
		$m->delete_entry($id);	
		header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/obj/admin");	
	} 
	
	function add(){
		if (isset($_POST['titles'])){ 
			$o=$this->loadModel('obj');
			$o->insert_entry($this->view->vars['group']->id);
			header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/obj/admin");	
		} else {
			$p=$this->loadModel('prop');
			$this->view->setViewPort('content', 'obj/add');
			$props=array();
			$props= $p->getAllByGroup_id($this->view->vars['group']->id);
			$this->view->setVar('props',$props);		
		}
	}
	
	function edit(){
		$o=$this->loadModel('obj');
		if (isset($_POST['titles'])){ 
			$o->update_entry($this->arg->params['num_var']);
			header("Location: ".baseUrl()."/group/".$this->view->vars['group']->id."/obj/admin");	
		} else {
			$vals=$o->getValsById($this->arg->params['num_var']);
			$p=$this->loadModel('prop');
			$this->view->setViewPort('content', 'obj/edit');
			$props=array();
			$props= $p->getAllByGroup_id($this->view->vars['group']->id);
			$this->view->setVar('vals',$vals);	
			$this->view->setVar('obj_id',$this->arg->params['num_var']);	
			//$props->vals=$vals;
			$this->view->setVar('props',$props);		
		}
	}	
	function show(){
		$o=$this->loadModel('obj');
		$vals=$o->getValsById($this->arg->params['num_var']);
		$p=$this->loadModel('prop');
		$this->view->setViewPort('content', 'obj/show');
		$props=array();
		$props= $p->getAllByGroup_id($this->view->vars['group']->id);
		$this->view->setVar('vals',$vals);	
		$this->view->setVar('obj_id',$this->arg->params['num_var']);	
		//$props->vals=$vals;
		
		
		$this->view->setVar('props',$props);		
	}	
	
} 
?>