<?php
require_once('class_mysqli.php');
require_once('class_file.php');


$file_manager = new File;

if(isset($_POST)){
  if($_POST['action'] == 'dump'){
    $files = $file_manager->array_files($_FILES["up_file"]);
    for($i = 0, $len = count($files); $i < $len; $i++){
      $file = $files[$i];
      $file_manager->upload($file);
    }
  }



}






 ?>
<?// hgfkdj@gsd.SDFsalt - fdsfdsfds?>
