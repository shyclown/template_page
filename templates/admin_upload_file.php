<style>
#fileupload{
  display: block;
  box-sizing: border-box;
  float: left;
  background-color: #09F;
  padding: 16px;
  width: 100%;
  height: 72px;
}
#fileupload form{
  padding: 0px;
}
#fileupload input{  padding: 8px 16px; }
#fileupload input[type="submit"]{
  float: right;
  box-sizing: border-box;
  height: 36px;
  font-family: 'Roboto',sans-serif;
  text-transform: uppercase;
}
</style>
<div id="fileupload">
  <form action="../elephant/system/upload_file.php" method="post" enctype='multipart/form-data'>
    <input type="hidden" name="action" value="dump">

    <input name="up_file[]" type="file" multiple>
    <input type="submit" value="upload file">
  </form>
</div>

<div id="filelisted">
<?
function list_files()
{
  $files = new File();
  $listed_files = $files->list_all();
  foreach ($listed_files as $row)
  {
  ?>  <div class="users">
    <div>

  <?
  foreach ($row as $key => $value){ if($key != 'user_pass'){
  ?>  <div><? echo $key." - ".$value; ?></div>

  <?  }} ?>
    <input type="button" class="del_btn" value="delete - <? echo $row["id"] ?>" data-user='<? echo $row["id"] ?>'>
    </div>

    </div>
  <?

  }
}
list_files();
?>
</div>
