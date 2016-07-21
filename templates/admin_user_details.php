<style>
#account_panel{
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
}
#account_panel h1{
  font-weight: 300;
  background-color: #EFEFEF;
  padding: 16px;
}
#account_form{
  display: block;
  box-sizing: border-box;
  padding: 16px;
}
#account_form input{
  display: block;
  box-sizing: border-box;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
  clear: both;
  background-color: #ffffEf;
  border: none;
  border-bottom: 1px solid #999;
  padding: 4px 4px;
  line-height: 16px;
  margin: 4px 0px;
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
  z-index: -5;
}
.listed_images img{
  width: 400px;
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
</style>
<div id="account_panel">
<div>
<h1>My Account</h1>
</div>
<form id="account_form">
  <label>my nick name:</label>
<input type="text" name="nicename">
  <label>my page name:</label>
<input type="text" name="webpage">
  <label>about me:</label>
<input name="about">

</form>
<div>
