<?php
class val_model extends model {
   var $id;
   var $title;
   var $obj_id;   
   var $prop_id;
   
    
 /*   function getAllNested(){
        $q="  SELECT * FROM groups WHERE group_id='0' ORDER BY id ASC";
        $res = $this->SQLQuery($q);
        $r = $this->setArray( $res);
        foreach ($r as $row){
            $q="  SELECT * FROM groups WHERE group_id='".$row->id."' ORDER BY id ASC";
            $rows=$this->SQLQuery($q);
            $fullres[]=array(
                'row'=>$row,
                'rows'=>$this->setArray( $rows)
            );
        }
        return $fullres;
    }*/   
    
 /*   function getById($id){
        $q="  SELECT * FROM groups WHERE id=".$id;
        $res = $this->SQLQueryRow($q);
        $this->set( $res);    
    }    
    
    function insert_entry(){
        $this->id=''; 
        $this->title=$_POST['title'];
        $this->text=$_POST['text'];
        $this->insert();
    }
    function insert_empty(){
        $this->insert();
    }*/
    /*function update_entry($id){
        $this->title=$_POST['title'];
        $this->text=$_POST['text'];
        $this->update($id);
    }
    
    function delete_entry($id){ 
		$this->delete($id);	
        $q="DELETE FROM groups WHERE group_id=".$id;              
        $this->SQL($q);
        $q="DELETE FROM vals WHERE obj_id IN
            (SELECT id FROM objs WHERE group_id=".$id.")";              
        $this->SQL($q);          
        $q="DELETE FROM objs WHERE group_id=".$id;              
        $this->SQL($q);
        $q="DELETE FROM props WHERE group_id=".$id;              
        $this->SQL($q);   
		header("Location: ".baseUrl()."/group/admin");	
    }    
    
    
 function subup($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti virsuje
        $q="  SELECT * FROM groups WHERE (id<".$id." AND group_id=".$this->group_id.") ORDER BY id DESC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $upper = new group_model();
            $upper->set( $res);    
            //keisime vietomis..
            //pirma siom grupe priklausancias propertis..
            $q="UPDATE props SET group_id=-1 WHERE group_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE props SET group_id=-2 WHERE group_id=".$upper->id;   
            $this->SQL($q);                       
            $q="UPDATE props SET group_id=".$upper->id." WHERE group_id=-1";   
            $this->SQL($q);
            $q="UPDATE props SET group_id=".$this->id." WHERE group_id=-2";   
            $this->SQL($q);    
            //tada objactus
            $q="UPDATE objs SET group_id=-1 WHERE group_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE objs SET group_id=-2 WHERE group_id=".$upper->id;   
            $this->SQL($q);                       
            $q="UPDATE objs SET group_id=".$upper->id." WHERE group_id=-1";   
            $this->SQL($q);
            $q="UPDATE objs SET group_id=".$this->id." WHERE group_id=-2";   
            $this->SQL($q);              
            
            //apkeiciu title
            $temp=$this->title;
            $this->title=$upper->title;
            $upper->title= $temp;
            //apkeiciu text
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $upper->update($upper->id);
        }
    }
    
  function subdown($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti apacioja
        $q="  SELECT * FROM groups WHERE (id>".$id." AND group_id=".$this->group_id.") ORDER BY id ASC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $downer = new group_model();
            $downer->set( $res);    
            //keisime vietomis..
            //pirma siom grupem priklausancias propertis..
            $q="UPDATE props SET group_id=-1 WHERE group_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE props SET group_id=-2 WHERE group_id=".$downer->id;   
            $this->SQL($q);                       
            $q="UPDATE props SET group_id=".$downer->id." WHERE group_id=-1";   
            $this->SQL($q);
            $q="UPDATE props SET group_id=".$this->id." WHERE group_id=-2";   
            $this->SQL($q);    
            //cia tada objaktai
            $q="UPDATE objs SET group_id=-1 WHERE group_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE objs SET group_id=-2 WHERE group_id=".$downer->id;   
            $this->SQL($q);                       
            $q="UPDATE objs SET group_id=".$downer->id." WHERE group_id=-1";   
            $this->SQL($q);
            $q="UPDATE objs SET group_id=".$this->id." WHERE group_id=-2";   
            $this->SQL($q);    
            
            //apkeiciu title
            $temp=$this->title;
            $this->title=$downer->title;
            $downer->title= $temp;
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $downer->update($downer->id);
        }
    }   
    
 function up($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti virsuje
        $q="  SELECT * FROM groups WHERE (id<".$id." AND group_id=".$this->group_id.") ORDER BY id DESC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $res = $this->SQLQueryRow($q);          
            $upper = new group_model();
            $upper->set( $res);   
            //keisime vietomis..
            //pirma sukeiciam irasams priklausancius irasus.
            $q="UPDATE groups SET group_id=-1 WHERE group_id=".$this->id;   
            $this->SQL($q);
             $q="UPDATE groups SET group_id=-2 WHERE group_id=".$upper->id;   
            $this->SQL($q);                       
            $q="UPDATE groups SET group_id=".$upper->id." WHERE group_id=-1";   
            $this->SQL($q);
             $q="UPDATE groups SET group_id=".$this->id." WHERE group_id=-2";   
            $this->SQL($q);                       
            //apkeiciu title
            $temp=$this->title;
            $this->title=$upper->title;
            $upper->title= $temp;
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $upper->update($upper->id);
        }
    }
    
  function down($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti apacioja
        $q="  SELECT * FROM groups WHERE (id>".$id." AND group_id=".$this->group_id.") ORDER BY id ASC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $downer = new group_model();
            $downer->set( $res);    
            //keisime vietomis..
             //pirma sukeiciam irasams priklausancius irasus.
            $q="UPDATE groups SET group_id=111 WHERE group_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE groups SET group_id=222 WHERE group_id=".$downer->id;   
            $this->SQL($q);                       
            $q="UPDATE groups SET group_id=".$downer->id." WHERE group_id=111";   
            $this->SQL($q);
             $q="UPDATE groups SET group_id=".$this->id." WHERE group_id=222";              
            $this->SQL($q);
            //apkeiciu title
            $temp=$this->title;
            $this->title=$downer->title;
            $downer->title= $temp;
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $downer->update($downer->id);
        }
    } */    
}
?>