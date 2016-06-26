<?php
  $pdo = new PDO('mysql:dbname=CHAT;host=localhost','chatmaster','kotoumi');
  $resource = $pdo->query('select * from t1');
  $result = $resource->fetchall();
  if ($result)
  {
    print_r(json_encode(array('success'=>'存在数据')));
    exit();
  }
  print_r(json_encode(array('failed'=>'不存在数据')));
  exit();
?>
