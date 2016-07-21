<?php
?>
<style>
#log_pan{
  width:700px;
  margin: 100px auto;
  background-color: #EFEFEF;
}
.panel{
  box-sizing: border-box;
  width: 300px;
  float: left;
  background-color: #FFF;
  padding: 16px;
  border: 1px solid #EFEFEF;
  margin: 16px;
}
.panel > h2{
  padding-top: 0px;
  margin-top: 8px;
  font-weight: 300;
}
.panel > form > label{
  font-size: 12px;
  padding: 4px 0px;
  color: #09F;
  box-sizing: border-box;
  display: block;
}
.panel > form > input{
  font-family: 'Roboto',sans-serif;
  font-size: 16px;
  font-weight: 300;
  color: black;

  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #E0E0E0;
  width: 100%;
  background-color: #ffffEf;
  padding: 8px 4px;
  height: 32px;
}

.panel > form > input[type="submit"]{
  box-sizing: border-box;
  border: none;
  border_bottom: 1px solid #000;
  background-color: #09F;
  color: #FFF;
  margin-top: 16px;
  padding: 8px 8px;
  display: block;
}

</style>

<div id="log_pan">
  <div id="register_form" class="panel">

    <h2>Register New Account</h2>

    <form target="login.php">
      <label>Username:</label>
        <input type="text" id="register_username" placeholder="username" value="">
      <label>Email:</label>
        <input type="text" id="register_email" placeholder="email" value="">
      <label>Password:</label>
        <input type="password" id="register_password" placeholder="password" value="">
      <label>Password Again:</label>
        <input type="password" id="register_password_two" placeholder="pasword again">
      <input type="submit" id="register_submit" value="Register">
    </form>
  <!-- ajax receive field -->
    <div id="reg_error" class="errors">
    </div>

  </div>

  <div id="login_form" class="panel">

    <h2>Log in</h2>

    <form>
      <label>Email or Username:</label>
        <input type="text" id="login_user" />
      <label>Password:</label>
        <input type="password" id="login_password" />
      <input type="submit" id="login_submit" value="Login">
    </form>
  <!-- ajax receive field -->
    <div id="log_error" class="errors">
    </div>

  </div>

  <div style="clear:both"></div>
<div>

<script>
var Account = function(){

  var _id = function(id){ return document.getElementById(id); }
  var Field = {
    login: {
      username: _id('login_user'),
      password: _id('login_password')
    },
    register: {
      username: _id('register_username'),
      email: _id('register_email'),
      password: _id('register_password'),
      password_two: _id('register_password_two')
    }
  }
  var Btn = {
     login: _id('login_submit'),
     register:_id('register_submit')
  }
  var callback = function(result){
    document.getElementById('log_error').innerHTML = result;
  }
  var page = '../elephant/system/manage_users.php';

  var Request = function(oAction){

    if(oAction == 'check_email'){
      check_email : ajax_request(page, {
        action : oAction,
        email : Field.register.email.value
      }, callback);
    }
    if(oAction == 'register_user'){
      register_user : ajax_request(page,{
        action : oAction,
        username : Field.register.username.value,
        email : Field.register.email.value,
        password : Field.register.password.value,
        password_two : Field.register.password_two.value,
      }, callback);
    }
    if(oAction == 'login_user'){
      register_user : ajax_request(page,{
        action : oAction,
        logname : Field.login.username.value,
        password : Field.login.password.value,
      }, callback);
    }
  }
  function check_email(){
    if(/(.+)@(.+){2,}\.(.+){2,}/.test(Field.register.email.value)){
      Field.register.email.style.borderBottom = '1px solid #000';
    }
  }
  function check_password(){
    var pass = Field.register.password;
    var pass_two = Field.register.password_two;

    if(pass.value.length < 6 || pass.value != pass_two.value){
      pass.style.border = '1px solid red';
      pass_two.style.border = '1px solid red';
      Btn.register.style.backgroundColor = '#EFEFEF';
    }
    else{
      pass.style.border = '1px solid green';
      pass_two.style.border = '1px solid green';
      Btn.register.style.backgroundColor = 'green';
    }
    document.getElementById('log_error').innerHTML = (pass.value.length<6)+" - "+(pass.value != pass_two.value);
  }

  // JS validate
  Field.register.email.addEventListener('input', function(){ check_email(); }, 'false');
  Field.register.password_two.addEventListener('input', function(){ check_password(); }, 'false');

  // AJAX validate
  Field.register.email.addEventListener('input', function(event){ event.preventDefault(); Request("check_email"); }, 'false');
  Btn.register.addEventListener('click', function(event){ event.preventDefault(); Request("register_user");  },'false');
  Btn.login.addEventListener('click', function(event){ event.preventDefault(); Request("login_user");  },'false');
}

var acc = new Account();




</script>
