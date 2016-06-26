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
  }
?>
