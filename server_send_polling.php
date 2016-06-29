<?php
  session_start();
  $posts = $_POST;
  foreach($posts as $key => $value)
  {
    $posts[$key] = $value;
  }


  if( !empty($_POST["record"]) && !empty($_SESSION["friendid"]) )
  {
    include 'dbconnect.php';
    $record_query1 = "INSERT INTO record_".$_SESSION["id"]." (record_sender,record_time,record_content,record_state) VALUES (".$_SESSION["id"].",'".date("Y-m-d H:i:s",time())."','".addslashes($_POST["record"])."',0);";
    $record_query2 = "INSERT INTO record_".$_SESSION["friendid"]." (record_sender,record_time,record_content,record_state) VALUES (".$_SESSION["id"].",'".date("Y-m-d H:i:s",time())."','".addslashes($_POST["record"])."',0);";
    $record_result1 = mysql_query($record_query1);
    $record_result2 = mysql_query($record_query2);
  }
?>
