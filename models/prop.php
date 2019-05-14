<?php
class prop_model extends model {
   var $id;
   var $title;
   var $titleen;     
   var $titleru; 
   var $group_id;
    var $type;
    
    function getAllByGroup_id($group_id){
        $q="  SELECT * FROM props WHERE group_id=".$group_id." ORDER BY id ASC";
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }   
    
    function insert_entry($group_id){
        $this->id=''; 
        $this->title=$_POST['title'];
        $this->group_id=$group_id;        
        $this->insert();
        $id=$this->getLast();
     /*   $q="  SELECT * FROM objs WHERE (group_id=".$group_id.") ORDER BY id DESC";
        $res = $this->SQLQueryRow($q);*/
        include ('models/obj.php');
        $o = new obj_model();
        $a= $o->getAllByGroup_id($group_id);
        //$a = $o->set( $res);   
        include ('models/val.php');
        foreach ($a as $obj){
            $m=new val_model();
            $m->id='';
            $m->obj_id=$obj->id;
            $m->prop_id=$id;
            $m->title='tatata';
            $m->insert();
        }
    }   
    
    function delete_entry($id){ 
        $this->delete($id); 
        $q="DELETE FROM vals WHERE prop_id=".$id;              
        $this->SQL($q);
		header("Location: ".baseUrl()."/group/admin");	
    }        
    
    function up($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti virsuje
        $q="  SELECT * FROM props WHERE id<".$id." ORDER BY id DESC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $upper = new prop_model();
            $upper->set( $res);    
            //keisime vietomis..
            //pirma siom grupe priklausancias reiksmes..
            $q="UPDATE vals SET prop_id=-1 WHERE prop_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE vals SET prop_id=-2 WHERE prop_id=".$upper->id;   
            $this->SQL($q);                       
            $q="UPDATE vals SET prop_id=".$upper->id." WHERE prop_id=-1";   
            $this->SQL($q);
            $q="UPDATE vals SET prop_id=".$this->id." WHERE prop_id=-2";   
            $this->SQL($q);    
            //apkeiciu title
            $temp=$this->title;
            $tempen=$this->titleen;
            $tempru=$this->titleru;
            $this->title=$upper->title;
            $this->titleen=$upper->titleen;            
            $this->titleru=$upper->titleru;            
            $upper->title= $temp;
            $upper->titleen= $tempen;            
            $upper->titleru= $tempru;            
            //apkeiciu text
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $upper->update($upper->id);
        }
    }    
    
     function down($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti virsuje
        $q="  SELECT * FROM props WHERE id>".$id." ORDER BY id ASC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $downer = new prop_model();
            $downer->set( $res);    
            //keisime vietomis..
            //pirma siom grupe priklausancias reiksmes..
            $q="UPDATE vals SET prop_id=-1 WHERE prop_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE vals SET prop_id=-2 WHERE prop_id=".$downer->id;   
            $this->SQL($q);                       
            $q="UPDATE vals SET prop_id=".$downer->id." WHERE prop_id=-1";   
            $this->SQL($q);
            $q="UPDATE vals SET prop_id=".$this->id." WHERE prop_id=-2";   
            $this->SQL($q);    
            //apkeiciu title
            $temp=$this->title;
            $tempen=$this->titleen;           
            $tempru=$this->titleru;           
            $this->title=$downer->title;
            $this->titleen=$downer->titleen;            
            $this->titleru=$downer->titleru;            
            $downer->title= $temp;
            $downer->titleen= $tempen;            
            $downer->titleru= $tempru;           
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $downer->update($downer->id);
            
            
            
        }
    } 


    function getById($id){
        $q="  SELECT * FROM props WHERE id=".$id;
        $res = $this->SQLQueryRow($q);
        $this->set( $res);    
    }    

     
    function update_entry($id){
        $this->title=$_POST['title'];
        $this->titleen=$_POST['titleen'];
        $this->titleru=$_POST['titleru'];
        if (isset($_POST['type'])) $this->type=1;
            else $this->type=0;
       $this->update($id);
       
    }
  
    

    
  
  /*  function getAllComsByPost_id($id){
        $q="  SELECT * FROM coms WHERE post_id=".$id;
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }
    */
}
?>