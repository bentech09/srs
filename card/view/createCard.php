<!DOCTYPE HTML>
<HTML LANG="EN">

<HEAD>
  <META CHARSET="UTF-8">
  <TITLE>Create Card</TITLE>
  <LINK REL="STYLESHEET" HREF="css/default.css">
</HEAD>

<BODY>
  <?php
  $page = "index.php?page=createcard";
  $html .= <<<HTML
        <!-- Edit Form -->
        <h1>Create a card</h1>
          <form action="{$page}" method="post">
            <p><label>Question: <input type="text" name="question"></label>
            <p><label>Answer: <input type="text" name="answer"></label>
            <p><input type="submit" value="Create Card">
          </form>
      HTML;

  echo $html;
  ?>
</BODY>

</HTML>