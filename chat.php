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
    <script>
    function receiverecord()
    {
    	xmlhttp=new XMLHttpRequest();
    	xmlhttp.onreadystatechange=function()
    	{
    		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			document.getElementById("record_receive").innerHTML=xmlhttp.responseText;
    		}
    	}
    	xmlhttp.open("POST","server_receive_polling.php",true);
      xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    	xmlhttp.send();
    }
    </script>

    <script>
    function sendrecord()
    {
    	xmlhttp=new XMLHttpRequest();
    	xmlhttp.onreadystatechange=function()
    	{
    		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			document.getElementById("record_send").innerHTML=xmlhttp.responseText;
    		}
    	}
    	xmlhttp.open("POST","server_send_polling.php",true);
      xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    	xmlhttp.send("record="+document.getElementById("record").value);
      // alert("Send:"+document.getElementById("record").value);
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
            <li class="active"><a href="chat.php">聊天</a></li>
            <li><a href="friendlist.php">好友列表</a></li>
            <li><a href="friendmanage.php">好友管理</a></li>
            <li><a href="userinfo.php">个人信息</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <ul class="list-group">
      <li id="record_receive"></li>
      <li id="record_send"></li>
    </ul>
    <!-- <?php $phptime = date ("Y-m-d H:i:s", time()); echo $phptime;?> -->




        <input type="text" name="record" id="record" class="form-control" placeholder="Text input">
        <a class="btn btn-primary" role="button" onclick="sendrecord()">发送</button>
        <a class="btn btn-default" role="button" onclick="receiverecord()">收取</a>


    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
