<?php
  session_start();
  $posts = $_POST;
  foreach($posts as $key => $value)
  {
    $posts[$key] = $value;
  }

  if(!empty($_POST["friendid"]))
  {
    require 'dbconnect.php';
    $record_query1 = "DELETE FROM friend_".$_SESSION["id"]." WHERE friend_id=".$_POST["friendid"];
    $record_query2 = "DELETE FROM friend_".$_POST["friendid"]." WHERE friend_id=".$_SESSION["id"];
    $record_result1 = mysql_query($record_query1);
    $record_result2 = mysql_query($record_query2);
  }
?>
