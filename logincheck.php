<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<title>登录中</title>

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
        $password = md5($posts["password"]);
        $email = $posts["email"];

        include 'dbconnect.php';
        $query = "SELECT email, id FROM user_info WHERE email = '$email' AND password = '$password'";
        $result = mysql_query($query);
        $user_info = mysql_fetch_array($result);

				if(!empty($user_info))
        {
					session_start();
					$_SESSION["login"] = 1;
					$_SESSION["id"] = $user_info["id"];
          $_SESSION["email"] = $user_info["email"];
          echo "<p class=\"text-center\">".$_SESSION["email"].":您已登录成功，即将自动跳转回首页</p>\n";
          echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"index.php\">这里</a></p>\n";
          echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
        }
        else
        {
          echo "<p class=\"text-center\">用户名密码有误，即将自动跳转回登录界面</p>\n";
					echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"login.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=login.php\"></p>";
        }
       ?>
 </div>
 <script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
