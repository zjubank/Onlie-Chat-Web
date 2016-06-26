<?php
  session_start();
  // $posts = $_POST;
  // foreach($posts as $key => $value)
  // {
  //   $posts[$key] = $value;
  // }

  include 'dbconnect.php';
  $record_query = "SELECT record_id,record_sender,record_time,record_content FROM record_".$_SESSION["id"]." WHERE record_state=0";
  $record_result = mysql_query($record_query);

  // echo "ID from session:".$_SESSION["id"];
  echo $_POST["record"];

  while( $row = mysql_fetch_array($record_result) )
  {
    // echo "<td>".$row["record_id"]."</td>";
    // echo "<tr>";
    echo "<li class=\"list-group-item";
    if($row["record_sender"]==$_SESSION["id"]) echo " list-group-item-success";
    echo "\">".$row["record_content"]." (".$row["record_time"].")</li>";
    // echo "</tr>";
    // echo $row["record_state"];
  }

?>
