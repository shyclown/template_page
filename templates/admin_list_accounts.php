<style>
.users{
  clear: both;
  height: 32px;
}
.users > div > div{
  float: left;
  padding: 8px;
  line-height: 16px;
}
.listed > div:nth-child(even){
  background-color: #EFEFEF;
}
.listed > h2 {
  font-weight: 300;
}
</style>




<div class="listed">
  <h2>Users</h2>
<?php
function list_account()
{
  $accounts = new Account();
  $listed_accounts = $accounts->list_all();
  foreach ($listed_accounts as $row)
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
list_account();
?>
</div>




<script>
function update_page(response){}

var buttons = document.getElementsByClassName('del_btn');
for(var i = 0, len = buttons.length; i < len; i++){
  var btn = buttons[i];
  var user = btn.dataset.user;
  btn.addEventListener('click',function(){
    var data = create_form({
      'action': 'delete',
      'userid': user,
    });
    ajax('manage_users.php',data,update_page);
  },false);
}

function delete_user(user_id){
  var btn = '';
}

</script>
