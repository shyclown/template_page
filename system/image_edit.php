<?php
require_once('class_mysqli.php');
$db = new Database;

if(isset($_POST) && isset($_POST['action'])){
  if($_POST['action'] == 'update-image')
  {
    $sql = "UPDATE  `elephant`.`el_images`
    SET  `nicename` =  ? , `description` =  ?
    WHERE `el_images`.`id` = ?";
    $params = array('ssi',$_POST['nicename'],$_POST['description'],$_POST['id']);
    var_dump($params);
    if($db->query($sql,$params)){ echo true; }
    else{
      echo false;
    }
  }
}




?>
