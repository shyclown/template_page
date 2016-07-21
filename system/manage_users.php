<?
require_once('class_mysqli.php');
require_once('class_session.php');
new Session;
require_once('class_account.php');
$account = new Account();

var_dump($_SESSION);
var_dump($account);

if(isset($_POST)){
  if($_POST['action'] == 'check_email'){
    $account->check_email();
  }

  else if($_POST['action'] == 'register_user'){
    $account->create_new_account();
  }

  else if($_POST['action'] == 'login_user'){
    $account->login_account();
  }
}
