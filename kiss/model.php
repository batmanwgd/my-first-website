<?php
class model {
    
    function SQL($query){
        global $db_host,$db_user,$db_pasw,$db_name,$paskutinis;
        $link = mysql_pconnect("$db_host", "$db_user", "$db_pasw")
            or die ("Negaliu prisijungti");
        mysql_select_db ("$db_name")
                or die ("Negaliu prisijungti prie lenteles");
        $rez = mysql_query ($query) or print( mysql_error() ); 
        return  $rez;
    }
    
    function SQLQuery($query){
        global $db_host, $db_user, $db_pasw, $db_name;
        $link = mysql_pconnect("$db_host", "$db_user", "$db_pasw")
            or die ("Negaliu prisijungti");
        mysql_select_db ("$db_name")
            or die ("Negaliu prisijungti prie lenteles");
        $rez = mysql_query ($query);
        $sk=0;
        $ats=array(); //fix for Warning: Invalid argument supplied for foreach()
        while ($line = mysql_fetch_assoc($rez)) {
            $ats[$sk]=$line;
            $sk++;
        }
        mysql_free_result ($rez);
        return  $ats;
    }

    function SQLQueryRow($query){
        global $db_host, $db_user, $db_pasw, $db_name;
        $link = mysql_pconnect("$db_host", "$db_user", "$db_pasw")
            or die ("Negaliu prisijungti");
        mysql_select_db ("$db_name")
            or die ("Negaliu prisijungti prie lenteles");
        $rez = mysql_query ($query);
        echo mysql_error();
        $sk=0;
        $ats=array(); //fix for Warning: Invalid argument supplied for foreach()
        while ($line = mysql_fetch_assoc($rez)) {
            $ats[$sk]=$line;
            $sk++;
        }
        mysql_free_result ($rez);
        return  $ats[0];
    }
    
    function set($a){
        foreach($a as $key => $value){
            $this->$key = $value;
        }
    }
    
    function setArray($a){
        $res = array();
        foreach($a as $row){
            $c=get_class($this);
            $o = new $c();
          /*  $r=array();
            $r=$row;*/
            $o->set($row);
            $res[]= $o;
        }
        return $res;
    }
    
    function insert(){
        $s =  "INSERT INTO ".substr(get_class($this),0,(strlen(get_class($this))-6))."s SET "; 
        foreach (get_class_vars(get_class($this))  as $key => $val)
            if ($key!='id') $s .= $key."='".$this->$key."', ";
        $s=substr($s,0,(strlen($s)-2)).';';
        $this->SQL($s);
    }
    
     function update($id){
        $s =  "UPDATE ".substr(get_class($this),0,(strlen(get_class($this))-6))."s SET "; 
        foreach (get_class_vars(get_class($this))  as $key => $val)
            if ($key!='id') $s .= $key."='".$this->$key."', ";
        $s=substr($s,0,(strlen($s)-2))." WHERE id='".$id."'";
        $this->SQL($s);
    }   
    
     function delete($id){
        $s =  "DELETE FROM ".substr(get_class($this),0,(strlen(get_class($this))-6))."s WHERE id='".$id."'";
        $this->SQL($s);
    }     
    
    function getLast(){ return mysql_insert_id() ;}   
}
?>