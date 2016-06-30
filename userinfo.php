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

    <title>个人信息</title>

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
            <li><a href="friendmanage.php">好友搜索</a></li>
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
            echo "<p>用户名：".$info["nickname"]."</p>";
            echo "<p>签名：".$info["phrase"]."</p>";
            echo "<p>性别：";
            if( $info["gender"]==1 ) echo "男";
            elseif ($info["gender"]==2) echo "女";
            elseif ($info["gender"]==3) echo "保密";
            echo "</p>";
            echo "<p>生日：".$info["birth_day"]."</p>";
            echo "<p>联系电话：".$info["phonenumber"]."</p>";
            echo "<p>个人主页：".$info["homepage"]."</p>";
          ?>
          <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              修改个人信息
            </button>
            <a href="changepassword.php" class="btn btn-default" role="button">修改密码</a>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">个人信息</h4>
                  </div>
                  <div class="modal-body">

                    <form>
                      <div class="form-group">
                        <label for="InputEmail">邮箱地址（注册后不可修改）</label>
                        <input class="form-control" type="text" placeholder="<?php echo $info["email"]; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="InputNickname">用户名（注册后不可修改）</label>
                        <input class="form-control" type="text" placeholder="<?php echo $info["nickname"]; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="InputPhrase">个性签名</label>
                        <input type="text" class="form-control" id="InputPhrase">
                      </div>
                      <div class="form-group">
                        <label for="InputGender">性别</label>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            男
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            女
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option3" checked>
                            保密
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="InputBirthday">生日</label>
                        <input type="text" class="form-control" id="InputNameBirthday">
                      </div>
                      <div class="form-group">
                        <label for="InputPhonenumber">联系电话</label>
                        <input type="text" class="form-control" id="InputPhonenumber">
                      </div>
                      <div class="form-group">
                        <label for="InputHomepage">个人主页</label>
                        <input type="text" class="form-control" id="InputHomepage">
                      </div>
                    </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary">保存</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <button type="button" class="btn btn-primary">修改资料</button> -->

          </p>
        </div>
      </div>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ie10-viewport-bug-workaround.js"></script>

  </body>

</html>
