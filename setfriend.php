<?php
  session_start();
  $posts = $_POST;
  foreach($posts as $key => $value)
  {
    $posts[$key] = $value;
  }

  if(!empty($_POST["friendid"]))
  {
    $_SESSION["friendid"]=$_POST["friendid"];

    $nickname_query = "SELECT nickname FROM user_info WHERE id=".$_SESSION["friendid"];
    $nickname_result = mysql_query($nickname_query);
    $_SESSION["nickname"] = mysql_fetch_array($nickname_result);
  }
?>
