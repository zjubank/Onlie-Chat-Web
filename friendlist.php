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

    <title>好友列表</title>

    <!-- Bootstrap -->
  	<link href="./css/bootstrap.css" rel="stylesheet" >
  	<link href="./css/bootstrap-theme.css" rel="stylesheet">
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <script>
      function setfriendchat(friendid,friendnickname)
      {
      	xmlhttp=new XMLHttpRequest();
      	xmlhttp.open("POST","setfriendchat.php",true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      	xmlhttp.send("friendid="+friendid);
        // alert("开始和:"+ friendnickname+"聊天");
        window.location.href="chat.php";
      }
    </script>

    <script>
      function setfrienddelete(friendid,friendnickname)
      {
        if(window.confirm("确认要删除好友\""+friendnickname+"\"吗?"))
        {
          xmlhttp=new XMLHttpRequest();
        	xmlhttp.open("POST","setfrienddelete.php",true);
          xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        	xmlhttp.send("friendid="+friendid);
          alert("好友\""+ friendnickname+"\"已被删除");
          location.reload();
        }
        else
        {
          exit();
        }

      }
    </script>

    <script>
      function setfriendgroup(friendid,friendnickname,friendgroup)
      {
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("POST","setfriendgroup.php",true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.send("friendid="+friendid+"&friendgroup="+friendgroup);
        // alert("好友: "+ friendnickname+"已被重新分组");
        location.reload();
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
            <li class="active"><a href="friendlist.php">好友列表</a></li>
            <li><a href="friendmanage.php">好友搜索</a></li>
            <li><a href="userinfo.php">个人信息</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
      $friend_query = "SELECT friend_id,friend_group FROM friend_".$_SESSION["id"];
      $friend_result = mysql_query($friend_query);
      $row = mysql_fetch_array($friend_result);
      // echo $row;
      if(empty($row))
      {
        echo "<div class=\"container-fluid\">";
        echo "<p></p><p>你还没有好友，快去添加一个吧</p>";
        echo "<div>";
        exit();
      }
      else
      {
        echo "<div class=\"container\">";
        echo "<p></p>";
        echo "<ul class=\"list-group\">";

        do
        {
          $friend_info_query = "SELECT email,nickname FROM user_info WHERE id=".$row["friend_id"];
          $friend_info_result = mysql_query($friend_info_query);
          $friend_info = mysql_fetch_array($friend_info_result);

          echo "<li class=\"list-group-item\">";
          echo "<div class=\"container-fluid\">";
          echo "<div class=\"col-md-9\">";
          echo "<div>好友ID:".$row["friend_id"]."</div>";
          echo "<div>好友邮箱:".$friend_info["email"]."</div>";
          echo "<div>好友昵称:".$friend_info["nickname"]."</div>";
          echo "</div>"; // col9
          echo "<div class=\"col-md-1\">";
          echo "<p></p><button href=\"chat.php\" type=\"button\" class=\"btn btn-primary\" onclick=\"setfriendchat(".$row["friend_id"].",'".$friend_info["nickname"]."')\">开始聊天</button>";
          echo "</div>";// col1
          echo "<div class=\"col-md-1\">";
          echo "<p></p>
            <div class=\"dropdown\">
              <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">";
          if($row["friend_group"]==0)
          {
            echo "未分组";
          }
          else if($row["friend_group"]==1)
          {
            echo "朋友";
          }
          else if($row["friend_group"]==2)
          {
            echo "同学";
          }
          else if($row["friend_group"]==3)
          {
            echo "同事";
          }
          echo "<span class=\"caret\"></span>
              </button>
              <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
                <li><a onclick=\"setfriendgroup(".$row["friend_id"].",'".$friend_info["nickname"]."',1)\">朋友</a></li>
                <li><a onclick=\"setfriendgroup(".$row["friend_id"].",'".$friend_info["nickname"]."',2)\">同学</a></li>
                <li><a onclick=\"setfriendgroup(".$row["friend_id"].",'".$friend_info["nickname"]."',3)\">同事</a></li>
                <li><a onclick=\"setfriendgroup(".$row["friend_id"].",'".$friend_info["nickname"]."',0)\">取消分组</a></li>
              </ul>
            </div>
          ";
          echo "</div>";// col1
          echo "<div class=\"col-md-1\">";
          echo "<p></p><button type=\"button\" class=\"btn btn-danger\" onclick=\"setfrienddelete(".$row["friend_id"].",'".$friend_info["nickname"]."')\">删除好友</button>";
          echo "</div>";// col1
          echo "</div>";// container-fluid
          echo "</div>";
          echo "</li>";
        }while( $row = mysql_fetch_array($friend_result) );
      }
      ?>
      </ul>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
