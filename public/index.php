<?php
  require_once __DIR__ . '/../config/config.php';
  require_once __DIR__ . '/../model/Database.php';
  require_once __DIR__ . '/../model/MysqliAdapter.php';

  $mysqliHandler = databaseMysqliHandler::getInstance($config);
  $database = new database($mysqliHandler);
  $conn = $database->getConnection();
  
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
  </BODY>

</HTML>
