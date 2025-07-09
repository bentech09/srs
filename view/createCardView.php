<!DOCTYPE HTML> 
<HTML LANG="EN">

 <HEAD>
    <META CHARSET="UTF-8"> 
    <TITLE>Create Card</TITLE>
    <LINK REL="STYLESHEET" HREF="default.css">
  </HEAD>

  <BODY>
    <h1>Create a card</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=submitcreatecard" method="post">
      <input type="hidden" name="page" vamue="submitcreatecard">
      <label>Question: <input type="text" name="question"></label><p>
      <label>Answer: <input type="text" name="answer"></label><p>
      <input type="submit" value="Create Card">
    </form>
      
  
  </BODY>

</HTML>