<!DOCTYPE HTML> 
<HTML LANG="EN">
 <HEAD>
    <META CHARSET="UTF-8"> 
    <TITLE>Edit Card</TITLE>
    <LINK REL="STYLESHEET" HREF="css/default.css">
  </HEAD>
  <BODY>
    <?php
        $id = htmlspecialchars($_GET['id']);
        $page="index.php?page=updatecard";
        $html .= <<<HTML
        <!-- Edit Form -->
        <div class="card-form">
          <div class="form-header">
            <h3 id="form-title">Edit Card</h3>
          </div>
          <form id="flash-card-form" action="{$page}" method="post">
            <input type="hidden" name="id" value="{$id}" />
            <div class="form-group">
              <label for="question" class="form-label">Question</label>
              <textarea name="question" class="form-input" rows="3" placeholder="Enter your question here..." required></textarea>
            </div>
            <div class="form-group">
              <label for="answer" class="form-label">Answer</label>
              <textarea name="answer" class="form-input" rows="3" placeholder="Enter the answer here..." required></textarea>
            </div>
            <div class="form-actions">
              <input type="submit" value="Update Card" class="btn btn-primary"></button>
            </div>
          </form>
        </div>
      HTML;

      echo $html;
    ?>
  </BODY>
</HTML>