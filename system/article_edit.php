<?php
require_once('class_mysqli.php');
require_once('class_session.php');
require_once('class_article.php');
new Session;
$db = new Database;
$article = new Article;

if(isset($_POST)){

  if(isset($_POST["header"]) && isset($_POST["content"]) && !isset($_POST['action']))
  {
    if(isset($_POST["id"]) && $_POST["id"] == "new")
    {
      if($article->save_new()){ echo "saved to db";  }
      else{ echo "unable save to db"; }
    }
    else if(isset($_POST["id"]))
    {
      var_dump($_POST);
      if($article->update()){ echo "updated"; }
    }
  }

  if(isset($_POST["action"])){
    switch ($_POST["action"]) {
      case 'load_by_id':
        $result =  $article->load_by_id();
        $result =  json_encode($result[0]);
        echo $result;
        break;

      default:
        # code...
        break;
    }
  }
}
