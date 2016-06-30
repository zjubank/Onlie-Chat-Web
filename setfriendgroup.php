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
    $group_query = "UPDATE friend_".$_SESSION["id"]." SET friend_group=".$_POST["friendgroup"]." WHERE friend_id=".$_POST["friendid"];
    $group_result = mysql_query($group_query);
    echo $group_query;
  }
?>
