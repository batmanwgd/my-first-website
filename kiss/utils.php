<?php 
// Append associative array elements
function array_push_associative(&$arr) {
   $args = func_get_args();
   foreach ($args as $arg) {
       if (is_array($arg)) {
           foreach ($arg as $key => $value) {
               $arr[$key] = $value;
               $ret++;
           }
       }else{
           $arr[$arg] = "";
       }
   }
   return $ret;
}

//adresas linkams sudarinet
function baseUrl(){
$script_name=$_SERVER['SCRIPT_NAME'];
    return substr($script_name,0,(strlen($script_name)-10));
}

//adresas komandinei ailutei sudarinet
function argstr(){
    $request_uri=$_SERVER['REQUEST_URI'];
    return substr($request_uri, strlen(baseUrl())+1, strlen($request_uri));
}

//wraper for print_r :)
function pp($smth){
    echo '<pre>';
    print_r($smth);
    echo '</pre>';   
}

function createThumb($in, $out){
    $parentImage = $in;
    $thumbImage = $out;
    if(!file_exists($thumbImage)){
        ob_start();
        header("Content-type: image/jpeg");
        $im = imagecreatefromjpeg($parentImage);
        $orig_height = imagesy($im);
        $orig_width = imagesx($im);
        $new_height = 60;
        $new_width = (int) (($new_height / $orig_height) * $orig_width);
        $new_im = imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($new_im,$im,0,0,0,0,$new_width,$new_height,$orig_width,$orig_height);
        imagejpeg($new_im);
        $image = ob_get_clean();
        $thumb_pointer = fopen($thumbImage,'w+');
        fputs($thumb_pointer,$image,strlen($image));
        fclose($thumb_pointer);
    }    
}

function swapfile($dir1, $dir2){
	if (file_exists($dir1)) rename ($dir1, 'obj/temp');
	if (file_exists($dir2)) rename ($dir2, $dir1);
	if (file_exists('obj/temp')) rename ('obj/temp/', $dir2);
}

class rot {
    var $a;
    var $i;
    function rot($in){
        $this->i=0;
        $this->a=$in;
    }
    function out(){
        $t= $this->a[$this->i];
        if ((($this->i)+1)<(count($this->a))) $this->i++;
        else $this->i=0;
        return $t;
    }
}

?>