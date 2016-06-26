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
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
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
            <li><a href="friendmanage.php">好友管理</a></li>
            <li class="active"><a href="userinfo.php">个人信息</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">
      <p></p>
      <div class="panel panel-default">
        <div class="panel-heading">我的资料</div>
        <div class="panel-body">
          <?php
            include "dbconnect.php";

            $info_query = "SELECT id,email,nickname,phrase,gender,birth_day,phonenumber,homepage FROM user_info where id=".$_SESSION["id"];
            $info_result = mysql_query($info_query);
            $info = mysql_fetch_array($info_result);

            echo "<p>邮箱：".$info["email"]."</p>";
            echo "<p>昵称：".$info["nickname"]."</p>";
            echo "<p>签名：".$info["phrase"]."</p>";
            echo "<p>性别：".$info["gender"]."</p>";
            echo "<p>生日：".$info["birth_day"]."</p>";
            echo "<p>联系电话：".$info["phonenumber"]."</p>";
            echo "<p>个人主页：".$info["homepage"]."</p>";
          ?>
          <p>
            <button type="button" class="btn btn-primary">修改资料</button>
            <button type="button" class="btn btn-default">修改密码</button>
          </p>
        </div>
      </div>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
