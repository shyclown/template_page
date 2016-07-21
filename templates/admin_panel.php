<?php
function oLink($page){
$temp = "../elephant/index.php?page=".$page;
echo $temp;
}
?>
<style>
ul{
  list-style: none;
  padding: 0px;
}
#page-admin-panel a{
  display: block;
  box-sizing: border-box;
  width: 100%;
  padding: 8px 8px;
}
#page-admin-panel a:hover{
  background-color: #E0E0E0;
}

</style>
<div id="page-admin-panel">
  <h3>Admin Panel</h3>
<ul>
<li><a href="#">Main Page</a></li>
<li><a href="<? oLink('login'); ?>">Log Panel</a></li>
<li><a href="<? oLink('admin_article'); ?>">Article</a></li>
<li><a href="<? oLink('admin_articles'); ?>">Articles</a></li>
<li><a href="<? oLink('admin_list_accounts'); ?>">List Accounts</a></li>
<li><a href="<? oLink('admin_upload_file'); ?>">Upload File</a></li>
<li><a href="<? oLink('admin_upload_image'); ?>">Upload Image</a></li>
<li><a href="<? oLink('admin_user_details'); ?>">User details</a></li>
</ul>
</div>
