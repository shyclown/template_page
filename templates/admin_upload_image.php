<style>
#upload{
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
}
#upload h1{
  font-weight: 100;
  background-color: #EFEFEF;
  padding: 16px;
}
#upload_image{
  font-weight: 300;
  padding: 16px;
  border: 2px #09F solid;
}
#upload > form{
  box-sizing: border-box;
  height: 32px;
  background-color: #EAEAEA;
}
#upload > form > input{
  box-sizing: border-box;
  height: 32px;
  background-color: #09F;
  border: none;
  padding:8px;
  margin: 0px;
}
#upload > form > input[type="submit"]{
  box-sizing: border-box;
  height: 32px;
  float: right;
  background-color: #09F;
  border: none;
  padding:8px;
  margin: 0px;
}
.single-image-box{
  float: left;
  position: relative;
  z-index: 0;
  width: 300px;
  overflow: hidden;
}
#images-list img{
  width: 300px;
}
.image-form{
  display: block;
  box-sizing: border-box;
  padding: 16px;
  background-color: #FFF;
  position: absolute;
  width: 100%;
  bottom: 0px;
  left:0px;
}
.image-form input{
  display: block;
  float: left;
  clear:left;
}
.image-form label{
  display: block;
  float: left;
  clear: left;
}
.image-form .form-button{
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
  line-height: 16px;
  font-size: 14px;
  float: right;
  box-sizing: border-box;
  padding: 8px 16px;
  border: none;
  height: 32px;
}
.edit_image_btn{
  position: absolute;
  top:-50px;
  height: 50px;
  right: 15px;
  background-image: url(/elephant/resources/edit-image.png);
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  width: 40px;
}
</style>


<div id="upload">
<div>
<h1>My Images</h1>
</div>


<!-- images -->
<div id="upload_image">
  Drop it here or
</div>
<form id="upload-image-form" action="../elephant/system/class_images.php" method="post" enctype="multipart/form-data">
<input type="file" name="up_file[]" multiple>
<input type="submit" value="upload image">
</form>
</div>

<div id="debug">debug</div>

<div id="images-list">
<?php
$result = NULL;
$db = new Database;
$sql = "SELECT *
FROM  `el_images` WHERE `user_id` = ? ORDER BY `created` DESC
LIMIT 0 , 30";
$params = array("i",$_SESSION["user_id"]);
if($result = $db->query($sql,$params)){
  foreach ($result as $value) {
    ?>
    <div id="<? echo 'img_'.$value['id']?>"class="single-image-box">
      <img src="../elephant/uploads/<? echo $value['filename']?>"/>


      <div class="control-panel">

        <!-- ajax update control -->
        <form class="image-form" method="post">
          <div class="edit_image_btn"></div>
          <input type="hidden" name="action" value="update-image">
          <input type="hidden" name="id" value="<? echo $value['id']?>">
          <label>Name:</label>
          <input name="nicename" type="text" value="<? echo $value['nicename']?>" placeholder="filename">
          <label>Description:</label>
          <input name="description" type="text" value="<? echo $value['description']?>" placeholder="destription">
          <input class="form-button" type="submit" value="save">
          <div style="clear:both"></div>
        </form>
        <div class="image-created"><? echo gmdate('d.m.Y H:i', strtotime($value['created']))?></div>

      </div>

    </div>
    <?
  }
}

?>



</div>

<script>

var xform = function(oForm){
  this.xform = oForm;
  this.callback = function(result){ debug.innerHTML = result; }
  this.oEvent = function(){
    event.preventDefault();
    ajax_request_form('../elephant/system/image_edit.php',this.xform, this.callback);
  }
  this.xform.addEventListener('submit', this.oEvent.bind(this),false);
}

var debug = _id('debug');
var imageList = function(){
  var forms_arr = _cl('image-form');
  for(i=0,len = forms_arr.length; i < len; i++){ new xform(forms_arr[i]); }
}
imageList();



</script>
