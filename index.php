<?php
include 'templates_front/head.php';
?>

<header class="master-header">
  <nav class="master-nav">
    <ul class="nav-list">
      <li><a>HOME</a></li>
      <li><a>LOGIN</a></li>
    </ul>
  </nav>
  <h1 class="page-title">elephant<span class="small">template</span></h1>
</header>

<div id="content" ng-controller="blogPage">

  <div class="sub-nav">
    <ul class="sub-nav-list">
      <li><a>BLOG</a></li><li><a>PHOTOS</a></li><li><a>VIDEOS</a></li><li><a>TEXTURES</a></li>
    </ul>
  </div>


<!-- video list -->
<?php

  include 'templates_front/right_panel.php';
  include 'templates_front/blog.php';

  ?>
<h3>Video and Photo templates</h3>
  <?php
  include 'templates_front/video.php';
  include 'templates_front/photos.php';

?>
</body>
<script src="js/frontpage.js"></script>
</html>
