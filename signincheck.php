<!DOCTYPE html>
<?php session_start(); ?>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<title>注册中</title>

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
					echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"signin.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=signin.php\"></p>";
					exit();
        }
				if( strlen($posts["password"]) <=6 )
				{
          echo "<p class=\"text-center\">请使用6位以上密码</p>\n";
					echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"signin.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=signin.php\"></p>";
					exit();
        }

        $password = md5($posts["password"]);
        $email = $posts["email"];
				$nickname = $posts["nickname"];

        include 'dbconnect.php';

        $check_email = "SELECT email FROM user_info WHERE email = '$email'";
        $check_email_result = mysql_query($check_email);
        $email_info = mysql_fetch_array($check_email_result);

				$check_nickname = "SELECT nickname FROM user_info WHERE nickname = '$nickname'";
				$check_nickname_result = mysql_query($check_nickname);
        $nickname_info = mysql_fetch_array($check_nickname_result);

				if(!empty($email_info))
        {
          echo "<p class=\"text-center\">邮箱已存在，请直接<a href=\"login.php\">登录</a>或更换邮箱<a href=\"signin.php\">重试</a></p>\n";
        }
				else if(!empty($nickname_info))
				{
					echo "<p class=\"text-center\">用户名已存在，请直接<a href=\"login.php\">登录</a>或更换用户名<a href=\"signin.php\">重试</a></p>\n";
				}
        else
        {
          $create_user_query = "INSERT INTO user_info (email, password, nickname, state) VALUES ('$email', '$password', '$nickname', 0)";
          $create_user_result = mysql_query($create_user_query);

          $getid_query = "SELECT id FROM user_info WHERE email = '$email'";
          $getid_result = mysql_query($getid_query);
          $user_info = mysql_fetch_array($getid_result);

          $create_user_friend_query = "CREATE TABLE `CHAT`.`friend_".$user_info["id"]."` (`friend_id` INT NOT NULL, `friend_group` INT NOT NULL, `friend_care` INT NULL,`friend_aliasname` VARCHAR(45) NULL, PRIMARY KEY (`friend_id`))";
          $create_user_friend_result = mysql_query($create_user_friend_query);

          $create_user_record_query = "CREATE TABLE `CHAT`.`record_".$user_info["id"]."` (`record_id` INT NOT NULL AUTO_INCREMENT,`record_sender` INT NOT NULL,`record_receiver` INT NOT NULL ,`record_time` DATETIME NOT NULL,`record_content` VARCHAR(45) NULL,`record_state` INT NULL,`multimedia_record` BLOB NULL,PRIMARY KEY (`record_id`))";
          $create_user_record_result = mysql_query($create_user_record_query);

					if(empty($create_user_result))
					{
						echo "<p class=\"text-center\">创建用户失败，请联系管理员</p>\n";
						exit();
					}
					else if(empty($create_user_friend_result))
					{
						echo "<p class=\"text-center\">创建好友列表失败，请联系管理员</p>\n";
						exit();
					}
					else if(empty($create_user_record_result))
					{
						echo "<p class=\"text-center\">创建聊天列表失败，请联系管理员</p>\n";
						exit();
					}
          else
					{
            echo "<p class=\"text-center\">注册成功，请返回首页登录</p>\n";
          	echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"index.php\">这里</a></p>\n";
            echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=index.php\"></p>";
					}
				}
       ?>
 </div>
 <script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
