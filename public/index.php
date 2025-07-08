<?php
  require_once __DIR__ . '/../config/config.php';
  require_once __DIR__ . '/../database/Database.php';
  require_once __DIR__ . '/../database/databaseMysqliHandler.php';
  require_once __DIR__ . '/../query/query.php';
  require_once __DIR__ . '/../query/queryMysqliHandler.php';

  $databaseMysqliHandler = databaseMysqliHandler::getInstance($config);
  $database = new database($databaseMysqliHandler); //database object

  $queryMysqliHandler = new queryMysqliHandler($database);
  $query = new query($queryMysqliHandler);
  $queryExecute = $query->execute("INSERT INTO cards (question, answer) VALUES (?, ?)", ["ik ben:", "ben"]);

?>
<!DOCTYPE HTML> 
<HTML LANG="EN">

 <HEAD>
    <META CHARSET="UTF-8">
    <TITLE>Homepage</TITLE>
    <LINK REL="STYLESHEET" HREF="default.css">
  </HEAD>

  <BODY>
    <h1>Homepage</h1>
    <a href="index.php?page=addcard"> Add Card </a>
  </BODY>

</HTML>
