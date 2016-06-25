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
  	<link href="./css/bootstrap.min.css" rel="stylesheet" >
  	<!-- <link href="./css/bootstrap-theme.min.css" rel="stylesheet"> -->
    <link href="./css/cover.css" rel="stylesheet">
    <script src="./js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">
        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Chat</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">首页</a></li>
                  <li><a href="chat.php">开始Chat</a></li>
                  <li><a href="about.php">关于Chat</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Let Chat!</h1>
            <p class="lead"></p>
            <p class="lead"><?php if(!$_SESSION["login"]==1) echo "Chat是一个基于Browser/Server的聊天工具"; else echo "欢迎回来，".$_SESSION["email"]; ?></p>
            <p class="lead"><?php if(!$_SESSION["login"]==1) echo "登录或注册，并与你的好友开始聊天" ?></p>
            <!-- <h1 class="cover-heading">ラブライブ！</h1>
            <p class="lead">IF WE WANT TO PROTECT</p>
            <p class="lead">OUT BELOVED SCHOOL,</p>
            <p class="lead">WE NEED TO DO WHAT WE CAN ____</p>
            <p class="lead">WE NEED TO BECOME IDOLS!</p>
            <p class="lead">NOW THEIR "SCHOOL IDOL PROJECT"</p>
            <p class="lead">BEGINS TO MAKE</p>
            <p class="lead">THEIR DREAMS COME TRUE!</p> -->

            <p class="lead">
              <a href="<?php if(!$_SESSION["login"]==1) echo "login.php"; else echo "chat.php"; ?>" class="btn btn-lg btn-primary">
                <?php if(!$_SESSION["login"]==1) echo "登录"; else echo "开始chat"; ?>
              </a>
              <a href="<?php if(!$_SESSION["login"]==1) echo "signin.php"; else echo "logoutcheck.php"; ?>" class="btn btn-lg btn-default">
                <?php if(!$_SESSION["login"]==1) echo "注册"; else echo "注销"; ?>
              </a>
            </p>

          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>By <a href="http://zjubank.com">@zjubank</a>.</p>
            </div>
          </div>

        </div>
      </div>

    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>
