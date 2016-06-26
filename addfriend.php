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
    $record_query1 = "INSERT INTO friend_".$_SESSION["id"]." (friend_id) VALUES (".$_POST["friendid"].");";
    $record_query2 = "INSERT INTO friend_".$_POST["friendid"]." (friend_id) VALUES (".$_SESSION["id"].");";
    $record_result1 = mysql_query($record_query1);
    $record_result2 = mysql_query($record_query2);
  }
?>
