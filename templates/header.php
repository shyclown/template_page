<style>
#page-header h1{
  float: left;
  width: 250px;
  font-weight: 300;
}

#page-header .account{
  float: right;
  background-color: #09F;
  width: 50px;
  padding: 8px 16px;
  color: #FFF;
}
#page-content{

}
</style>

<div id="page-header">
<h1>elephant</h1>
<?php if(isset($_SESSION['loged_in'])){
  $user = new Account;
  $user->load_signed();
  $user->get_name();?><br/><?
  $user->get_email();
}
?>
<div class="account">Account</div>
</div>
