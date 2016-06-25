<!DOCTYPE html>
<?php session_start(); ?>
<html lang="zh-cn">

<?php
  require 'dbconnect.php';
?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>首页</title>

    <!-- Bootstrap -->
  	<link href="./css/bootstrap.css" rel="stylesheet" >
  	<link href="./css/bootstrap-theme.css" rel="stylesheet">
    <script src="./js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <?php
  	if( $_SESSION["login"]!=1 )
  	{
  		echo "<p class=\"text-center\">请先登录</p>\n";
  		echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"login.php\">这里</a>登录</p>\n";
  		echo "<meta http-equiv=\"refresh\" content=\"3;url=login.php\">";
  		exit();
  	}

    $friend_query = "SELECT friend_id FROM friend_".$_SESSION["id"];
    $friend_result = mysql_query($friend_query);
    while( $row = mysql_fetch_array($friend_result))
    {
      echo $row["friend_id"];//.":id from list";
    }

    $record_query = "SELECT record_id,record_sender,record_time,record_content,record_state FROM record_".$_SESSION["id"];
    $record_result = mysql_query($record_query);
    while( $row = mysql_fetch_array($record_result))
    {
      echo $row["record_id"];
      echo $row["record_sender"];
      echo $row["record_time"];
      echo $row["record_content"];
      echo $row["record_state"];
    }
    ?>


      <table class="table">
        <tr>
          <th>Speaker</th>
          <th>Text</th>
          <th>Time</th>
        </tr>
        <tr>
          <td>kotori</td>
          <td>Hello</td>
          <td><?php $phptime = date ("Y-m-d H:i:s", time()); echo $phptime;?></td>
        </tr>
      </table>

      <form class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Text input">
        </div>
        <button type="submit" class="btn btn-primary">发送</button>
      </form>
    <!-- <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span4">
    			<p>
    				好友
    			</p>
    		</div>
    		<div class="span8">
    			<p>
    				聊天
    			</p>
    		</div>
    	</div>
    </div> -->


    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
