<?php
class view {
	var $vars = array();    
	var $file; 
	var $ports=array();    
	
	function render(){
		foreach ($this->ports as $port => $filename ){
			$portview=new view();
			$portview->file=$filename;
			$portview->vars = $this->vars;
			$this->setVar($port, $portview->render());
		}
		if (isset($this->vars)) foreach ($this->vars as $key=>$val){
			$$key=$val;
		}
		ob_start();
			include 'views/'.$this->file.'.php';
			$text = ob_get_contents();
		ob_end_clean();
		return $text;
	}
	
    function setVar($key, $value){
		$this->vars[$key]=$value;
	}
	
	function setView($filename){
		$this->file=$filename;
	}
    
 	function setViewPort($port, $filename){
		$this->ports[$port]=$filename;
	}   
    
    function append($child){
        $this->vars=array_merge($this->vars, $child->vars);
		$this->ports=array_merge($this->ports, $child->ports);
    }	
}
?>