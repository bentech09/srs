<!DOCTYPE HTML>
<HTML LANG="EN">

<HEAD>
  <META CHARSET="UTF-8">
  <TITLE>All Cards</TITLE>
  <LINK REL="STYLESHEET" HREF="css/default.css">
</HEAD>

<BODY>
  <h1>All Cards</h1>
  <?php
  $number = 1;
  foreach ($data as $param) {
    $question = htmlspecialchars($param["question"]);
    $answer = htmlspecialchars($param["answer"]);
    $id = htmlspecialchars($param["id"]);

    $html .= <<<HTML
        <!-- Cards -->
        <div class="card">
          <div class="question">
            <h4>$question</h4>
          </div>
          <div class="answer">
            <p>$answer</p>
          </div>
          <div class="card-actions">
            <a href="index.php?page=editcard&id={$id}" class="btn-icon" title="Edit">✏️</a>
            <a href="index.php?page=editCard&id={$id}" class="btn-icon" title="Delete">🗑️</a>
          </div>
        </div>
        HTML;

    $number = $number + 1;
  }

  echo $html;
  ?>
</BODY>

</HTML>