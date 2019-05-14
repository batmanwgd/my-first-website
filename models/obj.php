<?php
class obj_model extends model {
   var $id;
   var $title;
   var $group_id;
   
    function getValsByGroup_id($group_id){
        $q="SELECT * FROM vals WHERE obj_id IN 
            (SELECT id FROM objs WHERE group_id=".$group_id.")
        ORDER BY obj_id, prop_id";
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }
    
    function getValsById($id){
        $q="SELECT * FROM vals WHERE obj_id = ".$id." ORDER BY obj_id, prop_id";
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }   

    function insert_entry($group_id){
        $this->id=''; 
        $this->title='koks skirt';
        $this->group_id=$group_id;        
        $this->insert();
        $last=$this->getLast();
        foreach ($_POST['titles'] as $key => $val){
            $q= "INSERT INTO vals SET title='".$val."', prop_id='".$key."', obj_id='".$last."'";
         // echo $q;  
            $this->SQL($q);
        } 
    }   
 
    function update_entry($id){
        foreach ($_POST['titles'] as $key => $val){
            $q= "UPDATE vals SET title='".$val."'WHERE obj_id=".$id." AND prop_id=".$key."";
            $this->SQL($q);
        }   
        foreach ($_POST['titlesen'] as $key => $val){
            $q= "UPDATE vals SET titleen='".$val."'WHERE obj_id=".$id." AND prop_id=".$key."";
            $this->SQL($q);
        }   

        foreach ($_POST['titlesru'] as $key => $val){
            $q= "UPDATE vals SET titleru='".$val."'WHERE obj_id=".$id." AND prop_id=".$key."";
            $this->SQL($q);
        }   

    }

    function delete_entry($id){ 
        $this->delete($id); 
        $q="DELETE FROM vals WHERE obj_id=".$id;              
        $this->SQL($q);
		header("Location: ".baseUrl()."/group/admin");	
    }        
    
    function up($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti virsuje
        $q="  SELECT * FROM objs WHERE id<".$id." ORDER BY id DESC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $upper = new obj_model();
            $upper->set( $res);    
            //keisime vietomis..
            //pirma siom grupe priklausancias reiksmes..
            $q="UPDATE vals SET obj_id=-1 WHERE obj_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE vals SET obj_id=-2 WHERE obj_id=".$upper->id;   
            $this->SQL($q);                       
            $q="UPDATE vals SET obj_id=".$upper->id." WHERE obj_id=-1";   
            $this->SQL($q);
            $q="UPDATE vals SET obj_id=".$this->id." WHERE obj_id=-2";   
            $this->SQL($q);    
            //apkeiciu title
            $temp=$this->title;
            $tempru=$this->titleru;
             $tempen=$this->titleen;
            $this->title=$upper->title;
            $this->titleen=$upper->titleen;
            $this->titleru=$upper->titleru;           
            $upper->title= $temp;
            $upper->titleen= $tempen;
            $upper->titleru= $tempru;           
            //apkeiciu text
            //vsio,- seivinu abu :)
        //    $this->update($this->id);
          //  $upper->update($upper->id);
            $dir1='obj/'.$id;
            $dir2='obj/'.$upper->id;
           swapfile($dir1, $dir2);
        }
    }    
    
     function down($id){
        //randame einamaji
        $this->getById($id);
        //randame esanti virsuje
        $q="  SELECT * FROM objs WHERE id>".$id." ORDER BY id ASC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $downer = new obj_model();
            $downer->set( $res);    
            //keisime vietomis..
            //pirma siom grupe priklausancias reiksmes..
            $q="UPDATE vals SET obj_id=-1 WHERE obj_id=".$this->id;   
            $this->SQL($q);
            $q="UPDATE vals SET obj_id=-2 WHERE obj_id=".$downer->id;   
            $this->SQL($q);                       
            $q="UPDATE vals SET obj_id=".$downer->id." WHERE obj_id=-1";   
            $this->SQL($q);
            $q="UPDATE vals SET obj_id=".$this->id." WHERE obj_id=-2";   
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
          //  $this->update($this->id);
           // $downer->update($downer->id);
            $dir1='obj/'.$id;
            $dir2='obj/'.$downer->id;
           swapfile($dir1, $dir2);           
        }
    } 

 function getById($id){
        $q="  SELECT * FROM objs WHERE id=".$id;
        $res = $this->SQLQueryRow($q);
        $this->set( $res);    
        
    }    
  
    function getAllByGroup_id($id){
        $q="  SELECT * FROM objs WHERE group_id=".$id;
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }

}
?>