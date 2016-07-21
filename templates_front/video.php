<div id="videos-page" ng-controller="videoPart">

  <div class="top-list-controller">
    <div class="btn b-btn sort-alphabethically">sort alphabetically</div>
    <div class="btn b-btn sort-date">sort by date</div>
    <div class="btn b-btn disp-list">display list</div>
    <div class="btn b-btn disp-squares">display sqares</div>
  </div>
  <div class=" new-video video-card">
    <div>
      <h3>Upload new video</h3>
      <p>It is easy. Just click upload upload button below.</p>
      <div class="btn b-blue">
        upload
      </div>
    </div>
  </div><!--
  --><div class="video-card" ng-repeat="t in getTimes(11) track by $index">
    <div class="image-wrap">
      <img src="a2.jpg">
    </div>
    <a class="edit-btn">edit</a>
    <div class="video-info">
      <a>Name of video</a>
      <div class="desc"></div>
    </div>
  </div>
</div>
<div class="clr"></div>
