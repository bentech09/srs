<!DOCTYPE HTML>
<HTML LANG="EN">

<HEAD>
  <META CHARSET="UTF-8">
  <TITLE>Register Account</TITLE>
  <LINK REL="STYLESHEET" HREF="css/default.css">
</HEAD>

<BODY>
  <?php
  $page = "index.php?page=registeruser";
  $html = "";
  $html .= <<<HTML
        <!-- register user Form -->
        <h1>Register Account</h1>
          <form action="{$page}" method="post">
            <p><label>Name: <input type="text" name="realname"></label>
            <p><label>e-mail: <input type="text" name="email"></label>
            <p><label>Password: <input type="password" name="password"></label>
            <p><input type="submit" value="Register Account">
          </form>
      HTML;

  echo $html;
  ?>
</BODY>

</HTML>