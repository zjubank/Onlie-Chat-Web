<!DOCTYPE html>
<html lang="zh-cn">

<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<title>注册</title>

	<!-- Bootstrap -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="./css/bootstrap-theme.css"> -->
	<link href="./css/signin.css" rel="stylesheet">

</head>

<body>
	<div class="container">

    <form class="form-signin" role="form" action="signincheck.php" method="post">
 		 <h2 class="form-signin-heading">注册</h2>

 		 <div class="form-group">
 			 <label for="inputEmail">邮箱地址</label>
 			 <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
 	 	 </div>

 		 <div class="form-group">
   		 <label for="inputPassword">密码</label>
   		 <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
 	 	 </div>

     <!-- <div class="form-group">
   		 <label for="inputPassword">确认密码</label>
   		 <input type="password" name="confirmpassword" id="reinputPassword" class="form-control" placeholder="Password" required>
 	 	 </div> -->

     <!-- <div class="form-group">
       <label for="inputAvatar">头像</label>
       <input type="file" id="exampleInputFile">
     </div> -->

 		 <button class="btn btn-lg btn-primary btn-block" type="submit">立即注册</button>
 	 </form>

 </div>
 <!-- <script src="./js/ie10-viewport-bug-workaround.js"></script> -->
</body>

</html>
