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
    <script>
      function addfriend(friendid)
      {
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("POST","addfriend.php",true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.send("friendid="+friendid);
        alert("Add friend: "+friendid);
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
      <p></p>
    <?php
    	require 'dbconnect.php';
      $id = $_POST["id"];
      $email = $_POST["email"];
      $nickname = $_POST["nickname"];

      $result = mysql_query("SELECT id,email,nickname,phrase,gender,birth_day,phonenumber,homepage FROM user_info
                              where ('$id'='' or id='$id')
                              and ('$email'='' or email='$email')
                              and ('$nickname'='' or id='$nickname')
                              ");
                              while( $row = mysql_fetch_array($result))
                              {
                                echo "<li class=\"list-group-item\">";
                                echo "<div onclick=\"addfriend(".$row["id"].")\">";
                                echo "<div>ID: ".$row["id"]."</div>";
                                echo "<div>Email: ".$row["email"]."</div>";
                                echo "<div>Nickname: ".$row["nickname"]."</div>";
                                echo "</div>";
                                echo "</li>";
                              }
    ?>
  </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
