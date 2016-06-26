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
    ?>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Chat</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="chat.php">聊天</a></li>
            <li><a href="friendlist.php">好友列表</a></li>
            <li class="active"><a href="friendmanage.php">好友管理</a></li>
            <li><a href="userinfo.php">个人信息</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <?php
    $friend_query = "SELECT friend_id FROM friend_".$_SESSION["id"];
    $friend_result = mysql_query($friend_query);
    while( $row = mysql_fetch_array($friend_result))
    {
      echo $row["friend_id"];//.":id from list";
    }

    ?>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
