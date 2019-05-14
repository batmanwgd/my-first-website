<?php
class text_model extends model {
   var $id;
   var $title;
   var $text;
    
    function getAll(){
        $q="  SELECT * FROM texts ORDER BY id ASC";
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }   
    function getById($id){
        $q="  SELECT * FROM texts WHERE id=".$id;
        $res = $this->SQLQueryRow($q);
        $this->set( $res);    
        
    }    
    function insert_entry(){
        $this->id=''; 
        $this->title=$_POST['title'];
        $this->text=$_POST['text'];
        $this->insert();
    }
    

    function update_entry($id){
        $this->title=$_POST['title'];
        $this->text=$_POST['text'];
        $this->update($id);
    }
    
    function up($id){
        //randame esanti virsuje
        $q="  SELECT * FROM texts WHERE id<".$id." ORDER BY id DESC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $upper = new text_model();
            $upper->set( $res);    
            //randame einamaji
            $this->getById($id);
            //keisime vietomis..
            //apkeiciu title
            $temp=$this->title;
            $this->title=$upper->title;
            $upper->title= $temp;
            //apkeiciu text
            $temp=$this->text;
            $this->text=$upper->text;
            $upper->text= $temp;  
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $upper->update($upper->id);
        }
    }
    
    function down($id){
        //randame esanti apacioje
        $q="  SELECT * FROM texts WHERE id>".$id." ORDER BY id ASC";
        $res = $this->SQLQueryRow($q);
        if ($res){
            $downer = new text_model();
            $downer->set( $res);    
            //randame einamaji
            $this->getById($id);
            //keisime vietomis..
            //apkeiciu title
            $temp=$this->title;
            $this->title=$downer->title;
            $downer->title= $temp;
            //apkeiciu text
            $temp=$this->text;
            $this->text=$downer->text;
            $downer->text= $temp;  
            //vsio,- seivinu abu :)
            $this->update($this->id);
            $downer->update($downer->id);
        }
    }    
    
    
    
    function delete_entry($id){ $this->delete($id); }    
    
    
  /*  function getAllComsByPost_id($id){
        $q="  SELECT * FROM coms WHERE post_id=".$id;
        $res = $this->SQLQuery($q);
        return $this->setArray( $res);
    }
    */
}
?>