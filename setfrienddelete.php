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
    $delete_query1 = "DELETE FROM friend_".$_SESSION["id"]." WHERE friend_id=".$_POST["friendid"];
    $delete_query2 = "DELETE FROM friend_".$_POST["friendid"]." WHERE friend_id=".$_SESSION["id"];
    $delete_result1 = mysql_query($delete_query1);
    $delete_result2 = mysql_query($delete_query2);
  }
?>
