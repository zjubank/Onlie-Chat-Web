<!DOCTYPE html>
<?php session_start(); ?>
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
        if($_SESSION["login"]==1)
        {
          echo "<p class=\"text-center\">".$_SESSION["email"].":您已成功注销，即将返回首页</p>\n";
          echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"index.php\">这里</a></p>\n";
          echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
          $_SESSION["login"] = 0;
					session_destroy();
        }
        else
        {
          echo "<p class=\"text-center\">您尚未登录，即将跳转到登录界面</p>\n";
          echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"login.php\">这里</a></p>\n";
          echo "<p class=\"text-center\"><meta http-equiv=\"refresh\" content=\"3;url=login.php\"></p>";
        }
       ?>
 </div>
 <script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
