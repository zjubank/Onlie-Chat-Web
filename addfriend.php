<?php
  session_start();
  $posts = $_POST;
  foreach($posts as $key => $value)
  {
    $posts[$key] = $value;
  }

  if( !empty($_POST["friendid"]) )
  {
    include 'dbconnect.php';
    $record_query1 = "INSERT INTO friend_".$_SESSION["id"]." (friend_id,friend_group) VALUES (".$_POST["friendid"].",0);";
    $record_query2 = "INSERT INTO friend_".$_POST["friendid"]." (friend_id,friend_group) VALUES (".$_SESSION["id"].",0);";
    $record_result1 = mysql_query($record_query1);
    $record_result2 = mysql_query($record_query2);
  }
?>
