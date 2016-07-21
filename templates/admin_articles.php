<style>
#articles{
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
}
#articles h1{
  font-weight: 100;
  background-color: #EFEFEF;
  padding: 16px;
  margin: 0px;
}
#article-folders{
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
  padding: 16px;
  border-bottom: 16px #EFEFEF solid;
}
#article-folders h2{
  font-family: 'Source Sans Pro', sans-serif;
  padding-bottom:16px;
  margin: 0px;

  font-weight: 300;
}
.edit_btn{
  float: right;
}
.list_article{
  padding: 16px;
  background-color: #EAEAEA;
  margin-bottom: 4px;
}
#popup_editor{
  min-width: 680px;
  padding: 0px;
  background-color: #FFF;
  display: none;
  margin: auto;
  z-index: 9999;
  position: fixed;

}
</style>

<!-- I need to instert editor because of JS -->
<!-- Later maybe possible to change when rewritten JS class -->
<div id="popup_editor">
  <? include "admin_article.php"; ?>
</div>
<!-- debug window make openable but hidden-->
<div id="debug"></div>


<div id="articles">
  <h1>My Articles</h1>
  <div id="article-folders">
    <h2>Folders</h2>
    <div>unsorted</div>
    <div>unpublished</div>
    <div>published</div>
    <div>recent</div>
  </div>

<?
$result = NULL;
$db = new Database;
$sql = "SELECT *
FROM  `el_post` WHERE `user_id` = ? ORDER BY `created` DESC
LIMIT 0 , 30";
$params = array("i",$_SESSION["user_id"]);
if($result = $db->query($sql,$params)){
  foreach ($result as $value)
  {
   ?>
   <div class="list_article">
     <div class="header"><? echo $value["header"]?></div>
     <div class="content"><? echo $value["content"]?></div>
     <div class="edit_btn" data-file="../elephant/system/article_edit.php" data-id="<?echo $value["id"]?>">edit</div>
   </div>
   <?
  }
}
  ?>
</div>

<script>
var editor_call = function(btn){
  this.btn = btn;
  this.article_id = btn.dataset.id;
  this.callback = function(result){
    result = JSON.parse(result);
    _id("popup_editor").style.display = 'block';
    _id("article-header-input").value = result.header;
    _id("article-content").innerHTML = result.content;
    _id("article-id-input").value = result.id;
    _id("editor-header-main").innerHTML = "Edit Article";
    _id("editor-header-side").innerHTML = "Edit Article";
  };
  this.oEvent = function(){
    event.preventDefault();
    var data = { action: "load_by_id", id: this.article_id }
    ajax_request(btn.dataset.file,data,this.callback);
  }
  this.btn.addEventListener('click',this.oEvent.bind(this),false);

}
var editor = document.getElementById('popup_editor');
var debug = document.getElementById('debug');
var edit_btn_arr = _cl('edit_btn');
for(i=0,len = edit_btn_arr.length; i < len; i++){ new editor_call(edit_btn_arr[i]); }

</script>
