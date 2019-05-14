<?php
class gal_controller extends controller{
	function onLoad(){
	
	
		$this->allowAction('thumb');
		if ($_SESSION['user']=='root'){
			$this->allowAction('admin'); 
			$this->allowAction('add'); 
			$this->allowAction('delete');
			
		}
		$this->view->setVar('gal_id', $this->arg->params['num_var']);
	}
	function onLast(){}
	function onContinue(){}

	function admin(){
		$this->view->setViewPort('content', 'gal/admin');
		if (!file_exists('obj')) mkdir('obj', 0777);	
		if ($_FILES) { 
			pp($_FILES);
			for ($i=0; $i<10; $i++){
				if ($_FILES["file".$i]["error"]==UPLOAD_ERR_OK){ 
					$tmp_name=$_FILES["file".$i]["tmp_name"];
					echo 'uploadintas '.$i.$_FILES["file".$i]["tmp_name"];
					if (!file_exists('obj/'.$this->arg->params['num_var'])) mkdir('obj/'.$this->arg->params['num_var'], 0777);
					move_uploaded_file($tmp_name, 'obj/'.$this->arg->params['num_var'].'/'.$i.".jpg");
				}
			}
		}
	}
	
	function thumb(){
		if (!file_exists("obj/".$this->view->vars['obj_id']."/thumbs")) 
			mkdir("obj/".$this->view->vars['obj_id']."/thumbs", 0777);	
		if (!file_exists("obj/".$this->view->vars['obj_id']."/thumbs/".$this->arg->params['num_var'].".jpg")) 
			createThumb(
				"obj/".$this->view->vars['obj_id']."/".$this->arg->params['num_var'].".jpg",
				"obj/".$this->view->vars['obj_id']."/thumbs/".$this->arg->params['num_var'].".jpg"
			);
		
	header("Location:  ".baseUrl()."/obj/".$this->view->vars['obj_id']."/thumbs/".$this->arg->params['num_var'].".jpg");
		
	}
	//http://localhost/~user/kaulai/obj/3/gal/thumb/4 C10 H15 N
	
}
?>