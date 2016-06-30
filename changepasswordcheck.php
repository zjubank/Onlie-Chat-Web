<!DOCTYPE html>
<?php session_start(); ?>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<title>修改密码中</title>

	<!-- Bootstrap -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<link href="./css/signin.css" rel="stylesheet">

</head>

<body>
  <div class="container">
      <?php
        $posts = $_POST;
        foreach($posts as $key => $value)
        {
          $posts[$key] = $value;
        }

        if( $posts["password"] != $posts["confirmpassword"] )
        {
          echo "<p class=\"text-center\">两次密码不匹配，请重新输入</p>\n";
					echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"changepassword.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=changepassword.php\"></p>";
					exit();
        }
				if( strlen($posts["password"]) <=6 )
				{
          echo "<p class=\"text-center\">请使用6位以上密码</p>\n";
					echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"changepassword.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=changepassword.php\"></p>";
					exit();
        }

        $password = md5($posts["password"]);
        $email = $posts["email"];
				$nickname = $posts["nickname"];
        $id = $_SESSION["id"];

        include 'dbconnect.php';

        $change_password_query = "UPDATE user_info SET password='$password' WHERE id='$id'";
        $change_password_result = mysql_query($change_password_query);

				if(empty($change_password_result))
				{
					echo "<p class=\"text-center\">修改密码失败，请联系管理员</p>\n";
					exit();
				}
        else
				{
          echo "<p class=\"text-center\">修改密码成功，即将返回个人信息</p>\n";
        	echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"userinfo.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=userinfo.php\"></p>";
				}
       ?>
 </div>
 <script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
