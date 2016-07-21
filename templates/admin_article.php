<form name="compForm" method="post" action="../elephant/system/article_edit.php" >

  <input id="article-id-input" type="hidden" name="id" value="new">
  <input type="hidden" name="content">

  <div id="content-main-side">
      <h1 id="editor-header-side">New Article</h1>
        <input type="submit" value="SAVE" />
        <input type="button" name="publish" value="publish" placeholder="Article Name">
        <input type="button" name="publish" value="date" placeholder="Article Name">
        <input type="text" name="date-publish" id="el_calendar" >
  </div>


  <div id="content-main">

      <div class="article-header">
        <h1 id="editor-header-main">New Article</h1>
        <input id="article-header-input" type="text" name="header" value="New Article" placeholder="Article Name">
      </div>

      <!-- WYSIWYG is populate by javascript -->
      <div class="controlButtons"></div>

      <div id="article-content" contenteditable="true">
        <p>new content</p>
      </div>

      <p id="editMode">
        <input type="checkbox" name="switchMode" id="switchBox"/>
        <label for="switchBox">Show HTML</label>
      </p>
  </div>
</form>

<script src="js/calendar.js"></script>
<script src="/elephant/js/article_editor.js"></script>
<script type="text/javascript">
var editor = new Article_Editor();
new Calendar('el_calendar')
</script>
