<!DOCTYPE html>
<?php session_start(); ?>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<title>登录</title>

	<!-- Bootstrap -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="./css/bootstrap-theme.css"> -->
	<link href="./css/signin.css" rel="stylesheet">

</head>

<body>
	<?php
	if( $_SESSION["login"]==1 )
	{
		echo "<p class=\"text-center\">".$_SESSION["email"].":您已登录，即将自动跳转回首页</p>\n";
		echo "<p class=\"text-center\">如果您的浏览器不支持自动跳转，请点击<a href=\"index.php\">这里</a></p>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
		exit();
	}
	?>
	<div class="container">

	 <form class="form-signin" role="form" action="logincheck.php" method="post">
		 <h2 class="form-signin-heading">登录</h2>

		 <div class="form-group">
			 <label for="inputEmail">邮箱地址</label>
			 <input type="email" name="email" id="inputEmail" class="form-control" placeholder="邮箱地址" required autofocus>
	 	 </div>

		 <div class="form-group">
		 <label for="inputPassword">密码</label>
		 <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
	 	 </div>

		 <div class="checkbox">
			 <label>
				 <input type="checkbox" value="remember-me"> 记住我
			 </label>
		 </div>
		 <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
	 </form>

 </div>
 <!-- <script src="./js/ie10-viewport-bug-workaround.js"></script> -->
</body>

</html>
