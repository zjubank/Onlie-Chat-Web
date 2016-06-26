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
    <script>
    function clearinput()
    {
    		document.getElementById("id").value="";
        document.getElementById("email").value="";
        document.getElementById("nickname").value="";
    }
    </script>

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

    <div class="container">
      <div class="row-fluid">
    		<div class="column">
    			<form class="form-horizontal" action="friendsearch.php" method="post">
    				<fieldset>
              <p></p>
    					<div class="form-group">
    						<label class="col-sm-2 control-label">ID</label>
    						<div class="col-sm-10">
    							<input name="id" id="id" type="text" placeholder="ID" class="form-control">
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-sm-2 control-label">邮箱</label>
    						<div class="col-sm-10">
    							<input name="email" id="email" type="text" placeholder="email" class="form-control">
    						</div>
    					</div>
    					<div class="form-group">
    						<label class="col-sm-2 control-label">昵称</label>
    						<div class="col-sm-10">
    							<input name="nickname" id="nickname" type="text" placeholder="昵称" class="form-control">
    						</div>
    					</div>
    					<div class="text-center">
    							<input type="submit" value="查询" class="btn btn-primary"></input>
    							<a class="btn btn-default" role="button" onclick="clearinput()">清空</a>
    					</div>
    				</fieldset>
    			</form>
    		</div>
    	</div>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
