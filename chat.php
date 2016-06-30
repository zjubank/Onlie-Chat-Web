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
    function receiverecord()
    {
      var timer = setTimeout(receiverecord,500);
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
    receiverecord();
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

      document.getElementById("record").value="";
    }
    </script>

    <script>
      function EnterPress(e){ //传入 event
          var e = e || window.event;
          if(e.keyCode == 13){
            sendrecord();
            // receiverecord();
          }
      }
    </script>

    <!-- <script type="text/javascript" charset="utf-8">
        $(function(){
                lct = document.getElementById('content');
                lct.scrollTop=Math.max(0,lct.scrollHeight-lct.offsetHeight);
            })
        })
    </script> -->


  </head>

  <body >
    <?php
  	if( $_SESSION["login"]!=1 )
  	{
  		echo "<p class=\"text-center\">请先登录</p>\n";
  		echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"login.php\">这里</a>登录</p>\n";
  		echo "<meta http-equiv=\"refresh\" content=\"3;url=login.php\">";
  		exit();
  	}
    if( $_SESSION["friendid"]==NULL )
  	{
  		echo "<p class=\"text-center\">请先选择好友</p>\n";
  		echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"friendlist.php\">这里</a>选择好友</p>\n";
  		echo "<meta http-equiv=\"refresh\" content=\"3;url=friendlist.php\">";
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
            <li><a href="friendmanage.php">好友搜索</a></li>
            <li><a href="userinfo.php">个人信息</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <p></p>
      <?php
      $friend_info_query = "SELECT email,nickname FROM user_info WHERE id=".$_SESSION["friendid"];
      $friend_info_result = mysql_query($friend_info_query);
      $friend_info = mysql_fetch_array($friend_info_result);

        echo "<h2>与".$friend_info["nickname"]."聊天中</h2>";
       ?>
      <ul class="list-group">
        <div id="record_receive"></div>
      </ul>

      <input type="text" name="record" id="record" class="form-control" placeholder="Text input" onkeydown="EnterPress()">
      <p></p>
      <a class="btn btn-primary" role="button" onclick="sendrecord()">发送</a>
      <!-- <a class="btn btn-default" role="button" onclick="receiverecord()">收取</a> -->
      <!-- <div clas="row">
        <div class="col-xs-10">
        <input type="text" name="record" id="record" class="form-control" placeholder="Text input">
        </div>
        <div class="col-xs-1">
        <a class="btn btn-primary" role="button" onclick="sendrecord()">发送</a>
        </div>
      </div>
    </div>
    <div class="col-xs-1">
    <a class="btn btn-default" role="button" onclick="receiverecord()">收取</a> -->
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
