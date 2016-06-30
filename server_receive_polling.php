<?php
  session_start();

  include 'dbconnect.php';
  $record_query = "SELECT record_id,record_sender,record_time,record_content FROM record_".$_SESSION["id"]." WHERE record_receiver=".$_SESSION["friendid"]." OR record_sender=".$_SESSION["friendid"];
  $record_result = mysql_query($record_query);

  while( $row = mysql_fetch_array($record_result) )
  {
    if($row["record_sender"]==$_SESSION["id"]) {
      echo "<li class=\"list-group-item list-group-item-success text-right\"><div>我";
    }
    else {
      $email_query = "SELECT email,nickname FROM user_info WHERE id=".$row["record_sender"];
      $email_result = mysql_query($email_query);
      $email = mysql_fetch_array($email_result);
      echo "<li class=\"list-group-item\"><div>".$email["nickname"];
    }
    echo ": ".$row["record_content"]."</div>";

    echo "<div>(".$row["record_time"].")</div></li>";
  }
?>
