<?php
require_once __DIR__ . '/../bootstrap/bootstrap.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';
if (empty($page) || $page === 'home') { ?>
  <!DOCTYPE HTML>
  <HTML LANG="EN">

  <HEAD>
    <META CHARSET="UTF-8">
    <TITLE>Homepage</TITLE>
    <LINK REL="STYLESHEET" HREF="css/default.css">
  </HEAD>

  <BODY>
    <h1>Homepage</h1>
    <p><a href="index.php?page=cardcreation"> Create Card </a></p>
    <p><a href="index.php?page=listallcards"> List All Cards </a></p>
  </BODY>

  </HTML>
<?php
}
?>