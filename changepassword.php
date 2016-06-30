<!DOCTYPE html>
<?php session_start(); ?>

<html lang="zh-cn">

<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<title>修改密码</title>

	<!-- Bootstrap -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="./css/bootstrap-theme.css"> -->
	<link href="./css/signin.css" rel="stylesheet">

</head>

<body>
  <?php
    include "dbconnect.php";

    $info_query = "SELECT email,nickname FROM user_info where id=".$_SESSION["id"];
    $info_result = mysql_query($info_query);
    $info = mysql_fetch_array($info_result);
   ?>
	<div class="container">

    <form class="form-signin" role="form" action="changepasswordcheck.php" method="post">
 		 <h2 class="form-signin-heading">修改密码</h2>

 		 <div class="form-group">
 			 <label for="inputEmail">邮箱地址（注册后不可修改）</label>
       <input class="form-control" type="text" placeholder="<?php echo $info["email"]; ?>" readonly>
 	 	 </div>

     <div class="form-group">
 			 <label for="inputNickname">用户名（注册后不可修改）</label>
       <input class="form-control" type="text" placeholder="<?php echo $info["nickname"]; ?>" readonly>
 	 	 </div>

 		 <div class="form-group">
   		 <label for="inputPassword">密码（6位以上）</label>
       <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
 	 	 </div>

     <div class="form-group">
   		 <label for="inputPassword">确认密码</label>
   		 <input type="password" name="confirmpassword" id="reinputPassword" class="form-control" placeholder="确认密码" required>
 	 	 </div>

 		 <button class="btn btn-lg btn-primary btn-block" type="submit">确认修改</button>
 	 </form>

 </div>
 <!-- <script src="./js/ie10-viewport-bug-workaround.js"></script> -->
</body>

</html>
