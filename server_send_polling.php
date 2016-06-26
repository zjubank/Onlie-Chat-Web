<?php
  session_start();
  $posts = $_POST;
  foreach($posts as $key => $value)
  {
    $posts[$key] = $value;
  }

  include 'dbconnect.php';
  $record_query = "INSERT INTO record_".$_SESSION["id"]." (record_sender,record_time,record_content,record_state) VALUES (".$_SESSION["id"].",'".date("Y-m-d H:i:s",time())."','".$_POST["record"]."',0)";
  $record_result = mysql_query($record_query);

  // echo "$record_query";
?>
